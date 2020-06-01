<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "integrante_interno_pe".
 *
 * @property int $id_designacion
 * @property int $id_pext
 * @property string|null $funcion_p
 * @property int|null $carga_horaria
 * @property string|null $ua
 * @property string|null $rescd
 * @property int|null $ad_honorem
 * @property string|null $tipo
 * @property string $desde
 * @property string|null $hasta
 * @property resource|null $cv
 *
 * @property FuncionExtension $funcionP
 * @property Pextension $pext
 */
class IntegranteInternoPe extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'integrante_interno_pe';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_designacion', 'id_pext', 'desde'], 'required'],
            [['id_designacion', 'id_pext', 'carga_horaria', 'ad_honorem'], 'default', 'value' => null],
            [['id_designacion', 'id_pext', 'carga_horaria', 'ad_honorem'], 'integer'],
            [['tipo', 'cv'], 'string'],
            [['desde', 'hasta'], 'safe'],
            [['funcion_p', 'ua'], 'string', 'max' => 5],
            [['rescd'], 'string', 'max' => 15],
            [['id_designacion', 'id_pext', 'desde'], 'unique', 'targetAttribute' => ['id_designacion', 'id_pext', 'desde']],
            [['funcion_p'], 'exist', 'skipOnError' => true, 'targetClass' => FuncionExtension::className(), 'targetAttribute' => ['funcion_p' => 'id_extension']],
            [['id_pext'], 'exist', 'skipOnError' => true, 'targetClass' => Pextension::className(), 'targetAttribute' => ['id_pext' => 'id_pext']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_designacion' => Yii::t('app', 'Id Designacion'),
            'id_pext' => Yii::t('app', 'Id Pext'),
            'funcion_p' => Yii::t('app', 'Funcion P'),
            'carga_horaria' => Yii::t('app', 'Carga Horaria'),
            'ua' => Yii::t('app', 'Ua'),
            'rescd' => Yii::t('app', 'Rescd'),
            'ad_honorem' => Yii::t('app', 'Ad Honorem'),
            'tipo' => Yii::t('app', 'Tipo'),
            'desde' => Yii::t('app', 'Desde'),
            'hasta' => Yii::t('app', 'Hasta'),
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
     * Gets query for [[Pext]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPext()
    {
        return $this->hasOne(Pextension::className(), ['id_pext' => 'id_pext']);
    }
}
