<?php

use yii\helpers\Html;
use common\models\User;
use common\models\Ticket;
use common\models\Tracing;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Ticket */

$this->title = "Ticket # " . $model->folio;
$this->params['breadcrumbs'][] = ['label' => 'Tickets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$formatter = \Yii::$app->formatter;
?>
<div class="ticket-view">

<div class="row">
    <div class="col-md-9">

    <!-- tabla -->
          <?= DetailView::widget([
            'model' => $model,
            'mode' => 'view',
            'bordered' => true,
            'striped' => true,
            'condensed'=>true,
            'responsive' => false,
            'hover' => true,
            'hAlign'=>true,
            'vAlign'=>true,
            'fadeDelay'=>true,
            'panel'=>[
                'heading'=> Html::tag('strong', Html::encode($model->CreatedByName)) . '&nbsp;&nbsp;&nbsp;' . Html::encode($formatter->asDatetime($model->created_at, 'long')),
                'type'=>'default',
            ],
            'buttons1' => '',
            'attributes'=>[
                
                [
                    'group'=>true,
                    'label'=>Html::tag('strong', Html::encode('Detalles de Ticket # ' . $model->folio)),
                    'rowOptions'=>['class'=>'default']
                ],
                [
                    'group'=>true,
                    'label'=>Html::tag('strong', Html::encode($model->subject)),
                    'rowOptions'=>['class'=>'default']
                ],
                [
                    'attribute'=>'statusLabel', 
                    'label'=>'Estado',
                    'format'=>'raw',
                    // 'value'=> 'statusLabel',
                    'valueColOptions'=>['style'=>'width:30%'],
                    'displayOnly'=>true
                ],
                [
                    'attribute'=>'priorityLabel', 
                    'label'=>'Prioridad',
                    'format'=>'html',
                    'displayOnly'=>true
                ],
                [
                    'attribute'=>'description',
                    'format'=>'raw',
                    'value'=>'<span class="text-justify"><em>' . $model->description . '</em></span>',
                    
                    'options'=>['rows'=>4],
                    'displayOnly'=>true
                ],
                [
                  'attribute'=>'UserName',
                  'format'=>'raw',
                  // 'value'=>'UserName',
                  'valueColOptions'=>['style'=>'width:30%'],
                  'displayOnly'=>true
                ],
                [
                    'attribute' => 'attached',
                    'label'=>'Adjunto',
                    'format' => 'html',
                    // 'filter' => false,
                    'contentOptions' =>['style'=>'text-align: center;'],    
                    'value' =>Html::a($model->attached, \Yii::getAlias('@ticketAttUrl') . '/' . $model->attached, ['title' => $model['attached']]),
                    // 'value'=> \Yii::getAlias('@ticketAttUrl') . '/' . $model->attached,
                    // 'format' => ['image',['width'=>'250']],
                    'displayOnly'=>true
                ],
              
            ]

        ]); ?> 
        <!-- tabla -->

    


    </div>

    <!-- slide -->
    <div class="col-md-3">
        <div class="well" >
                    <h4>Soporte</h4>
                    <hr style="padding-top: 0px">
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled">
                                <li><?= Html::a ('Inicio', ['/site/index']) ?>
                                </li>
                                <li><?= Html::a ('Abrir Ticket', ['/ticket/create']) ?>
                                </li>
                                <li><?= Html::a ('Mis Tickets', ['/ticket/index']) ?>
                                </li>
                                <li><?= Html::a ('Preguntas frecuentes', ['/site/home']) ?>
                                </li>
                            </ul>
                        </div>
                        
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Avisos de interes</h4>
                    <p>Avisos del sistema respecto a utilidades y noticias importantes acerca de su servicio.</p>
                </div>
    
    </div><!-- slide -->



</div>

<div class="row" style="margin-top: 10px">

    <div class="col-md-12">


        <div class="comment-tabs">

              <!-- tabs -->
                  <ul class="nav nav-tabs" role="tablist">

                      <li class="active">
                        <a href="#comments" role="tab" data-toggle="tab"><h4 class="reviews text-capitalize">Seguimiento</h4></a>
                      </li>

                      <li>
                        <a href="#add-comment" role="tab" data-toggle="tab"><h4 class="reviews text-capitalize">Agregar Mensaje</h4></a>
                      </li>
                      
                  </ul>
              <!-- tabs -->   


                  <div class="tab-content" style="padding-bottom: 0px; padding-top: 10px;">

                      <div class="tab-pane active" id="comments">

                      <!-- ul list -->
                          <ul class="media-list" style="margin-top: 20px; margin-bottom: 0px">

                            

                          

                <!-- seguimientos -->
                <!-- foreach -->
                <?php if(empty($tracings)) { ?>
                  <div style="text-align: center; font-size: 18px;"">
                  <div class="alert alert-warning" role="alert" style="padding-top: 20px; padding-bottom: 20px">Este <strong>Ticket</strong> todavia <strong>no</strong> tiene Mensajes aun...</div>
                  </div>
                <?php } ?>
                
                <?php foreach ($tracings as $msj ) {  ?>

                  <li class="media" style="margin-bottom: 20px;"> 
                  <div class="hidden-xs">
                  <?php if($msj->createdBy->profile->avatar == NULL) { ?>
                  <div class="pull-left" style="margin-right: 13px">
                    <img class="pull-left media-object img-circle" src="../../public/img/user.png" alt="profile">
                  </div>
                  <?php } ?> 

                  <?php if($msj->createdBy->profile->avatar == !NULL) { ?>
                  <div class="pull-left" style="margin-right: 13px">
                    <img class="pull-left media-object img-circle" src="../../public/avatar/<?= $msj->createdBy->profile->avatar?>" alt="profile">
                  </div>
                  <?php } ?>
                  </div> <!-- hidden -->

                  <div class="media-body">
                    <div class="well well-lg">

                        <h4 class="media-heading" style="font-size: 18px; margin-bottom: 25px; color: #555555">
                          <strong>
                          <?= $msj->createdBy->profile->name?>&nbsp;
                          </strong>
                            <small style="font-size: 17px">
                              <?=
                              Html::encode($formatter->asDatetime($msj->created_at, 'long'))
                              ?>
                            </small>
                        </h4>

                        <p class="media-comment">
                          <?= $msj->message?>
                        </p>
                        
                    </div>              
                  </div>
                
                </li>
                
              <?php } ?>
              <!-- foreach -->

                          </ul>
                          <!-- ul list --> 

                      </div> <!-- tab-pane active -->


              <!-- tab add comment -->
                      <div class="tab-pane" id="add-comment" style="margin-top: 20px; margin-bottom: 30px">

                          
                          <!-- formTracing -->
                          <div class="tracing-form">

                              <?php $form = ActiveForm::begin(); ?>

                              <?= $form->field($tracing, 'message')->textarea(['rows' => 6]) ?>

                              <div class="form-group">
                                  <?= Html::submitButton('Enviar', ['class' => 'btn btn-success']) ?>
                              </div>

                              <?php ActiveForm::end(); ?>

                          </div>

                          <!-- formTracing -->
                          

                      </div>
                      <!-- tab add comment -->


                  </div> <!-- tab-content -->


              </div> <!-- comment-tabs -->
        



    </div>


                

                
</div>        



</div>


