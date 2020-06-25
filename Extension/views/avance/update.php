<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Avance */

$this->title = Yii::t('app', 'Update Avance: {name}', [
    'name' => $model->id_avance,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Avances'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_avance, 'url' => ['view', 'id_avance' => $model->id_avance, 'id_obj_esp' => $model->id_obj_esp]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="avance-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
