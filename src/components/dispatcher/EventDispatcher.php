<?php

namespace degordian\webhooks\components\dispatcher;

use degordian\webhooks\components\logger\Logger;
use degordian\webhooks\models\Webhook;
use yii\base\Component;
use yii\base\Event;
use yii\httpclient\Client;

class EventDispatcher extends Component implements EventDispatcherInterface
{
    private $userAgent = 'yii2-webhooks';

    public function dispatch(Event $event, Webhook $webhook)
    {
        $client = new Client();
        $data = $event->sender->attributes;
        try {
            $request = $client->createRequest()
                ->setMethod($webhook->method)
                ->setHeaders([
                    'User-Agent' => $this->userAgent,
                ])
                ->setUrl($webhook->url)
                ->setData($data);
            $response = $request->send();
            Logger::log($webhook, $request, $response);
        } catch (\Exception $e) {
            \Yii::error($e->getMessage());
        }
    }
}
