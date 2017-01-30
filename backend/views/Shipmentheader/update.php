<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Shipmentheader */

$this->title = 'Update Shipmentheader: ' . $model->ShipmetntNumber;
$this->params['breadcrumbs'][] = ['label' => 'Shipmentheaders', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ShipmetntNumber, 'url' => ['view', 'id' => $model->ShipmetntNumber]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="shipmentheader-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
