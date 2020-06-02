<?php

namespace app\controllers;

use Yii;
use app\models\IntegranteInternoPe;
use app\models\IntegranteInternoPeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * IntegranteInternoPeController implements the CRUD actions for IntegranteInternoPe model.
 */
class IntegranteInternoPeController extends Controller
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
     * Lists all IntegranteInternoPe models.
     * @return mixed
     */
    public function actionIndex($id)
    {
        $searchModel = new IntegranteInternoPeSearch();
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
     * Displays a single IntegranteInternoPe model.
     * @param integer $id_designacion
     * @param integer $id_pext
     * @param string $desde
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_designacion, $id_pext, $desde)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_designacion, $id_pext, $desde),
        ]);
    }

    /**
     * Creates a new IntegranteInternoPe model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new IntegranteInternoPe();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_designacion' => $model->id_designacion, 'id_pext' => $model->id_pext, 'desde' => $model->desde]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing IntegranteInternoPe model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id_designacion
     * @param integer $id_pext
     * @param string $desde
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_designacion, $id_pext, $desde)
    {
        $model = $this->findModel($id_designacion, $id_pext, $desde);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_designacion' => $model->id_designacion, 'id_pext' => $model->id_pext, 'desde' => $model->desde]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing IntegranteInternoPe model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_designacion
     * @param integer $id_pext
     * @param string $desde
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_designacion, $id_pext, $desde)
    {
        $this->findModel($id_designacion, $id_pext, $desde)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the IntegranteInternoPe model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id_designacion
     * @param integer $id_pext
     * @param string $desde
     * @return IntegranteInternoPe the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_designacion, $id_pext, $desde)
    {
        if (($model = IntegranteInternoPe::findOne(['id_designacion' => $id_designacion, 'id_pext' => $id_pext, 'desde' => $desde])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
