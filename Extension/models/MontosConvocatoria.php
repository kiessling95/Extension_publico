<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "montos_convocatoria".
 *
 * @property int $id_bases
 * @property float|null $monto_max
 * @property int $id_rubro_extension
 *
 * @property BasesConvocatoria $bases
 * @property RubroPresupExtension $rubroExtension
 */
class MontosConvocatoria extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'montos_convocatoria';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_bases', 'id_rubro_extension'], 'required'],
            [['id_bases', 'id_rubro_extension'], 'default', 'value' => null],
            [['id_bases', 'id_rubro_extension'], 'integer'],
            [['monto_max'], 'number'],
            [['id_bases', 'id_rubro_extension'], 'unique', 'targetAttribute' => ['id_bases', 'id_rubro_extension']],
            [['id_bases'], 'exist', 'skipOnError' => true, 'targetClass' => BasesConvocatoria::className(), 'targetAttribute' => ['id_bases' => 'id_bases']],
            [['id_rubro_extension'], 'exist', 'skipOnError' => true, 'targetClass' => RubroPresupExtension::className(), 'targetAttribute' => ['id_rubro_extension' => 'id_rubro_extension']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_bases' => Yii::t('app', 'Id Bases'),
            'monto_max' => Yii::t('app', 'Monto Max'),
            'id_rubro_extension' => Yii::t('app', 'Id Rubro Extension'),
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
     * Gets query for [[RubroExtension]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRubroExtension()
    {
        return $this->hasOne(RubroPresupExtension::className(), ['id_rubro_extension' => 'id_rubro_extension']);
    }
}
