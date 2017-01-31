<?php
namespace App\Artisan;
class Config{

	/**
	 * Default configuration files path
	 */
	const CONFIG_PATH = __DIR__."/../../config/";

	/**
	 * Get Configuration file array
	 * @param  string $file Name of Configuration File
	 * @return array || null      
	 */
	public static function get($file){
		if(!$file)
		{
			return null;
		}
		$configFile = static::CONFIG_PATH.$file.'.php';		
		if(!file_exists($configFile))
		{
			return null;
		}
		return require $configFile;
	}
}