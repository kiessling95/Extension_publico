<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Avance */

$this->title = Yii::t('app', 'Create Avance');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Avances'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="avance-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
