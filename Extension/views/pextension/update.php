<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pextension */

$this->title = Yii::t('app', 'Update Pextension: {name}', [
    'name' => $model->id_pext,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pextensions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_pext, 'url' => ['view', 'id' => $model->id_pext]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="pextension-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
