<?php
/**
 * Google  reCAPTCHA v3 plugin for Craft CMS 3.x
 *
 * reCAPTCHA v3 returns a score for each request without user friction
 *
 * @link      https://github.com/Andr3y9603
 * @copyright Copyright (c) 2019 Ghiorghiu Andrei
 */

namespace ags\googlerecaptchav3;

use ags\googlerecaptchav3\models\Settings;
use ags\googlerecaptchav3\services\RecaptchaV3 as RecaptchaV3Service;
use ags\googlerecaptchav3\twigextensions\GoogleRecaptchaV3TwigExtension;
use Craft;
use craft\base\Plugin;
use craft\events\PluginEvent;
use craft\services\Plugins;
use yii\base\Event;

/**
 * Class GoogleRecaptchaV3
 *
 * @author    Ghiorghiu Andrei
 * @package   GoogleRecaptchaV3
 * @since     1.0.0
 *
 * @property  RecaptchaV3Service $recaptchaV3
 */
class GoogleRecaptchaV3 extends Plugin {
	// Static Properties
	// =========================================================================

	/**
	 * @var GoogleRecaptchaV3
	 */
	public static $plugin;

	// Public Properties
	// =========================================================================

	/**
	 * @var string
	 */
	public $schemaVersion = '1.0.0';

	// Public Methods
	// =========================================================================

	/**
	 * @inheritdoc
	 */
	public function init() {
		parent::init();
		self::$plugin = $this;

		Craft::$app->view->registerTwigExtension(new GoogleRecaptchaV3TwigExtension());

		Event::on(
			Plugins::class,
			Plugins::EVENT_AFTER_INSTALL_PLUGIN,
			function (PluginEvent $event) {
				if ($event->plugin === $this) {
				}
			}
		);

		Craft::info(
			Craft::t(
				'google-re-captcha-v3',
				'{name} plugin loaded',
				['name' => $this->name]
			),
			__METHOD__
		);
	}

	// Protected Methods
	// =========================================================================

	/**
	 * @inheritdoc
	 */
	protected function createSettingsModel() {
		return new Settings();
	}

	/**
	 * @inheritdoc
	 */
	protected function settingsHtml(): string {
		return Craft::$app->view->renderTemplate(
			'google-re-captcha-v3/settings',
			[
				'settings' => $this->getSettings(),
			]
		);
	}
}
