<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Solicitud;

/**
 * SolicitudSearch represents the model behind the search form of `app\models\Solicitud`.
 */
class SolicitudSearch extends Solicitud
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pext', 'recibido'], 'integer'],
            [['tipo_solicitud', 'motivo', 'fecha_solicitud', 'estado_solicitud', 'fecha_recepcion', 'nro_acta', 'obs_resolucion', 'fecha_fin_prorroga'], 'safe'],
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
        $query = Solicitud::find();

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
            'id_pext' => $this->id_pext,
            'fecha_solicitud' => $this->fecha_solicitud,
            'recibido' => $this->recibido,
            'fecha_recepcion' => $this->fecha_recepcion,
            'fecha_fin_prorroga' => $this->fecha_fin_prorroga,
        ]);

        $query->andFilterWhere(['ilike', 'tipo_solicitud', $this->tipo_solicitud])
            ->andFilterWhere(['ilike', 'motivo', $this->motivo])
            ->andFilterWhere(['ilike', 'estado_solicitud', $this->estado_solicitud])
            ->andFilterWhere(['ilike', 'nro_acta', $this->nro_acta])
            ->andFilterWhere(['ilike', 'obs_resolucion', $this->obs_resolucion]);

        return $dataProvider;
    }
}
