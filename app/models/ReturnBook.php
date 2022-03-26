<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "return_books".
 *
 * @property int $id
 * @property string|null $return_date
 * @property string|null $book_condition
 * @property int $book_id
 * @property int $employee_id
 * @property int $client_id
 *
 * @property Book $book
 * @property Clients $client
 * @property Employee $employee
 */
class ReturnBook extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'return_books';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['return_date'], 'safe'],
            [['book_id', 'employee_id', 'client_id'], 'required'],
            [['book_id', 'employee_id', 'client_id'], 'default', 'value' => null],
            [['book_id', 'employee_id', 'client_id'], 'integer'],
            [['book_condition'], 'string', 'max' => 255],
            [['book_id'], 'exist', 'skipOnError' => true, 'targetClass' => Book::className(), 'targetAttribute' => ['book_id' => 'id']],
            [['client_id'], 'exist', 'skipOnError' => true, 'targetClass' => Clients::className(), 'targetAttribute' => ['client_id' => 'id']],
            [['employee_id'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::className(), 'targetAttribute' => ['employee_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'return_date' => 'Return Date',
            'book_condition' => 'Book Condition',
            'book_id' => 'Book ID',
            'employee_id' => 'Employee ID',
            'client_id' => 'Client ID',
        ];
    }

    /**
     * Gets query for [[Book]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBook()
    {
        return $this->hasOne(Book::className(), ['id' => 'book_id']);
    }

    /**
     * Gets query for [[Client]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClient()
    {
        return $this->hasOne(Clients::className(), ['id' => 'client_id']);
    }

    /**
     * Gets query for [[Employee]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmployee()
    {
        return $this->hasOne(Employee::className(), ['id' => 'employee_id']);
    }
}
