<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Module */

$this->title = 'Добавление проф. модуля';
$this->params['breadcrumbs'][] = ['label' => 'Специальности', 'url' => ['specialty/index']];
$this->params['breadcrumbs'][] = ['label' => \app\models\Specialty::findOne(['id'=>$model->id_specialty])->name, 'url' => ['specialty/view?id='.$model->id_specialty]];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="module-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'id' => $id
    ]) ?>

</div>
