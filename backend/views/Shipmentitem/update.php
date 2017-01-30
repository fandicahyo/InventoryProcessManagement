<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Shipmentitem */

$this->title = 'Update Shipmentitem: ' . $model->ShipmentDetailId;
$this->params['breadcrumbs'][] = ['label' => 'Shipmentitems', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ShipmentDetailId, 'url' => ['view', 'id' => $model->ShipmentDetailId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="shipmentitem-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
