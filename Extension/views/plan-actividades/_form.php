<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PlanActividades */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="plan-actividades-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'detalle')->textInput() ?>

    <?= $form->field($model, 'fecha')->textInput() ?>

    <?= $form->field($model, 'localizacion')->textInput() ?>

    <?= $form->field($model, 'meta')->textInput() ?>

    <?= $form->field($model, 'id_rubro_extension')->textInput() ?>

    <?= $form->field($model, 'id_obj_especifico')->textInput() ?>

    <?= $form->field($model, 'anio')->textInput() ?>

    <?= $form->field($model, 'destinatarios')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
