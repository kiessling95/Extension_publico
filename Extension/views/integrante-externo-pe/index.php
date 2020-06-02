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
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'tipo_docum',
            'nro_docum',
            'id_pext',
            'funcion_p',
            'carga_horaria',
            //'desde',
            //'hasta',
            //'rescd',
            //'ad_honorem',
            //'tipo',
            //'cv',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
