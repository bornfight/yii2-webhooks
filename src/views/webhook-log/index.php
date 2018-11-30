<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel degordian\webhooks\models\WebhookLogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Webhook Logs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="webhook-log-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            'log_time:datetime',
            [
                    'attribute' => 'response_status_code',
                'content' => function($model) {
                    if($model->response_status_code === 200) {
                        return '<span class="label label-success">'.$model->response_status_code.'</span>';
                    }
                    return '<span class="label label-danger">'.$model->response_status_code.'</span>';
                }
            ],
            'webhook_event',
            'webhook_method',
            'webhook_url:url',
            [
                'class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'view' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                            'title' => Yii::t('app', 'lead-view'),
                        ]);
                    },

                    'update' => function ($url, $model) {
                        return '';
                    },
                    'delete' => function ($url, $model) {
                        return '';
                    },
                ]

            ],
        ],
    ]); ?>
</div>
