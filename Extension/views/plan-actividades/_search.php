<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PlanActividadesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="plan-actividades-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_plan') ?>

    <?= $form->field($model, 'detalle') ?>

    <?= $form->field($model, 'fecha') ?>

    <?= $form->field($model, 'localizacion') ?>

    <?= $form->field($model, 'meta') ?>

    <?php // echo $form->field($model, 'id_rubro_extension') ?>

    <?php // echo $form->field($model, 'id_obj_especifico') ?>

    <?php // echo $form->field($model, 'anio') ?>

    <?php // echo $form->field($model, 'destinatarios') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
