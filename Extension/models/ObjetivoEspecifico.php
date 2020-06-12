<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "objetivo_especifico".
 *
 * @property int $id_objetivo
 * @property string|null $descripcion
 * @property int|null $id_pext
 * @property string|null $meta
 * @property float|null $ponderacion
 *
 * @property Avance[] $avances
 * @property Pextension $pext
 * @property PlanActividades[] $planActividades
 */
class ObjetivoEspecifico extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'objetivo_especifico';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descripcion', 'meta'], 'string'],
            [['id_pext'], 'default', 'value' => null],
            [['id_pext'], 'integer'],
            [['ponderacion'], 'number'],
            [['id_pext'], 'exist', 'skipOnError' => true, 'targetClass' => Pextension::className(), 'targetAttribute' => ['id_pext' => 'id_pext']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_objetivo' => Yii::t('app', 'Objetivo'),
            'descripcion' => Yii::t('app', 'Descripcion'),
            'id_pext' => Yii::t('app', 'Proyecto'),
            'meta' => Yii::t('app', 'Meta'),
            'ponderacion' => Yii::t('app', 'Ponderacion'),
        ];
    }

    /**
     * Gets query for [[Avances]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAvances()
    {
        return $this->hasMany(Avance::className(), ['id_obj_esp' => 'id_objetivo']);
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
     * Gets query for [[PlanActividades]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlanActividades()
    {
        return $this->hasMany(PlanActividades::className(), ['id_obj_especifico' => 'id_objetivo']);
    }
}
