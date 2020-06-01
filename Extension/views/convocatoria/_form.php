<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BasesConvocatoria */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bases-convocatoria-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'convocatoria')->textInput() ?>

    <?= $form->field($model, 'objetivo')->textInput() ?>

    <?= $form->field($model, 'destinatarios')->textInput() ?>

    <?= $form->field($model, 'integrantes')->textInput() ?>

    <?= $form->field($model, 'monto')->textInput() ?>

    <?= $form->field($model, 'duracion')->textInput() ?>

    <?= $form->field($model, 'fecha')->textInput() ?>

    <?= $form->field($model, 'evaluacion')->textInput() ?>

    <?= $form->field($model, 'adjudicacion')->textInput() ?>

    <?= $form->field($model, 'consulta')->textInput() ?>

    <?= $form->field($model, 'bases_titulo')->textInput() ?>

    <?= $form->field($model, 'ordenanza')->textInput() ?>

    <?= $form->field($model, 'tipo_convocatoria')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fecha_desde')->textInput() ?>

    <?= $form->field($model, 'fecha_hasta')->textInput() ?>

    <?= $form->field($model, 'duracion_convocatoria')->textInput() ?>

    <?= $form->field($model, 'eje_tematico')->textInput() ?>

    <?= $form->field($model, 'eje_tematico_txt')->textInput() ?>

    <?= $form->field($model, 'monto_max')->textInput() ?>

    <?= $form->field($model, 'tiene_monto')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
