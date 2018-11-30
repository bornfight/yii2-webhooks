<?php
/**
 * Created by PhpStorm.
 * User: rudolfjurisic
 * Date: 2018-11-28
 * Time: 10:52
 */

namespace degordian\webhooks\components\logger;

use degordian\webhooks\models\Webhook;
use degordian\webhooks\models\WebhookLog;
use yii\base\Component;
use yii\helpers\Json;
use yii\httpclient\Request;
use yii\httpclient\Response;

class Logger extends Component
{
    public static function log(Webhook $webhook, Request $request, Response $response)
    {
        $model = new WebhookLog([
            'log_time' => time(),
            'webhook_method' => $webhook->method,
            'webhook_url' => $webhook->url,
            'webhook_event' => $webhook->event,
            'request_headers' => Json::encode($request->headers),
            'request_payload' => Json::encode($request->data),
            'response_headers' => Json::encode($response->headers),
            'response_status_code' => $response->statusCode
        ]);

        $model->save(false);
    }
}
