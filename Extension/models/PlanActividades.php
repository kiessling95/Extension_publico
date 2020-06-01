<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "plan_actividades".
 *
 * @property int $id_plan
 * @property string|null $detalle
 * @property string|null $fecha
 * @property string|null $localizacion
 * @property string|null $meta
 * @property int|null $id_rubro_extension
 * @property int|null $id_obj_especifico
 * @property int|null $anio
 * @property int|null $destinatarios
 *
 * @property ObjetivoEspecifico $objEspecifico
 */
class PlanActividades extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'plan_actividades';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['detalle', 'fecha', 'localizacion', 'meta'], 'string'],
            [['id_rubro_extension', 'id_obj_especifico', 'anio', 'destinatarios'], 'default', 'value' => null],
            [['id_rubro_extension', 'id_obj_especifico', 'anio', 'destinatarios'], 'integer'],
            [['id_obj_especifico'], 'exist', 'skipOnError' => true, 'targetClass' => ObjetivoEspecifico::className(), 'targetAttribute' => ['id_obj_especifico' => 'id_objetivo']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_plan' => Yii::t('app', 'Id Plan'),
            'detalle' => Yii::t('app', 'Detalle'),
            'fecha' => Yii::t('app', 'Fecha'),
            'localizacion' => Yii::t('app', 'Localizacion'),
            'meta' => Yii::t('app', 'Meta'),
            'id_rubro_extension' => Yii::t('app', 'Id Rubro Extension'),
            'id_obj_especifico' => Yii::t('app', 'Id Obj Especifico'),
            'anio' => Yii::t('app', 'Anio'),
            'destinatarios' => Yii::t('app', 'Destinatarios'),
        ];
    }

    /**
     * Gets query for [[ObjEspecifico]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getObjEspecifico()
    {
        return $this->hasOne(ObjetivoEspecifico::className(), ['id_objetivo' => 'id_obj_especifico']);
    }
}
