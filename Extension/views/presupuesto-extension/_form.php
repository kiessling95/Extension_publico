<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PresupuestoExtension */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="presupuesto-extension-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_pext')->textInput() ?>

    <?= $form->field($model, 'id_rubro_extension')->textInput() ?>

    <?= $form->field($model, 'concepto')->textInput() ?>

    <?= $form->field($model, 'cantidad')->textInput() ?>

    <?= $form->field($model, 'monto')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
