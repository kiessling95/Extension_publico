<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OrganizacionesParticipantes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="organizaciones-participantes-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput() ?>

    <?= $form->field($model, 'telefono')->textInput() ?>

    <?= $form->field($model, 'email')->textInput() ?>

    <?= $form->field($model, 'referencia_vinculacion_inst')->textInput() ?>

    <?= $form->field($model, 'id_pext')->textInput() ?>

    <?= $form->field($model, 'id_tipo_organizacion')->textInput() ?>

    <?= $form->field($model, 'id_localidad')->textInput() ?>

    <?= $form->field($model, 'id_pais')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_provincia')->textInput() ?>

    <?= $form->field($model, 'domicilio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'aval')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
