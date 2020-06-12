<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PlanActividadesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $model app\models\Pextension */
/* @var $modelO app\models\ObjetivoEspecifico */

$this->title = Yii::t('app', 'Plan Actividades');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Proyectos'), 'url' => ['/pextension/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', $model ->denominacion), 'url' => ['/pextension/view','id'=> $model->id_pext]];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', $modelO ->descripcion), 'url' => ['/objetivo-especifico/index','id'=> $modelO->id_objetivo]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="plan-actividades-index">

    <h1><?= Html::encode($this->title) ?></h1>

   <!--<p>
        <?= Html::a(Yii::t('app', 'Create Plan Actividades'), ['create'], ['class' => 'btn btn-success']) ?>
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

            //'id_plan',
            'detalle',
            'fecha',
            'anio',
            'localizacion',
            'meta',
            //'id_rubro_extension',
            //'id_obj_especifico',
            
            //'destinatarios',

            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
