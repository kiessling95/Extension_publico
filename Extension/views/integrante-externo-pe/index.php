<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\IntegranteExternoPeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Integrante Externo Pes');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="integrante-externo-pe-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Integrante Externo Pe'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'tipo_docum',
            'nro_docum',
            'id_pext',
            'funcion_p',
            'carga_horaria',
            //'desde',
            //'hasta',
            //'rescd',
            //'ad_honorem',
            //'tipo',
            //'cv',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
