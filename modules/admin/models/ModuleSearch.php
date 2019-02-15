<?php

namespace app\modules\admin\models;

use app\models\Specialty;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Module;

/**
 * ModuleSearch represents the model behind the search form of `app\models\Module`.
 */
class ModuleSearch extends Module
{
    /**
     * {@inheritdoc}
     */

    public $specialty;

    public function rules()
    {
        return [
            [['id', 'id_specialty'], 'integer'],
            [['name', 'specialty'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Module::find()->where(['id_specialty' => $params["id"]]);
        $query->joinWith(['specialty']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);


        $dataProvider->sort->attributes['specialty'] = [
            'asc' => [Specialty::tableName().'.name' => SORT_ASC],
            'desc' => [Specialty::tableName().'.name' => SORT_DESC],
        ];


        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_specialty' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', Specialty::tableName().'.name', $this->specialty]);

        return $dataProvider;
    }
}
