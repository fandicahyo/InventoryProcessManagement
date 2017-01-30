<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Unittype;
/* @var $this yii\web\View */
/* @var $model app\models\Inventoryitems */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inventoryitems-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'InventoryItemName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'UnitType')->dropDownlist(
      	ArrayHelper::map(Unittype::find()->all(), 'UnitType', 'UnitType')
    ); ?>

    <?= $form->field($model, 'Image')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Active_Status')->dropDownlist(
        array('1' => 'Active', '0' => 'Inactive'));
     ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
