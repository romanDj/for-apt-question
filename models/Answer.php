<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "answer".
 *
 * @property int $id
 * @property int $id_answer_content
 * @property int $id_question
 *
 * @property Question $question
 * @property AnswerContent $answerContent
 * @property Result[] $results
 */
class Answer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'answer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_answer_content', 'id_question'], 'required'],
            [['id_answer_content', 'id_question'], 'integer'],
            [['id_question'], 'exist', 'skipOnError' => true, 'targetClass' => Question::className(), 'targetAttribute' => ['id_question' => 'id']],
            [['id_answer_content'], 'exist', 'skipOnError' => true, 'targetClass' => AnswerContent::className(), 'targetAttribute' => ['id_answer_content' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_answer_content' => 'Id Answer Content',
            'id_question' => 'Id Question',
        ];
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
        return $this->hasOne(AnswerContent::className(), ['id' => 'id_answer_content']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResults()
    {
        return $this->hasMany(Result::className(), ['id_answer' => 'id']);
    }
}
