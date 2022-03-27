<?php

namespace app\search;

use app\models\LendingOutBook;
use yii\base\Exception;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\User;

/**
 * SearchUser represents the model behind the search form of `app\models\User`.
 */
class SearchUser extends User
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'passport', 'role_id'], 'integer'],
            [['full_name', 'position', 'username', 'auth_key', 'password'], 'safe'],
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
    public function search(array $params)
    {
        $query = User::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query = $this->is_books_exists($query, $params);

        $query->andFilterWhere([
            'id' => $this->id,
            'passport' => $this->passport,
            'role_id' => $this->role_id,
        ]);

        $query->andFilterWhere(['ilike', 'full_name', $this->full_name])
            ->andFilterWhere(['ilike', 'position', $this->position])
            ->andFilterWhere(['ilike', 'username', $this->username])
            ->andFilterWhere(['ilike', 'auth_key', $this->auth_key])
            ->andFilterWhere(['ilike', 'password', $this->password]);

        return $dataProvider;
    }
    private function is_books_exists($query, $params) {
        $books = [];
        $subQuery = LendingOutBook::find()->select(['client_id'])->all();
        foreach ($subQuery as $item) {
            $books[] = $item['client_id'];
        }
        if ($params['is_books_exists'] == '0'){
            $query->where(['not in', 'id', $books]);
        }
        if ($params['is_books_exists'] == '1') {
            $query->where(['in', 'id', $books]);
        }

        return $query;
    }
}
