<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Shipmentheader */

$this->title = 'Create Shipmentheader';
$this->params['breadcrumbs'][] = ['label' => 'Shipmentheaders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shipmentheader-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelsShipmentItem' => $modelsShipmentItem,
           
    ]) ?>

</div>
