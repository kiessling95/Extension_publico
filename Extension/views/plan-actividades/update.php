<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PlanActividades */

$this->title = Yii::t('app', 'Update Plan Actividades: {name}', [
    'name' => $model->id_plan,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Plan Actividades'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_plan, 'url' => ['view', 'id' => $model->id_plan]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="plan-actividades-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
