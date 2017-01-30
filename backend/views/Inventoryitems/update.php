<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Inventoryitems */

$this->title = 'Update Inventoryitems: ' . $model->InventoryItemName;
$this->params['breadcrumbs'][] = ['label' => 'Inventoryitems', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->InventoryItemId, 'url' => ['view', 'id' => $model->InventoryItemId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="inventoryitems-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
