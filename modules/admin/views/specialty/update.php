<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Specialty */

$this->title = 'Update Specialty: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Специальности', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="specialty-update">

    <h1><?= Html::encode($this->title) ?></h1>й

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
