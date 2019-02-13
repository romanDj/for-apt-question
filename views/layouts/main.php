<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
    <link href="/public/css/bootstrap.css" rel="stylesheet">
    <link href="/public/css/mdb.min.css" rel="stylesheet">
    <link href="/public/css/style.css" rel="stylesheet">
    <script src="/public/js/vue.js"></script>
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<script type="text/javascript" src="/public/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="/public/js/popper.min.js"></script>
<script type="text/javascript" src="/public/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/public/js/mdb.min.js"></script>
<header>

    <nav class="navbar navbar-expand-lg navbar-dark indigo">
        <div class="container">
            <a class="navbar-brand" href="<?= Url::toRoute(['/']) ?>"><strong>Анкетирование</strong></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Пройти<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= Url::toRoute(['site/report']) ?>">Получить отчет</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


</header>

<main class="text-center my-3">
        <div class="container">

            <?= $content ?>

        </div>
</main>





<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
