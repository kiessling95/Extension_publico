<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "funcion_extension".
 *
 * @property string $id_extension
 * @property string|null $descripcion
 *
 * @property IntegranteExternoPe[] $integranteExternoPes
 * @property IntegranteInternoPe[] $integranteInternoPes
 */
class FuncionExtension extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'funcion_extension';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_extension'], 'required'],
            [['id_extension'], 'string', 'max' => 5],
            [['descripcion'], 'string', 'max' => 70],
            [['id_extension'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_extension' => Yii::t('app', 'Id Extension'),
            'descripcion' => Yii::t('app', 'Descripcion'),
        ];
    }

    /**
     * Gets query for [[IntegranteExternoPes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIntegranteExternoPes()
    {
        return $this->hasMany(IntegranteExternoPe::className(), ['funcion_p' => 'id_extension']);
    }

    /**
     * Gets query for [[IntegranteInternoPes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIntegranteInternoPes()
    {
        return $this->hasMany(IntegranteInternoPe::className(), ['funcion_p' => 'id_extension']);
    }
}
