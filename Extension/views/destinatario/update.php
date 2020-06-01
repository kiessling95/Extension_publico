<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Destinatarios */

$this->title = Yii::t('app', 'Update Destinatarios: {name}', [
    'name' => $model->id_destinatario,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Destinatarios'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_destinatario, 'url' => ['view', 'id' => $model->id_destinatario]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="destinatarios-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
