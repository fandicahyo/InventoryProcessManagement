<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "shipmentitem".
 *
 * @property integer $ShipmentDetailId
 * @property string $ShipmentNumber
 * @property integer $InventoryItemId
 * @property string $Quantity
 * @property string $ModifyData
 * @property integer $ModifyUser
 *
 * @property Shipmentheader $shipmentNumber
 */
class Shipmentitem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'shipmentitem';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'InventoryItemId', 'Quantity'], 'required'],
            [['InventoryItemId', 'ModifyUser'], 'integer'],
            [['Quantity'], 'number'],
            [['ModifyData'], 'safe'],
            [['ShipmentNumber'], 'string', 'max' => 100],
            [['ShipmentNumber'], 'exist', 'skipOnError' => true, 'targetClass' => Shipmentheader::className(), 'targetAttribute' => ['ShipmentNumber' => 'ShipmetntNumber']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ShipmentDetailId' => 'Shipment Detail ID',
            'ShipmentNumber' => 'Shipment Number',
            'InventoryItemId' => 'Inventory Item ID',
            'Quantity' => 'Quantity',
            'ModifyData' => 'Modify Data',
            'ModifyUser' => 'Modify User',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInventoryItem()
    {
        return $this->hasOne(Inventoryitems::className(), ['InventoryItemId' => 'InventoryItemId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShipmentNumber()
    {
        return $this->hasOne(Shipmentheader::className(), ['ShipmentNumber' => 'ShipmentNumber']);
    }
}
