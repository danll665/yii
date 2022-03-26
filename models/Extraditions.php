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
 * @property Books $book
 * @property Users $client
 * @property Users $employee
 */
class Extraditions extends \yii\db\ActiveRecord
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
            [['book_id'], 'exist', 'skipOnError' => true, 'targetClass' => Books::className(), 'targetAttribute' => ['book_id' => 'id']],
            [['employee_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['employee_id' => 'id']],
            [['client_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['client_id' => 'id']],
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
        return $this->hasOne(Books::className(), ['id' => 'book_id']);
    }

    /**
     * Gets query for [[Client]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClient()
    {
        return $this->hasOne(Users::className(), ['id' => 'client_id']);
    }

    /**
     * Gets query for [[Employee]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmployee()
    {
        return $this->hasOne(Users::className(), ['id' => 'employee_id']);
    }
}
