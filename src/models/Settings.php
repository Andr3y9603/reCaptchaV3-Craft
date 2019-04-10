<?php
/**
 * Google  reCAPTCHA v3 plugin for Craft CMS 3.x
 *
 * reCAPTCHA v3 returns a score for each request without user friction
 *
 * @link      https://github.com/Andr3y9603
 * @copyright Copyright (c) 2019 Ghiorghiu Andrei
 */

namespace ags\googlerecaptchav3\models;

use ags\googlerecaptchav3\GoogleRecaptchaV3;
use Craft;
use craft\base\Model;

/**
 * @author    Ghiorghiu Andrei
 * @package   GoogleRecaptchaV3
 * @since     1.0.0
 */
class Settings extends Model {
	// Public Properties
	// =========================================================================

	/**
	 * @var string
	 */
	public $siteKey = '';
	public $secretKey = '';

	// Public Methods
	// =========================================================================

	/**
	 * @inheritdoc
	 */
	public function rules() {
		return [
			[['siteKey', 'secretKey'], 'string'],
			[['siteKey', 'secretKey'], 'default', 'value' => ''],
		];
	}
}
