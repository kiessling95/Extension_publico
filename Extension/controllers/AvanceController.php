<?php

namespace app\controllers;

use Yii;
use app\models\Avance;
use app\models\AvanceSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AvanceController implements the CRUD actions for Avance model.
 */
class AvanceController extends Controller
{
    /**
     * {@inheritdoc}
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
     * Lists all Avance models.
     * @return mixed
     */
    public function actionIndex($id)
    {
        $searchModel = new AvanceSearch();
        $searchModel->id_pext=$id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        if (($model = \app\models\Pextension::findOne($id)) == null) {
            throw new NotFoundHttpException(Yii::t('app', 'El Proyecto no existe.'));
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
        ]);
    }

    /**
     * Displays a single Avance model.
     * @param integer $id_avance
     * @param integer $id_obj_esp
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_avance, $id_obj_esp)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_avance, $id_obj_esp),
        ]);
    }

    /**
     * Creates a new Avance model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Avance();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_avance' => $model->id_avance, 'id_obj_esp' => $model->id_obj_esp]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Avance model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id_avance
     * @param integer $id_obj_esp
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_avance, $id_obj_esp)
    {
        $model = $this->findModel($id_avance, $id_obj_esp);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_avance' => $model->id_avance, 'id_obj_esp' => $model->id_obj_esp]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Avance model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_avance
     * @param integer $id_obj_esp
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_avance, $id_obj_esp)
    {
        $this->findModel($id_avance, $id_obj_esp)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Avance model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id_avance
     * @param integer $id_obj_esp
     * @return Avance the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_avance, $id_obj_esp)
    {
        if (($model = Avance::findOne(['id_avance' => $id_avance, 'id_obj_esp' => $id_obj_esp])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
