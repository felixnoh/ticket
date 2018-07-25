<?php 
use yii\helpers\Html;

$this->title = "Creado exitosamente!";
 ?>	
	<div class="container">
		<div class="jumbotron" style="padding-top: 20px;">
		<div class="col-md-10 col-md-offset-1" style="text-align: center; font-size: 22px;">
			<div class="alert alert-success"  role="alert">Ticket Creado - Folio: <strong> <?= Html::encode($model->folio) ?>  </strong> </div>

			<p>Ticket creado con exito. Si desea ver el ticket ahola lo puede hacer.</p><br>

			<p>
			  
			  <?= Html::a ('Continuar&nbsp;&nbsp;'  . '<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>'  , ['/ticket/index'], ['class' => 'btn btn-default']) ?>
			</p>
		</div>
	</div>

</div> 