<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ObjetivoEspecifico */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="objetivo-especifico-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'descripcion')->textInput() ?>

    <?= $form->field($model, 'id_pext')->textInput() ?>

    <?= $form->field($model, 'meta')->textInput() ?>

    <?= $form->field($model, 'ponderacion')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
