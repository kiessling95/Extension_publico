<?php

use yii\grid\GridView;
use yii\widgets\ListView;
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\helpers\Url;

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
                <h3><?= Html::a('<span class=" glyphicon glyphicon-cog"></span>' . $total['cantProy'], ['pextension/index'], ['class' => 'btn btn-success']) ?><br/> Proyectos</h3>
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
])
?>-->

        <section class="dark_bg">
            <div class="container padding_section">
                <?php if (count($proyectos) != 0) : ?>
                    <div class="row">
                        <?php foreach ($proyectos as $proyecto) : ?>
                            <div class="col-sm-12 col-md-4 mb-5">
                                <div class='card'>
                                    <div class='card bg-light'>
                                        <?= Html::a(Html::img(Url::base('') . '/' . Html::encode('img/extension.png'), ["class" => "card-img-top"]), ['/pextension/view', 'id' => $proyecto['id_pext']]) ?>
                                        <div class='card-body'>
                                            <h4 class='card-title'><?= Html::encode($proyecto["denominacion"]) ?></h4>
                                            <h5 class='card-title'><?= Html::encode("Director/a: " . $proyecto['id_pext']) ?></h5>
                                            <h5 class='card-title'><?= Html::encode("Fecha Inicio : " . date('d/m/Y', strtotime($proyecto["fec_desde"]))) ?></h5>
                                            <h5 class='card-title'><?= Html::encode("Fecha Fin : " . date('d/m/Y', strtotime($proyecto["fec_hasta"]))) ?></h5>
                                            <p class='card-text'><?= Html::encode($proyecto["localizacion_geo"]) ?></p>
                                            <p class='card-text'><?= Html::decode(strtok(wordwrap($proyecto["palabras_clave"], 100, "...\n"), "\n")) ?> </p>
                                            <?= Html::a('Más Información', ['/pextension/view/' . $proyecto['id_pext']], ['class' => 'btn btn-primary btn-lg full_width']); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <div class="row py-5 pagination-lg pagination_center">
                        <?=
                        // display pagination
                        LinkPager::widget([
                            'pagination' => $pages,
                            "disableCurrentPageButton" => true,
                        ]);
                        ?>
                    </div>
                </div>
            <?php else : ?>
                <div class="container">
                    <div class="row">
                        <h2 class="text-white text-uppercase padding_section">No se encontraron eventos, vuelva a
                            intentar.</h2><br>
                    </div>
                </div>
            <?php endif; ?>

        </section>

        <div class="row padding_section grayish_bg">
            <div class="col-sm-12">
                <div class="table table-responsive d-none d-md-block">
                    <?=
                    GridView::widget([
                        'dataProvider' => $dataProvider,
                        'summary' => '',
                        'options' => ['style' => 'width:100%;'],
                        //'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            //'id_pext',
                            [
                                'attribute' => 'convocatoria',
                                'value' => utf8_encode('bases.bases_titulo')
                            ],
                            [
                                'attribute' => 'id_estado',
                                'value' => utf8_encode('estado.descripcion')
                            ],
                            'denominacion',
                            'uni_acad',
                            'fec_desde',
                            'fec_hasta',
                            [
                                'attribute' => 'Link proyecto',
                                'format' => 'raw',
                                'value' => function ($dataProvider) {

                                    return Html::a('<i class="fas fa-eye"></i>', '/pextension/index', [
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
            </div>
            
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
