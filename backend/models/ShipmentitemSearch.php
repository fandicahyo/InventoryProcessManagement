<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Shipmentitem;

/**
 * ShipmentitemSearch represents the model behind the search form about `app\models\Shipmentitem`.
 */
class ShipmentitemSearch extends Shipmentitem
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ShipmentDetailId', 'InventoryItemId', 'ModifyUser'], 'integer'],
            [['ShipmentNumber', 'ModifyData'], 'safe'],
            [['Quantity'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Shipmentitem::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'ShipmentDetailId' => $this->ShipmentDetailId,
            'InventoryItemId' => $this->InventoryItemId,
            'Quantity' => $this->Quantity,
            'ModifyData' => $this->ModifyData,
            'ModifyUser' => $this->ModifyUser,
        ]);

        $query->andFilterWhere(['like', 'ShipmentNumber', $this->ShipmentNumber]);

        return $dataProvider;
    }
}
