<?php

namespace ags\googlerecaptchav3\controllers;

use ags\googlerecaptchav3\GoogleRecaptchaV3;
use craft\web\Controller;

class ReCaptchaV3Controller extends Controller {

	// Protected Properties
	// =========================================================================

	/**
	 * @var    bool|array Allows anonymous access to this controller's actions.
	 *         The actions must be in 'kebab-case'
	 * @access protected
	 */
	protected $allowAnonymous = ['index'];

	public function actionIndex() {
		$check = GoogleRecaptchaV3::$plugin->recaptchaV3->checkReCaptcha($_GET['recaptcha']);
		return $check;
	}
}