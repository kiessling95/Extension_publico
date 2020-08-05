<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "area".
 *
 * @property int $idarea
 * @property int $iddepto
 * @property string $descripcion
 *
 * @property Departamento $iddepto0
 * @property Orientacion[] $orientacions
 */
class Area extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'area';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db2');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['iddepto'], 'required'],
            [['iddepto'], 'default', 'value' => null],
            [['iddepto'], 'integer'],
            [['descripcion'], 'string'],
            [['iddepto'], 'exist', 'skipOnError' => true, 'targetClass' => Departamento::className(), 'targetAttribute' => ['iddepto' => 'iddepto']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idarea' => Yii::t('app', 'Idarea'),
            'iddepto' => Yii::t('app', 'Iddepto'),
            'descripcion' => Yii::t('app', 'Descripcion'),
        ];
    }

    /**
     * Gets query for [[Iddepto0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIddepto0()
    {
        return $this->hasOne(Departamento::className(), ['iddepto' => 'iddepto']);
    }

    /**
     * Gets query for [[Orientacions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrientacions()
    {
        return $this->hasMany(Orientacion::className(), ['idarea' => 'idarea']);
    }
}
