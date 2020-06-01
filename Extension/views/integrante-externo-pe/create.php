<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\IntegranteExternoPe */

$this->title = Yii::t('app', 'Create Integrante Externo Pe');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Integrante Externo Pes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="integrante-externo-pe-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
