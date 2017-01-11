<?php

namespace App\Artisan;

require 'Mailer/PHPMailerAutoload.php';

class Mail {

	/**
	 * Email Templates path
	 * @var string
	 */
	private static $templatesPath = "/../../resources/emails/";

	/**
	 * User email Id
	 * @var null
	 */
	private $email = null;

	/**
	 * User name
	 * @var null
	 */
	private $name = null;

	/**
	 * HTML BODY
	 * @var null
	 */
	private static $htmlBody = null;

	/**
	 * Template Name
	 * @var null
	 */
	private static $view = null;

	/**
	 * Email Subject
	 * @var null
	 */
	private $subject = null;

	/**
	 * Data to pass on into view
	 * @var array
	 */
	private static $data = array();

	/**
	 * Send Email Function
	 * @param  string $view Template name
	 * @param  array  $data Data to pass into view
	 * @return Object       Mail Instance
	 */
	public static function send($view, array $data) {

		$config = require '../config/app.php';

		extract($data);

		static::$view = $view;

		static::$data = $data;

		$file = dirname(__FILE__) . static::$templatesPath . static::$view . '.php';

		if (file_exists($file)) {
			ob_start();
			require $file;
			static::$htmlBody = ob_get_contents();
			ob_end_clean();
		}
		return new Mail;

	}

	/**
	 * Set to whom EMail will be sent
	 * @param  string $to   Email Address
	 * @param  string $name Name of the user
	 * @return Mail Instance
	 */
	public function to($to, $name = "") {

		$this->email = $to;
		$this->name = $name;

		return $this;

	}

	/**
	 * Set the email subject
	 * @param  string $subject Email Subject
	 * @return Mail Instance
	 */
	public function subject($subject) {

		$this->subject = $subject;

		return $this;
	}

	/**
	 * Finaly Deliver the email after setting everything
	 * @return boolean || string  Returns true if mail was sent and Error info in case email wasn't sent
	 */
	public function deliver() {
		$config = array();
		$mailConfig = '../config/mail.php';

		if (file_exists($mailConfig)) {
			$config = require $mailConfig;
		}

		$mail = new \PHPMailer;

		$mail->isSMTP();

		$mail->Host = $config['host'];

		$mail->Port = $config['port'];

		$mail->SMTPSecure = $config['encryption'];

		$mail->SMTPAuth = true;

		$mail->Username = $config['username'];

		$mail->Password = $config['password'];

		$mail->setFrom($config['from']['address'], $config['from']['name']);

		$mail->addReplyTo($config['from']['address'], $config['from']['name']);

		$mail->addAddress($this->email, $this->name);

		$mail->Subject = $this->subject;

		$mail->msgHTML(static::$htmlBody);

		// $mail->addAttachment('images/phpmailer_mini.png');

		return ($mail->send()) ? true : $mail->ErrorInfo;

	}
}