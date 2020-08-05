<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "departamento".
 *
 * @property int $iddepto
 * @property string $idunidad_academica
 * @property string $descripcion
 *
 * @property Area[] $areas
 * @property DaoDesigna[] $daoDesignas
 * @property UnidadAcad $idunidadAcademica
 * @property Designacion[] $designacions
 * @property DirectorDpto[] $directorDptos
 * @property Materia[] $materias
 * @property Solicitud[] $solicituds
 */
class Departamento extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'departamento';
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
            [['idunidad_academica'], 'required'],
            [['descripcion'], 'string'],
            [['idunidad_academica'], 'string', 'max' => 5],
            [['idunidad_academica'], 'exist', 'skipOnError' => true, 'targetClass' => UnidadAcad::className(), 'targetAttribute' => ['idunidad_academica' => 'sigla']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'iddepto' => Yii::t('app', 'Iddepto'),
            'idunidad_academica' => Yii::t('app', 'Idunidad Academica'),
            'descripcion' => Yii::t('app', 'Descripcion'),
        ];
    }

    /**
     * Gets query for [[Areas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAreas()
    {
        return $this->hasMany(Area::className(), ['iddepto' => 'iddepto']);
    }

    /**
     * Gets query for [[DaoDesignas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDaoDesignas()
    {
        return $this->hasMany(DaoDesigna::className(), ['id_departamento' => 'iddepto']);
    }

    /**
     * Gets query for [[IdunidadAcademica]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdunidadAcademica()
    {
        return $this->hasOne(UnidadAcad::className(), ['sigla' => 'idunidad_academica']);
    }

    /**
     * Gets query for [[Designacions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDesignacions()
    {
        return $this->hasMany(Designacion::className(), ['id_departamento' => 'iddepto']);
    }

    /**
     * Gets query for [[DirectorDptos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDirectorDptos()
    {
        return $this->hasMany(DirectorDpto::className(), ['iddepto' => 'iddepto']);
    }

    /**
     * Gets query for [[Materias]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMaterias()
    {
        return $this->hasMany(Materia::className(), ['id_departamento' => 'iddepto']);
    }

    /**
     * Gets query for [[Solicituds]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSolicituds()
    {
        return $this->hasMany(Solicitud::className(), ['id_departamento' => 'iddepto']);
    }
}
