<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OrganizacionesParticipantesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="organizaciones-participantes-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'telefono') ?>

    <?= $form->field($model, 'email') ?>

    <?= $form->field($model, 'referencia_vinculacion_inst') ?>

    <?= $form->field($model, 'id_pext') ?>

    <?php // echo $form->field($model, 'id_tipo_organizacion') ?>

    <?php // echo $form->field($model, 'id_organizacion') ?>

    <?php // echo $form->field($model, 'id_localidad') ?>

    <?php // echo $form->field($model, 'id_pais') ?>

    <?php // echo $form->field($model, 'id_provincia') ?>

    <?php // echo $form->field($model, 'domicilio') ?>

    <?php // echo $form->field($model, 'aval') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
