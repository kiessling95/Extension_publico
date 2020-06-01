<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PresupuestoExtension */

$this->title = Yii::t('app', 'Update Presupuesto Extension: {name}', [
    'name' => $model->id_presupuesto,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Presupuesto Extensions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_presupuesto, 'url' => ['view', 'id_presupuesto' => $model->id_presupuesto, 'id_pext' => $model->id_pext, 'id_rubro_extension' => $model->id_rubro_extension]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="presupuesto-extension-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
