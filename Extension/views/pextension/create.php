<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pextension */

$this->title = Yii::t('app', 'Create Pextension');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pextensions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pextension-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
