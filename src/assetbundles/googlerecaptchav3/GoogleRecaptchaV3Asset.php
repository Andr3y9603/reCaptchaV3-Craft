<?php
/**
 * Google  reCAPTCHA v3 plugin for Craft CMS 3.x
 *
 * reCAPTCHA v3 returns a score for each request without user friction
 *
 * @link      https://github.com/Andr3y9603
 * @copyright Copyright (c) 2019 Ghiorghiu Andrei
 */

namespace ags\googlerecaptchav3\assetbundles\GoogleRecaptchaV3;

use Craft;
use craft\web\AssetBundle;
use craft\web\assets\cp\CpAsset;

/**
 * @author    Ghiorghiu Andrei
 * @package   GoogleRecaptchaV3
 * @since     1.0.0
 */
class GoogleRecaptchaV3Asset extends AssetBundle
{
    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->sourcePath = "@ags/googlerecaptchav3/assetbundles/googlerecaptchav3/dist";

        $this->depends = [
            CpAsset::class,
        ];

        $this->js = [
            'js/GoogleRecaptchaV3.js',
        ];

        $this->css = [
            'css/GoogleRecaptchaV3.css',
        ];

        parent::init();
    }
}
