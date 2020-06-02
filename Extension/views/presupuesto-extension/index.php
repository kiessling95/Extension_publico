<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PresupuestoExtensionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $model app\models\Pextension */

$this->title = Yii::t('app', 'Presupuesto Extensions');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Proyectos'), 'url' => ['/pextension/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', $model ->denominacion), 'url' => ['/pextension/view','id'=> $model->id_pext]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="presupuesto-extension-index">

    <h1><?= Html::encode($this->title) ?></h1>
<!--
    <p>
        <?= Html::a(Yii::t('app', 'Create Presupuesto Extension'), ['create'], ['class' => 'btn btn-success']) ?>
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

            'id_presupuesto',
            'id_pext',
            'id_rubro_extension',
            'concepto',
            'cantidad',
            //'monto',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
