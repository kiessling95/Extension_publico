<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipo_organizacion".
 *
 * @property string|null $descripcion
 * @property int $id_tipo_organizacion
 * @property string|null $otra_descripcion
 *
 * @property OrganizacionesParticipantes[] $organizacionesParticipantes
 */
class TipoOrganizacion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tipo_organizacion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descripcion', 'otra_descripcion'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'descripcion' => Yii::t('app', 'Descripcion'),
            'id_tipo_organizacion' => Yii::t('app', 'Id Tipo Organizacion'),
            'otra_descripcion' => Yii::t('app', 'Otra Descripcion'),
        ];
    }

    /**
     * Gets query for [[OrganizacionesParticipantes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrganizacionesParticipantes()
    {
        return $this->hasMany(OrganizacionesParticipantes::className(), ['id_tipo_organizacion' => 'id_tipo_organizacion']);
    }
}
