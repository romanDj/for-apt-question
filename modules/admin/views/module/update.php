<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Module */

$this->title = 'Изменить модуль: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Специальности', 'url' => ['specialty/index']];
$this->params['breadcrumbs'][] = ['label' => \app\models\Specialty::findOne(['id'=>$model->id_specialty])->name, 'url' => ['specialty/view?id='.$model->id_specialty]];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['specialty/'.$model->id_specialty.'/module/view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';


?>
<div class="module-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
