<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Json;

/* @var $this yii\web\View */
/* @var $model degordian\webhooks\models\WebhookLog */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Webhook Logs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="webhook-log-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'log_time:datetime',
            'webhook_event',
            'webhook_method',
            'webhook_url:url',
            'request_headers:prettyjson',
            'request_payload:prettyjson',
            'response_headers:prettyjson',
            'response_status_code',
        ],
    ]) ?>

</div>
