<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Pextension */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pextension-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'denominacion')->textInput() ?>

    <?= $form->field($model, 'uni_acad')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fec_desde')->textInput() ?>

    <?= $form->field($model, 'fec_hasta')->textInput() ?>

    <?= $form->field($model, 'expediente')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'duracion')->textInput() ?>

    <?= $form->field($model, 'palabras_clave')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'objetivo')->textInput() ?>

    <?= $form->field($model, 'id_estado')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'financiacion')->checkbox() ?>

    <?= $form->field($model, 'monto')->textInput() ?>

    <?= $form->field($model, 'descripcion_situacion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'caracterizacion_poblacion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'localizacion_geo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'antecedente_participacion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'importancia_necesidad')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_bases')->textInput() ?>

    <?= $form->field($model, 'responsable_carga')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'departamento')->textInput() ?>

    <?= $form->field($model, 'area')->textInput() ?>

    <?= $form->field($model, 'impacto')->textInput() ?>

    <?= $form->field($model, 'eje_tematico')->textInput() ?>

    <?= $form->field($model, 'ord_priori')->textInput() ?>

    <?= $form->field($model, 'fec_carga')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
