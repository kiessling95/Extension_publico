<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PresupuestoExtension */

$this->title = $model->id_presupuesto;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Presupuesto Extensions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="presupuesto-extension-view">

    <h1><?= Html::encode($this->title) ?></h1>

   <!--<p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id_presupuesto' => $model->id_presupuesto, 'id_pext' => $model->id_pext, 'id_rubro_extension' => $model->id_rubro_extension], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id_presupuesto' => $model->id_presupuesto, 'id_pext' => $model->id_pext, 'id_rubro_extension' => $model->id_rubro_extension], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>-->

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_presupuesto',
            'id_pext',
            'id_rubro_extension',
            'concepto',
            'cantidad',
            'monto',
        ],
    ]) ?>

</div>
