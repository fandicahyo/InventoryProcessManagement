<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Shipmentheader;

/**
 * ShipmentheaderSearch represents the model behind the search form about `app\models\Shipmentheader`.
 */
class ShipmentheaderSearch extends Shipmentheader
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ShipmentNumber', 'Supliyer', 'ReceivingDate', 'AprovalStatus', 'AprovalUser', 'AprovalDate', 'Comment', 'Create_Date', 'Create_User'], 'safe'],
            [['Status'], 'integer'],
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
        $query = Shipmentheader::find();

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
            'ReceivingDate' => $this->ReceivingDate,
            'Status' => $this->Status,
            'AprovalDate' => $this->AprovalDate,
            'Create_Date' => $this->Create_Date,
        ]);

        $query->andFilterWhere(['like', 'ShipmetnNumber', $this->ShipmentNumber])
            ->andFilterWhere(['like', 'Supliyer', $this->Supliyer])
            ->andFilterWhere(['like', 'AprovalStatus', $this->AprovalStatus])
            ->andFilterWhere(['like', 'AprovalUser', $this->AprovalUser])
            ->andFilterWhere(['like', 'Comment', $this->Comment])
            ->andFilterWhere(['like', 'Create_User', $this->Create_User]);

        return $dataProvider;
    }
}
