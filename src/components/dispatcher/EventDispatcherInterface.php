<?php

namespace degordian\webhooks\components\dispatcher;

use degordian\webhooks\models\Webhook;
use yii\base\Event;

interface EventDispatcherInterface
{
    public function dispatch(Event $event, Webhook $webhook);
}
