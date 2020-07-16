<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "solicitud".
 *
 * @property int $id_pext
 * @property string $tipo_solicitud
 * @property string|null $motivo
 * @property string $fecha_solicitud
 * @property string|null $estado_solicitud
 * @property int|null $recibido
 * @property string|null $fecha_recepcion
 * @property string|null $nro_acta
 * @property string|null $obs_resolucion
 * @property string|null $fecha_fin_prorroga
 *
 * @property Pextension $pext
 */
class Solicitud extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'solicitud';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pext', 'tipo_solicitud', 'fecha_solicitud'], 'required'],
            [['id_pext', 'recibido'], 'default', 'value' => null],
            [['id_pext', 'recibido'], 'integer'],
            [['tipo_solicitud', 'motivo', 'estado_solicitud', 'nro_acta', 'obs_resolucion'], 'string'],
            [['fecha_solicitud', 'fecha_recepcion', 'fecha_fin_prorroga'], 'safe'],
            [['id_pext', 'tipo_solicitud', 'fecha_solicitud'], 'unique', 'targetAttribute' => ['id_pext', 'tipo_solicitud', 'fecha_solicitud']],
            [['id_pext'], 'exist', 'skipOnError' => true, 'targetClass' => Pextension::className(), 'targetAttribute' => ['id_pext' => 'id_pext']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pext' => Yii::t('app', 'Id Pext'),
            'tipo_solicitud' => Yii::t('app', 'Tipo Solicitud'),
            'motivo' => Yii::t('app', 'Motivo'),
            'fecha_solicitud' => Yii::t('app', 'Fecha Solicitud'),
            'estado_solicitud' => Yii::t('app', 'Estado Solicitud'),
            'recibido' => Yii::t('app', 'Recibido'),
            'fecha_recepcion' => Yii::t('app', 'Fecha Recepcion'),
            'nro_acta' => Yii::t('app', 'Nro Acta'),
            'obs_resolucion' => Yii::t('app', 'Obs Resolucion'),
            'fecha_fin_prorroga' => Yii::t('app', 'Fecha Fin Prorroga'),
        ];
    }

    /**
     * Gets query for [[Pext]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPext()
    {
        return $this->hasOne(Pextension::className(), ['id_pext' => 'id_pext']);
    }
}
