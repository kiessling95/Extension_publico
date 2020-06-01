<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ObjetivoEspecifico */

$this->title = Yii::t('app', 'Update Objetivo Especifico: {name}', [
    'name' => $model->id_objetivo,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Objetivo Especificos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_objetivo, 'url' => ['view', 'id' => $model->id_objetivo]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="objetivo-especifico-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
