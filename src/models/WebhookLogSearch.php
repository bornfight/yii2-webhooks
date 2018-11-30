<?php

namespace degordian\webhooks\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use degordian\webhooks\models\WebhookLog;

/**
 * WebhookLogSearch represents the model behind the search form of `degordian\webhooks\models\WebhookLog`.
 */
class WebhookLogSearch extends WebhookLog
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'log_time', 'response_status_code'], 'integer'],
            [['webhook_event', 'webhook_method', 'webhook_url', 'request_headers', 'request_payload', 'response_headers'], 'safe'],
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
        $query = WebhookLog::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC
                ],
            ]
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
            'log_time' => $this->log_time,
            'response_status_code' => $this->response_status_code,
        ]);

        $query->andFilterWhere(['like', 'webhook_event', $this->webhook_event])
            ->andFilterWhere(['like', 'webhook_method', $this->webhook_method])
            ->andFilterWhere(['like', 'webhook_url', $this->webhook_url])
            ->andFilterWhere(['like', 'request_headers', $this->request_headers])
            ->andFilterWhere(['like', 'request_payload', $this->request_payload])
            ->andFilterWhere(['like', 'response_headers', $this->response_headers]);

        return $dataProvider;
    }
}
