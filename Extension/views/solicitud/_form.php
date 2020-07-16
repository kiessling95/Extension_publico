<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Solicitud */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="solicitud-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_pext')->textInput() ?>

    <?= $form->field($model, 'tipo_solicitud')->textInput() ?>

    <?= $form->field($model, 'motivo')->textInput() ?>

    <?= $form->field($model, 'fecha_solicitud')->textInput() ?>

    <?= $form->field($model, 'estado_solicitud')->textInput() ?>

    <?= $form->field($model, 'recibido')->textInput() ?>

    <?= $form->field($model, 'fecha_recepcion')->textInput() ?>

    <?= $form->field($model, 'nro_acta')->textInput() ?>

    <?= $form->field($model, 'obs_resolucion')->textInput() ?>

    <?= $form->field($model, 'fecha_fin_prorroga')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
