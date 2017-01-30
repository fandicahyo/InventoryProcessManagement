<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\InventoryItems;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\ShipmentitemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Shipmentitems';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shipmentitem-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Shipmentitem', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ShipmentDetailId',
            'ShipmentNumber',
            ['attribute' => 'InventoryItem',
                'value' => function ($model) {
                    return $model->inventoryItem->InventoryItemName;
                    },
            ],
            'Quantity',
            //'ModifyData',
            // 'ModifyUser',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
