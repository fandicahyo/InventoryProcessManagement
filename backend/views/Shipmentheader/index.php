<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ShipmentheaderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Shipmentheaders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shipmentheader-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Shipmentheader', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ShipmentNumber',
            'Supliyer',
            'ReceivingDate',
            'Status',
            'AprovalStatus',
            // 'AprovalUser',
            // 'AprovalDate',
            // 'Comment:ntext',
            // 'Create_Date',
            // 'Create_User',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
