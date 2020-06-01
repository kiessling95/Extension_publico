<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipos_ejes_tematicos".
 *
 * @property int $id_eje
 * @property string|null $descripcion
 *
 * @property EjeTematicoConv[] $ejeTematicoConvs
 * @property BasesConvocatoria[] $bases
 */
class TiposEjesTematicos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tipos_ejes_tematicos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descripcion'], 'string'],
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
        ];
    }

    /**
     * Gets query for [[EjeTematicoConvs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEjeTematicoConvs()
    {
        return $this->hasMany(EjeTematicoConv::className(), ['id_eje' => 'id_eje']);
    }

    /**
     * Gets query for [[Bases]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBases()
    {
        return $this->hasMany(BasesConvocatoria::className(), ['id_bases' => 'id_bases'])->viaTable('eje_tematico_conv', ['id_eje' => 'id_eje']);
    }
}
