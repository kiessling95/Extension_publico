<?php

use yii\grid\GridView;
use yii\widgets\ListView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pextension */


$this->title = 'Proyectos de Extensión';
?>
<div class="site-index">
    <div class="jumbotron">


        <h1>Registro Proyectos de Extensión</h1>
        <row>
            <div class="col-md-3">
                <h3><?= Html::a('<span class=" glyphicon glyphicon-map-marker"></span>' . count($total), ['registro/mapa'], ['class' => 'btn btn-success']) ?><br/> Proyectos</h3>
            </div>
            <div class="col-md-3">
                <h3><?= Html::a('<span class="glyphicon glyphicon-tasks"> </span>' . 14, ['registro/resumen'], ['class' => 'btn btn-success']) ?> <br/> Integrantes</h3>
            </div>
            <div class="col-md-3">
                <h3><?= Html::a('<span class="glyphicon glyphicon-cog"></span>' . 1, ['registro/resumen'], ['class' => 'btn btn-success']) ?> <br/> Convocatorias</h3>
            </div>
            <div class="col-md-3">
                <h3><?= Html::a('<span class="glyphicon glyphicon-send"> </span>' . 152, ['entrega/resumen'], ['class' => 'btn btn-success']) ?><br/>  Beneficiados </h3>
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
        <?=
        GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'id_presupuesto',
                'id_pext',
                'id_rubro_extension',
                'concepto',
                'cantidad',
                //'monto',
                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]);
        ?>
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
