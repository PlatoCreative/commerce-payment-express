<p align="center"><img src="./src/icon.svg" width="100" height="100" alt="Payment Express for Craft Commerce icon"></p>

<h1 align="center">Payment Express for Craft Commerce</h1>

This plugin provides an [Payment Express](https://www.paymentexpress.com) integration for [Craft Commerce](https://craftcms.com/commerce).

## Requirements

This plugin requires Craft Commerce 2.0.0 or later.

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
