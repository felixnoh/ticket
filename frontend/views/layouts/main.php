<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<style>
    a.navbar-brand{
        padding-top: 8px !important;
    }
</style>

<div class="wrap">
    <?php
   
   NavBar::begin([
        'brandLabel' => '<img src="../../public/img/logo_eslog.png"; style="width: 115px;" class="img-responsive">',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-default navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        
        [
        'label' => 'Inicio',
        'url' => ['/site/index'],
        'visible' => !Yii::$app->user->isGuest,
        ],
        [
        'label' => 'Abrir Ticket',
        'url' => ['/ticket/create'],
        'visible' => !Yii::$app->user->isGuest,
        ],
        [
        'label' => 'Mis Tickets',
        'url' => ['/ticket/index'],
        'visible' => !Yii::$app->user->isGuest,
        ],
        [
        'label' => 'Services',
        'url' => ['/site/home'],
        'visible' => !Yii::$app->user->isGuest,
        ],
        ['label' => 'About', 'url' => ['/site/about']],
        ['label' => 'Contact', 'url' => ['/site/contact']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = 

            [
            'label' => Html::encode(
                Yii::$app->user->identity->profile->name),
            'items' => [
                ['label' => 'Configuracion', 'url' => ['/profile/index']],
                 '<li class="divider"></li>',
                 
                ['label' => 'Salir ',
                           'url' => ['/site/logout'],
                           'linkOptions' => ['data-method' => 'post']],
            ],
        ];
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();

    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<script>
        $(document).ready(function()
      {
        var navItems = $('.admin-menu li > a');
        var navListItems = $('.admin-menu li');
        var allWells = $('.admin-content');
        var allWellsExceptFirst = $('.admin-content:not(:first)');
        allWellsExceptFirst.hide();
        navItems.click(function(e)
        {
            e.preventDefault();
            navListItems.removeClass('active');
            $(this).closest('li').addClass('active');
            allWells.hide();
            var target = $(this).attr('data-target-id');
            $('#' + target).show();
        });
        });
    </script>
<?php $this->endPage() ?>
