<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SolicitudSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="solicitud-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_pext') ?>

    <?= $form->field($model, 'tipo_solicitud') ?>

    <?= $form->field($model, 'motivo') ?>

    <?= $form->field($model, 'fecha_solicitud') ?>

    <?= $form->field($model, 'estado_solicitud') ?>

    <?php // echo $form->field($model, 'recibido') ?>

    <?php // echo $form->field($model, 'fecha_recepcion') ?>

    <?php // echo $form->field($model, 'nro_acta') ?>

    <?php // echo $form->field($model, 'obs_resolucion') ?>

    <?php // echo $form->field($model, 'fecha_fin_prorroga') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
