<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ConvocatoriaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Bases Convocatorias');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bases-convocatoria-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Bases Convocatoria'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_bases',
            'convocatoria',
            'objetivo',
            'destinatarios',
            'integrantes',
            //'monto',
            //'duracion',
            //'fecha',
            //'evaluacion',
            //'adjudicacion',
            //'consulta',
            //'bases_titulo',
            //'ordenanza',
            //'tipo_convocatoria',
            //'fecha_desde',
            //'fecha_hasta',
            //'duracion_convocatoria',
            //'eje_tematico',
            //'eje_tematico_txt',
            //'monto_max',
            //'tiene_monto:boolean',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
