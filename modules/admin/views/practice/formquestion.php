<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\Question */

$this->title = 'Вопросы';
$this->params['breadcrumbs'][] = ['label' => 'Вид практики', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $id, 'url' => ['view', 'id' => $id]];
$this->params['breadcrumbs'][] = $this->title;

\yii\web\YiiAsset::register($this);
?>
<div class="question-view">
    <h3><?= Html::encode($this->title) ?></h3>
    <form action="" method="post">

        <input type="hidden" name="<?= Yii::$app->request->csrfParam ?>" value="<?= Yii::$app->request->getCsrfToken() ?>">

        <div class="form-group">
            <?=
            Html::checkboxList('questions', $checkedList,
                ArrayHelper::map(\app\models\Question::find()->all(), 'id', 'content'), ['separator' => '<br><p></p>']
            )
            ?>
        </div>

        <div class="form-group">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        </div>
    </form>

</div>
