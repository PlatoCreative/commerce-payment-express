<?php

namespace platocreative\paymentexpress;

use platocreative\paymentexpress\gateways\PxPay;
use craft\commerce\services\Gateways;
use craft\events\RegisterComponentTypesEvent;
use craft\services\Dashboard;
use platocreative\paymentexpress\widgets\Overview;
use yii\base\Event;


/**
 * Plugin represents the Payment Express integration plugin.
 *
 * @author Plato Creative. <web@platocreative.co.nz>
 * @since  1.1.4
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

        Event::on(Dashboard::class, Dashboard::EVENT_REGISTER_WIDGET_TYPES, function(RegisterComponentTypesEvent $event) {
            $event->types[] = Overview::class;
        });
    }

}
