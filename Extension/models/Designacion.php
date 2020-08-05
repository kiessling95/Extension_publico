<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "designacion".
 *
 * @property int $id_designacion
 * @property int|null $id_docente
 * @property int|null $nro_cargo
 * @property int|null $anio_acad
 * @property string $desde
 * @property string|null $hasta
 * @property string|null $cat_mapuche
 * @property string|null $cat_estat
 * @property int $dedic
 * @property string $carac
 * @property string $uni_acad
 * @property int|null $id_departamento
 * @property int|null $id_area
 * @property int|null $id_orientacion
 * @property int|null $id_norma Norma del Consejo Directivo
 * @property int|null $id_expediente
 * @property int|null $tipo_incentivo Tipo de incentivo
 * @property int|null $dedi_incen Dedicación de incentivo
 * @property string|null $cic_con CIC / CONICET
 * @property string|null $cargo_gestion
 * @property string|null $ord_gestion
 * @property string|null $emite_cargo_gestion
 * @property string|null $nro_gestion
 * @property string|null $observaciones
 * @property int|null $check_presup
 * @property int|null $nro_540
 * @property int|null $concursado
 * @property int|null $check_academica
 * @property int|null $tipo_desig
 * @property int|null $id_reserva
 * @property string|null $estado
 * @property int|null $id_norma_cs Norma del Consejo Superior
 * @property int|null $por_permuta
 *
 * @property AsignacionMateria[] $asignacionMaterias
 * @property AsignacionTutoria[] $asignacionTutorias
 * @property DaoDesigna[] $daoDesignas
 * @property Caracter $carac0
 * @property CategEstatuto $catEstat
 * @property CategSiu $catMapuche
 * @property CategSiu $cargoGestion
 * @property CicConicef $cicCon
 * @property Dedicacion $dedic0
 * @property DedicacionIncentivo $dediIncen
 * @property Departamento $departamento
 * @property Docente $docente
 * @property Expediente $expediente
 * @property Impresion540 $nro540
 * @property Incentivo $tipoIncentivo
 * @property Norma $norma
 * @property Norma $normaCs
 * @property Orientacion $area
 * @property Reserva $reserva
 * @property TipoDesignacion $tipoDesig
 * @property TipoEmite $emiteCargoGestion
 * @property UnidadAcad $uniAcad
 * @property Imputacion[] $imputacions
 * @property MocoviPrograma[] $programas
 * @property IntegranteInternoPe[] $integranteInternoPes
 * @property IntegranteInternoPi[] $integranteInternoPis
 * @property NormaDesig[] $normaDesigs
 * @property Norma[] $normas
 * @property Novedad[] $novedads
 * @property ReservaOcupadaPor $reservaOcupadaPor
 * @property ReservaOcupadaPor[] $reservaOcupadaPors
 * @property Designacion[] $reservas
 * @property Designacion[] $designacions
 * @property Suplente $suplente
 * @property Suplente[] $suplentes
 * @property Vinculo $vinculo
 * @property Vinculo[] $vinculos
 */
class Designacion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'designacion';
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
            [['id_docente', 'nro_cargo', 'anio_acad', 'dedic', 'id_departamento', 'id_area', 'id_orientacion', 'id_norma', 'id_expediente', 'tipo_incentivo', 'dedi_incen', 'check_presup', 'nro_540', 'concursado', 'check_academica', 'tipo_desig', 'id_reserva', 'id_norma_cs', 'por_permuta'], 'default', 'value' => null],
            [['id_docente', 'nro_cargo', 'anio_acad', 'dedic', 'id_departamento', 'id_area', 'id_orientacion', 'id_norma', 'id_expediente', 'tipo_incentivo', 'dedi_incen', 'check_presup', 'nro_540', 'concursado', 'check_academica', 'tipo_desig', 'id_reserva', 'id_norma_cs', 'por_permuta'], 'integer'],
            [['desde', 'dedic', 'carac', 'uni_acad'], 'required'],
            [['desde', 'hasta'], 'safe'],
            [['observaciones'], 'string'],
            [['cat_mapuche', 'cargo_gestion', 'emite_cargo_gestion'], 'string', 'max' => 4],
            [['cat_estat'], 'string', 'max' => 6],
            [['carac', 'estado'], 'string', 'max' => 1],
            [['uni_acad'], 'string', 'max' => 5],
            [['cic_con'], 'string', 'max' => 3],
            [['ord_gestion', 'nro_gestion'], 'string', 'max' => 10],
            [['nro_cargo'], 'unique'],
            [['carac'], 'exist', 'skipOnError' => true, 'targetClass' => Caracter::className(), 'targetAttribute' => ['carac' => 'id_car']],
            [['cat_estat'], 'exist', 'skipOnError' => true, 'targetClass' => CategEstatuto::className(), 'targetAttribute' => ['cat_estat' => 'codigo_est']],
            [['cat_mapuche'], 'exist', 'skipOnError' => true, 'targetClass' => CategSiu::className(), 'targetAttribute' => ['cat_mapuche' => 'codigo_siu']],
            [['cargo_gestion'], 'exist', 'skipOnError' => true, 'targetClass' => CategSiu::className(), 'targetAttribute' => ['cargo_gestion' => 'codigo_siu']],
            [['cic_con'], 'exist', 'skipOnError' => true, 'targetClass' => CicConicef::className(), 'targetAttribute' => ['cic_con' => 'id']],
            [['dedic'], 'exist', 'skipOnError' => true, 'targetClass' => Dedicacion::className(), 'targetAttribute' => ['dedic' => 'id_ded']],
            [['dedi_incen'], 'exist', 'skipOnError' => true, 'targetClass' => DedicacionIncentivo::className(), 'targetAttribute' => ['dedi_incen' => 'id_di']],
            [['id_departamento'], 'exist', 'skipOnError' => true, 'targetClass' => Departamento::className(), 'targetAttribute' => ['id_departamento' => 'iddepto']],
            [['id_docente'], 'exist', 'skipOnError' => true, 'targetClass' => Docente::className(), 'targetAttribute' => ['id_docente' => 'id_docente']],
            [['id_expediente'], 'exist', 'skipOnError' => true, 'targetClass' => Expediente::className(), 'targetAttribute' => ['id_expediente' => 'id_exp']],
            [['nro_540'], 'exist', 'skipOnError' => true, 'targetClass' => Impresion540::className(), 'targetAttribute' => ['nro_540' => 'id']],
            [['tipo_incentivo'], 'exist', 'skipOnError' => true, 'targetClass' => Incentivo::className(), 'targetAttribute' => ['tipo_incentivo' => 'id_inc']],
            [['id_norma'], 'exist', 'skipOnError' => true, 'targetClass' => Norma::className(), 'targetAttribute' => ['id_norma' => 'id_norma']],
            [['id_norma_cs'], 'exist', 'skipOnError' => true, 'targetClass' => Norma::className(), 'targetAttribute' => ['id_norma_cs' => 'id_norma']],
            [['id_area', 'id_orientacion'], 'exist', 'skipOnError' => true, 'targetClass' => Orientacion::className(), 'targetAttribute' => ['id_area' => 'idarea', 'id_orientacion' => 'idorient']],
            [['id_reserva'], 'exist', 'skipOnError' => true, 'targetClass' => Reserva::className(), 'targetAttribute' => ['id_reserva' => 'id_reserva']],
            [['tipo_desig'], 'exist', 'skipOnError' => true, 'targetClass' => TipoDesignacion::className(), 'targetAttribute' => ['tipo_desig' => 'id']],
            [['emite_cargo_gestion'], 'exist', 'skipOnError' => true, 'targetClass' => TipoEmite::className(), 'targetAttribute' => ['emite_cargo_gestion' => 'cod_emite']],
            [['uni_acad'], 'exist', 'skipOnError' => true, 'targetClass' => UnidadAcad::className(), 'targetAttribute' => ['uni_acad' => 'sigla']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_designacion' => Yii::t('app', 'Id Designacion'),
            'id_docente' => Yii::t('app', 'Id Docente'),
            'nro_cargo' => Yii::t('app', 'Nro Cargo'),
            'anio_acad' => Yii::t('app', 'Anio Acad'),
            'desde' => Yii::t('app', 'Desde'),
            'hasta' => Yii::t('app', 'Hasta'),
            'cat_mapuche' => Yii::t('app', 'Cat Mapuche'),
            'cat_estat' => Yii::t('app', 'Cat Estat'),
            'dedic' => Yii::t('app', 'Dedic'),
            'carac' => Yii::t('app', 'Carac'),
            'uni_acad' => Yii::t('app', 'Uni Acad'),
            'id_departamento' => Yii::t('app', 'Id Departamento'),
            'id_area' => Yii::t('app', 'Id Area'),
            'id_orientacion' => Yii::t('app', 'Id Orientacion'),
            'id_norma' => Yii::t('app', 'Id Norma'),
            'id_expediente' => Yii::t('app', 'Id Expediente'),
            'tipo_incentivo' => Yii::t('app', 'Tipo Incentivo'),
            'dedi_incen' => Yii::t('app', 'Dedi Incen'),
            'cic_con' => Yii::t('app', 'Cic Con'),
            'cargo_gestion' => Yii::t('app', 'Cargo Gestion'),
            'ord_gestion' => Yii::t('app', 'Ord Gestion'),
            'emite_cargo_gestion' => Yii::t('app', 'Emite Cargo Gestion'),
            'nro_gestion' => Yii::t('app', 'Nro Gestion'),
            'observaciones' => Yii::t('app', 'Observaciones'),
            'check_presup' => Yii::t('app', 'Check Presup'),
            'nro_540' => Yii::t('app', 'Nro 540'),
            'concursado' => Yii::t('app', 'Concursado'),
            'check_academica' => Yii::t('app', 'Check Academica'),
            'tipo_desig' => Yii::t('app', 'Tipo Desig'),
            'id_reserva' => Yii::t('app', 'Id Reserva'),
            'estado' => Yii::t('app', 'Estado'),
            'id_norma_cs' => Yii::t('app', 'Id Norma Cs'),
            'por_permuta' => Yii::t('app', 'Por Permuta'),
        ];
    }

    /**
     * Gets query for [[AsignacionMaterias]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAsignacionMaterias()
    {
        return $this->hasMany(AsignacionMateria::className(), ['id_designacion' => 'id_designacion']);
    }

    /**
     * Gets query for [[AsignacionTutorias]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAsignacionTutorias()
    {
        return $this->hasMany(AsignacionTutoria::className(), ['id_designacion' => 'id_designacion']);
    }

    /**
     * Gets query for [[DaoDesignas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDaoDesignas()
    {
        return $this->hasMany(DaoDesigna::className(), ['id_designacion' => 'id_designacion']);
    }

    /**
     * Gets query for [[Carac0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCarac0()
    {
        return $this->hasOne(Caracter::className(), ['id_car' => 'carac']);
    }

    /**
     * Gets query for [[CatEstat]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCatEstat()
    {
        return $this->hasOne(CategEstatuto::className(), ['codigo_est' => 'cat_estat']);
    }

    /**
     * Gets query for [[CatMapuche]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCatMapuche()
    {
        return $this->hasOne(CategSiu::className(), ['codigo_siu' => 'cat_mapuche']);
    }

    /**
     * Gets query for [[CargoGestion]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCargoGestion()
    {
        return $this->hasOne(CategSiu::className(), ['codigo_siu' => 'cargo_gestion']);
    }

    /**
     * Gets query for [[CicCon]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCicCon()
    {
        return $this->hasOne(CicConicef::className(), ['id' => 'cic_con']);
    }

    /**
     * Gets query for [[Dedic0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDedic0()
    {
        return $this->hasOne(Dedicacion::className(), ['id_ded' => 'dedic']);
    }

    /**
     * Gets query for [[DediIncen]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDediIncen()
    {
        return $this->hasOne(DedicacionIncentivo::className(), ['id_di' => 'dedi_incen']);
    }

    /**
     * Gets query for [[Departamento]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDepartamento()
    {
        return $this->hasOne(Departamento::className(), ['iddepto' => 'id_departamento']);
    }

    /**
     * Gets query for [[Docente]].
     *
     * @return Docente
     */
    public function getDocente()
    {
        return $this->hasOne(Docente::className(), ['id_docente' => 'id_docente']);
    }

    /**
     * Gets query for [[Expediente]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getExpediente()
    {
        return $this->hasOne(Expediente::className(), ['id_exp' => 'id_expediente']);
    }

    /**
     * Gets query for [[Nro540]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNro540()
    {
        return $this->hasOne(Impresion540::className(), ['id' => 'nro_540']);
    }

    /**
     * Gets query for [[TipoIncentivo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTipoIncentivo()
    {
        return $this->hasOne(Incentivo::className(), ['id_inc' => 'tipo_incentivo']);
    }

    /**
     * Gets query for [[Norma]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNorma()
    {
        return $this->hasOne(Norma::className(), ['id_norma' => 'id_norma']);
    }

    /**
     * Gets query for [[NormaCs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNormaCs()
    {
        return $this->hasOne(Norma::className(), ['id_norma' => 'id_norma_cs']);
    }

    /**
     * Gets query for [[Area]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getArea()
    {
        return $this->hasOne(Orientacion::className(), ['idarea' => 'id_area', 'idorient' => 'id_orientacion']);
    }

    /**
     * Gets query for [[Reserva]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReserva()
    {
        return $this->hasOne(Reserva::className(), ['id_reserva' => 'id_reserva']);
    }

    /**
     * Gets query for [[TipoDesig]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTipoDesig()
    {
        return $this->hasOne(TipoDesignacion::className(), ['id' => 'tipo_desig']);
    }

    /**
     * Gets query for [[EmiteCargoGestion]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmiteCargoGestion()
    {
        return $this->hasOne(TipoEmite::className(), ['cod_emite' => 'emite_cargo_gestion']);
    }

    /**
     * Gets query for [[UniAcad]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUniAcad()
    {
        return $this->hasOne(UnidadAcad::className(), ['sigla' => 'uni_acad']);
    }

    /**
     * Gets query for [[Imputacions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getImputacions()
    {
        return $this->hasMany(Imputacion::className(), ['id_designacion' => 'id_designacion']);
    }

    /**
     * Gets query for [[Programas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProgramas()
    {
        return $this->hasMany(MocoviPrograma::className(), ['id_programa' => 'id_programa'])->viaTable('imputacion', ['id_designacion' => 'id_designacion']);
    }

    /**
     * Gets query for [[IntegranteInternoPes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIntegranteInternoPes()
    {
        return $this->hasMany(IntegranteInternoPe::className(), ['id_designacion' => 'id_designacion']);
    }

    /**
     * Gets query for [[IntegranteInternoPis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIntegranteInternoPis()
    {
        return $this->hasMany(IntegranteInternoPi::className(), ['id_designacion' => 'id_designacion']);
    }

    /**
     * Gets query for [[NormaDesigs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNormaDesigs()
    {
        return $this->hasMany(NormaDesig::className(), ['id_designacion' => 'id_designacion']);
    }

    /**
     * Gets query for [[Normas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNormas()
    {
        return $this->hasMany(Norma::className(), ['id_norma' => 'id_norma'])->viaTable('norma_desig', ['id_designacion' => 'id_designacion']);
    }

    /**
     * Gets query for [[Novedads]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNovedads()
    {
        return $this->hasMany(Novedad::className(), ['id_designacion' => 'id_designacion']);
    }

    /**
     * Gets query for [[ReservaOcupadaPor]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReservaOcupadaPor()
    {
        return $this->hasOne(ReservaOcupadaPor::className(), ['id_designacion' => 'id_designacion']);
    }

    /**
     * Gets query for [[ReservaOcupadaPors]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReservaOcupadaPors()
    {
        return $this->hasMany(ReservaOcupadaPor::className(), ['id_reserva' => 'id_designacion']);
    }

    /**
     * Gets query for [[Reservas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReservas()
    {
        return $this->hasMany(Designacion::className(), ['id_designacion' => 'id_reserva'])->viaTable('reserva_ocupada_por', ['id_designacion' => 'id_designacion']);
    }

    /**
     * Gets query for [[Designacions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDesignacions()
    {
        return $this->hasMany(Designacion::className(), ['id_designacion' => 'id_designacion'])->viaTable('reserva_ocupada_por', ['id_reserva' => 'id_designacion']);
    }

    /**
     * Gets query for [[Suplente]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSuplente()
    {
        return $this->hasOne(Suplente::className(), ['id_desig_suplente' => 'id_designacion']);
    }

    /**
     * Gets query for [[Suplentes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSuplentes()
    {
        return $this->hasMany(Suplente::className(), ['id_desig' => 'id_designacion']);
    }

    /**
     * Gets query for [[Vinculo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVinculo()
    {
        return $this->hasOne(Vinculo::className(), ['desig' => 'id_designacion']);
    }

    /**
     * Gets query for [[Vinculos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVinculos()
    {
        return $this->hasMany(Vinculo::className(), ['vinc' => 'id_designacion']);
    }
}
