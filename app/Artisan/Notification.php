<?php
namespace App\Artisan;
class Notification {

	/**
	 * Suppoted devices to send push Notifications
	 * IOS
	 * ANDROID
	 */
	const DEVICES = ['ios', 'android'];

	/**
	 * Default parameters of notification payload
	 */
	const DEFAULT = [
		'vibrate' => true,
		'sound' => 'default',
	];

	/**
	 * Pass phrase of IOS
	 * @var null
	 */
	private static $passPhrase = null;

	/**
	 * Headers for android
	 * @var array
	 */
	private static $headers = array();

	/**
	 * Device Token
	 * @var null
	 */
	private static $deviceToken = null;

	/**
	 * Send notification to android device
	 * @param  array $data Payload
	 * @return void
	 */
	private static function android($data) {

		$fields = array(
			'registration_ids' => array(static::$deviceToken),
			'data' => $data,
		);

		try {
			$result = array();
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, 'https://android.googleapis.com/gcm/send');
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_HTTPHEADER, static::$headers);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
			$result = json_decode(curl_exec($ch), true);
			curl_close($ch);
		} catch (\Exception $e) {
			//
		}

	}

	/**
	 * Send push notification to IOS device
	 * @param  array $data Payload
	 * @return void
	 */
	private static function ios($data) {

		try {
			$ctx = stream_context_create();

			stream_context_set_option($ctx, 'ssl', 'cafile', __DIR__ . '/entrust_2048_ca.cer');
			stream_context_set_option($ctx, 'ssl', 'verify_peer', false);
			stream_context_set_option($ctx, 'ssl', 'local_cert', __DIR__ . '/ck.pem'); //development
			// stream_context_set_option($ctx, 'ssl', 'local_cert', $this->certPath); //live
			stream_context_set_option($ctx, 'ssl', 'passphrase', static::$passPhrase);
			// stream_context_set_option($ctx, 'ssl', 'verify_peer', false);

			$fp = stream_socket_client('ssl://gateway.sandbox.push.apple.com:2195', $err, $errstr, 60, STREAM_CLIENT_CONNECT | STREAM_CLIENT_PERSISTENT, $ctx); //sandbox
			// $fp = stream_socket_client('ssl://gateway.push.apple.com:2195', $err, $errstr, 60, STREAM_CLIENT_CONNECT | STREAM_CLIENT_PERSISTENT, $ctx); //live

			$body['aps'] = $data;

			$payload = json_encode($body);

			$msg = chr(0) . pack('n', 32) . pack('H*', static::$deviceToken) . pack('n', strlen($payload)) . $payload;

			$result = fwrite($fp, $msg, strlen($msg));

			fclose($fp);
		} catch (\Exception $e) {
			//
		}

	}

	public function __construct() {
		$config = require '../config/services.php';
		$apiKey = $appConfig['mobile']['android']['api_key'];
		$this->headers = array('Authorization: key=' . $apiKey, 'Content-Type: application/json');
		$this->passPhrase = $appConfig['mobile']['ios']['pass_phrase'];
	}

	/**
	 * Send Push Notification
	 * @param  object $user    User Object
	 * @param  array $payLoad Payload
	 * @return mixed
	 */
	public static function send($user, $payLoad) {

		$token = trim($user->device_token);
		$deviceType = trim($user->device_type);
		$payLoad = array_merge($payLoad, self::DEFAULT);
		if (in_array($deviceType, self::DEVICES) && $token != "") {
			static::$deviceToken = $token;
			if ($deviceType === "android") {

				return static::android($payLoad);

			} elseif ($deviceType === "ios") {

				return static::ios($payLoad);

			}

		}
		return false;
	}

}
