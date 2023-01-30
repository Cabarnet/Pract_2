<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Review;

/**
 * ReviewSearch represents the model behind the search form of `app\models\Review`.
 */
class ReviewSearch extends Review
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_user', 'id_photo', 'id_video', 'id_like_rating'], 'integer'],
            [['pluses', 'minuses', 'description', 'status', 'date_of_creation', 'date_of_update', 'author'], 'safe'],
            [['rating'], 'number'],
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
        $query = Review::find();

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
            'id_user' => $this->id_user,
            'id_photo' => $this->id_photo,
            'id_video' => $this->id_video,
            'rating' => $this->rating,
            'id_like_rating' => $this->id_like_rating,
            'date_of_creation' => $this->date_of_creation,
            'date_of_update' => $this->date_of_update,
        ]);

        $query->andFilterWhere(['like', 'pluses', $this->pluses])
            ->andFilterWhere(['like', 'minuses', $this->minuses])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'author', $this->author]);

        return $dataProvider;
    }
}
