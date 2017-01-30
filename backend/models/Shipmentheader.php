<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "shipmentheader".
 *
 * @property string $ShipmentNumber
 * @property string $Supliyer
 * @property string $ReceivingDate
 * @property integer $Status
 * @property string $AprovalStatus
 * @property string $AprovalUser
 * @property string $AprovalDate
 * @property string $Comment
 * @property string $Create_Date
 * @property string $Create_User
 *
 * @property Shipmentitem[] $shipmentitems
 */
class Shipmentheader extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'shipmentheader';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ShipmentNumber', 'Supliyer', 'Status', 'Create_User'], 'required'],
            [['ReceivingDate', 'AprovalDate', 'Create_Date'], 'safe'],
            [['Status'], 'integer'],
            [['Comment'], 'string'],
            [['ShipmentNumber', 'Supliyer', 'AprovalUser', 'Create_User'], 'string', 'max' => 100],
            [['AprovalStatus'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ShipmentNumber' => 'Shipment Number',
            'Supliyer' => 'Supliyer',
            'ReceivingDate' => 'Receiving Date',
            'Status' => 'Status',
            'AprovalStatus' => 'Aproval Status',
            'AprovalUser' => 'Aproval User',
            'AprovalDate' => 'Aproval Date',
            'Comment' => 'Comment',
            'Create_Date' => 'Create  Date',
            'Create_User' => 'Create  User',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShipmentitems()
    {
        return $this->hasMany(Shipmentitem::className(), ['ShipmentNumber' => 'ShipmentNumber']);
    }
}
