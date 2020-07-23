<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PextensionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Proyectos de Extensión');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pextension-index">
    <div class="container-fluid darkish_bg">
        <h1 class="text-uppercase"><?= Html::encode("Listado Proyectos de Extensión") ?></h1>

        <div class="row padding_section grayish_bg">
            <div class="col-sm-12">
                <div class="table table-responsive d-none d-md-block">
                    <?=
                    GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            [
                                'attribute' => 'convocatoria',
                                'value' => utf8_encode('bases.bases_titulo')
                            ],
                            'denominacion',
                            'uni_acad',
                            'fec_desde',
                            'fec_hasta',
                            [
                                'attribute' => 'Mas información',
                                'format' => 'raw',
                                'value' => function ($dataProvider) {

                                    return Html::a('<i class="fas fa-eye"></i>', '/pextension/view/' . $dataProvider->id_pext, [
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
    </div>
</div>



