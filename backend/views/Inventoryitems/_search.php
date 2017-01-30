<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Unittype;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\InventoryitemsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inventoryitems-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    <div class="row">
        <div class="col-xs-8 col-sm-6">
            <?= $form->field($model, 'InventoryItemName') ?>
        </div>
        <div class="col-xs-4 col-sm-6">
            <?= $form->field($model, 'UnitType')->dropDownlist(
                ArrayHelper::map(Unittype::find()->all(), 'UnitType', 'UnitType')
            ); ?>
        </div>
    </div>
    <?= $form->field($model, 'Active_Status')->dropDownlist(
        array('1' => 'Active', '0' => 'Inactive'));
     ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
        <hr>
    </div>

    <?php ActiveForm::end(); ?>

</div>
