<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Destinatarios */

$this->title = Yii::t('app', 'Create Destinatarios');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Destinatarios'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="destinatarios-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
