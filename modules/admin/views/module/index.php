<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\ModuleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Проф. модули';

?>
<div class="module-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <p>
        <?= Html::a('Добавить модуль', ['specialty/'.$id.'/module/create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
//            [
//                'attribute' => 'specialty',
//                'value' => 'specialty.name',
//            ],

            [ 'class' => 'yii\grid\ActionColumn',

                    'urlCreator' => function ($action, $model, $key, $index) {
                        if ($action === 'view') {
                            $url = $model->id_specialty.'/module/view?id='.$model->id;
                            return $url;
                        }

                        if ($action === 'update') {
                            $url = $model->id_specialty.'/module/update?id='.$model->id;
                            return $url;
                        }
                        if ($action === 'delete') {
                            $url = $model->id_specialty.'/module/delete?id='.$model->id;
                            return $url;
                        }

                    }
                ],
        ],
    ]); ?>
</div>
