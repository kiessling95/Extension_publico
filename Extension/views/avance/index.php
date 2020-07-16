<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AvanceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Avances');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Proyectos'), 'url' => ['/pextension/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', $model ->denominacion), 'url' => ['/pextension/view','id'=> $model->id_pext]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="avance-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <!--<p>
        <?= Html::a(Yii::t('app', 'Create Avance'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>-->

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
    <?=
    $this->render('/pextension/menu', [
        'model' => $model,
    ])
    ?>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
       //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'id_avance',
            'titulo_actividad',
            //'id_obj_esp',
            'fecha',
            'descripcion',
            'ponderacion',
            [
                'attribute' => 'link',
                'format' => 'raw',
                'value' => function($data) {
                    $basepath = str_replace('\\', '/', Yii::$app->basePath) . '/web/';
                    $path = str_replace($basepath, '', $data->link);
                    return Html::a($data->link, $path, array('target' => '_blank'));
                }
            ],
            //'link',
            
            //'id_pext',
            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>


</div>
