<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Tracing */

$this->title = 'Create Tracing';
// $this->params['breadcrumbs'][] = ['label' => 'Tracings', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="tracing-create">

    <h1>Mensaje</h1><hr>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
