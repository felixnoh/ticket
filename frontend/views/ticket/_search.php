<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TicketSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ticket-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'folio') ?>

    <?= $form->field($model, 'subject') ?>

    <?= $form->field($model, 'created_at') ?>

    <?= $form->field($model, 'state') ?>

    <?php // echo $form->field($model, 'priority') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'expiration') ?>

    <?php // echo $form->field($model, 'attached') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
