<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "eje_tematico_conv".
 *
 * @property int $id_eje
 * @property string|null $descripcion
 * @property int $id_bases
 *
 * @property BasesConvocatoria $bases
 * @property TiposEjesTematicos $eje
 */
class EjeTematicoConv extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'eje_tematico_conv';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_eje', 'id_bases'], 'required'],
            [['id_eje', 'id_bases'], 'default', 'value' => null],
            [['id_eje', 'id_bases'], 'integer'],
            [['descripcion'], 'string'],
            [['id_eje', 'id_bases'], 'unique', 'targetAttribute' => ['id_eje', 'id_bases']],
            [['id_bases'], 'exist', 'skipOnError' => true, 'targetClass' => BasesConvocatoria::className(), 'targetAttribute' => ['id_bases' => 'id_bases']],
            [['id_eje'], 'exist', 'skipOnError' => true, 'targetClass' => TiposEjesTematicos::className(), 'targetAttribute' => ['id_eje' => 'id_eje']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_eje' => Yii::t('app', 'Id Eje'),
            'descripcion' => Yii::t('app', 'Descripcion'),
            'id_bases' => Yii::t('app', 'Id Bases'),
        ];
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
     * Gets query for [[Eje]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEje()
    {
        return $this->hasOne(TiposEjesTematicos::className(), ['id_eje' => 'id_eje']);
    }
}
