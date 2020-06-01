<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ObjetivoEspecifico;

/**
 * ObjetivoEspecificoSearch represents the model behind the search form of `app\models\ObjetivoEspecifico`.
 */
class ObjetivoEspecificoSearch extends ObjetivoEspecifico
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_objetivo', 'id_pext'], 'integer'],
            [['descripcion', 'meta'], 'safe'],
            [['ponderacion'], 'number'],
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
        $query = ObjetivoEspecifico::find();

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
            'id_objetivo' => $this->id_objetivo,
            'id_pext' => $this->id_pext,
            'ponderacion' => $this->ponderacion,
        ]);

        $query->andFilterWhere(['ilike', 'descripcion', $this->descripcion])
            ->andFilterWhere(['ilike', 'meta', $this->meta]);

        return $dataProvider;
    }
}
