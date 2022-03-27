<?php

namespace app\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\LendingOutBook;

/**
 * SearchLendingOutBook represents the model behind the search form of `app\models\LendingOutBook`.
 */
class SearchLendingOutBook extends LendingOutBook
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'book_id', 'employee_id', 'client_id'], 'integer'],
            [['date_of_issue', 'date_expiration'], 'safe'],
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
        $query = LendingOutBook::find();

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
            'book_id' => $this->book_id,
            'employee_id' => $this->employee_id,
            'client_id' => $this->client_id,
            'date_of_issue' => $this->date_of_issue,
            'date_expiration' => $this->date_expiration,
        ]);

        return $dataProvider;
    }
}
