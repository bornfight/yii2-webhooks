<?php

namespace degordian\webhooks\components\formatter;

use yii\i18n\Formatter;

class JsonPrettyFormatter extends Formatter
{
    public function asPrettyjson($value)
    {
        return "<pre>" . str_replace("\n", "<br>", json_encode(json_decode($value), JSON_PRETTY_PRINT)) . "</pre>";
    }
}
