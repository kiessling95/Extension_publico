<?php

namespace app\controllers;

use Yii;
use app\models\Solicitud;
use app\models\SolicitudSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SolicitudController implements the CRUD actions for Solicitud model.
 */
class SolicitudController extends Controller
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
     * Lists all Solicitud models.
     * @return mixed
     */
    public function actionIndex($id)
    {
        $searchModel = new SolicitudSearch();
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
     * Displays a single Solicitud model.
     * @param integer $id_pext
     * @param string $tipo_solicitud
     * @param string $fecha_solicitud
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_pext, $tipo_solicitud, $fecha_solicitud)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_pext, $tipo_solicitud, $fecha_solicitud),
        ]);
    }

    /**
     * Creates a new Solicitud model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Solicitud();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_pext' => $model->id_pext, 'tipo_solicitud' => $model->tipo_solicitud, 'fecha_solicitud' => $model->fecha_solicitud]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Solicitud model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id_pext
     * @param string $tipo_solicitud
     * @param string $fecha_solicitud
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_pext, $tipo_solicitud, $fecha_solicitud)
    {
        $model = $this->findModel($id_pext, $tipo_solicitud, $fecha_solicitud);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_pext' => $model->id_pext, 'tipo_solicitud' => $model->tipo_solicitud, 'fecha_solicitud' => $model->fecha_solicitud]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Solicitud model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_pext
     * @param string $tipo_solicitud
     * @param string $fecha_solicitud
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_pext, $tipo_solicitud, $fecha_solicitud)
    {
        $this->findModel($id_pext, $tipo_solicitud, $fecha_solicitud)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Solicitud model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id_pext
     * @param string $tipo_solicitud
     * @param string $fecha_solicitud
     * @return Solicitud the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_pext, $tipo_solicitud, $fecha_solicitud)
    {
        if (($model = Solicitud::findOne(['id_pext' => $id_pext, 'tipo_solicitud' => $tipo_solicitud, 'fecha_solicitud' => $fecha_solicitud])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
