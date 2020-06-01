<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipo_convocatoria".
 *
 * @property string $id_conv
 * @property string|null $descripcion
 *
 * @property BasesConvocatoria[] $basesConvocatorias
 */
class TipoConvocatoria extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tipo_convocatoria';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_conv'], 'required'],
            [['id_conv'], 'string', 'max' => 1],
            [['descripcion'], 'string', 'max' => 50],
            [['id_conv'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_conv' => Yii::t('app', 'Id Conv'),
            'descripcion' => Yii::t('app', 'Descripcion'),
        ];
    }

    /**
     * Gets query for [[BasesConvocatorias]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBasesConvocatorias()
    {
        return $this->hasMany(BasesConvocatoria::className(), ['tipo_convocatoria' => 'id_conv']);
    }
}
