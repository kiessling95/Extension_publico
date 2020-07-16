<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\BasesConvocatoria;

/**
 * BasesConvocatoriaSearch represents the model behind the search form of `app\models\BasesConvocatoria`.
 */
class BasesConvocatoriaSearch extends BasesConvocatoria
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_bases', 'duracion_convocatoria', 'eje_tematico'], 'integer'],
            [['convocatoria', 'objetivo', 'destinatarios', 'integrantes', 'monto', 'duracion', 'fecha', 'evaluacion', 'adjudicacion', 'consulta', 'bases_titulo', 'ordenanza', 'tipo_convocatoria', 'fecha_desde', 'fecha_hasta', 'eje_tematico_txt'], 'safe'],
            [['monto_max'], 'number'],
            [['tiene_monto'], 'boolean'],
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
        $query = BasesConvocatoria::find();

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
            'id_bases' => $this->id_bases,
            'fecha_desde' => $this->fecha_desde,
            'fecha_hasta' => $this->fecha_hasta,
            'duracion_convocatoria' => $this->duracion_convocatoria,
            'eje_tematico' => $this->eje_tematico,
            'monto_max' => $this->monto_max,
            'tiene_monto' => $this->tiene_monto,
        ]);

        $query->andFilterWhere(['ilike', 'convocatoria', $this->convocatoria])
            ->andFilterWhere(['ilike', 'objetivo', $this->objetivo])
            ->andFilterWhere(['ilike', 'destinatarios', $this->destinatarios])
            ->andFilterWhere(['ilike', 'integrantes', $this->integrantes])
            ->andFilterWhere(['ilike', 'monto', $this->monto])
            ->andFilterWhere(['ilike', 'duracion', $this->duracion])
            ->andFilterWhere(['ilike', 'fecha', $this->fecha])
            ->andFilterWhere(['ilike', 'evaluacion', $this->evaluacion])
            ->andFilterWhere(['ilike', 'adjudicacion', $this->adjudicacion])
            ->andFilterWhere(['ilike', 'consulta', $this->consulta])
            ->andFilterWhere(['ilike', 'bases_titulo', $this->bases_titulo])
            ->andFilterWhere(['ilike', 'ordenanza', $this->ordenanza])
            ->andFilterWhere(['ilike', 'tipo_convocatoria', $this->tipo_convocatoria])
            ->andFilterWhere(['ilike', 'eje_tematico_txt', $this->eje_tematico_txt]);

        return $dataProvider;
    }
}
