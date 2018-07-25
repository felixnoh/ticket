<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Ticket */

$this->title = 'Abrir Ticket';
$this->params['breadcrumbs'][] = ['label' => 'Tickets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ticket-create">

	<div class="col-md-9">

    <h1><?= Html::encode($this->title) ?></h1>
    <hr style="margin-bottom: 0px;">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

    </div>

    <div class="col-md-3">

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

</div>
