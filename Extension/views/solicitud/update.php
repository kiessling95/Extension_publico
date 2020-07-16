<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Solicitud */

$this->title = Yii::t('app', 'Update Solicitud: {name}', [
    'name' => $model->id_pext,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Solicituds'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_pext, 'url' => ['view', 'id_pext' => $model->id_pext, 'tipo_solicitud' => $model->tipo_solicitud, 'fecha_solicitud' => $model->fecha_solicitud]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="solicitud-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
