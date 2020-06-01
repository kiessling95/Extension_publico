<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\IntegranteExternoPe */

$this->title = Yii::t('app', 'Update Integrante Externo Pe: {name}', [
    'name' => $model->tipo_docum,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Integrante Externo Pes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->tipo_docum, 'url' => ['view', 'tipo_docum' => $model->tipo_docum, 'nro_docum' => $model->nro_docum, 'id_pext' => $model->id_pext, 'desde' => $model->desde]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="integrante-externo-pe-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
