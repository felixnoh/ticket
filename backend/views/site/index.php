<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use common\models\User;

$this->title = 'TickApp - Admin';

?>

<div class="site-index">

    <div class="container-fluid">

            <div class="col-md-9">

                <div class="row">

                <div class="jumbotron" style="margin-top: 0px; padding-top: 0px">
                    <div style="text-align: left;">
                    <h1>Bienvenido</h1>
                    <hr>
                    <p class="lead">Sistema de soporte de TickApp, control de tickets.</p>
                    </div>

                    <img src="../../public/img/logo_w.png" class="img-responsive " alt="Responsive image" style="width: 87%; margin-top: 40px">

                </div>
               

            </div><!-- /.row -->
                
            </div> <!-- col-md-9 -->


            <div class="col-md-3" style="margin-top: 23px">

                <div class="well" style="margin-top: 5px">
                    <h4>Soporte</h4>
                    <hr style="padding-top: 0px">
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled">
                                <li><?= Html::a ('Inicio', ['/site/index']) ?>
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

        </div> <!-- container -->
        


</div> <!-- site-index -->
