<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Inventoryitems;

/**
 * InventoryitemsSearch represents the model behind the search form about `app\models\Inventoryitems`.
 */
class InventoryitemsSearch extends Inventoryitems
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['InventoryItemId', 'Active_Status'], 'integer'],
            [['InventoryItemName', 'UnitType', 'Image'], 'safe'],
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
        $query = Inventoryitems::find();

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
            'InventoryItemId' => $this->InventoryItemId,
            'Active_Status' => $this->Active_Status,
        ]);

        $query->andFilterWhere(['like', 'InventoryItemName', $this->InventoryItemName])
            ->andFilterWhere(['like', 'UnitType', $this->UnitType])
            ->andFilterWhere(['like', 'Image', $this->Image]);

        return $dataProvider;
    }
}
