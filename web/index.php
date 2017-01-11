<?php
$helpers = dirname(__FILE__) . '/../src/helpers.php';
if (file_exists($helpers)) {
	require $helpers;
}
class Bootstrap {

	/**
	 * $class
	 * @var string
	 */
	protected $class;

	/**
	 * $method
	 * @var string
	 */
	protected $method;

	/**
	 * $params
	 * @var array
	 */
	protected $params = array();

	/**
	 * Parse current Url Extract Class, Method AND Parameters
	 * @return array Returns array containg class name, method name and set of parameters
	 */
	protected function parseUrl() {
		if (isset($_GET['url'])) {
			return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
		}
	}

	/**
	 * Return Not found Json Response in case if class or methos wasn't found in application
	 * @return Json Not found Json Response
	 */
	protected function four_zero_four() {
		header('Content-Type: application/json');
		echo json_encode(array('code' => 404, 'success' => false, 'msg' => 'Invalid Url', 'data' => array()));
		die;
	}

	public function __construct() {

		//require dirname(__FILE__) . '/../vendor/autoload.php';

		$config = require dirname(__FILE__) . '/../config/app.php';

		if (isset($config['logs']) && $config['logs'] === true) {
			$request = $_REQUEST;
			if(!isset($request['dont_log_request']))
			{
				app_log($request, 'REQUEST');
			}
		}

		if (isset($config['debug']) && $config['debug'] === false) {
			ini_set('display_errors', 0);
			error_reporting(0);
		}

		spl_autoload_register(function ($class) {
			$prefix = 'App\\';
			$base_dir = dirname(__FILE__) . '/../app/';
			$len = strlen($prefix);
			if (strncmp($prefix, $class, $len) !== 0) {
				return;
			}
			$relative_class = substr($class, $len);
			$file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
			if (file_exists($file)) {
				require $file;
			}
		});

		$url = $this->parseUrl();

		if (file_exists('../app/' . ucfirst($url[0]) . '.php')) {
			$this->class = ucfirst($url[0]);
			unset($url[0]);
		} else {
			return $this->four_zero_four();
		}

		$className = "\\App\\" . $this->class;

		$this->class = new $className;

		if (isset($url[1])) {
			if (method_exists($this->class, $url[1])) {
				$this->method = $url[1];
				unset($url[1]);
			} else {
				return $this->four_zero_four();
			}
		} else {
			return $this->four_zero_four();
		}

		$this->params = $url ? array_values($url) : array();

		call_user_func_array(array(
			$this->class,
			$this->method,
		), $this->params);

	}
}

new Bootstrap;