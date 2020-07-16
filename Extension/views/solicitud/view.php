<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Solicitud */

$this->title = $model->id_pext;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Solicituds'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="solicitud-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id_pext' => $model->id_pext, 'tipo_solicitud' => $model->tipo_solicitud, 'fecha_solicitud' => $model->fecha_solicitud], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id_pext' => $model->id_pext, 'tipo_solicitud' => $model->tipo_solicitud, 'fecha_solicitud' => $model->fecha_solicitud], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_pext',
            'tipo_solicitud',
            'motivo',
            'fecha_solicitud',
            'estado_solicitud',
            'recibido',
            'fecha_recepcion',
            'nro_acta',
            'obs_resolucion',
            'fecha_fin_prorroga',
        ],
    ]) ?>

</div>
