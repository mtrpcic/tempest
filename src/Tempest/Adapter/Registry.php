<?php
namespace Tempest\Adapter;

use \Tempest\Exception\AdapterExistsException;
use \Tempest\Exception\AdapterNotFoundException;

class Registry {
	private static $adapters = [
		"postgres" => "\\Tempest\\Adapter\\Postgres"
	];

	public static function register($name, $path){
		if(array_key_exists($name, static::$adapters)){
			throw new AdapterExistsException($name);
		}
		static::$adapters[$name] = $path;
	}

	public static function get($name){
		$adapter = static::$adapters[$name];

		if(!$adapter){
			throw new AdapterNotFoundException($name);
		}

		return $adapter;
	}

	public static function buildDAO($name, $config){
		$path = static::get($name);
		$path .= "\\DAO";
		return new $path($config);
	}
}