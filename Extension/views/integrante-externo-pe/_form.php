<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\IntegranteExternoPe */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="integrante-externo-pe-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tipo_docum')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nro_docum')->textInput() ?>

    <?= $form->field($model, 'id_pext')->textInput() ?>

    <?= $form->field($model, 'funcion_p')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'carga_horaria')->textInput() ?>

    <?= $form->field($model, 'desde')->textInput() ?>

    <?= $form->field($model, 'hasta')->textInput() ?>

    <?= $form->field($model, 'rescd')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ad_honorem')->textInput() ?>

    <?= $form->field($model, 'tipo')->textInput() ?>

    <?= $form->field($model, 'cv')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
