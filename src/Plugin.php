<?php

namespace platocreative\paymentexpress;

use platocreative\paymentexpress\gateways\PxPay;
use craft\commerce\services\Gateways;
use craft\events\RegisterComponentTypesEvent;
use yii\base\Event;


/**
 * Plugin represents the Payment Express integration plugin.
 *
 * @author Plato Creative. <web@platocreative.co.nz>
 * @since  1.0
 */
class Plugin extends \craft\base\Plugin
{
    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        Event::on(Gateways::class, Gateways::EVENT_REGISTER_GATEWAY_TYPES,  function(RegisterComponentTypesEvent $event) {
            $event->types[] = PxPay::class;
        });
    }
}
