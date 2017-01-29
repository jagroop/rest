<?php

namespace App\Artisan;

use App\Artisan\DB;
use App\Artisan\Validator;

class Rest {

	/**
	 * DB Class instance
	 * @var null
	 */
	protected $db = null;

	/**
	 * Validation the requested input
	 * @param  array  $request Requested data
	 * @param  array  $rules   Validation rules
	 * @return boolean || json         returns true if validation passes else returns json response(validation failure)
	 */
	protected function validate(array $request, array $rules) {

		$is_valid = Validator::is_valid($request, $rules);

		if ($is_valid === true) {
			return true;
		}

		return $this->error('Validation Failed', $is_valid);
		die;

	}

	/**
	 * Constructor
	 */
	public function __construct() {
		$this->db = new DB;
	}

	/**
	 * Return Json response
	 * @param  array  $response Response array
	 * @return json
	 */
	public function response(array $response) {
		header('Content-Type: application/json');
		echo json_encode($response);
		die;
	}

	/**
	 * if operation successfully performed
	 * @param  int $msg  Message t obe displayed
	 * @param  array  $data data to return with success message
	 * @return callback
	 */
	public function success($msg = "Success", array $data = array()) {
		return $this->response(array('code' => 200, 'success' => true, 'msg' => $msg, 'data' => $data));
	}

	/**
	 * If operation was'nt performed successfully
	 * @param  string $error Error Message
	 * @return callback
	 */
	public function error($error = "Something went Wrong", $messages = array()) {
		return $this->response(array('code' => 400, 'success' => false, 'error' => $error, 'messages' => $messages));
	}

	/**
	 * If operation was'nt performed successfully or required parameters was missing
	 * @param  string $request Error message
	 * @return callback
	 */
	public function badRequest($request = "") {
		return $this->response(array('code' => 400, 'success' => false, 'error' => ($request != "") ? $request : 'BAD_REQUEST'));
	}
}