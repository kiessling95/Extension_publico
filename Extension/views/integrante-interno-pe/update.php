<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\IntegranteInternoPe */

$this->title = Yii::t('app', 'Update Integrante Interno Pe: {name}', [
    'name' => $model->id_designacion,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Integrante Interno Pes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_designacion, 'url' => ['view', 'id_designacion' => $model->id_designacion, 'id_pext' => $model->id_pext, 'desde' => $model->desde]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="integrante-interno-pe-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
