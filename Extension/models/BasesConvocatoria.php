<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bases_convocatoria".
 *
 * @property int $id_bases
 * @property string|null $convocatoria
 * @property string|null $objetivo
 * @property string|null $destinatarios
 * @property string|null $integrantes
 * @property string|null $monto
 * @property string|null $duracion
 * @property string|null $fecha
 * @property string|null $evaluacion
 * @property string|null $adjudicacion
 * @property string|null $consulta
 * @property string|null $bases_titulo
 * @property string|null $ordenanza
 * @property string|null $tipo_convocatoria
 * @property string|null $fecha_desde
 * @property string|null $fecha_hasta
 * @property int|null $duracion_convocatoria
 * @property int|null $eje_tematico
 * @property string|null $eje_tematico_txt
 * @property float|null $monto_max
 * @property bool|null $tiene_monto
 *
 * @property TipoConvocatoria $tipoConvocatoria
 * @property EjeTematicoConv[] $ejeTematicoConvs
 * @property TiposEjesTematicos[] $ejes
 * @property MontosConvocatoria[] $montosConvocatorias
 * @property RubroPresupExtension[] $rubroExtensions
 * @property Pextension[] $pextensions
 */
class BasesConvocatoria extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bases_convocatoria';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['convocatoria', 'objetivo', 'destinatarios', 'integrantes', 'monto', 'duracion', 'fecha', 'evaluacion', 'adjudicacion', 'consulta', 'bases_titulo', 'ordenanza', 'eje_tematico_txt'], 'string'],
            [['fecha_desde', 'fecha_hasta'], 'safe'],
            [['duracion_convocatoria', 'eje_tematico'], 'default', 'value' => null],
            [['duracion_convocatoria', 'eje_tematico'], 'integer'],
            [['monto_max'], 'number'],
            [['tiene_monto'], 'boolean'],
            [['tipo_convocatoria'], 'string', 'max' => 1],
            [['tipo_convocatoria'], 'exist', 'skipOnError' => true, 'targetClass' => TipoConvocatoria::className(), 'targetAttribute' => ['tipo_convocatoria' => 'id_conv']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_bases' => Yii::t('app', 'Id Bases'),
            'convocatoria' => Yii::t('app', 'Convocatoria'),
            'objetivo' => Yii::t('app', 'Objetivo'),
            'destinatarios' => Yii::t('app', 'Destinatarios'),
            'integrantes' => Yii::t('app', 'Integrantes'),
            'monto' => Yii::t('app', 'Monto'),
            'duracion' => Yii::t('app', 'Duracion'),
            'fecha' => Yii::t('app', 'Fecha'),
            'evaluacion' => Yii::t('app', 'Evaluacion'),
            'adjudicacion' => Yii::t('app', 'Adjudicacion'),
            'consulta' => Yii::t('app', 'Consulta'),
            'bases_titulo' => Yii::t('app', 'Bases Titulo'),
            'ordenanza' => Yii::t('app', 'Ordenanza'),
            'tipo_convocatoria' => Yii::t('app', 'Tipo Convocatoria'),
            'fecha_desde' => Yii::t('app', 'Fecha Desde'),
            'fecha_hasta' => Yii::t('app', 'Fecha Hasta'),
            'duracion_convocatoria' => Yii::t('app', 'Duracion Convocatoria'),
            'eje_tematico' => Yii::t('app', 'Eje Tematico'),
            'eje_tematico_txt' => Yii::t('app', 'Eje Tematico Txt'),
            'monto_max' => Yii::t('app', 'Monto Max'),
            'tiene_monto' => Yii::t('app', 'Tiene Monto'),
        ];
    }

    /**
     * Gets query for [[TipoConvocatoria]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTipoConvocatoria()
    {
        return $this->hasOne(TipoConvocatoria::className(), ['id_conv' => 'tipo_convocatoria']);
    }

    /**
     * Gets query for [[EjeTematicoConvs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEjeTematicoConvs()
    {
        return $this->hasMany(EjeTematicoConv::className(), ['id_bases' => 'id_bases']);
    }

    /**
     * Gets query for [[Ejes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEjes()
    {
        return $this->hasMany(TiposEjesTematicos::className(), ['id_eje' => 'id_eje'])->viaTable('eje_tematico_conv', ['id_bases' => 'id_bases']);
    }

    /**
     * Gets query for [[MontosConvocatorias]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMontosConvocatorias()
    {
        return $this->hasMany(MontosConvocatoria::className(), ['id_bases' => 'id_bases']);
    }

    /**
     * Gets query for [[RubroExtensions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRubroExtensions()
    {
        return $this->hasMany(RubroPresupExtension::className(), ['id_rubro_extension' => 'id_rubro_extension'])->viaTable('montos_convocatoria', ['id_bases' => 'id_bases']);
    }

    /**
     * Gets query for [[Pextensions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPextensions()
    {
        return $this->hasMany(Pextension::className(), ['id_bases' => 'id_bases']);
    }
}
