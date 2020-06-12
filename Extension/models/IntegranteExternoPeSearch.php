<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\IntegranteExternoPe;

/**
 * IntegranteExternoPeSearch represents the model behind the search form of `app\models\IntegranteExternoPe`.
 */
class IntegranteExternoPeSearch extends IntegranteExternoPe
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tipo_docum', 'funcion_p', 'desde', 'hasta', 'rescd', 'tipo', 'cv'], 'safe'],
            [['nro_docum', 'id_pext', 'carga_horaria', 'ad_honorem'], 'integer'],
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
        $query = IntegranteExternoPe::find();

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
            'nro_docum' => $this->nro_docum,
            'id_pext' => $this->id_pext,
            'carga_horaria' => $this->carga_horaria,
            'desde' => $this->desde,
            'hasta' => $this->hasta,
            'ad_honorem' => $this->ad_honorem,
        ]);

        $query->andFilterWhere(['ilike', 'tipo_docum', $this->tipo_docum])
            ->andFilterWhere(['ilike', 'funcion_p', $this->funcion_p])
            ->andFilterWhere(['ilike', 'rescd', $this->rescd])
            ->andFilterWhere(['ilike', 'tipo', $this->tipo])
            ->andFilterWhere(['ilike', 'cv', $this->cv]);

        return $dataProvider;
    }
    
    public function searchResumen($param) {
        $query = IntegranteExternoPeSearch::find();
        $resultado=$query->asArray()->all();
        return $resultado;
    }
}
