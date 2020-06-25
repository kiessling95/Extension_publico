<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Avance;

/**
 * AvanceSearch represents the model behind the search form of `app\models\Avance`.
 */
class AvanceSearch extends Avance
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_avance', 'id_obj_esp', 'ponderacion', 'id_pext'], 'integer'],
            [['fecha', 'descripcion', 'link', 'titulo_actividad'], 'safe'],
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
        $query = Avance::find();

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
            'id_avance' => $this->id_avance,
            'id_obj_esp' => $this->id_obj_esp,
            'fecha' => $this->fecha,
            'ponderacion' => $this->ponderacion,
            'id_pext' => $this->id_pext,
        ]);

        $query->andFilterWhere(['ilike', 'descripcion', $this->descripcion])
            ->andFilterWhere(['ilike', 'link', $this->link])
            ->andFilterWhere(['ilike', 'titulo_actividad', $this->titulo_actividad]);

        return $dataProvider;
    }
}
