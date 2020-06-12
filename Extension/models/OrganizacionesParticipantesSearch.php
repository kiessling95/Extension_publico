<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\OrganizacionesParticipantes;

/**
 * OrganizacionesParticipantesSearch represents the model behind the search form of `app\models\OrganizacionesParticipantes`.
 */
class OrganizacionesParticipantesSearch extends OrganizacionesParticipantes
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'telefono', 'email', 'referencia_vinculacion_inst', 'id_pais', 'domicilio', 'aval'], 'safe'],
            [['id_pext', 'id_tipo_organizacion', 'id_organizacion', 'id_localidad', 'id_provincia'], 'integer'],
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
        $query = OrganizacionesParticipantes::find();

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
            'id_tipo_organizacion' => $this->id_tipo_organizacion,
            'id_organizacion' => $this->id_organizacion,
            'id_localidad' => $this->id_localidad,
            'id_provincia' => $this->id_provincia,
        ]);

        $query->andFilterWhere(['ilike', 'nombre', $this->nombre])
            ->andFilterWhere(['ilike', 'telefono', $this->telefono])
            ->andFilterWhere(['ilike', 'email', $this->email])
            ->andFilterWhere(['ilike', 'referencia_vinculacion_inst', $this->referencia_vinculacion_inst])
            ->andFilterWhere(['ilike', 'id_pais', $this->id_pais])
            ->andFilterWhere(['ilike', 'domicilio', $this->domicilio])
            ->andFilterWhere(['ilike', 'aval', $this->aval]);

        return $dataProvider;
    }
    
    public function searchResumen($param) {
        $query = OrganizacionesParticipantesSearch::find();
        $resultado=$query->asArray()->all();
        return $resultado;
    }
}
