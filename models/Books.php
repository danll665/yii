<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "books".
 *
 * @property int $id
 * @property string $name
 * @property int $artikul
 * @property int $receipt_date
 * @property string $author
 *
 * @property Extradition[] $extraditions
 * @property ReturnBooks[] $returnBooks
 */
class Books extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'books';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'artikul', 'receipt_date', 'author'], 'required'],
            [['artikul', 'receipt_date'], 'default', 'value' => null],
            [['artikul', 'receipt_date'], 'integer'],
            [['name', 'author'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'artikul' => 'Artikul',
            'receipt_date' => 'Receipt Date',
            'author' => 'Author',
        ];
    }

    /**
     * Gets query for [[Extraditions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getExtraditions()
    {
        return $this->hasMany(Extradition::className(), ['book_id' => 'id']);
    }

    /**
     * Gets query for [[ReturnBooks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReturnBooks()
    {
        return $this->hasMany(ReturnBooks::className(), ['book_id' => 'id']);
    }
}
