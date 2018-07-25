<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
$this->title = 'TicketApp - Inicio';

?>

<div class="site-index">

    <div class="container-fluid">

            <div class="col-md-9">

                <div class="row">

                <div class="col-lg-12" >
                    
                    <h1>Bienvenido</h1>
                    <p class="lead">Sistema de soporte de TickApp, control de tickets.</p>
                    <hr>

                    <!-- item -->
                    <div class="col-md-4 col-sm-6 text-center">
                        <div class="panel panel-default panel-pricing">
                            <img src="../../public/img/invoice.png" alt="..." class="img-rounded" style="margin-top: 5%">
                            <h3 style="color: #4285F4"><strong>  Abrir Ticket</strong></h3>
                            <ul class="list-group text-center">
                                <li class="list-group-item"> Abra un nuevo ticket de soporte para su seguimiento y resolocion de problema.</li>
                            </ul>
                            <div class="panel-footer">
                                <?= Html::a('Crear', ['/ticket/create'], ['class'=>'btn btn-lg btn-block btn-default']) ?>


                            </div>
                        </div>
                    </div>
                    <!-- /item -->

                    <!-- item -->
                    <div class="col-md-4 col-sm-6 text-center">
                        <div class="panel panel-default panel-pricing">
                            <img src="../../public/img/binoculars.png" alt="..." class="img-rounded" style="margin-top: 5%">
                            <h3 style="color: #4285F4"><strong>Ver Tickets</strong></h3>
                            <ul class="list-group text-center">
                                <li class="list-group-item"> Eliga esta opcion si desar ver los tickets y dar seguimiento si lo requiere.</li>
                            </ul>
                            <div class="panel-footer">
                                <?= Html::a('Ver', ['/ticket/index'], ['class'=>'btn btn-lg btn-block btn-default']) ?>
                            </div>
                        </div>
                    </div>
                    <!-- /item -->

                    <!-- item -->
                    <div class="col-md-4 col-sm-6 text-center">
                        <div class="panel panel-default panel-pricing">
                            <img src="../../public/img/file.png" alt="..." class="img-rounded" style="margin-top: 5%">
                            <h3 style="color: #4285F4"><strong>Buscar Tickets</strong></h3>
                            <ul class="list-group text-center">
                                <li class="list-group-item"> Esta opcion le permite buscar los ticket generados y dar seguimiento si lo desea.</li>
                            </ul>
                            <div class="panel-footer">
                                <?= Html::a('Buscar', ['/ticket/index'], ['class'=>'btn btn-lg btn-block btn-default']) ?>
                            </div>
                        </div>
                    </div>
                    <!-- /item -->

                </div> <!-- col-lg-12 -->

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
                                <li><?= Html::a ('Abrir Ticket', ['/ticket/create']) ?>
                                </li>
                                <li><?= Html::a ('Mis Tickets', ['/ticket/index']) ?>
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
