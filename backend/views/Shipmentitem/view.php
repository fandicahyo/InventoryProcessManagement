<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Shipmentitem */

$this->title = $model->ShipmentDetailId;
$this->params['breadcrumbs'][] = ['label' => 'Shipmentitems', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shipmentitem-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ShipmentDetailId], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ShipmentDetailId], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ShipmentDetailId',
            'ShipmentNumber',
            'InventoryItemId',
            'Quantity',
            'ModifyData',
            'ModifyUser',
        ],
    ]) ?>

</div>
