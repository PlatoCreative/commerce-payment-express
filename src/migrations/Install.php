<?php
/**
 * @link      https://github.com/platocreative
 * @copyright Plato Creative.
 * @license   MIT
 */

namespace platocreative\paymentexpress\migrations;

use Craft;
use platocreative\paymentexpress\gateways\PxPay;
use craft\db\Migration;
use craft\db\Query;

/**
 * Installation Migration
 *
 * @author Plato Creative. <web@platocreative.co.nz>
 * @since  1.0
 */
class Install extends Migration
{
    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        return true;
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        return true;
    }

    // Private Methods
    // =========================================================================

}