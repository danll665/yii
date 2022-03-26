<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "extraditions".
 *
 * @property int $id
 * @property string|null $date_of_issuance
 * @property string $period
 * @property int $book_id
 * @property int $employee_id
 * @property int $client_id
 *
 * @property Book $book
 * @property User $client
 * @property User $employee
 */
class Extradition extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'extraditions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date_of_issuance'], 'safe'],
            [['period', 'book_id', 'employee_id', 'client_id'], 'required'],
            [['book_id', 'employee_id', 'client_id'], 'default', 'value' => null],
            [['book_id', 'employee_id', 'client_id'], 'integer'],
            [['period'], 'string', 'max' => 255],
            [['book_id'], 'exist', 'skipOnError' => true, 'targetClass' => Book::className(), 'targetAttribute' => ['book_id' => 'id']],
            [['employee_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['employee_id' => 'id']],
            [['client_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['client_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date_of_issuance' => 'Date Of Issuance',
            'period' => 'Period',
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
        return $this->hasOne(User::className(), ['id' => 'client_id']);
    }

    /**
     * Gets query for [[Employee]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmployee()
    {
        return $this->hasOne(User::className(), ['id' => 'employee_id']);
    }
}
