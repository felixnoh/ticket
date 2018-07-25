<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\User;
use kartik\file\FileInput;

use kartik\widgets\FileInput;


/* @var $this yii\web\View */
/* @var $model common\models\Ticket */
/* @var $form yii\widgets\ActiveForm */
?>

<style>
    .form-group{
        margin-bottom: 0px !important;
        padding-bottom: 0px !important;
        padding-top: 20px !important;
    }
    .help-block{
        margin-top: 5px !important;
        margin-bottom: 0px !important;
    }
</style>

<div class="ticket-form">

    <?php $form = ActiveForm::begin([
        'options'=>['enctype'=>'multipart/form-data']
        ]); ?>

    <!-- <?= $form->field($model, 'folio')->textInput() ?> -->

    <?= $form->field($model, 'subject')->textInput(['maxlength' => true, 'autofocus' => true]) ?>
    <small style="color: #777777;">Requerido</small>

    <!-- <?= $form->field($model, 'created_at')->textInput() ?> -->

    <!-- <?= $form->field($model, 'state')->textInput() ?> -->

    <!-- <?= $form->field($model, 'priority')->textInput(['maxlength' => true]) ?> -->
    
    <?= $form->field($model, 'priority')->dropdownList([
        'Urgente' => 'Urgente',
        'Alto' => 'Alto',
        'Normal' => 'Normal',
        'Bajo' => 'Bajo'
            ],
            ['prompt'=>'Seleciona la Prioridad']
        ) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <!-- <?= $form->field($model, 'expiration')->textInput() ?> -->

    <!-- <?= $form->field($model, 'attached')->fileInput() ?>
    <small style="color: #777777;">Extensiones de archivos permitidas: .jpg, .gif, .jpeg, .png.</small> -->

    <?= $form->field($model, 'attached')->widget(FileInput::classname(), [
    'options'=>['accept'=>'*/*'],]) ?>
    
    
    <!-- <?= $form->field($model, 'user_id')->dropDownList(ArrayHelper::map(User::find()->where(['type' => 2])->orderBy('username')->all(),'id','username'),['prompt'=>'Selecciona el Tecnico a asignar']) ?> -->

    

    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear Ticket' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
