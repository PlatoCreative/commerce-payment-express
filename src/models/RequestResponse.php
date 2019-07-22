<?php

namespace platocreative\paymentexpress\models;
use Craft;
use craft\commerce\omnipay\base\RequestResponse as BaseRequestResponse;

class RequestResponse extends BaseRequestResponse
{
    public function isProcessing(): bool
    {
        return false;
    }
}
