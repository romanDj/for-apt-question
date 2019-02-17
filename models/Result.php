<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "result".
 *
 * @property int $id
 * @property int $id_participant
 * @property int $id_question
 * @property int $id_answer
 * @property int $desccription
 *
 * @property Participant $participant
 * @property Question $question
 * @property Answer $answer
 */
class Result extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'result';
    }

    /**
     * {@inheritdoc}
     */

    public $countQuestion;
    public $countAnswer;

    public function rules()
    {
        return [
            [['id_participant', 'id_question'], 'required'],
            [['id_participant', 'id_question', 'id_answer'], 'integer'],
            [['desccription'], 'string'],
            [['id_participant'], 'exist', 'skipOnError' => true, 'targetClass' => Participant::className(), 'targetAttribute' => ['id_participant' => 'id']],
            [['id_question'], 'exist', 'skipOnError' => true, 'targetClass' => Question::className(), 'targetAttribute' => ['id_question' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_participant' => 'Id Participant',
            'id_question' => 'Id Question',
            'id_answer' => 'Id Answer',
            'desccription' => 'Desccription',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParticipant()
    {
        return $this->hasOne(Participant::className(), ['id' => 'id_participant']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuestion()
    {
        return $this->hasOne(Question::className(), ['id' => 'id_question']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnswerContent()
    {
        return $this->hasOne(AnswerContent::className(), ['id' => 'id_answer']);
    }
}
