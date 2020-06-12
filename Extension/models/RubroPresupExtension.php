<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rubro_presup_extension".
 *
 * @property int $id_rubro_extension
 * @property string $tipo
 *
 * @property MontosConvocatoria[] $montosConvocatorias
 * @property BasesConvocatoria[] $bases
 * @property PresupuestoExtension[] $presupuestoExtensions
 */
class RubroPresupExtension extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rubro_presup_extension';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tipo'], 'required'],
            [['tipo'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_rubro_extension' => Yii::t('app', 'Rubro'),
            'tipo' => Yii::t('app', 'Tipo'),
        ];
    }

    /**
     * Gets query for [[MontosConvocatorias]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMontosConvocatorias()
    {
        return $this->hasMany(MontosConvocatoria::className(), ['id_rubro_extension' => 'id_rubro_extension']);
    }

    /**
     * Gets query for [[Bases]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBases()
    {
        return $this->hasMany(BasesConvocatoria::className(), ['id_bases' => 'id_bases'])->viaTable('montos_convocatoria', ['id_rubro_extension' => 'id_rubro_extension']);
    }

    /**
     * Gets query for [[PresupuestoExtensions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPresupuestoExtensions()
    {
        return $this->hasMany(PresupuestoExtension::className(), ['id_rubro_extension' => 'id_rubro_extension']);
    }
}
