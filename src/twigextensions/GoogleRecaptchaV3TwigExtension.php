<?php
/**
 * Google  reCAPTCHA v3 plugin for Craft CMS 3.x
 *
 * reCAPTCHA v3 returns a score for each request without user friction
 *
 * @link      https://github.com/Andr3y9603
 * @copyright Copyright (c) 2019 Ghiorghiu Andrei
 */

namespace ags\googlerecaptchav3\twigextensions;

use ags\googlerecaptchav3\GoogleRecaptchaV3;
use Craft;

/**
 * @author    Ghiorghiu Andrei
 * @package   GoogleRecaptchaV3
 * @since     1.0.0
 */
class GoogleRecaptchaV3TwigExtension extends \Twig_Extension {
	// Public Methods
	// =========================================================================

	/**
	 * @inheritdoc
	 */
	public function getName() {
		return 'GoogleRecaptchaV3';
	}

	/**
	 * @inheritdoc
	 */
	public function getFunctions() {
		return [
			new \Twig_SimpleFunction('reCAPTCHAV3', [$this, 'renderReCaptchaTemplate']),
		];
	}

	/**
	 * @param null $text
	 *
	 * @return string
	 */
	public function renderReCaptchaTemplate() {

		$file = file_get_contents(__DIR__ . '/../templates/recaptchav3.twig');

		$file = str_replace('##siteKey##', GoogleRecaptchaV3::$plugin->getSettings()->siteKey, $file);

		echo $file;
	}
}
