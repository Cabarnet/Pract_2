<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\UserCard;

/**
 * UserCardSearch represents the model behind the search form of `app\models\UserCard`.
 */
class UserCardSearch extends UserCard
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'cvv'], 'integer'],
            [['card_number', 'date'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = UserCard::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'date' => $this->date,
            'cvv' => $this->cvv,
        ]);

        $query->andFilterWhere(['like', 'card_number', $this->card_number]);

        return $dataProvider;
    }
}
