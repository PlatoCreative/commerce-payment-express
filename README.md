<p align="center"><img src="./resources/logo.svg" width="150" alt="Payment Express (Windcave) for Craft Commerce"></p>

<h1 align="center">Payment Express (Windcave) for Craft Commerce</h1>

### This plugin is no longer maintained
This Craft CMS plugin is no longer actively maintained by the original developers. We are leaving the code available for anyone who may find it useful, but we will not be providing support or updates.

If you wish to make any changes or improvements to the plugin, you are welcome to fork the repository and work on it independently. If you would like to take over ownership of the repository, please contact us to discuss.

Archive the repository
To ensure that this plugin remains available for anyone who may need it, we have archived the repository. This means that it will remain available for viewing and forking, but will no longer accept pull requests or issues.

Thank you for your interest in this plugin!



This plugin provides an [Payment Express/Windcave](https://www.windcave.com/) integration (PXPay) for [Craft Commerce](https://craftcms.com/commerce).

## Requirements

This plugin requires Craft Commerce 3.0.0 or later.

## Installation

You can install this plugin from the Plugin Store or with Composer.

#### From the Plugin Store

Go to the Plugin Store in your project’s Control Panel and search for "Payment Express”. Then click on the “Install” button in its modal window.

#### With Composer

Open your terminal and run the following commands:

```bash
# go to the project directory
cd /path/to/my-project.test

# tell Composer to load the plugin
composer require platocreative/commerce-payment-express

# tell Craft to install the plugin
./craft install/plugin commerce-payment-express
```

## Setup

To add an Payment Express payment gateway, go to Commerce → Settings → Gateways, create a new gateway, and set the gateway type to “Payment Express”.
We recommend using the Gateway handle "paymentExpress".

Remember to enable test mode in the settings as this will trigger Payment express to use a UAT sandbox.

Test credit cards can be found [here](https://www.paymentexpress.com/support-merchant-frequently-asked-questions-testing-details).

## Transactions
Transactions in Craft Commerce are identified by a long hash which is longer than 16 characters long. Payment Express can only store transaction ids that are 16 or less so this plugin will use the first 16 characters of the transaction id that Craft generates and stores.

## Events
`beforeCreateGateway`

This event allows you to extend or change gateway settings before it is sent off. For example you might want to update login details dyanmically.

```php
use platocreative\paymentexpress\gateways\PxPay;
use platocreative\paymentexpress\events\CreateGatewayEvent;
use yii\base\Event;

Event::on(
    PxPay::class,
    PxPay::EVENT_BEFORE_CREATE_GATEWAY,
    function(CreateGatewayEvent $event) {
        // $event->gateway is Omnipay::create();
        // e.g. $event->gateway->setUsername()
    }
);

```



## Todo
- [] Add support for PXPost
- [] Add tests to ensure checkout using PXPay is available
