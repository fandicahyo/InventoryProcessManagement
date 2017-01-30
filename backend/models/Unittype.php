<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "unittype".
 *
 * @property string $UnitType
 * @property string $@unit
 *
 * @property Inventoryitems[] $inventoryitems
 */
class Unittype extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'unittype';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['UnitType', '@unit'], 'required'],
            [['@unit'], 'number'],
            [['UnitType'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'UnitType' => 'Unit Type',
            '@unit' => '@unit',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInventoryitems()
    {
        return $this->hasMany(Inventoryitems::className(), ['UnitType' => 'UnitType']);
    }
}
