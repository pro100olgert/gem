<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Gem;

/**
 * GemSearch represents the model behind the search form about `app\models\Gem`.
 */
class GemSearch extends Gem
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'color', 'traits_color', 'hardness', 'shine'], 'integer'],
            [['name', 'formula', 'transparency', 'cleavage', 'cleavage_way', 'structure_type', 'separate_state', 'bend', 'shape', 'satellites', 'formation', 'description', 'link', 'image_name'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Gem::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'color' => $this->color,
            'traits_color' => $this->traits_color,
            'hardness' => $this->hardness,
            'shine' => $this->shine,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'formula', $this->formula])
            ->andFilterWhere(['like', 'transparency', $this->transparency])
            ->andFilterWhere(['like', 'cleavage', $this->cleavage])
            ->andFilterWhere(['like', 'cleavage_way', $this->cleavage_way])
            ->andFilterWhere(['like', 'structure_type', $this->structure_type])
            ->andFilterWhere(['like', 'separate_state', $this->separate_state])
            ->andFilterWhere(['like', 'bend', $this->bend])
            ->andFilterWhere(['like', 'shape', $this->shape])
            ->andFilterWhere(['like', 'satellites', $this->satellites])
            ->andFilterWhere(['like', 'formation', $this->formation])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'link', $this->link])
            ->andFilterWhere(['like', 'image_name', $this->image_name]);

        return $dataProvider;
    }
}
