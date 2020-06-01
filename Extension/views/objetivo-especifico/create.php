<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ObjetivoEspecifico */

$this->title = Yii::t('app', 'Create Objetivo Especifico');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Objetivo Especificos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="objetivo-especifico-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
