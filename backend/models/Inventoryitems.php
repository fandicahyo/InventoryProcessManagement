<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inventoryitems".
 *
 * @property integer $InventoryItemId
 * @property string $InventoryItemName
 * @property string $UnitType
 * @property string $Image
 * @property integer $Active_Status
 *
 * @property Unittype $unitType
 */
class Inventoryitems extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inventoryitems';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['InventoryItemName', 'UnitType', 'Active_Status'], 'required'],
            [['Active_Status'], 'integer'],
            [['InventoryItemName'], 'string', 'max' => 100],
            [['UnitType'], 'string', 'max' => 25],
            [['Image'], 'string', 'max' => 225],
            [['UnitType'], 'exist', 'skipOnError' => true, 'targetClass' => Unittype::className(), 'targetAttribute' => ['UnitType' => 'UnitType']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'InventoryItemId' => 'Inventory Item ID',
            'InventoryItemName' => 'Inventory Item Name',
            'UnitType' => 'Unit Type',
            'Image' => 'Image',
            'Active_Status' => 'Active  Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUnitType()
    {
        return $this->hasOne(Unittype::className(), ['UnitType' => 'UnitType']);
    }
}
