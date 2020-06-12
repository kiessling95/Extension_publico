<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "avance".
 *
 * @property int $id_avance
 * @property int $id_obj_esp
 * @property string|null $fecha
 * @property string|null $descripcion
 * @property string|null $link
 * @property string|null $titulo_actividad
 * @property int|null $ponderacion
 *
 * @property ObjetivoEspecifico $objEsp
 */
class Avance extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'avance';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_obj_esp'], 'required'],
            [['id_obj_esp', 'ponderacion'], 'default', 'value' => null],
            [['id_obj_esp', 'ponderacion'], 'integer'],
            [['fecha'], 'safe'],
            [['descripcion', 'link', 'titulo_actividad'], 'string'],
            [['id_obj_esp'], 'exist', 'skipOnError' => true, 'targetClass' => ObjetivoEspecifico::className(), 'targetAttribute' => ['id_obj_esp' => 'id_objetivo']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_avance' => Yii::t('app', 'Id Avance'),
            'id_obj_esp' => Yii::t('app', 'Id Obj Esp'),
            'fecha' => Yii::t('app', 'Fecha Realización'),
            'descripcion' => Yii::t('app', 'Descripción'),
            'link' => Yii::t('app', 'Link Multimedia'),
            'titulo_actividad' => Yii::t('app', 'Titulo Actividad'),
            'ponderacion' => Yii::t('app', 'Ponderación'),
        ];
    }

    /**
     * Gets query for [[ObjEsp]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getObjEsp()
    {
        return $this->hasOne(ObjetivoEspecifico::className(), ['id_objetivo' => 'id_obj_esp']);
    }
}
