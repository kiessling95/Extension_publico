<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PlanActividades;

/**
 * PlanActividadesSearch represents the model behind the search form of `app\models\PlanActividades`.
 */
class PlanActividadesSearch extends PlanActividades
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_plan', 'id_rubro_extension', 'id_obj_especifico', 'anio', 'destinatarios'], 'integer'],
            [['detalle', 'fecha', 'localizacion', 'meta'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = PlanActividades::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_plan' => $this->id_plan,
            'id_rubro_extension' => $this->id_rubro_extension,
            'id_obj_especifico' => $this->id_obj_especifico,
            'anio' => $this->anio,
            'destinatarios' => $this->destinatarios,
        ]);

        $query->andFilterWhere(['ilike', 'detalle', $this->detalle])
            ->andFilterWhere(['ilike', 'fecha', $this->fecha])
            ->andFilterWhere(['ilike', 'localizacion', $this->localizacion])
            ->andFilterWhere(['ilike', 'meta', $this->meta]);

        return $dataProvider;
    }
}
