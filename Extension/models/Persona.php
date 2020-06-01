<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "persona".
 *
 * @property string|null $apellido
 * @property string|null $nombre
 * @property int|null $nro_tabla
 * @property string $tipo_docum
 * @property int $nro_docum
 * @property string|null $tipo_sexo
 * @property string|null $pais_nacim
 * @property int|null $pcia_nacim
 * @property string|null $fec_nacim
 * @property string|null $titulog
 * @property string|null $titulop
 * @property string|null $docum_extran
 * @property string|null $telefono
 * @property string|null $mail
 *
 * @property IntegranteExternoPe[] $integranteExternoPes
 * @property Tipo $nroTabla
 */
class Persona extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'persona';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['apellido', 'nombre', 'telefono', 'mail'], 'string'],
            [['nro_tabla', 'nro_docum', 'pcia_nacim'], 'default', 'value' => null],
            [['nro_tabla', 'nro_docum', 'pcia_nacim'], 'integer'],
            [['tipo_docum', 'nro_docum'], 'required'],
            [['fec_nacim'], 'safe'],
            [['tipo_docum', 'titulog', 'titulop'], 'string', 'max' => 4],
            [['tipo_sexo'], 'string', 'max' => 12],
            [['pais_nacim'], 'string', 'max' => 2],
            [['docum_extran'], 'string', 'max' => 15],
            [['tipo_docum', 'nro_docum'], 'unique', 'targetAttribute' => ['tipo_docum', 'nro_docum']],
            [['nro_tabla', 'tipo_docum'], 'exist', 'skipOnError' => true, 'targetClass' => Tipo::className(), 'targetAttribute' => ['nro_tabla' => 'nro_tabla', 'tipo_docum' => 'desc_abrev']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'apellido' => Yii::t('app', 'Apellido'),
            'nombre' => Yii::t('app', 'Nombre'),
            'nro_tabla' => Yii::t('app', 'Nro Tabla'),
            'tipo_docum' => Yii::t('app', 'Tipo Docum'),
            'nro_docum' => Yii::t('app', 'Nro Docum'),
            'tipo_sexo' => Yii::t('app', 'Tipo Sexo'),
            'pais_nacim' => Yii::t('app', 'Pais Nacim'),
            'pcia_nacim' => Yii::t('app', 'Pcia Nacim'),
            'fec_nacim' => Yii::t('app', 'Fec Nacim'),
            'titulog' => Yii::t('app', 'Titulog'),
            'titulop' => Yii::t('app', 'Titulop'),
            'docum_extran' => Yii::t('app', 'Docum Extran'),
            'telefono' => Yii::t('app', 'Telefono'),
            'mail' => Yii::t('app', 'Mail'),
        ];
    }

    /**
     * Gets query for [[IntegranteExternoPes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIntegranteExternoPes()
    {
        return $this->hasMany(IntegranteExternoPe::className(), ['tipo_docum' => 'tipo_docum', 'nro_docum' => 'nro_docum']);
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
}
