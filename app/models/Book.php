<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "books".
 *
 * @property int $id
 * @property string $name
 * @property int $artikul
 * @property string $author
 * @property string $created_at
 *
 * @property LendingOutBook[] $lendingOutBook
 * @property ReturnBook[] $returnBook
 */
class Book extends \yii\db\ActiveRecord
{
    /**
     * @return array[]
     */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => false,
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'books';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'artikul', 'author'], 'required'],
            [['artikul'], 'default', 'value' => null],
            [['artikul'], 'integer'],
            [['created_at'], 'safe'],
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
            'author' => 'Author',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[LendingOutBook]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLendingOutBook(): \yii\db\ActiveQuery
    {
        return $this->hasMany(LendingOutBook::class, ['book_id' => 'id']);
    }

    /**
     * Gets query for [[ReturnBook]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReturnBook(): \yii\db\ActiveQuery
    {
        return $this->hasMany(ReturnBook::class, ['book_id' => 'id']);
    }
}
