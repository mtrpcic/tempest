<?php

namespace Tempest;
use Tempest\Config;

class ConfigTest extends \PHPUnit_Framework_TestCase
{
    public function setUp(){

    }

    public function tearDown(){

    }

    public function testCreateDefaultConfig(){
        $config = Config::init([
            "test" => "other"
        ]);

        $this->assertEquals($config, Config::active());
        $this->assertEquals($config->name, Config::DEFAULT_NAME);

    }

    public function testCreateNamedConfig(){

    }

    public function testSetActiveConfig(){
        
    }

    public function testGetActiveConfig(){

    }
}