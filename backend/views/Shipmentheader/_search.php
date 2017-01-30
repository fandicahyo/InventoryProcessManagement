<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ShipmentheaderSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="shipmentheader-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ShipmentNumber') ?>

    <?= $form->field($model, 'Supliyer') ?>

    <?= $form->field($model, 'ReceivingDate') ?>

    <?= $form->field($model, 'Status') ?>

    <?= $form->field($model, 'AprovalStatus') ?>

    <?php // echo $form->field($model, 'AprovalUser') ?>

    <?php // echo $form->field($model, 'AprovalDate') ?>

    <?php // echo $form->field($model, 'Comment') ?>

    <?php // echo $form->field($model, 'Create_Date') ?>

    <?php // echo $form->field($model, 'Create_User') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
