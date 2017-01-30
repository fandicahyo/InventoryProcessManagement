<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Inventoryitems */

$this->title = $model->InventoryItemName;
$this->params['breadcrumbs'][] = ['label' => 'Inventoryitems', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inventoryitems-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->InventoryItemId], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->InventoryItemId], [
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
            'InventoryItemId',
            'InventoryItemName',
            'UnitType',
            'Image',
            'Active_Status',
        ],
    ]) ?>

</div>
