<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Practice */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Вид практики', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="practice-view">

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
            'name',
            [
                'label' => 'Проф. модуль',
                'value' => $model->module->name,
            ],
        ],
    ]) ?>

    <h2>Вопросы анкеты</h2>

    <p>
        <?= Html::a('выбрать вопросы', ['check-question', 'id' => $model->id], ['class' => 'btn btn-info ma']) ?>
    </p>
    <div class="table-bordered" style="padding: 10px">
        <?php if($model->tests):?>
        <ul>
            <?php foreach ($model->tests as $item): ?>
                <li><a href="/admin/question/view?id=<?= $item->question->id ?>" style="margin-right: 10px"><span class="glyphicon glyphicon-pencil"></span></a><?= $item->question->content ?></li>
            <?php endforeach; ?>
        </ul>
        <?php else:?>
            <p>вопросы не выбраны</p>
        <?php endif;?>

    </div>

</div>
