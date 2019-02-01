<?php

namespace platocreative\paymentexpress\gateways;

use Craft;
use craft\commerce\base\RequestResponseInterface;
use craft\commerce\models\Transaction;
use craft\commerce\records\Transaction as TransactionRecord;
use craft\commerce\omnipay\base\OffsiteGateway;
use Omnipay\Common\AbstractGateway;
use Omnipay\Omnipay;
use Omnipay\PaymentExpress\PxPayGateway as Gateway;
use yii\base\NotSupportedException;

/**
 * Gateway represents PaymentExpress gateway
 *
 * @author    Plato Creative. <web@platocreative.co.nz>
 * @since     1.1.3
 */

class PxPay extends OffsiteGateway
{
    // Properties
    // =========================================================================
    /**
     * @var string
     */
    public $username;
        /**
     * @var string
     */
    public $password;
    /**
     * @var string
     */
    public $vendor;
    /**
     * @var bool
     */
    public $testMode = false;

    // Public Methods
    // =========================================================================
    
    /**
     * @inheritdoc
     */
    public static function displayName(): string
    {
        return Craft::t('commerce', 'Payment Express');
    }

    /**
     * @inheritdoc
     */
    public function getSettingsHtml()
    {
        return Craft::$app->getView()->renderTemplate('payment-express-for-craft-commerce-2/gatewaySettings', ['gateway' => $this]);
    }

    /**
     * @inheritdoc
     */
    public function supportsPaymentSources(): bool
    {
        return false;
    }
    
    // Protected Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    protected function createGateway(): AbstractGateway
    {
        /** @var Gateway $gateway */
        $gateway = Omnipay::create($this->getGatewayClassName());
        $gateway->setUsername($this->username);
        $gateway->setPassword($this->password);
        return $gateway;
    }

    /**
     * @inheritdoc
     */
    protected function getGatewayClassName()
    {
        return '\\'.Gateway::class;
    }

    /**
     * @inheritdoc
     */
    protected function createPaymentRequest(Transaction $transaction, $card = null, $itemBag = null): array
    {
        $request = parent::createPaymentRequest($transaction, $card, $itemBag);
        
        if(strlen($transaction->hash) > 16) {
            $shortenedHash = substr($transaction->hash, 0, 16);
        } else {
            $shortenedHash = $transaction->hash;
        }

        $request['transactionId'] = $shortenedHash;

        return $request;

    }
}