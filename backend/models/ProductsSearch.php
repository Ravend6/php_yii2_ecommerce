<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Product;

/**
 * ProductsSearch represents the model behind the search form about `backend\models\Product`.
 */
class ProductsSearch extends Product
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'availability', 'rating', 'top', 'user_id', 'category_id'], 'integer'],
            [['title', 'brand', 'description', 'short_description', 'image', 'image_alt', 'slug', 'currency', 'vendor'], 'safe'],
            [['price'], 'number'],
        ];
    }

    /**
     * @inheritdoc
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

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'availability' => $this->availability,
            'price' => $this->price,
            'rating' => $this->rating,
            'top' => $this->top,
            'user_id' => $this->user_id,
            'category_id' => $this->category_id,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'brand', $this->brand])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'short_description', $this->short_description])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'image_alt', $this->image_alt])
            ->andFilterWhere(['like', 'slug', $this->slug])
            ->andFilterWhere(['like', 'currency', $this->currency])
            ->andFilterWhere(['like', 'vendor', $this->vendor]);

        return $dataProvider;
    }
}
