<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PlanActividades */

$this->title = Yii::t('app', 'Create Plan Actividades');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Plan Actividades'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="plan-actividades-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
