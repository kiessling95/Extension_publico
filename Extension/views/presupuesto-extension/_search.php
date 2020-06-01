<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PresupuestoExtensionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="presupuesto-extension-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_presupuesto') ?>

    <?= $form->field($model, 'id_pext') ?>

    <?= $form->field($model, 'id_rubro_extension') ?>

    <?= $form->field($model, 'concepto') ?>

    <?= $form->field($model, 'cantidad') ?>

    <?php // echo $form->field($model, 'monto') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
