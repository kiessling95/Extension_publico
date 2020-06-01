<?php

namespace app\controllers;

use Yii;
use app\models\IntegranteExternoPe;
use app\models\IntegranteExternoPeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * IntegranteExternoPeController implements the CRUD actions for IntegranteExternoPe model.
 */
class IntegranteExternoPeController extends Controller
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
     * Lists all IntegranteExternoPe models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new IntegranteExternoPeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single IntegranteExternoPe model.
     * @param string $tipo_docum
     * @param integer $nro_docum
     * @param integer $id_pext
     * @param string $desde
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($tipo_docum, $nro_docum, $id_pext, $desde)
    {
        return $this->render('view', [
            'model' => $this->findModel($tipo_docum, $nro_docum, $id_pext, $desde),
        ]);
    }

    /**
     * Creates a new IntegranteExternoPe model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new IntegranteExternoPe();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'tipo_docum' => $model->tipo_docum, 'nro_docum' => $model->nro_docum, 'id_pext' => $model->id_pext, 'desde' => $model->desde]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing IntegranteExternoPe model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $tipo_docum
     * @param integer $nro_docum
     * @param integer $id_pext
     * @param string $desde
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($tipo_docum, $nro_docum, $id_pext, $desde)
    {
        $model = $this->findModel($tipo_docum, $nro_docum, $id_pext, $desde);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'tipo_docum' => $model->tipo_docum, 'nro_docum' => $model->nro_docum, 'id_pext' => $model->id_pext, 'desde' => $model->desde]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing IntegranteExternoPe model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $tipo_docum
     * @param integer $nro_docum
     * @param integer $id_pext
     * @param string $desde
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($tipo_docum, $nro_docum, $id_pext, $desde)
    {
        $this->findModel($tipo_docum, $nro_docum, $id_pext, $desde)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the IntegranteExternoPe model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $tipo_docum
     * @param integer $nro_docum
     * @param integer $id_pext
     * @param string $desde
     * @return IntegranteExternoPe the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($tipo_docum, $nro_docum, $id_pext, $desde)
    {
        if (($model = IntegranteExternoPe::findOne(['tipo_docum' => $tipo_docum, 'nro_docum' => $nro_docum, 'id_pext' => $id_pext, 'desde' => $desde])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
