<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use common\models\User;
use common\models\Profile;

$this->title = 'Signup';

?>
<div class="site-signup">

    <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
        <img src="../../public/img/logo_w.png" class="img-responsive center-block" alt="Responsive image" style="width: 350px;">

    <h1 style="margin-top: 10px"><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signup:</p>

    <div class="row">
        <div class="">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($profile, 'name')->textInput(['maxlength' => true]) ?>

                <?= $form->field($profile, 'last_name')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary btn-lg btn-block', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>


</div>

</div>
