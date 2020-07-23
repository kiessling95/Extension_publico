<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pextension;

/**
 * PextensionSearch represents the model behind the search form of `app\models\Pextension`.
 */
class PextensionSearch extends Pextension
{
    public $convocatoria;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pext', 'duracion', 'id_bases', 'eje_tematico', 'ord_priori'], 'integer'],
            [['denominacion', 'uni_acad', 'fec_desde', 'fec_hasta', 'expediente', 'palabras_clave', 'objetivo', 'id_estado', 'descripcion_situacion', 'caracterizacion_poblacion', 'localizacion_geo', 'antecedente_participacion', 'importancia_necesidad', 'responsable_carga', 'departamento', 'area', 'impacto', 'fec_carga','convocatoria'], 'safe'],
            [['financiacion'], 'boolean'],
            [['monto'], 'number'],
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
        $query = Pextension::find()
                ->joinWith("bases");
        

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
            'fec_desde' => $this->fec_desde,
            'fec_hasta' => $this->fec_hasta,
            'duracion' => $this->duracion,
            'financiacion' => $this->financiacion,
            'monto' => $this->monto,
            'id_bases' => $this->id_bases,
            'eje_tematico' => $this->eje_tematico,
            'ord_priori' => $this->ord_priori,
            'fec_carga' => $this->fec_carga,
        ]);

        $query->andFilterWhere(['ilike', 'denominacion', $this->denominacion])
            ->andFilterWhere(['ilike', 'uni_acad', $this->uni_acad])
            ->andFilterWhere(['ilike', 'expediente', $this->expediente])
            ->andFilterWhere(['ilike', 'palabras_clave', $this->palabras_clave])
            ->andFilterWhere(['ilike', 'objetivo', $this->objetivo])
            ->andFilterWhere(['ilike', 'id_estado', $this->id_estado])
            ->andFilterWhere(['ilike', 'descripcion_situacion', $this->descripcion_situacion])
            ->andFilterWhere(['ilike', 'caracterizacion_poblacion', $this->caracterizacion_poblacion])
            ->andFilterWhere(['ilike', 'localizacion_geo', $this->localizacion_geo])
            ->andFilterWhere(['ilike', 'antecedente_participacion', $this->antecedente_participacion])
            ->andFilterWhere(['ilike', 'importancia_necesidad', $this->importancia_necesidad])
            ->andFilterWhere(['ilike', 'responsable_carga', $this->responsable_carga])
            ->andFilterWhere(['ilike', 'departamento', $this->departamento])
            ->andFilterWhere(['ilike', 'area', $this->area])
            ->andFilterWhere(['ilike', 'impacto', $this->impacto])
            ->andFilterWhere(['ilike', 'bases_convocatoria.bases_titulo', $this->convocatoria]);

        return $dataProvider;
    }
    

    
    public function searchResumen($param) {
        $query = PextensionSearch::find();
        $resultado=$query->asArray()->all();
        return $resultado;
    }
}
