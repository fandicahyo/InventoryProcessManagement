<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "receiving".
 *
 * @property integer $ReceivingId
 * @property integer $UnitId
 * @property integer $ShipmentItemId
 * @property string $CreateUser
 * @property string $CreateDate
 * @property string $Quantity
 */
class Receiving extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'receiving';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ReceivingId', 'Quantity'], 'required'],
            [['ReceivingId', 'UnitId', 'ShipmentItemId'], 'integer'],
            [['CreateDate'], 'safe'],
            [['Quantity'], 'number'],
            [['CreateUser'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ReceivingId' => 'Receiving ID',
            'UnitId' => 'Unit ID',
            'ShipmentItemId' => 'Shipment Item ID',
            'CreateUser' => 'Create User',
            'CreateDate' => 'Create Date',
            'Quantity' => 'Quantity',
        ];
    }
}
