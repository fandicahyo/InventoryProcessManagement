<?php

namespace backend\controllers;

use Yii;
use app\models\Shipmentheader;
use app\models\ShipmentheaderSearch;
use app\models\ShipmentItem;
use backend\models\Model;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ShipmentheaderController implements the CRUD actions for Shipmentheader model.
 */
class ShipmentheaderController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Shipmentheader models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ShipmentheaderSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Shipmentheader model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Shipmentheader model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Shipmentheader();
        $modelsShipmentItem = [new ShipmentItem];

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $modelsShipmentItem = Model::createMultiple(ShipmentItem::classname());
            Model::loadMultiple($modelsShipmentItem, Yii::$app->request->post());

           

            // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsShipmentItem) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        foreach ($modelsShipmentItem as $modelShipmentItem) 
                        {
                            $modelShipmentItem->ShipmentNumber = $model->ShipmentNumber;
                            if (! ($flag = $modelShipmentItem->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->ShipmentNumber]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
            
        } else {
            return $this->render('create', [
                'model' => $model,
                'modelsShipmentItem' => (empty($modelsShipmentItem)) ? [new Shipmentitem] : $modelsShipmentItem
            ]);
        }
    }

    /**
     * Updates an existing Shipmentheader model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) 
        {

            return $this->redirect(['view', 'id' => $model->ShipmentNumber]);

        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Shipmentheader model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Shipmentheader model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Shipmentheader the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Shipmentheader::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
