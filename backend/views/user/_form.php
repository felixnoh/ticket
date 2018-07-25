<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    
    <?= $form->field($model, 'type')->dropdownList([
        '1' => 'Administrador',
        '2' => 'Tecnico',
        '3' => 'Usuario Estandar',
        
            ],
            ['prompt'=>'Seleciona el Tipo']
        ) ?>

    <div class="form-group">
        <?= Html::submitButton('Enviar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
