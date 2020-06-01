<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PresupuestoExtension */

$this->title = Yii::t('app', 'Create Presupuesto Extension');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Presupuesto Extensions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="presupuesto-extension-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
