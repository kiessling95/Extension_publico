<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PextensionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pextension-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_pext') ?>

    <?= $form->field($model, 'denominacion') ?>

    <?= $form->field($model, 'uni_acad') ?>

    <?= $form->field($model, 'fec_desde') ?>

    <?= $form->field($model, 'fec_hasta') ?>

    <?php // echo $form->field($model, 'expediente') ?>

    <?php // echo $form->field($model, 'duracion') ?>

    <?php // echo $form->field($model, 'palabras_clave') ?>

    <?php // echo $form->field($model, 'objetivo') ?>

    <?php // echo $form->field($model, 'id_estado') ?>

    <?php // echo $form->field($model, 'financiacion')->checkbox() ?>

    <?php // echo $form->field($model, 'monto') ?>

    <?php // echo $form->field($model, 'descripcion_situacion') ?>

    <?php // echo $form->field($model, 'caracterizacion_poblacion') ?>

    <?php // echo $form->field($model, 'localizacion_geo') ?>

    <?php // echo $form->field($model, 'antecedente_participacion') ?>

    <?php // echo $form->field($model, 'importancia_necesidad') ?>

    <?php // echo $form->field($model, 'id_bases') ?>

    <?php // echo $form->field($model, 'responsable_carga') ?>

    <?php // echo $form->field($model, 'departamento') ?>

    <?php // echo $form->field($model, 'area') ?>

    <?php // echo $form->field($model, 'impacto') ?>

    <?php // echo $form->field($model, 'eje_tematico') ?>

    <?php // echo $form->field($model, 'ord_priori') ?>

    <?php // echo $form->field($model, 'fec_carga') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
