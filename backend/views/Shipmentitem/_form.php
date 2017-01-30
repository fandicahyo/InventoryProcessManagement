<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Shipmentitem */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="shipmentitem-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ShipmentNumber')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'InventoryItemId')->textInput() ?>

    <?= $form->field($model, 'Quantity')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ModifyData')->textInput() ?>

    <?= $form->field($model, 'ModifyUser')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
