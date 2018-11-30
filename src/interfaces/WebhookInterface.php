<?php

namespace degordian\webhooks\interfaces;

interface WebhookInterface
{
    public function getEvent();

    public function getUrl();

    public function getMethod();

    public function getEventName();

    public function getClassName();
}
