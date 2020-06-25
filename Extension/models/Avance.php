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
 * @property int $id_pext
 *
 * @property ObjetivoEspecifico $objEsp
 * @property Pextension $pext
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
            [['id_obj_esp', 'id_pext'], 'required'],
            [['id_obj_esp', 'ponderacion', 'id_pext'], 'default', 'value' => null],
            [['id_obj_esp', 'ponderacion', 'id_pext'], 'integer'],
            [['fecha'], 'safe'],
            [['descripcion', 'link', 'titulo_actividad'], 'string'],
            [['id_obj_esp'], 'exist', 'skipOnError' => true, 'targetClass' => ObjetivoEspecifico::className(), 'targetAttribute' => ['id_obj_esp' => 'id_objetivo']],
            [['id_pext'], 'exist', 'skipOnError' => true, 'targetClass' => Pextension::className(), 'targetAttribute' => ['id_pext' => 'id_pext']],
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
            'fecha' => Yii::t('app', 'Fecha'),
            'descripcion' => Yii::t('app', 'Descripcion'),
            'link' => Yii::t('app', 'Link'),
            'titulo_actividad' => Yii::t('app', 'Titulo Actividad'),
            'ponderacion' => Yii::t('app', 'Ponderacion'),
            'id_pext' => Yii::t('app', 'Id Pext'),
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
