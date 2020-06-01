<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Destinatarios;

/**
 * DestinatariosSearch represents the model behind the search form of `app\models\Destinatarios`.
 */
class DestinatariosSearch extends Destinatarios
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_destinatario', 'id_pext', 'id_localidad', 'id_provincia', 'cantidad'], 'integer'],
            [['domicilio', 'telefono', 'email', 'contacto', 'descripcion', 'id_pais'], 'safe'],
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
        $query = Destinatarios::find();

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
            'id_destinatario' => $this->id_destinatario,
            'id_pext' => $this->id_pext,
            'id_localidad' => $this->id_localidad,
            'id_provincia' => $this->id_provincia,
            'cantidad' => $this->cantidad,
        ]);

        $query->andFilterWhere(['ilike', 'domicilio', $this->domicilio])
            ->andFilterWhere(['ilike', 'telefono', $this->telefono])
            ->andFilterWhere(['ilike', 'email', $this->email])
            ->andFilterWhere(['ilike', 'contacto', $this->contacto])
            ->andFilterWhere(['ilike', 'descripcion', $this->descripcion])
            ->andFilterWhere(['ilike', 'id_pais', $this->id_pais]);

        return $dataProvider;
    }
}
