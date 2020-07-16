<?php

use yii\grid\GridView;
use yii\widgets\ListView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PextensionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $model app\models\Pextension */


$this->title = 'Proyectos de Extensión';
?>
<div class="site-index">
    <div class="jumbotron">


        <h1>Registro Proyectos de Extensión</h1>
        <row>
            <div class="col-md-3">
                <h3><?= Html::a('<span class=" glyphicon glyphicon-cog"></span>' .$total['cantProy'], ['pextension/index'], ['class' => 'btn btn-success']) ?><br/> Proyectos</h3>
            </div>
            <div class="col-md-3">
                <h3><?= Html::a('<span class="glyphicon glyphicon-tasks"> </span>' . $total['cantInt'], ['pextension/index'], ['class' => 'btn btn-success']) ?> <br/> Integrantes</h3>
            </div>
            <div class="col-md-3">
                <h3><?= Html::a('<span class="glyphicon glyphicon-earphone"></span>' . $total['cantConv'], ['convocatoria/index'], ['class' => 'btn btn-success']) ?> <br/> Convocatorias</h3>
            </div>
            <div class="col-md-3">
                <h3><?= Html::a('<span class="glyphicon glyphicon-globe"> </span>' . $total['cantBenef'], ['pextension/index'], ['class' => 'btn btn-success']) ?><br/>  Destinatarios </h3>
            </div>
        </row>
        <br/>


    </div>
    <div>
        <style>
            .title-list {
                text-align: center;
                display: block;
            }
        </style>
        <span class="title-list">
            <h1>Listado Proyecto de Extensión </h1>
        </span>
        <!-- listview -->
        
        <!--<?=
        ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'item'],
        'itemView' => function ($model, $key, $index, $widget) {
            return Html::a(Html::encode($model->id_pext), ['/pextension/view', 'id' => $model->id_pext]);
        },
    ]) ?>-->
     <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_pext',
            [
                'attribute' => 'convocatoria',
                'value' => utf8_encode( 'bases.tipoConvocatoria.descripcion')
            ],
            [
                'attribute' => 'id_estado',
                'value' => utf8_encode( 'estado.descripcion')
            ],
            'denominacion',
            'uni_acad',
            'fec_desde',
            'fec_hasta',
            //'expediente',
            //'duracion',
            //'palabras_clave',
            //'objetivo',
            //'id_estado',
            //'financiacion:boolean',
            //'monto',
            //'descripcion_situacion',
            //'caracterizacion_poblacion',
            //'localizacion_geo',
            //'antecedente_participacion',
            //'importancia_necesidad',
            //'id_bases',
            //'responsable_carga',
            //'departamento',
            //'area',
            //'impacto',
            //'eje_tematico',
            //'ord_priori',
            //'fec_carga',

            ['class' => 'yii\grid\ActionColumn',
                'template' => '{view}',
                'buttons' => [
                    'view' => function($url, $model) {
                        return Html::a('<i class="fas fa-eye"></i>', '/pextension/index', [
                                    'title' => Yii::t('app', 'actividades')
                        ]);
                    },
                ]
                ],
        ],
    ]); ?>
    </div>
    <div class="logos">
        <style>
            .img-container {
                text-align: center;
                display: block;
            }
        </style>

<!--    <img src="img/faif.png" alt="Facultad de Informática"/>
     <img width="70px" src="img/fain.png" alt="Facultad de Ingeniería"/> -->
        <span class="img-container">
            <h3>Intituciones que son parte de este proyecto</h3>
            <img width="120px" src="img/FAI.png" alt="Facultad de Informática"/>
            <img width="90px" src="img/logo.png" alt="UNCo"/>
        </span>

    </div>

</div>
