<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use common\models\User;



/* @var $this yii\web\View */
/* @var $searchModel common\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usuarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
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
                    'attribute' =>'username',  
                    'contentOptions'=>['style'=>'width:80px;'],
                ],
                'email:email',
                // 'created_at:datetime',
                [
                    'attribute' => 'created_at',
                    'format' => 'html',
                    'value' => function ($model) {    
                        $formatter = \Yii::$app->formatter;
                        return Html::encode($formatter->asDate($model->created_at, 'long') . ', ' . Html::encode( $model->created_at = date("H:i:s") ));
                    },
                ],
                
                [
                    'class'=>'kartik\grid\EditableColumn',
                    'header'=>'Tipo',
                    'attribute' => 'TypeLabel',
                    'format' => 'html',
                    'editableOptions' => [
                        'inputType' => 'dropDownList',
                        'data' => ['1' => 'Administrador', '2' => 'Tecnico', '3' => 'Usuario'],
                        'options' => ['class'=>'form-control', 'prompt'=>'Seleciona el Tipo'],
                    ]
                ],
                // [
                //     'attribute' => 'ActiveLabel',
                //     'header'=>'Estado',
                //     'format' => 'html',
                // ],
                [
                    'class'=>'kartik\grid\EditableColumn',
                    'header'=>'Estado',
                    'attribute' => 'ActiveLabel',
                    'format' => 'html',
                    'editableOptions' => [
                        'inputType' => 'dropDownList',
                        'data' => ['0' => 'Baja', '1' => 'Activo'],
                        'options' => ['class'=>'form-control', 'prompt'=>'Seleciona el estado'],
                    ]
                ],
                [
                    'class' => 'yii\grid\ActionColumn',
                    'header'=>'Edicion', 
                    'headerOptions' => ['width' => '70'],
                    'contentOptions'=>['style'=>'text-align:center;'],
                    'template' => '{delete}',
                ],
        ],
    ]); ?>



</div>

<div class="row">
        <div class="col-md-12 hidden-lg" >
            <center><img src="../../public/img/hand-gesture.png"  class="img-responsive" alt="Responsive image" style="width: 67px; height: 55px"></center>
        </div>
    </div>