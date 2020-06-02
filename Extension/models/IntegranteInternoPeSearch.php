<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\IntegranteInternoPe;

/**
 * IntegranteInternoPeSearch represents the model behind the search form of `app\models\IntegranteInternoPe`.
 */
class IntegranteInternoPeSearch extends IntegranteInternoPe
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_designacion', 'id_pext', 'carga_horaria', 'ad_honorem'], 'integer'],
            [['funcion_p', 'ua', 'rescd', 'tipo', 'desde', 'hasta', 'cv'], 'safe'],
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
        $query = IntegranteInternoPe::find();

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
            'id_designacion' => $this->id_designacion,
            'id_pext' => $this->id_pext,
            'carga_horaria' => $this->carga_horaria,
            'ad_honorem' => $this->ad_honorem,
            'desde' => $this->desde,
            'hasta' => $this->hasta,
        ]);

        $query->andFilterWhere(['ilike', 'funcion_p', $this->funcion_p])
            ->andFilterWhere(['ilike', 'ua', $this->ua])
            ->andFilterWhere(['ilike', 'rescd', $this->rescd])
            ->andFilterWhere(['ilike', 'tipo', $this->tipo])
            ->andFilterWhere(['ilike', 'cv', $this->cv]);

        return $dataProvider;
    }
}
