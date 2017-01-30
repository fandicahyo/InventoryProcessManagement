<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Shipmentitem */

$this->title = 'Create Shipmentitem';
$this->params['breadcrumbs'][] = ['label' => 'Shipmentitems', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shipmentitem-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
