<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Product;

/**
 * ProductSearch represents the model behind the search form of `app\models\Product`.
 */
class ProductSearch extends Product
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_category', 'id_photo', 'is_discount', 'discount', 'flag', 'author', 'price', 'id_company'], 'integer'],
            [['name', 'description', 'characteristic', 'way_of_use', 'link', 'date_of_creation', 'date_of_update'], 'safe'],
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
        $query = Product::find();

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
            'id_category' => $this->id_category,
            'id_photo' => $this->id_photo,
            'is_discount' => $this->is_discount,
            'discount' => $this->discount,
            'flag' => $this->flag,
            'rating' => $this->rating,
            'date_of_creation' => $this->date_of_creation,
            'date_of_update' => $this->date_of_update,
            'author' => $this->author,
            'price' => $this->price,
            'id_company' => $this->id_company,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'characteristic', $this->characteristic])
            ->andFilterWhere(['like', 'way_of_use', $this->way_of_use])
            ->andFilterWhere(['like', 'link', $this->link]);

        return $dataProvider;
    }
}
