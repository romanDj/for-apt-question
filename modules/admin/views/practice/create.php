<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Practice */

$this->title = 'Добавить вид практики';
$this->params['breadcrumbs'][] = ['label' => 'Вид практики', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="practice-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
