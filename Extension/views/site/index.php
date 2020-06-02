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
                <h3><?= Html::a('<span class=" glyphicon glyphicon-map-marker"></span>' . count($total) , ['registro/mapa'], ['class' => 'btn btn-success']) ?><br/> Proyectos</h3>
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

</div>
