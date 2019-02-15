<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Question */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Вопросы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="question-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'content',
        ],
    ]) ?>



    <p>
        <?= Html::a('Изменить варианты ответов', ['check-answer', 'id' => $model->id], ['class' => 'btn btn-info ma']) ?>
    </p>
    <div class="table-bordered" style="padding: 10px">
        <p>Варианты ответов:</p>
        <ul>
            <?php foreach ($model->answers as $item): ?>
                <li><?= $item->answerContent->name ?></li>
            <?php endforeach; ?>
        </ul>

    </div>


</div>
