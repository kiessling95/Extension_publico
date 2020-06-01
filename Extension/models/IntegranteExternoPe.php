<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "integrante_externo_pe".
 *
 * @property string $tipo_docum
 * @property int $nro_docum
 * @property int $id_pext
 * @property string|null $funcion_p
 * @property int|null $carga_horaria
 * @property string $desde
 * @property string|null $hasta
 * @property string|null $rescd
 * @property int|null $ad_honorem
 * @property string|null $tipo
 * @property resource|null $cv
 *
 * @property FuncionExtension $funcionP
 * @property Persona $tipoDocum
 * @property Pextension $pext
 * @property SeguimientoUa[] $seguimientoUas
 */
class IntegranteExternoPe extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'integrante_externo_pe';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tipo_docum', 'nro_docum', 'id_pext', 'desde'], 'required'],
            [['nro_docum', 'id_pext', 'carga_horaria', 'ad_honorem'], 'default', 'value' => null],
            [['nro_docum', 'id_pext', 'carga_horaria', 'ad_honorem'], 'integer'],
            [['desde', 'hasta'], 'safe'],
            [['tipo', 'cv'], 'string'],
            [['tipo_docum'], 'string', 'max' => 4],
            [['funcion_p'], 'string', 'max' => 5],
            [['rescd'], 'string', 'max' => 15],
            [['tipo_docum', 'nro_docum', 'id_pext', 'desde'], 'unique', 'targetAttribute' => ['tipo_docum', 'nro_docum', 'id_pext', 'desde']],
            [['funcion_p'], 'exist', 'skipOnError' => true, 'targetClass' => FuncionExtension::className(), 'targetAttribute' => ['funcion_p' => 'id_extension']],
            [['tipo_docum', 'nro_docum'], 'exist', 'skipOnError' => true, 'targetClass' => Persona::className(), 'targetAttribute' => ['tipo_docum' => 'tipo_docum', 'nro_docum' => 'nro_docum']],
            [['id_pext'], 'exist', 'skipOnError' => true, 'targetClass' => Pextension::className(), 'targetAttribute' => ['id_pext' => 'id_pext']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'tipo_docum' => Yii::t('app', 'Tipo Docum'),
            'nro_docum' => Yii::t('app', 'Nro Docum'),
            'id_pext' => Yii::t('app', 'Id Pext'),
            'funcion_p' => Yii::t('app', 'Funcion P'),
            'carga_horaria' => Yii::t('app', 'Carga Horaria'),
            'desde' => Yii::t('app', 'Desde'),
            'hasta' => Yii::t('app', 'Hasta'),
            'rescd' => Yii::t('app', 'Rescd'),
            'ad_honorem' => Yii::t('app', 'Ad Honorem'),
            'tipo' => Yii::t('app', 'Tipo'),
            'cv' => Yii::t('app', 'Cv'),
        ];
    }

    /**
     * Gets query for [[FuncionP]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFuncionP()
    {
        return $this->hasOne(FuncionExtension::className(), ['id_extension' => 'funcion_p']);
    }

    /**
     * Gets query for [[TipoDocum]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTipoDocum()
    {
        return $this->hasOne(Persona::className(), ['tipo_docum' => 'tipo_docum', 'nro_docum' => 'nro_docum']);
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
     * Gets query for [[SeguimientoUas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSeguimientoUas()
    {
        return $this->hasMany(SeguimientoUa::className(), ['id_pext' => 'id_pext', 'tipo_docum' => 'tipo_docum', 'nro_docum' => 'nro_docum', 'desde' => 'desde']);
    }
}
