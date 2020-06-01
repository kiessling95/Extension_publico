<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Destinatarios */

$this->title = $model->id_destinatario;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Destinatarios'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="destinatarios-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id_destinatario], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id_destinatario], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_destinatario',
            'domicilio',
            'telefono',
            'email:email',
            'contacto',
            'id_pext',
            'descripcion',
            'id_localidad',
            'id_provincia',
            'id_pais',
            'cantidad',
        ],
    ]) ?>

</div>
