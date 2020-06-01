<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\IntegranteExternoPe */

$this->title = $model->tipo_docum;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Integrante Externo Pes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="integrante-externo-pe-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'tipo_docum' => $model->tipo_docum, 'nro_docum' => $model->nro_docum, 'id_pext' => $model->id_pext, 'desde' => $model->desde], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'tipo_docum' => $model->tipo_docum, 'nro_docum' => $model->nro_docum, 'id_pext' => $model->id_pext, 'desde' => $model->desde], [
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
            'tipo_docum',
            'nro_docum',
            'id_pext',
            'funcion_p',
            'carga_horaria',
            'desde',
            'hasta',
            'rescd',
            'ad_honorem',
            'tipo',
            'cv',
        ],
    ]) ?>

</div>
