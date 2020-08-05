<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Solicitud */

$this->title = Yii::t('app', 'Solicitud');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Proyectos'), 'url' => ['/pextension/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', $model->denominacion), 'url' => ['/pextension/view', 'id' => $model->id_pext]];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="solicitud-view">

    <h1><?= Html::encode($this->title) ?></h1>
    
    <?=
    $this->render('/pextension/menu', [
        'model' => $model,
    ])
    ?>

    <?php if ($solicitud['tipo_solicitud'] == 'Cierre') { ?>
        <?=
        DetailView::widget([
            'model' => $solicitud,
            'attributes' => [
                //'id_pext',
                'tipo_solicitud',
                'motivo',
                'fecha_solicitud',
                'estado_solicitud',
                'fecha_recepcion',
                'nro_acta',
                'obs_resolucion',
            ],
        ])
        ?>
    <?php } ?>
    
    <?php if ($solicitud['tipo_solicitud'] == 'Prorroga') { ?>
        <?=
        DetailView::widget([
            'model' => $solicitud,
            'attributes' => [
                //'id_pext',
                'tipo_solicitud',
                'motivo',
                'fecha_solicitud',
                'estado_solicitud',
                'fecha_recepcion',
                'nro_acta',
                'obs_resolucion',
                'fecha_fin_prorroga',
            ],
        ])
        ?>
    <?php } ?>
    
    <?php if ($solicitud['tipo_solicitud'] == 'Baja') { ?>
        <?=
        DetailView::widget([
            'model' => $solicitud,
            'attributes' => [
                //'id_pext',
                'tipo_solicitud',
                'motivo',
                'fecha_solicitud',
                'estado_solicitud',
                'fecha_recepcion',
                'nro_acta',
                'obs_resolucion',
            ],
        ])
        ?>
    <?php } ?>

</div>
