<?php

namespace app\controllers;

use Yii;
use app\models\PresupuestoExtension;
use app\models\PresupuestoExtensionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PresupuestoExtensionController implements the CRUD actions for PresupuestoExtension model.
 */
class PresupuestoExtensionController extends Controller
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
     * Lists all PresupuestoExtension models.
     * @return mixed
     */
    public function actionIndex($id)
    {
        $searchModel = new PresupuestoExtensionSearch();
        $searchModel->id_pext = $id;
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
     * Displays a single PresupuestoExtension model.
     * @param integer $id_presupuesto
     * @param integer $id_pext
     * @param integer $id_rubro_extension
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_presupuesto, $id_pext, $id_rubro_extension)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_presupuesto, $id_pext, $id_rubro_extension),
        ]);
    }

    /**
     * Creates a new PresupuestoExtension model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PresupuestoExtension();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_presupuesto' => $model->id_presupuesto, 'id_pext' => $model->id_pext, 'id_rubro_extension' => $model->id_rubro_extension]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing PresupuestoExtension model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id_presupuesto
     * @param integer $id_pext
     * @param integer $id_rubro_extension
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_presupuesto, $id_pext, $id_rubro_extension)
    {
        $model = $this->findModel($id_presupuesto, $id_pext, $id_rubro_extension);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_presupuesto' => $model->id_presupuesto, 'id_pext' => $model->id_pext, 'id_rubro_extension' => $model->id_rubro_extension]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing PresupuestoExtension model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_presupuesto
     * @param integer $id_pext
     * @param integer $id_rubro_extension
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_presupuesto, $id_pext, $id_rubro_extension)
    {
        $this->findModel($id_presupuesto, $id_pext, $id_rubro_extension)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PresupuestoExtension model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id_presupuesto
     * @param integer $id_pext
     * @param integer $id_rubro_extension
     * @return PresupuestoExtension the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_presupuesto, $id_pext, $id_rubro_extension)
    {
        if (($model = PresupuestoExtension::findOne(['id_presupuesto' => $id_presupuesto, 'id_pext' => $id_pext, 'id_rubro_extension' => $id_rubro_extension])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
