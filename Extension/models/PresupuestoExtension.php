<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "presupuesto_extension".
 *
 * @property int $id_presupuesto
 * @property int $id_pext
 * @property int $id_rubro_extension
 * @property string|null $concepto
 * @property int|null $cantidad
 * @property float|null $monto
 *
 * @property Pextension $pext
 * @property RubroPresupExtension $rubroExtension
 */
class PresupuestoExtension extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'presupuesto_extension';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pext', 'id_rubro_extension'], 'required'],
            [['id_pext', 'id_rubro_extension', 'cantidad'], 'default', 'value' => null],
            [['id_pext', 'id_rubro_extension', 'cantidad'], 'integer'],
            [['concepto'], 'string'],
            [['monto'], 'number'],
            [['id_pext'], 'exist', 'skipOnError' => true, 'targetClass' => Pextension::className(), 'targetAttribute' => ['id_pext' => 'id_pext']],
            [['id_rubro_extension'], 'exist', 'skipOnError' => true, 'targetClass' => RubroPresupExtension::className(), 'targetAttribute' => ['id_rubro_extension' => 'id_rubro_extension']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_presupuesto' => Yii::t('app', 'Presupuesto'),
            'id_pext' => Yii::t('app', 'Id Pext'),
            'id_rubro_extension' => Yii::t('app', 'Rubro'),
            'concepto' => Yii::t('app', 'Concepto'),
            'cantidad' => Yii::t('app', 'Cantidad'),
            'monto' => Yii::t('app', 'Monto'),
        ];
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
     * Gets query for [[RubroExtension]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRubroExtension()
    {
        return $this->hasOne(RubroPresupExtension::className(), ['id_rubro_extension' => 'id_rubro_extension']);
    }
}
