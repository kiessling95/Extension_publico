<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BasesConvocatoria */

$this->title = Yii::t('app', 'Update Bases Convocatoria: {name}', [
    'name' => $model->id_bases,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bases Convocatorias'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_bases, 'url' => ['view', 'id' => $model->id_bases]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="bases-convocatoria-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
