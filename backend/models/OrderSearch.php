<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Order;

/**
 * OrderSearch represents the model behind the search form about `backend\models\Order`.
 */
class OrderSearch extends Order
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'created_at', 'updated_at'], 'integer'],
            [['first_name', 'last_name', 'city', 'phone', 'department', 
                'note', 'created_at_date', 'updated_at_date', 'status'], 'safe'],
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
        $query = Order::find();

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
            'status' => $this->status ? array_search(mb_convert_case(mb_strtolower($this->status), MB_CASE_TITLE), 
                Order::getStatuses()) : $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_at_date' => $this->created_at_date,
            'updated_at_date' => $this->updated_at_date,
        ]);

        $query->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'last_name', $this->last_name])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'department', $this->department])
            ->andFilterWhere(['like', 'note', $this->note]);

        return $dataProvider;
    }
}
