<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Pextension */
/* @var $ejes app\models\EjeTematicoConv */

$this->title = $model->denominacion;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pextensions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="pextension-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <!--
        <p>
    <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id_pext], ['class' => 'btn btn-primary']) ?>
    <?=
    Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id_pext], [
        'class' => 'btn btn-danger',
        'data' => [
            'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
            'method' => 'post',
        ],
    ])
    ?>
        </p> -->

    <?=
    $this->render('menu', [
        'model' => $model,
    ])
    ?>

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id_pext',
            'denominacion',
            [
                'label' => 'Estado',
                'value' => $model->estado->descripcion,
            ],
            [
                'label' => 'Convocatoria',
                'value' => $model->bases->bases_titulo,
            ],
            'uni_acad',
            'departamento',
            'area',
            'fec_carga',
            'fec_desde',
            'fec_hasta',
            //'eje_tematico',
            'duracion',
            'palabras_clave',
            'descripcion_situacion',
            'caracterizacion_poblacion',
            'localizacion_geo',
            'objetivo',
            'impacto',
            'monto',
            'ord_priori',
            'responsable_carga',
            //'expediente',
            //'financiacion:boolean',
            //'antecedente_participacion',
            //'importancia_necesidad',
        ],
    ])
    ?>

</div>
