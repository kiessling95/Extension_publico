<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OrganizacionesParticipantesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Organizaciones Participantes');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="organizaciones-participantes-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Organizaciones Participantes'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'nombre',
            'telefono',
            'email:email',
            'referencia_vinculacion_inst',
            'id_pext',
            //'id_tipo_organizacion',
            //'id_organizacion',
            //'id_localidad',
            //'id_pais',
            //'id_provincia',
            //'domicilio',
            //'aval',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
