<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pextension".
 *
 * @property int $id_pext
 * @property string|null $denominacion
 * @property string|null $uni_acad
 * @property string|null $fec_desde
 * @property string|null $fec_hasta
 * @property string|null $expediente
 * @property int|null $duracion
 * @property string|null $palabras_clave
 * @property string|null $objetivo
 * @property string|null $id_estado
 * @property bool|null $financiacion
 * @property float|null $monto
 * @property string|null $descripcion_situacion
 * @property string|null $caracterizacion_poblacion
 * @property string|null $localizacion_geo
 * @property string|null $antecedente_participacion
 * @property string|null $importancia_necesidad
 * @property int|null $id_bases
 * @property string|null $responsable_carga
 * @property string|null $departamento
 * @property string|null $area
 * @property string|null $impacto
 * @property int|null $eje_tematico
 * @property int|null $ord_priori
 * @property string|null $fec_carga
 *
 * @property Destinatarios[] $destinatarios
 * @property IntegranteExternoPe[] $integranteExternoPes
 * @property IntegranteInternoPe[] $integranteInternoPes
 * @property ObjetivoEspecifico[] $objetivoEspecificos
 * @property OrganizacionesParticipantes[] $organizacionesParticipantes
 * @property BasesConvocatoria $bases
 * @property EstadoPe $estado
 * @property PresupuestoExtension[] $presupuestoExtensions
 * @property SeguimientoCentral[] $seguimientoCentrals
 * @property SeguimientoUa[] $seguimientoUas
 * @property Solicitud[] $solicituds
 */
class Pextension extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pextension';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['denominacion', 'objetivo', 'departamento', 'area', 'impacto'], 'string'],
            [['fec_desde', 'fec_hasta', 'fec_carga'], 'safe'],
            [['duracion', 'id_bases', 'eje_tematico', 'ord_priori'], 'default', 'value' => null],
            [['duracion', 'id_bases', 'eje_tematico', 'ord_priori'], 'integer'],
            [['financiacion'], 'boolean'],
            [['monto'], 'number'],
            [['uni_acad'], 'string', 'max' => 5],
            [['expediente'], 'string', 'max' => 12],
            [['palabras_clave'], 'string', 'max' => 250],
            [['id_estado'], 'string', 'max' => 4],
            [['descripcion_situacion'], 'string', 'max' => 6500],
            [['caracterizacion_poblacion', 'importancia_necesidad'], 'string', 'max' => 500],
            [['localizacion_geo', 'antecedente_participacion'], 'string', 'max' => 200],
            [['responsable_carga'], 'string', 'max' => 30],
            [['id_bases'], 'exist', 'skipOnError' => true, 'targetClass' => BasesConvocatoria::className(), 'targetAttribute' => ['id_bases' => 'id_bases']],
            [['id_estado'], 'exist', 'skipOnError' => true, 'targetClass' => EstadoPe::className(), 'targetAttribute' => ['id_estado' => 'id_estado']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pext' => Yii::t('app', 'Id Pext'),
            'denominacion' => Yii::t('app', 'Denominacion'),
            'uni_acad' => Yii::t('app', 'Unidad Academica'),
            'fec_desde' => Yii::t('app', 'Fecha Inicio'),
            'fec_hasta' => Yii::t('app', 'Fecha Fin'),
            'expediente' => Yii::t('app', 'Expediente'),
            'duracion' => Yii::t('app', 'Duración'),
            'palabras_clave' => Yii::t('app', 'Palabras Clave'),
            'objetivo' => Yii::t('app', 'Objetivo General'),
            'id_estado' => Yii::t('app', 'Estado'),
            'financiacion' => Yii::t('app', 'Financiacion'),
            'monto' => Yii::t('app', 'Monto'),
            'descripcion_situacion' => Yii::t('app', 'Fundamentación del Proyecto'),
            'caracterizacion_poblacion' => Yii::t('app', 'Identificación destinatarios'),
            'localizacion_geo' => Yii::t('app', 'Localización Geografica'),
            'antecedente_participacion' => Yii::t('app', 'Antecedente Participación'),
            'importancia_necesidad' => Yii::t('app', 'Importancia Necesidad'),
            'id_bases' => Yii::t('app', 'Convocatoria'),
            'responsable_carga' => Yii::t('app', 'Responsable Carga'),
            'departamento' => Yii::t('app', 'Departamento'),
            'area' => Yii::t('app', 'Area'),
            'impacto' => Yii::t('app', 'Impacto'),
            'eje_tematico' => Yii::t('app', 'Eje Tematico'),
            'ord_priori' => Yii::t('app', 'Ord Priori'),
            'fec_carga' => Yii::t('app', 'Fec Carga'),
        ];
    }

    /**
     * Gets query for [[Destinatarios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDestinatarios()
    {
        return $this->hasMany(Destinatarios::className(), ['id_pext' => 'id_pext']);
    }

    /**
     * Gets query for [[IntegranteExternoPes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIntegranteExternoPes()
    {
        return $this->hasMany(IntegranteExternoPe::className(), ['id_pext' => 'id_pext']);
    }

    /**
     * Gets query for [[IntegranteInternoPes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIntegranteInternoPes()
    {
        return $this->hasMany(IntegranteInternoPe::className(), ['id_pext' => 'id_pext']);
    }

    /**
     * Gets query for [[ObjetivoEspecificos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getObjetivoEspecificos()
    {
        return $this->hasMany(ObjetivoEspecifico::className(), ['id_pext' => 'id_pext']);
    }

    /**
     * Gets query for [[OrganizacionesParticipantes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrganizacionesParticipantes()
    {
        return $this->hasMany(OrganizacionesParticipantes::className(), ['id_pext' => 'id_pext']);
    }

    /**
     * Gets query for [[Bases]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBases()
    {
        return $this->hasOne(BasesConvocatoria::className(), ['id_bases' => 'id_bases']);
    }

    /**
     * Gets query for [[Estado]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstado()
    {
        return $this->hasOne(EstadoPe::className(), ['id_estado' => 'id_estado']);
    }

    /**
     * Gets query for [[PresupuestoExtensions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPresupuestoExtensions()
    {
        return $this->hasMany(PresupuestoExtension::className(), ['id_pext' => 'id_pext']);
    }

    /**
     * Gets query for [[SeguimientoCentrals]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSeguimientoCentrals()
    {
        return $this->hasMany(SeguimientoCentral::className(), ['id_pext' => 'id_pext']);
    }

    /**
     * Gets query for [[SeguimientoUas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSeguimientoUas()
    {
        return $this->hasMany(SeguimientoUa::className(), ['id_pext' => 'id_pext']);
    }

    /**
     * Gets query for [[Solicituds]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSolicituds()
    {
        return $this->hasMany(Solicitud::className(), ['id_pext' => 'id_pext']);
    }
    
}
