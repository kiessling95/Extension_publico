<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\IntegranteInternoPeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="integrante-interno-pe-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_designacion') ?>

    <?= $form->field($model, 'id_pext') ?>

    <?= $form->field($model, 'funcion_p') ?>

    <?= $form->field($model, 'carga_horaria') ?>

    <?= $form->field($model, 'ua') ?>

    <?php // echo $form->field($model, 'rescd') ?>

    <?php // echo $form->field($model, 'ad_honorem') ?>

    <?php // echo $form->field($model, 'tipo') ?>

    <?php // echo $form->field($model, 'desde') ?>

    <?php // echo $form->field($model, 'hasta') ?>

    <?php // echo $form->field($model, 'cv') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
