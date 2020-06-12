<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "organizaciones_participantes".
 *
 * @property string|null $nombre
 * @property string|null $telefono
 * @property string|null $email
 * @property string|null $referencia_vinculacion_inst
 * @property int $id_pext
 * @property int $id_tipo_organizacion
 * @property int $id_organizacion
 * @property int|null $id_localidad
 * @property string|null $id_pais
 * @property int|null $id_provincia
 * @property string|null $domicilio
 * @property resource|null $aval
 *
 * @property Pextension $pext
 * @property TipoOrganizacion $tipoOrganizacion
 */
class OrganizacionesParticipantes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'organizaciones_participantes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'telefono', 'email', 'referencia_vinculacion_inst', 'aval'], 'string'],
            [['id_pext', 'id_tipo_organizacion'], 'required'],
            [['id_pext', 'id_tipo_organizacion', 'id_localidad', 'id_provincia'], 'default', 'value' => null],
            [['id_pext', 'id_tipo_organizacion', 'id_localidad', 'id_provincia'], 'integer'],
            [['id_pais'], 'string', 'max' => 2],
            [['domicilio'], 'string', 'max' => 30],
            [['id_pext'], 'exist', 'skipOnError' => true, 'targetClass' => Pextension::className(), 'targetAttribute' => ['id_pext' => 'id_pext']],
            [['id_tipo_organizacion'], 'exist', 'skipOnError' => true, 'targetClass' => TipoOrganizacion::className(), 'targetAttribute' => ['id_tipo_organizacion' => 'id_tipo_organizacion']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'nombre' => Yii::t('app', 'Nombre'),
            'telefono' => Yii::t('app', 'Telefono'),
            'email' => Yii::t('app', 'Correo'),
            'referencia_vinculacion_inst' => Yii::t('app', 'Referencia Vinculacion Instutición'),
            'id_pext' => Yii::t('app', 'Id Pext'),
            'id_tipo_organizacion' => Yii::t('app', 'Tipo Organizacion'),
            'id_organizacion' => Yii::t('app', 'Id Organizacion'),
            'id_localidad' => Yii::t('app', 'Localidad'),
            'id_pais' => Yii::t('app', 'Pais'),
            'id_provincia' => Yii::t('app', 'Provincia'),
            'domicilio' => Yii::t('app', 'Domicilio'),
            'aval' => Yii::t('app', 'Aval'),
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

    /**
     * Gets query for [[TipoOrganizacion]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTipoOrganizacion()
    {
        return $this->hasOne(TipoOrganizacion::className(), ['id_tipo_organizacion' => 'id_tipo_organizacion']);
    }
}
