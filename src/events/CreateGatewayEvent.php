<?php

namespace platocreative\paymentexpress\events;

use yii\base\Event;

/**
 * Class CreateGatewayEvent
 *
 * @author Plato Creative. <web@platocreative.co.nz>
 * @since 1.3.3
 */
class CreateGatewayEvent extends Event
{
    // Properties
    // ==========================================================================

    /**
     * @object Gateway
     */
    public $gateway;

}
