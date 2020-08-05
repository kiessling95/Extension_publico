<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SolicitudSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Solicitud');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Proyectos'), 'url' => ['/pextension/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', $model->denominacion), 'url' => ['/pextension/view', 'id' => $model->id_pext]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="solicitud-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <!--<p>
    <?= Html::a(Yii::t('app', 'Create Solicitud'), ['create'], ['class' => 'btn btn-success']) ?>
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
            //'id_pext',
            'tipo_solicitud',
            'motivo',
            'fecha_solicitud',
            'estado_solicitud',
            //'recibido',
            //'fecha_recepcion',
            //'nro_acta',
            //'obs_resolucion',
            //'fecha_fin_prorroga',
            [
                'attribute' => 'Mas información',
                'format' => 'raw',
                'value' => function ($dataProvider) {

                    return Html::a('<i class="fas fa-eye"></i>', '/solicitud/view?id_pext=' . $dataProvider->id_pext.'&tipo_solicitud='.$dataProvider->tipo_solicitud.'&fecha_solicitud='.$dataProvider->fecha_solicitud, [
                                'title' => Yii::t('app', 'actividades')
                    ]);
                },
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:center; vertical-align:middle;'],
            ],
        ],
    ]);
    ?>


</div>
