<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "participant".
 *
 * @property int $id
 * @property string $date
 * @property int $id_practice
 *
 * @property Practice $practice
 * @property Result[] $results
 */
class Participant extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'participant';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date', 'id_practice'], 'required'],
            [['date'], 'safe'],
            [['id_practice'], 'integer'],
            [['id_practice'], 'exist', 'skipOnError' => true, 'targetClass' => Practice::className(), 'targetAttribute' => ['id_practice' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Date',
            'id_practice' => 'Id Practice',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPractice()
    {
        return $this->hasOne(Practice::className(), ['id' => 'id_practice']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResults()
    {
        return $this->hasMany(Result::className(), ['id_participant' => 'id']);
    }
}
