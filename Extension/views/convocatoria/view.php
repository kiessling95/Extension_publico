<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\BasesConvocatoria */

$this->title = 'Convocatoria';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Convocatorias'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="bases-convocatoria-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <!--<p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id_bases], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id_bases], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>-->

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id_bases',
            'bases_titulo',
            'convocatoria',
            'objetivo',
            'destinatarios',
            'integrantes',
            'monto',
            'duracion',
            'fecha',
            'evaluacion',
            //'adjudicacion',
            'consulta',
            //'ordenanza',
            'tipo_convocatoria',
            [
                'attribute' => 'tipo_convocatoria',
                'value' => 'tipoConvocatoria.descripcion',
            ],
            'fecha_desde',
            'fecha_hasta',
            //'duracion_convocatoria',
            //'eje_tematico',
            'eje_tematico_txt',
            'monto_max',
            //'tiene_monto:boolean',
        ],
    ]) ?>

</div>
