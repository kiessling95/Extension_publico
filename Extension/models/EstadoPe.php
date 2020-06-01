<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "estado_pe".
 *
 * @property string $id_estado
 * @property string|null $descripcion
 *
 * @property Pextension[] $pextensions
 */
class EstadoPe extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'estado_pe';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_estado'], 'required'],
            [['id_estado'], 'string', 'max' => 4],
            [['descripcion'], 'string', 'max' => 30],
            [['id_estado'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_estado' => Yii::t('app', 'Id Estado'),
            'descripcion' => Yii::t('app', 'Descripcion'),
        ];
    }

    /**
     * Gets query for [[Pextensions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPextensions()
    {
        return $this->hasMany(Pextension::className(), ['id_estado' => 'id_estado']);
    }
}
