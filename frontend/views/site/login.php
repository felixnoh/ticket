<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';

?>
<style>
    div.container{
        padding-top: 2px !important;
    }
</style>
<div class="site-login" style="text-align: center; margin-top: 70px;">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <img src="../../public/img/logo_w.png" class="img-responsive center-block" alt="Responsive image" style="width: 350px; margin-bottom: 0px;">

    <!-- <p>Please fill out the following fields to login:</p> -->
    <h3 style="margin-top: 10px; margin-bottom: 30px;">Sistema de Tickets.</h3>

    <div class="row" style="text-align: left;">
        <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <div class="form-group" style="margin-bottom: 30px">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-lg btn-block', 'name' => 'login-button']) ?>
                </div>
                <?= $form->field($model, 'rememberMe')->checkbox() ?>

                <div style="color:#999;margin:1em 0">
                    If you forgot your password you can <?= Html::a('reset it', ['site/request-password-reset']) ?>.
                </div>


            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
