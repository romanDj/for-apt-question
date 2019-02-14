<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "practice".
 *
 * @property int $id
 * @property string $name
 * @property int $id_module
 *
 * @property Participant[] $participants
 * @property Module $module
 * @property Test[] $tests
 */
class Practice extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'practice';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'id_module'], 'required'],
            [['id_module'], 'integer'],
            [['name'], 'string', 'max' => 500],
            [['id_module'], 'exist', 'skipOnError' => true, 'targetClass' => Module::className(), 'targetAttribute' => ['id_module' => 'id']],
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
            'id_module' => 'Id Module',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParticipants()
    {
        return $this->hasMany(Participant::className(), ['id_practice' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModule()
    {
        return $this->hasOne(Module::className(), ['id' => 'id_module']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTests()
    {
        return $this->hasMany(Test::className(), ['id_practice' => 'id']);
    }
}
