<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Practice */

$this->title = 'Update Practice: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Вид практики', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="practice-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
