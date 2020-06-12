<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\OrganizacionesParticipantes */

$this->title = $model->nombre;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Organizaciones Participantes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="organizaciones-participantes-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <!--<p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id_organizacion], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id_organizacion], [
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
            'nombre',
            'telefono',
            'email:email',
            'referencia_vinculacion_inst',
            'id_tipo_organizacion',
            'id_organizacion',
            'id_localidad',
            'id_pais',
            'id_provincia',
            'domicilio',
        ],
    ]) ?>

</div>
