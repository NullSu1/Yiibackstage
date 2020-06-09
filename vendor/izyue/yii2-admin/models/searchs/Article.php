<?php

namespace izyue\admin\models\searchs;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use izyue\admin\models\Article as ArticleModel;

/**
 * Article represents the model behind the search form of `izyue\admin\models\Article`.
 */
class Article extends ArticleModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['user', 'article_title', 'content', 'created_at', 'updated_at'], 'safe'],
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
    public function search($params,$type = true)
    {
        $query = ArticleModel::find();

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
            'id' => $this->id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
//            'author' => 'admin',
        ]);

        

        $query->andFilterWhere(['like', 'user', $this->user])
            ->andFilterWhere(['like', 'article_title', $this->article_title])
            ->andFilterWhere(['like', 'content', $this->content]);

        if($type){
            $query->andFilterWhere(['softdelete'=>1]);
        }else{
            $query->andFilterWhere(['softdelete'=>0]);
        }

        return $dataProvider;
    }
}
