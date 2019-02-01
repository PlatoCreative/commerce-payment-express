<?php
/**
 * @link      https://github.com/platocreative
 * @copyright Plato Creative.
 * @license   MIT
 */

namespace platocreative\paymentexpress\widgets;

use Craft;
use craft\base\Widget;
use craft\commerce\elements\Order;
use craft\commerce\Plugin;
use platocreative\paymentexpress\web\assets\overviewwidget\OverviewWidgetAsset;

/**
 * Class Orders
 *
 * @property string|false $bodyHtml the widget's body HTML
 * @property string $settingsHtml the component’s settings HTML
 * @property string $title the widget’s title
 * @author Plato Creative. <web@platocreative.co.nz>
 * @since 1.1.3
 */
class Overview extends Widget
{
    // Properties
    // =========================================================================

    /**
     * @var int|null
     */
    public $gatewayHandle = "paymentExpress";

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public static function isSelectable(): bool
    {
        // This widget is only available to users that can manage orders
        return Craft::$app->getUser()->checkPermission('commerce-manageOrders');
    }

    /**
     * @inheritdoc
     */
    public static function displayName(): string
    {
        return Craft::t('commerce', 'Payment Express Gateway');
    }

    /**
     * @inheritdoc
     */
    public static function iconPath(): string
    {
        return Craft::getAlias('@craft/commerce/icon-mask.svg');
    }

    /**
     * @inheritdoc
     */
    public function getTitle(): string
    {
        return parent::getTitle();
    }

    /**
     * @inheritdoc
     */
    public function getBodyHtml()
    {
        $revenue = $this->_getRevenue();
        $transactions = $this->_getTotalTransactions();
        $settings = $this->_getGatewaySettings();

        $view = Craft::$app->getView();
        $view->registerAssetBundle(OverviewWidgetAsset::class);

        return $view->renderTemplate('payment-express-for-craft-commerce-2/_components/widgets/Overview/body', [
            'revenue' => $revenue,
            'transactions' => $transactions,
            'settings' => $settings,
        ]);
    }

    /**
     * @inheritdoc
     */
    public function getSettingsHtml(): string
    {
        return Craft::$app->getView()->renderTemplate('payment-express-for-craft-commerce-2/_components/widgets/Overview/settings', [
            'widget' => $this,
        ]);
    }

    // Private Methods
    // =========================================================================

    /**
     * Get the gateway as per $gatewayHandle
     *
     * @return Gateway
     */
    private function _getGateway()
    {
        $gateway = Plugin::getInstance()->getGateways()->getGatewayByHandle($this->gatewayHandle);
        if ($gateway) {
            return $gateway;
        }
        return false;
    }

    /**
     * Helper function to return gateway settings as an array
     *
     * @return array
     */
    private function _getGatewaySettings()
    {
        $gateway = Plugin::getInstance()->getGateways()->getGatewayByHandle($this->gatewayHandle);
        if ($gateway && $gateway->settings) {
            return $gateway->settings;
        }

        return false;
    }

    /**
     * Returns the total of all orders that have been made by this gateway.
     *
     * @return string
     */
    private function _getRevenue(): string
    {
        $gateway = $this->_getGateway();
        if ($gateway) {

            $query = Order::find();
            $query->gatewayId($gateway->id);
            $query->isCompleted(true);
            $query->dateOrdered(':notempty:');
            $total = $query->sum("totalPaid");
            
            if ($total > 0) {
                $currency = Plugin::getInstance()->getPaymentCurrencies()->getPrimaryPaymentCurrencyIso();
                $totalHtml = Craft::$app->getFormatter()->asCurrency($total, strtoupper($currency));
            } else {
                $totalHtml = 0;
            }

            return $totalHtml;
        }

        return 0;
    }

    /**
     * Returns the total amount of trnasactions made by this gateway.
     *
     * @return string
     */
    private function _getTotalTransactions(): string
    {
        $gateway = $this->_getGateway();
        if ($gateway) {

            $query = Order::find();
            $query->gatewayId($gateway->id);
            $query->isCompleted(true);
            $query->dateOrdered(':notempty:');
            return $query->count();
        }

        return 0;
    }
}
