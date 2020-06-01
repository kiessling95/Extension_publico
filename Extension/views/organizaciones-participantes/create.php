<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\OrganizacionesParticipantes */

$this->title = Yii::t('app', 'Create Organizaciones Participantes');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Organizaciones Participantes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="organizaciones-participantes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
