<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ObjetivoEspecificoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Objetivo Especificos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="objetivo-especifico-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Objetivo Especifico'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_objetivo',
            'descripcion',
            'id_pext',
            'meta',
            'ponderacion',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
