<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ObjetivoEspecificoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="objetivo-especifico-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_objetivo') ?>

    <?= $form->field($model, 'descripcion') ?>

    <?= $form->field($model, 'id_pext') ?>

    <?= $form->field($model, 'meta') ?>

    <?= $form->field($model, 'ponderacion') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
