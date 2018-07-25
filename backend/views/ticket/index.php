<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use common\models\User;
use common\models\Ticket;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel common\models\TicketSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tickets de Soporte';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="ticket-index">

    <h1>Tickes de Soporte</h1>
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
                [
                    'attribute' => 'created_at',
                    'format' => 'html',
                    'value' => function ($model) {    
                        $formatter = \Yii::$app->formatter;
                        return Html::encode($formatter->asDatetime($model->created_at, 'long'));
                    },
                ],
                [
                    'attribute' => 'shortsubject',
                    'header'=>'Asunto',
                    'format' => 'html',
                    'value' => function ($model) {    
                        return Html::tag('strong', $model->shortsubject);
                    },
                ],
                [
                    'attribute' => 'created_by',  // usuario 
                    'contentOptions'=>['style'=>'width:90px;'],
                    'value' => 'CreatedByName'
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
                	'class'=>'kartik\grid\EditableColumn',
                    'header'=>'Estado',
                    'attribute' => 'statusLabel',
                    'format' => 'html',
                	'editableOptions' => [
                		'inputType' => 'dropDownList',
                		'data' => ['0' => 'Cerrado', '1' => 'Abierto'],
                        'options' => ['class'=>'form-control', 'prompt'=>'Seleciona el estado'],
                	]
                ],
                [
                    'attribute' => 'description',
                    'value' => 'shortdescrip',
                ],
                [
                    'class'=>'kartik\grid\EditableColumn',
                    'header'=>'Tecnico',
                    'attribute' => 'UserName',
                    'format' => 'html',
                    'editableOptions' => [
                        'inputType' => 'dropDownList',
                        'data' => ArrayHelper::map(User::find()->where(['type' => 2])->orderBy('username')->all(),'id','username'),
                        'options' => ['class'=>'form-control', 'prompt'=>'Seleciona Tecnico'],
                    ]
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
                    'visible' => Yii::$app->user->identity->type == 2,
                ],
                [
                    'class' => 'yii\grid\ActionColumn',
                    'header'=>'Edicion', 
                    'headerOptions' => ['width' => '70'],
                    'contentOptions'=>['style'=>'text-align:center;'],
                    'template' => '{view}',
                    'visible' => Yii::$app->user->identity->type == 3,
                ],
                [
                    'class' => 'yii\grid\ActionColumn',
                    'header'=>'Edicion', 
                    'headerOptions' => ['width' => '70'],
                    'contentOptions'=>['style'=>'text-align:center;'],
                    'template' => '{view} {delete}',
                    'visible' => Yii::$app->user->identity->type == 1,
                ],
        ],
    ]); ?>

    </div> <!-- ticket-index --><br>

    <div class="row">
        <div class="col-md-12 hidden-lg" >
            <center><img src="../../public/img/hand-gesture.png"  class="img-responsive" alt="Responsive image" style="width: 67px; height: 55px"></center>
        </div>
    </div>
