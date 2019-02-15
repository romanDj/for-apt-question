<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AnswerContent */

$this->title = 'Create Answ';
$this->params['breadcrumbs'][] = ['label' => 'Answer Contents', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="answer-content-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
