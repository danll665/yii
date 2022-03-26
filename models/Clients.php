<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "clients".
 *
 * @property int $id
 * @property string $full_name
 * @property int $passport
 *
 * @property Extradition[] $extraditions
 * @property ReturnBooks[] $returnBooks
 */
class Clients extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'clients';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['full_name', 'passport'], 'required'],
            [['passport'], 'default', 'value' => null],
            [['passport'], 'integer'],
            [['full_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'full_name' => 'Full Name',
            'passport' => 'Passport',
        ];
    }

    /**
     * Gets query for [[Extraditions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getExtraditions()
    {
        return $this->hasMany(Extradition::className(), ['client_id' => 'id']);
    }

    /**
     * Gets query for [[ReturnBooks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReturnBooks()
    {
        return $this->hasMany(ReturnBooks::className(), ['client_id' => 'id']);
    }
}
