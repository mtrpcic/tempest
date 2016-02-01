<?php

namespace Tempest;
use \Tempest\Exception\ConfigurationExistsException;
use \Tempest\Adapter\Registry as AdapterRegistry;

class Config {
	const DEFAULT_NAME = 'default';
	private static $instances = [];
	private static $active_config = null;

	private $dao = null;

	// Instantiate new configs. Inserts them into the config cache by name.
	public static function init($params){
		$params["name"] = $params["name"] ?: static::DEFAULT_NAME;

		// You can not override a DB configuration after it is set
		if(array_key_exists($params["name"], static::$instances)){
			throw new ConfigurationExistsException($params["name"]);
		}

		$instance = new static($params);
		static::$instances[$instance->name] = $instance;

		// If the config is 'default', it is automatically set to active.
		if($instance->name == static::DEFAULT_NAME){
			static::apply(static::DEFAULT_NAME);
		}

		return $instance;
	}

	// Set the active config to a specified one
	public static function apply($name){
		static::$active_config = static::$instances[$name] ?: null;
		return static::$instances[$name ?: static::DEFAULT_NAME];
	}

	// Get a reference to the active config
	public static function active(){
		return static::$active_config;
	}

	// Constructor turns the parameters into config properties
	public function __construct($params){
		foreach($params as $key => $value){
			$this->{$key} = $value;
		}

		$this->dao = AdapterRegistry::buildDAO($this->adapter, $this);
	}

	public function DAO(){
		return $this->dao;
	}
}