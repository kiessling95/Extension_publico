<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\IntegranteInternoPeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $model app\models\Pextension */

$this->title = Yii::t('app', 'Integrante Interno Pes');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Proyectos'), 'url' => ['/pextension/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', $model ->denominacion), 'url' => ['/pextension/view','id'=> $model->id_pext]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="integrante-interno-pe-index">

    <h1><?= Html::encode($this->title) ?></h1>
<!--
    <p>
        <?= Html::a(Yii::t('app', 'Create Integrante Interno Pe'), ['create'], ['class' => 'btn btn-success']) ?>
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

            'id_designacion',
            'id_pext',
            'funcion_p',
            'carga_horaria',
            'ua',
            //'rescd',
            //'ad_honorem',
            //'tipo',
            //'desde',
            //'hasta',
            //'cv',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
