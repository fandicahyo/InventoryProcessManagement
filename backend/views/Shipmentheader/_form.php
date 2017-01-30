<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use wbraganca\dynamicform\DynamicFormWidget;
/* @var $this yii\web\View */
/* @var $model app\models\Shipmentheader */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="shipmentheader-form">

    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>
    <div class="row">
        <div class="col-xs-8 col-sm-6">
            <?= $form->field($model, 'ShipmentNumber')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-xs-4 col-sm-6">       
    <?= $form->field($model, 'Supliyer')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-8 col-sm-6">
            <?= $form->field($model, 'ReceivingDate')->widget(
                DatePicker::className(), [
                    // inline too, not bad
                     'inline' => false, 
                     'clientOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-mm-dd'
                ]
            ]);?>
        </div>
        <div class="col-xs-4 col-sm-6">
            <?= $form->field($model, 'Status')->dropDownlist(
                array('1' => 'Relesed', '0' => 'Hold', '2' => 'Completed'));
            ?>
        </div>
    </div>
   
    
    
   
    <?= $form->field($model, 'Comment')->textarea(['rows' => 4]) ?>
    
    <div class="row">
        <div class="col-xs-8 col-sm-6">
            <?= $form->field($model, 'Create_Date')->textInput(['readonly' => true, 'value' => date('Y-m-d')]) ?>
        </div>
        <div class="col-xs-4 col-sm-6">
           <?= $form->field($model, 'Create_User')->textInput(['readonly' => true, 'value' => Yii::$app->user->identity->username]) ?>
        </div>
    </div>
    
    <div class="rows">
        <div class="panel panel-default">
        <div class="panel-heading"><h4><i class="glyphicon glyphicon-envelope"></i> items</h4></div>
        <div class="panel-body">
             <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items', // required: css class selector
                'widgetItem' => '.item', // required: css class
                'limit' => 5, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-item', // css class
                'deleteButton' => '.remove-item', // css class
                'model' => $modelsShipmentItem[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    'InventoryItemId',
                    'Quantity',
                    'ModifyData',
                    'ModifyUser',
                    
                ],
            ]); ?>

            <div class="container-items">
            <!-- widgetContainer -->
            <?php foreach ($modelsShipmentItem as $i => $modelShipmentItem): ?>
                <div class="item panel panel-default"><!-- widgetBody -->
                    <div class="panel-heading">
                        <h3 class="panel-title pull-left">items</h3>
                        <div class="pull-right">
                            <button type="button" class="add-item btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                            <button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <?php
                            // necessary for update action.
                            if (! $modelShipmentItem->isNewRecord) {
                                echo Html::activeHiddenInput($modelShipmentItem, "[{$i}]id");
                            }
                        ?>
                         <div class="row">
                            <div class="col-sm-6">
                                <?= $form->field($modelShipmentItem, "[{$i}]InventoryItemId")->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-sm-6">
                                <?= $form->field($modelShipmentItem, "[{$i}]Quantity")->textInput(['maxlength' => true]) ?>
                            </div>
                        </div><!-- .row -->
                        
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
            <?php DynamicFormWidget::end(); ?>
        </div>
    </div>

    </div>

    
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
