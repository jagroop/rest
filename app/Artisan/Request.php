<?php
namespace App\Artisan;

class Request {

	private $method = null;

	private $data = [];

	public function __construct() {
		$this->method = ($_SERVER['REQUEST_METHOD']) ?: null;

		if ($this->method === "GET") {
			unset($_GET['url']);
			$this->data = $_GET;
		} elseif ($this->method === "POST") {
			$this->data = $_POST;
		}
	}

	/**
	 * Return all HttpRequest Data
	 * @return array HttpRequest Data
	 */
	public function all() {
		return $this->data;
	}

	/**
	 * Return a perticular HttpRequest key data
	 * @param  mixed $key Request Array Key Value
	 * @return mixed
	 */
	public function key($key = null) {
		return ($this->data[$key]) ?: null;
	}

	/**
	 * Return a perticular HttpRequest only specifc keys only
	 * @param  mixed $key HttpRequest
	 * @return Array
	 */
	public function only($keys) {
		$keys = is_array($keys) ? $keys : func_get_args();

		$results = [];

		$input = $this->data;

		foreach ($keys as $key) {
			$results[$key] = @$this->data[$key];
		}

		return $results;
	}
}