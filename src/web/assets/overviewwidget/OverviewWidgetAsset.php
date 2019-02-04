<?php
/**
 * @link      https://github.com/platocreative
 * @copyright Plato Creative.
 * @license   MIT
 */

namespace platocreative\paymentexpress\web\assets\overviewwidget;

use craft\web\AssetBundle;
use craft\web\assets\cp\CpAsset;

/**
 * Asset bundle for the Overview widget
 *
 * @author Plato Creative. <web@platocreative.co.nz>
 * @since 1.1.4
 */
class OverviewWidgetAsset extends AssetBundle
{
    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->sourcePath = __DIR__ . '/dist';

        $this->depends = [
            CpAsset::class,
        ];

        $this->css[] = 'css/OverviewWidget.css';

        parent::init();
    }
}
