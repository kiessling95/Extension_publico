<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\data\Pagination;

class SiteController extends Controller {

    /**
     * {@inheritdoc}
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex() {
        $total = array();
        $searchModel = new \app\models\PextensionSearch();
        $integranteE = new \app\models\IntegranteExternoPeSearch();
        $integranteI = new \app\models\IntegranteInternoPeSearch();
        $conv = new \app\models\ConvocatoriaSearch();
        $dest = new \app\models\DestinatariosSearch();
        $org = new \app\models\OrganizacionesParticipantesSearch();


        $cantProy = count($searchModel->searchResumen(null));
        $cantInt = count($integranteE->searchResumen(null)) + count($integranteI->searchResumen(null));
        $cantConv = count($conv->searchResumen(null));
        $cantBenef = count($dest->searchResumen(null)) + count($org->searchResumen(null));


        $total['cantProy'] = $cantProy;
        $total['cantInt'] = $cantInt;
        $total['cantConv'] = $cantConv;
        $total['cantBenef'] = $cantBenef;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        // SEARCH nombre proyecto
        $request = Yii::$app->request;
        $busqueda = strtolower($request->get("s", ""));
        /*
         * 0 -> titulo proyecto
         * 1 -> Facultad
         * 2 -> Director
         */
        $tipo = $request->get("tipo", "");


        switch ($tipo) {
            case 1:
                break;
            case 2:
                if ($busqueda != "") {

                    /*
                      ->innerJoin('designacion', 'designacion.id_docente=docente.id_docente')
                      ->innerJoin('integrante_interno_pe', 'integrante_interno_pe.id_designacion=designacion.id_designacion')
                      ->innerJoin('funcion_extension', 'funcion_extension.id_extension=integrante_interno_pe.funcion_p')
                      ->innerJoin('pextension', 'pextension.id_pext=integrante_interno_pe.id_pext')
                      ->andwhere(["like", "funcion_extension.descripcion", "Director"]) */

                    $designaciones = \app\models\Designacion::find()
                            ->innerJoin('docente', 'designacion.id_docente=docente.id_docente')
                            ->andwhere(["like", "LOWER(docente.apellido)", $busqueda]);

                    $directores = \app\models\IntegranteInternoPe::find()
                            ->andwhere(["like", "funcion_p", "D"]);

                    $directores = $directores->asArray()->all();
                    $designaciones = $designaciones->asArray()->all();

                    $proyectos = array();
                    $aux = 0;

                    foreach ($directores as $director) {
                        foreach ($designaciones as $designacion) {
                            if ($director['id_designacion'] == $designacion['id_designacion']) {

                                $proyectos[$aux] = \app\models\Pextension::find()
                                                ->andwhere(["=", "id_pext", $director['id_pext']])->asArray()->all()[0];
                                $aux = $aux + 1;
                            }
                        }
                    }
                    $pages = new Pagination(['totalCount' => count($proyectos)]);
                    $pages->pageSize = 6;


                    $models = $proyectos;
                } else {

                    if (($proyectos = \app\models\Pextension::find()) == null) {
                        throw new NotFoundHttpException(Yii::t('app', 'No hay proyectos.'));
                    }

                    $pages = new Pagination(['totalCount' => count($proyectos->asArray()->all())]);
                    $pages->pageSize = 6;


                    $models = $proyectos->offset($pages->offset)
                            ->limit($pages->limit)
                            ->all();
                }

                break;
            default :
                if ($busqueda != "") {
                    $proyectos = \app\models\Pextension::find()
                            ->andwhere(["like", "LOWER(denominacion)", $busqueda]);

                    $pages = new Pagination(['totalCount' => count($proyectos->asArray()->all())]);
                    $pages->pageSize = 6;


                    $models = $proyectos->offset($pages->offset)
                            ->limit($pages->limit)
                            ->all();
                } else {
                    if (($proyectos = \app\models\Pextension::find()) == null) {
                        throw new NotFoundHttpException(Yii::t('app', 'No hay proyectos.'));
                    }
                }
                $pages = new Pagination(['totalCount' => count($proyectos->asArray()->all())]);
                $pages->pageSize = 6;


                $models = $proyectos->offset($pages->offset)
                        ->limit($pages->limit)
                        ->all();
                break;
        }


        //Paginación para 6 eventos por pagina



        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'total' => $total,
                    'proyectos' => $models,
                    'pages' => $pages,
        ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin() {
        $this->layout = 'login';
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
                    'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout() {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact() {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
                    'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout() {
        return $this->render('about');
    }

}
