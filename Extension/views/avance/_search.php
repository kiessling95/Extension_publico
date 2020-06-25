<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AvanceSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="avance-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_avance') ?>

    <?= $form->field($model, 'id_obj_esp') ?>

    <?= $form->field($model, 'fecha') ?>

    <?= $form->field($model, 'descripcion') ?>

    <?= $form->field($model, 'link') ?>

    <?php // echo $form->field($model, 'titulo_actividad') ?>

    <?php // echo $form->field($model, 'ponderacion') ?>

    <?php // echo $form->field($model, 'id_pext') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
