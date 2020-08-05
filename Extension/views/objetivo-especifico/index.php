<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ObjetivoEspecificoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $model app\models\Pextension */

$this->title = Yii::t('app', 'Objetivo Especificos');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Proyectos'), 'url' => ['/pextension/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', $model ->denominacion), 'url' => ['/pextension/view','id'=> $model->id_pext]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="objetivo-especifico-index">

    <h1><?= Html::encode($this->title) ?></h1>
<!--
    <p>
        <?= Html::a(Yii::t('app', 'Create Objetivo Especifico'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>-->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
    <?=
    $this->render('/pextension/menu', [
        'model' => $model,
    ])
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_objetivo',
            'descripcion',
            //'id_pext',
            'meta',
            'ponderacion',

            //['class' => 'yii\grid\ActionColumn'],
            
            [
                'attribute' => 'Mas información',
                'format' => 'raw',
                'value' => function ($dataProvider) {

                    return Html::a('<i class="fas fa-eye"></i>', '/plan-actividades/index?id=' . $dataProvider->id_objetivo, [
                                    'title' => Yii::t('app', 'actividades')
                        ]);
                },
                'headerOptions' => ['style' => 'text-align:center;'],
                'contentOptions' => ['style' => 'text-align:center; vertical-align:middle;'],
            ],
        
        ],
    ]); ?>


</div>
