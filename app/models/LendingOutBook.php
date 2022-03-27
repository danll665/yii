<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "lending_out_books".
 *
 * @property int $id
 * @property int $book_id
 * @property int $employee_id
 * @property int $client_id
 * @property string $date_of_issue
 * @property string $date_expiration
 *
 * @property Book $book
 */
class LendingOutBook extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'lending_out_books';
    }
    /**
     * @return array[]
     */
    public function behaviors(): array
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'createdAtAttribute' => 'date_of_issue',
                'updatedAtAttribute' => false,
                'value' => new Expression('NOW()'),
            ],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['book_id', 'employee_id', 'client_id', 'date_expiration'], 'required'],
            [['book_id', 'employee_id', 'client_id'], 'default', 'value' => null],
            [['book_id', 'employee_id', 'client_id'], 'integer'],
            [['date_of_issue', 'date_expiration'], 'safe'],
            [['book_id'], 'exist', 'skipOnError' => true, 'targetClass' => Book::class, 'targetAttribute' => ['book_id' => 'id']],
            [['employee_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['employee_id' => 'id']],
            [['client_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['client_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'book_id' => 'Book ID',
            'employee_id' => 'Employee ID',
            'client_id' => 'Client ID',
            'date_of_issue' => 'Date Of Issue',
            'date_expiration' => 'Date Expiration',
        ];
    }

    /**
     * Gets query for [[Book]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBook(): \yii\db\ActiveQuery
    {
        return $this->hasOne(Book::class, ['id' => 'book_id']);
    }

}
