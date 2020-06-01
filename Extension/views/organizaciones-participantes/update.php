<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\OrganizacionesParticipantes */

$this->title = Yii::t('app', 'Update Organizaciones Participantes: {name}', [
    'name' => $model->id_organizacion,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Organizaciones Participantes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_organizacion, 'url' => ['view', 'id' => $model->id_organizacion]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="organizaciones-participantes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
