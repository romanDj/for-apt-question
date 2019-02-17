<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "module".
 *
 * @property int $id
 * @property string $name
 * @property int $id_specialty
 *
 * @property Specialty $specialty
 * @property Practice[] $practices
 */
class Module extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'module';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['id_specialty'], 'integer'],
            [['name'], 'string', 'max' => 500],
            [['id_specialty'], 'exist', 'skipOnError' => true, 'targetClass' => Specialty::className(), 'targetAttribute' => ['id_specialty' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'id_specialty' => 'Id Specialty',
            'specialty' => 'Специальность'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSpecialty()
    {
        return $this->hasOne(Specialty::className(), ['id' => 'id_specialty']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPractices()
    {
        return $this->hasMany(Practice::className(), ['id_module' => 'id']);
    }
}
