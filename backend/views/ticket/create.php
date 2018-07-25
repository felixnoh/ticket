<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Ticket */

$this->title = 'Abrir Ticket';
// $this->params['breadcrumbs'][] = ['label' => 'Tickets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ticket-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <hr style="margin-bottom: 0px;">

    <?= $this->render('_form', [
        'model' => $model,
        
    ]) ?>

</div>
