<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "docente".
 *
 * @property int $id_docente
 * @property int|null $legajo
 * @property string|null $apellido
 * @property string|null $nombre
 * @property int|null $nro_tabla
 * @property string|null $tipo_docum
 * @property int|null $nro_docum
 * @property string|null $fec_nacim
 * @property int|null $nro_cuil1
 * @property int|null $nro_cuil
 * @property int|null $nro_cuil2
 * @property string|null $tipo_sexo
 * @property string|null $pais_nacim
 * @property float|null $porcdedicdocente
 * @property float|null $porcdedicinvestig
 * @property float|null $porcdedicagestion
 * @property float|null $porcdedicaextens
 * @property int|null $pcia_nacim
 * @property string|null $fec_ingreso
 * @property string|null $correo_institucional
 * @property string|null $correo_personal
 * @property string|null $situacion_docente
 * @property string|null $telefono
 * @property string|null $telefono_celular
 *
 * @property CobroIncentivo[] $cobroIncentivos
 * @property Designacion[] $designacions
 * @property DirectorDpto[] $directorDptos
 * @property Pais $paisNacim
 * @property Provincia $pciaNacim
 * @property Tipo $nroTabla
 * @property Pinvestigacion[] $pinvestigacions
 * @property Solicitud[] $solicituds
 * @property Subsidio[] $subsidios
 * @property TieneEstimulo[] $tieneEstimulos
 * @property TitulosDocente[] $titulosDocentes
 * @property Titulo[] $codcTituls
 */
class Docente extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'docente';
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
            [['legajo', 'nro_tabla', 'nro_docum', 'nro_cuil1', 'nro_cuil', 'nro_cuil2', 'pcia_nacim'], 'default', 'value' => null],
            [['legajo', 'nro_tabla', 'nro_docum', 'nro_cuil1', 'nro_cuil', 'nro_cuil2', 'pcia_nacim'], 'integer'],
            [['apellido', 'nombre', 'situacion_docente'], 'string'],
            [['fec_nacim', 'fec_ingreso'], 'safe'],
            [['porcdedicdocente', 'porcdedicinvestig', 'porcdedicagestion', 'porcdedicaextens'], 'number'],
            [['tipo_docum'], 'string', 'max' => 4],
            [['tipo_sexo'], 'string', 'max' => 1],
            [['pais_nacim'], 'string', 'max' => 2],
            [['correo_institucional', 'correo_personal'], 'string', 'max' => 60],
            [['telefono', 'telefono_celular'], 'string', 'max' => 30],
            [['nro_docum'], 'unique'],
            [['pais_nacim'], 'exist', 'skipOnError' => true, 'targetClass' => Pais::className(), 'targetAttribute' => ['pais_nacim' => 'codigo_pais']],
            [['pcia_nacim'], 'exist', 'skipOnError' => true, 'targetClass' => Provincia::className(), 'targetAttribute' => ['pcia_nacim' => 'codigo_pcia']],
            [['nro_tabla', 'tipo_docum'], 'exist', 'skipOnError' => true, 'targetClass' => Tipo::className(), 'targetAttribute' => ['nro_tabla' => 'nro_tabla', 'tipo_docum' => 'desc_abrev']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_docente' => Yii::t('app', 'Id Docente'),
            'legajo' => Yii::t('app', 'Legajo'),
            'apellido' => Yii::t('app', 'Apellido'),
            'nombre' => Yii::t('app', 'Nombre'),
            'nro_tabla' => Yii::t('app', 'Nro Tabla'),
            'tipo_docum' => Yii::t('app', 'Tipo Docum'),
            'nro_docum' => Yii::t('app', 'Nro Docum'),
            'fec_nacim' => Yii::t('app', 'Fec Nacim'),
            'nro_cuil1' => Yii::t('app', 'Nro Cuil1'),
            'nro_cuil' => Yii::t('app', 'Nro Cuil'),
            'nro_cuil2' => Yii::t('app', 'Nro Cuil2'),
            'tipo_sexo' => Yii::t('app', 'Tipo Sexo'),
            'pais_nacim' => Yii::t('app', 'Pais Nacim'),
            'porcdedicdocente' => Yii::t('app', 'Porcdedicdocente'),
            'porcdedicinvestig' => Yii::t('app', 'Porcdedicinvestig'),
            'porcdedicagestion' => Yii::t('app', 'Porcdedicagestion'),
            'porcdedicaextens' => Yii::t('app', 'Porcdedicaextens'),
            'pcia_nacim' => Yii::t('app', 'Pcia Nacim'),
            'fec_ingreso' => Yii::t('app', 'Fec Ingreso'),
            'correo_institucional' => Yii::t('app', 'Correo Institucional'),
            'correo_personal' => Yii::t('app', 'Correo Personal'),
            'situacion_docente' => Yii::t('app', 'Situacion Docente'),
            'telefono' => Yii::t('app', 'Telefono'),
            'telefono_celular' => Yii::t('app', 'Telefono Celular'),
        ];
    }

    /**
     * Gets query for [[CobroIncentivos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCobroIncentivos()
    {
        return $this->hasMany(CobroIncentivo::className(), ['id_docente' => 'id_docente']);
    }

    /**
     * Gets query for [[Designacions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDesignacions()
    {
        return $this->hasMany(Designacion::className(), ['id_docente' => 'id_docente']);
    }

    /**
     * Gets query for [[DirectorDptos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDirectorDptos()
    {
        return $this->hasMany(DirectorDpto::className(), ['id_docente' => 'id_docente']);
    }

    /**
     * Gets query for [[PaisNacim]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPaisNacim()
    {
        return $this->hasOne(Pais::className(), ['codigo_pais' => 'pais_nacim']);
    }

    /**
     * Gets query for [[PciaNacim]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPciaNacim()
    {
        return $this->hasOne(Provincia::className(), ['codigo_pcia' => 'pcia_nacim']);
    }

    /**
     * Gets query for [[NroTabla]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNroTabla()
    {
        return $this->hasOne(Tipo::className(), ['nro_tabla' => 'nro_tabla', 'desc_abrev' => 'tipo_docum']);
    }

    /**
     * Gets query for [[Pinvestigacions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPinvestigacions()
    {
        return $this->hasMany(Pinvestigacion::className(), ['id_respon_sub' => 'id_docente']);
    }

    /**
     * Gets query for [[Solicituds]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSolicituds()
    {
        return $this->hasMany(Solicitud::className(), ['id_docente' => 'id_docente']);
    }

    /**
     * Gets query for [[Subsidios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSubsidios()
    {
        return $this->hasMany(Subsidio::className(), ['id_respon_sub' => 'id_docente']);
    }

    /**
     * Gets query for [[TieneEstimulos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTieneEstimulos()
    {
        return $this->hasMany(TieneEstimulo::className(), ['id_respon' => 'id_docente']);
    }

    /**
     * Gets query for [[TitulosDocentes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTitulosDocentes()
    {
        return $this->hasMany(TitulosDocente::className(), ['id_docente' => 'id_docente']);
    }

    /**
     * Gets query for [[CodcTituls]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCodcTituls()
    {
        return $this->hasMany(Titulo::className(), ['codc_titul' => 'codc_titul'])->viaTable('titulos_docente', ['id_docente' => 'id_docente']);
    }
    
    public function getNombreCompleto()
    {
        return $this->nombre.' '. $this->apellido;
    }
    
    public function getTipoNroDoc()
    {
        return $this->tipo_docum.' '. $this->nro_docum;
    }
}
