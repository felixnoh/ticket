<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\common\Profile;
use yii\common\User;
use kartik\file\FileInput;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ProfileSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Perfil';
$this->params['breadcrumbs'][] = $this->title;
$formatter = \Yii::$app->formatter;

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

<div class="profile-index">

    
    <div class="row">


            <div class="col-md-3">

                <ul class="nav nav-pills nav-stacked admin-menu" >

                    <li class="active"><a href="" data-target-id="profile"><i class="glyphicon glyphicon-user"></i> Perfil</a></li>

                    <li><a href="" data-target-id="change-password"><i class="glyphicon glyphicon-lock"></i> Actualizar datos</a></li>

                    <li><a href="" data-target-id="settings"><i class="glyphicon glyphicon-cog"></i> Configuracion</a></li>

                </ul>

            </div> <!-- col-md-3 -->


            <!-- profile -->
            <div class="col-md-9  admin-content" id="profile">


            <div class="panel panel-info">
                <div class="panel-heading">  <h4 >Perfil de Usuario</h4></div>
                    <div class="panel-body">
               
                    <div class="box box-info">
                
                        <div class="box-body">
                         <div class="col-sm-6">
          
                        <?php if($model->avatar == NULL) { ?>
                        <div  align="center"> <img alt="User Pic" src="../../public/img/user.png" id="" class="img-circle img-responsive" style="width: 100px"> 
                        </div>
                        <?php } ?> 
                        
                        <?php if($model->avatar == !NULL) { ?>
                        <div  align="center"> <img alt="User Pic" src="../../public/avatar/<?= $model->avatar?>" id="" class="img-circle img-responsive" style="width: 100px"> 
                        </div>
                        <?php } ?>
                        <br>
                          <!-- /input-group -->
                        </div> <!-- col-sm-6 -->

            <div class="col-sm-6">
            <h4 style="color:#00b1b1;"> 
            <?= Html::encode($model->name)?>
            </h4>
              <span><p> <?= $model->TypeLabel ?></p></span>            
            </div>
            <div class="clearfix"></div>
            <hr style="margin:5px 0 5px 0;">
    
            <div style="margin-top: 20px">
            <div class="col-sm-5 col-xs-6 tital " >Nombre:</div><div class="col-sm-7 col-xs-6 ">
            <?= Html::encode($model->name) ?>
            </div>
                 <div class="clearfix"></div>
            <div class="bot-border"></div>


            <div class="col-sm-5 col-xs-6 tital " >Apellido:</div><div class="col-sm-7"> 
                <?= Html::encode($model->last_name) ?>
            </div>
              <div class="clearfix"></div>
            <div class="bot-border"></div>

            <div class="col-sm-5 col-xs-6 tital " >Fecha de inscripción:</div><div class="col-sm-7">
                <?=
                Html::encode($formatter->asDatetime($model->user->created_at, 'long'))
                 ?>
                </div>

              <div class="clearfix"></div>
            <div class="bot-border"></div>

            <div class="col-sm-5 col-xs-6 tital " >Email:</div><div class="col-sm-7">
                <?= Html::encode($model->user->email) ?>
            </div>

            </div>              

                        
                </div><!-- /.box-body -->
                  

                </div><!-- /.box -->
                   
                        
                </div> 
                </div>


            </div> 
        <!-- profile -->


    <!-- settings -->
   <div class="col-md-9  admin-content" id="settings">
                <div class="panel panel-info" style="margin: 1em;">
                    <div class="panel-heading">
                        <h3 class="panel-title">Notification</h3>
                    </div>
                    <div class="panel-body">
                        <div class="label label-success">allowed</div>
                    </div>
                </div>
                <div class="panel panel-info" style="margin: 1em;">
                    <div class="panel-heading">
                        <h3 class="panel-title">Newsletter</h3>
                    </div>
                    <div class="panel-body">
                        <div class="badge">Monthly</div>
                    </div>
                </div>
                <div class="panel panel-info" style="margin: 1em;">
                    <div class="panel-heading">
                        <h3 class="panel-title">Admin</h3>

                    </div>
                    <div class="panel-body">
                         <div class="label label-success">yes</div>
                    </div>
                </div>

            </div>




            <!-- change-password -->
            <div class="col-md-9  admin-content" id="change-password">
                
                <div class="panel panel-info">
                <div class="panel-heading">  <h4 >Actualizar Datos</h4></div>
               <div class="panel-body">
                
                <div class="profile-form">

                    <?php $form = ActiveForm::begin(); ?>

                    <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'autofocus' => true]) ?>

                    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

                    <?=  $form->field($model, 'avatar')->widget(FileInput::classname(), ['options' => ['accept' => 'image/*'],]) ?>
                    <small style="color: #777777;"><strong>*Solo imagenes de 128 x 128 px</strong></small>

                    <div class="form-group">
                        <?= Html::submitButton('Actualizar', ['class' => 'btn btn-success']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>

                </div>

            </div>
        </div>

    </div>

            </div> <!-- row -->

 
</div>
