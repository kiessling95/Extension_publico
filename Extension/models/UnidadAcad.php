<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "unidad_acad".
 *
 * @property string $sigla
 * @property string $descripcion
 * @property int|null $nro_tab6
 * @property string|null $cod_regional
 * @property int|null $id_tipo_dependencia
 *
 * @property Conjunto[] $conjuntos
 * @property Departamento[] $departamentos
 * @property Designacion[] $designacions
 * @property IntegranteInternoPe[] $integranteInternoPes
 * @property IntegranteInternoPi[] $integranteInternoPis
 * @property MocoviCredito[] $mocoviCreditos
 * @property MocoviPrograma[] $mocoviProgramas
 * @property Pextension[] $pextensions
 * @property Pinvestigacion[] $pinvestigacions
 * @property PlanEstudio[] $planEstudios
 * @property Solicitud[] $solicituds
 * @property Tutoria[] $tutorias
 * @property MocoviTipoDependencia $tipoDependencia
 * @property Tipo $nroTab6
 */
class UnidadAcad extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'unidad_acad';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db2');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sigla', 'descripcion'], 'required'],
            [['nro_tab6', 'id_tipo_dependencia'], 'default', 'value' => null],
            [['nro_tab6', 'id_tipo_dependencia'], 'integer'],
            [['sigla'], 'string', 'max' => 5],
            [['descripcion'], 'string', 'max' => 60],
            [['cod_regional'], 'string', 'max' => 4],
            [['sigla'], 'unique'],
            [['id_tipo_dependencia'], 'exist', 'skipOnError' => true, 'targetClass' => MocoviTipoDependencia::className(), 'targetAttribute' => ['id_tipo_dependencia' => 'id_tipo_dependencia']],
            [['nro_tab6', 'cod_regional'], 'exist', 'skipOnError' => true, 'targetClass' => Tipo::className(), 'targetAttribute' => ['nro_tab6' => 'nro_tabla', 'cod_regional' => 'desc_abrev']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'sigla' => Yii::t('app', 'Sigla'),
            'descripcion' => Yii::t('app', 'Descripcion'),
            'nro_tab6' => Yii::t('app', 'Nro Tab6'),
            'cod_regional' => Yii::t('app', 'Cod Regional'),
            'id_tipo_dependencia' => Yii::t('app', 'Id Tipo Dependencia'),
        ];
    }

    /**
     * Gets query for [[Conjuntos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getConjuntos()
    {
        return $this->hasMany(Conjunto::className(), ['ua' => 'sigla']);
    }

    /**
     * Gets query for [[Departamentos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDepartamentos()
    {
        return $this->hasMany(Departamento::className(), ['idunidad_academica' => 'sigla']);
    }

    /**
     * Gets query for [[Designacions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDesignacions()
    {
        return $this->hasMany(Designacion::className(), ['uni_acad' => 'sigla']);
    }

    /**
     * Gets query for [[IntegranteInternoPes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIntegranteInternoPes()
    {
        return $this->hasMany(IntegranteInternoPe::className(), ['ua' => 'sigla']);
    }

    /**
     * Gets query for [[IntegranteInternoPis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIntegranteInternoPis()
    {
        return $this->hasMany(IntegranteInternoPi::className(), ['ua' => 'sigla']);
    }

    /**
     * Gets query for [[MocoviCreditos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMocoviCreditos()
    {
        return $this->hasMany(MocoviCredito::className(), ['id_unidad' => 'sigla']);
    }

    /**
     * Gets query for [[MocoviProgramas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMocoviProgramas()
    {
        return $this->hasMany(MocoviPrograma::className(), ['id_unidad' => 'sigla']);
    }

    /**
     * Gets query for [[Pextensions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPextensions()
    {
        return $this->hasMany(Pextension::className(), ['uni_acad' => 'sigla']);
    }

    /**
     * Gets query for [[Pinvestigacions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPinvestigacions()
    {
        return $this->hasMany(Pinvestigacion::className(), ['uni_acad' => 'sigla']);
    }

    /**
     * Gets query for [[PlanEstudios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlanEstudios()
    {
        return $this->hasMany(PlanEstudio::className(), ['uni_acad' => 'sigla']);
    }

    /**
     * Gets query for [[Solicituds]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSolicituds()
    {
        return $this->hasMany(Solicitud::className(), ['uni_acad' => 'sigla']);
    }

    /**
     * Gets query for [[Tutorias]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTutorias()
    {
        return $this->hasMany(Tutoria::className(), ['uni_acad' => 'sigla']);
    }

    /**
     * Gets query for [[TipoDependencia]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTipoDependencia()
    {
        return $this->hasOne(MocoviTipoDependencia::className(), ['id_tipo_dependencia' => 'id_tipo_dependencia']);
    }

    /**
     * Gets query for [[NroTab6]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNroTab6()
    {
        return $this->hasOne(Tipo::className(), ['nro_tabla' => 'nro_tab6', 'desc_abrev' => 'cod_regional']);
    }
}
