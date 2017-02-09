<?php
namespace App\Artisan;

class Request {

	private $method = null;

	private $data = [];

	/**
	 * The attributes that should not be trimmed.
	 *
	 * @var array
	 */
	protected $except = [
		'password',
		'password_confirmation',
	];

	/**
	 * Transform the given value.
	 *
	 * @param  string  $key
	 * @param  mixed  $value
	 * @return mixed
	 */
	protected function transform($key, $value) {
		$config = config('app');

		if (@$config['trim_strings'] === false) {
			return $value;
		}

		if (in_array($key, $this->except)) {
			return $value;
		}

		return is_string($value) ? trim($value) : $value;
	}

	public function __construct() {
		$this->method = ($_SERVER['REQUEST_METHOD']) ?: null;

		if ($this->method === "GET") {
			unset($_GET['url']);
			$this->data = $_GET;
		} elseif ($this->method === "POST") {
			$this->data = $_POST;
		}
		$this->data = array_merge($this->data, $_FILES);
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
		return @$this->transform($key, $this->data[$key]);
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
			$results[$key] = @$this->transform($key, $this->data[$key]);
		}

		return $results;
	}
}