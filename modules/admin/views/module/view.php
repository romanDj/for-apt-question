<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Module */


$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Специальности', 'url' => ['specialty/index']];
$this->params['breadcrumbs'][] = ['label' => \app\models\Specialty::findOne(['id'=>$model->id_specialty])->name, 'url' => ['specialty/view?id='.$model->id_specialty]];
$this->params['breadcrumbs'][] = $this->title;

\yii\web\YiiAsset::register($this);
?>
<div class="module-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['specialty/'.$model->id_specialty.'/module/update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['specialty/'.$model->id_specialty.'/module/delete', 'id' => $model->id], [
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
                'label' => 'Специальность',
                'value' => $model->specialty->name,
            ],
        ],
    ]) ?>

</div>
