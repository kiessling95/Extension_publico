<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\IntegranteInternoPe */

$this->title = $model->id_designacion;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Integrante Interno Pes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="integrante-interno-pe-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <!--<p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id_designacion' => $model->id_designacion, 'id_pext' => $model->id_pext, 'desde' => $model->desde], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id_designacion' => $model->id_designacion, 'id_pext' => $model->id_pext, 'desde' => $model->desde], [
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
            'id_designacion',
            'id_pext',
            'funcion_p',
            'carga_horaria',
            'ua',
            'rescd',
            'ad_honorem',
            'tipo',
            'desde',
            'hasta',
            'cv',
        ],
    ]) ?>

</div>
