<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ConvocatoriaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bases-convocatoria-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_bases') ?>

    <?= $form->field($model, 'convocatoria') ?>

    <?= $form->field($model, 'objetivo') ?>

    <?= $form->field($model, 'destinatarios') ?>

    <?= $form->field($model, 'integrantes') ?>

    <?php // echo $form->field($model, 'monto') ?>

    <?php // echo $form->field($model, 'duracion') ?>

    <?php // echo $form->field($model, 'fecha') ?>

    <?php // echo $form->field($model, 'evaluacion') ?>

    <?php // echo $form->field($model, 'adjudicacion') ?>

    <?php // echo $form->field($model, 'consulta') ?>

    <?php // echo $form->field($model, 'bases_titulo') ?>

    <?php // echo $form->field($model, 'ordenanza') ?>

    <?php // echo $form->field($model, 'tipo_convocatoria') ?>

    <?php // echo $form->field($model, 'fecha_desde') ?>

    <?php // echo $form->field($model, 'fecha_hasta') ?>

    <?php // echo $form->field($model, 'duracion_convocatoria') ?>

    <?php // echo $form->field($model, 'eje_tematico') ?>

    <?php // echo $form->field($model, 'eje_tematico_txt') ?>

    <?php // echo $form->field($model, 'monto_max') ?>

    <?php // echo $form->field($model, 'tiene_monto')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
