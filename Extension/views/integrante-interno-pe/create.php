<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\IntegranteInternoPe */

$this->title = Yii::t('app', 'Create Integrante Interno Pe');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Integrante Interno Pes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="integrante-interno-pe-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
