<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\IntegranteExternoPeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $model app\models\Pextension */

$this->title = Yii::t('app', 'Integrante Externo Pes');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Proyectos'), 'url' => ['/pextension/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', $model ->denominacion), 'url' => ['/pextension/view','id'=> $model->id_pext]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="integrante-externo-pe-index">

    <h1><?= Html::encode($this->title) ?></h1>
<!--
    <p>
        <?= Html::a(Yii::t('app', 'Create Integrante Externo Pe'), ['create'], ['class' => 'btn btn-success']) ?>
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

            [
                'attribute' => 'integrante',
                'value' => 'persona.nombreCompleto',
            ],
            [
                'attribute' => 'Tipo y Nro Doc',
                'value' => 'persona.tipoNroDoc',
            ],
            [
                'attribute' => 'Funcion',
                'value' => 'funcionP.descripcion',
            ],
            [
                'attribute' => 'tipo',
                'value' => 'claustro.descripcion',
            ],
            'desde',
            'hasta',
            //'rescd',
            //'ad_honorem',
            
            //'cv',

            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
