<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "employees".
 *
 * @property int $id
 * @property string $full_name
 * @property string $position
 *
 * @property Extradition[] $extraditions
 * @property Return[] $returns
 */
class Employees extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'employees';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['full_name', 'position'], 'required'],
            [['full_name', 'position'], 'string', 'max' => 255],
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
            'position' => 'Position',
        ];
    }

    /**
     * Gets query for [[Extraditions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getExtraditions()
    {
        return $this->hasMany(Extradition::className(), ['employee_id' => 'id']);
    }

    /**
     * Gets query for [[Returns]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReturns()
    {
        return $this->hasMany(Return::className(), ['employee_id' => 'id']);
    }
}
