<?php
namespace Tempest\Exception;
use \Tempest\Exception\BaseException;

class ConfigurationExistsException extends BaseException {
	public $message = "Tempest: Attempt to initialize the same DB configuration twice";
}