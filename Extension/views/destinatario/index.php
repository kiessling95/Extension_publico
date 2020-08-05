<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DestinatariosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $model app\models\Pextension */

$this->title = Yii::t('app', 'Destinatarios');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Proyectos'), 'url' => ['/pextension/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', $model ->denominacion), 'url' => ['/pextension/view','id'=> $model->id_pext]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="destinatarios-index">

    <h1><?= Html::encode($this->title) ?></h1>
<!--
    <p>
        <?= Html::a(Yii::t('app', 'Create Destinatarios'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>-->
    <?php  ?>
    
    <?=
    $this->render('/pextension/menu', [
        'model' => $model,
    ])
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_destinatario',
            'contacto',
            'domicilio',
            'telefono',
            'email:email',
            
            //'id_pext',
            //'descripcion',
            //'id_localidad',
            //'id_provincia',
            //'id_pais',
            'cantidad',

            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
