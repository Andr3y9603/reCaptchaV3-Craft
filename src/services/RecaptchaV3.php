<?php
/**
 * Google  reCAPTCHA v3 plugin for Craft CMS 3.x
 *
 * reCAPTCHA v3 returns a score for each request without user friction
 *
 * @link      https://github.com/Andr3y9603
 * @copyright Copyright (c) 2019 Ghiorghiu Andrei
 */

namespace ags\googlerecaptchav3\services;

use ags\googlerecaptchav3\GoogleRecaptchaV3;
use Craft;
use craft\base\Component;

/**
 * @author    Ghiorghiu Andrei
 * @package   GoogleRecaptchaV3
 * @since     1.0.0
 */
class RecaptchaV3 extends Component {
	// Public Methods
	// =========================================================================

	public function checkReCaptcha($recaptcha = null) {
		if (isset($recaptcha)) {
			$captcha = $recaptcha;
		} else {
			$captcha = false;
		}

		if (!$captcha) {
			return false;
		} else {
			$secret = GoogleRecaptchaV3::$plugin->getSettings()->secretKey;
			$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=" . $secret . "&response=" . $captcha . "&remoteip=" . $_SERVER['REMOTE_ADDR']);

			$response = json_decode($response);
			if ($response->success == false) {
				return false;
			}
		}

		return true;
	}
}
