<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "book_states".
 *
 * @property int $id
 * @property string $name
 *
 * @property ReturnBook[] $returnBook
 */
class BookState extends \yii\db\ActiveRecord
{
    const BAD = 1;
    const GOOD = 2;
    const GREAT = 3;
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'book_states';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * Gets query for [[ReturnBook]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReturnBook(): \yii\db\ActiveQuery
    {
        return $this->hasMany(ReturnBook::class, ['state_id' => 'id']);
    }
}
