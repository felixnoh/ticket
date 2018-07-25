<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use common\models\User;
use common\models\Ticket;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel common\models\TicketSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mis Tickets';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="ticket-index">

<div class="container">

    <div class="row">

    <div class="col-md-10 col-sm-12 col-xs-12">
        <h1>Mis Tickets</h1>
        <hr>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'responsive'=>true,
        'responsiveWrap' => false,
        'hover'=>true,
        'resizableColumns' => false,
        'pjax' => true,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
                [ 
                    'attribute' =>'folio',  
                    'contentOptions'=>['style'=>'width:80px;'],
                ],
                // 'created_at:datetime',
                [
                    'attribute' => 'shortsubject',
                    'header'=>'Asunto',
                    'format' => 'html',
                    'value' => function ($model) {    
                        return Html::tag('strong', $model->shortsubject);
                    },
                ],
                [
                'attribute' => 'priority',
                'format' => 'html',
                'contentOptions'=>['style'=>'width:85px;'],
                'value'     => function ($model) {
                        switch ($model->priority) {
                            case 'Urgente':
                                return Html::tag('span', 'Urgente', ['class' => 'label label-danger']);
                            case 'Alto':
                                return Html::tag('span', 'Alto', ['class' => 'label label-warning']);
                            case 'Normal':
                                return Html::tag('span', 'Normal', ['class' => 'label label-success']);
                            case 'Bajo':
                                return Html::tag('span', 'Bajo', ['class' => 'label label-info']);
                        }
                    },
                ],
                [
                    
                    'header'=>'Estado',
                    'attribute' => 'statusLabel',
                    'format' => 'html',
                ],
                [
                    'attribute' => 'description',
                    'value' => 'shortdescrip',
                ],
                [
                    
                    'header'=>'Tecnico',
                    'attribute' => 'UserName',
                    'format' => 'html',
                    
                ],
                // [
                //     'attribute' => 'attached',
                //     'label'=>'Adjunto',
                //     'format' => 'html',
                //     'filter' => false,  
                //     'value' => function ($model) {
                //         $url = \Yii::getAlias('@ticketAttUrl');
                //         return Html::a($model['attached'], $url . '/' . $model['attached'], ['title' => $model['attached']]);
                //     },
                // ],
                // [
                //     'attribute' => 'attached',
                //     'label'=>'Adjunto',
                //     'format' => 'html',
                //     'filter' => false,
                //     'contentOptions' =>['style'=>'text-align: center;'],    
                //     'value' => function ($model) {
                //         return Html::img(\Yii::getAlias('@ticketAttUrl') . '/' .$model['attached'], ['alt'=>$model['attached'],'width'=>'120']);
                //     },
                // ],
                [
                    'class' => 'yii\grid\ActionColumn',
                    'header'=>'Edicion', 
                    'headerOptions' => ['width' => '70'],
                    'contentOptions'=>['style'=>'text-align:center;'],
                    'template' => '{view}',
                ],
        ],
    ]); ?>
    
<br>
    <div class="row">
        <div class="col-md-12 hidden-lg" >
            <center><img src="../../public/img/hand-gesture.png"  class="img-responsive" alt="Responsive image" style="width: 67px; height: 55px"></center>
        </div>
    </div>


    </div>


    <div class="col-md-2 col-sm-12 col-xs-12">
        <div class="well" style="margin-top: 20px">
                    <h4>Soporte</h4>
                    <hr style="padding-top: 0px">
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled">
                                <li><?= Html::a ('Inicio', ['/site/index']) ?>
                                </li>
                                <li><?= Html::a ('Abrir Ticket', ['/ticket/create']) ?>
                                </li>
                                <li><?= Html::a ('Ver Tickets', ['/ticket/index']) ?>
                                </li>
                                <li><?= Html::a ('Panel', ['/site/home']) ?>
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
    </div>
    
    </div> <!-- row -->

    </div> <!--container -->

</div> <!--ticket-index -->
