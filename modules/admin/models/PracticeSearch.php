<?php

namespace app\modules\admin\models;

use app\modules\admin\Module;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Practice;

/**
 * PracticeSearch represents the model behind the search form of `app\models\Practice`.
 */
class PracticeSearch extends Practice
{
    /**
     * {@inheritdoc}
     */

    public $module;

    public function rules()
    {
        return [
            [['id', 'id_module'], 'integer'],
            [['name', 'module' ], 'safe'],
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
        $query = Practice::find();
        $query->joinWith(['module']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['module'] = [
            'asc' => [\app\models\Module::tableName().'.name' => SORT_ASC],
            'desc' => [\app\models\Module::tableName().'.name' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_module' => $this->id_module,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', \app\models\Module::tableName().'.name', $this->module]);

        return $dataProvider;
    }
}
