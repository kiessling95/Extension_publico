<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Avance */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="avance-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_obj_esp')->textInput() ?>

    <?= $form->field($model, 'fecha')->textInput() ?>

    <?= $form->field($model, 'descripcion')->textInput() ?>

    <?= $form->field($model, 'link')->textInput() ?>

    <?= $form->field($model, 'titulo_actividad')->textInput() ?>

    <?= $form->field($model, 'ponderacion')->textInput() ?>

    <?= $form->field($model, 'id_pext')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
