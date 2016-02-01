<?php
namespace Tempest\Exception;
use \Tempest\Exception\BaseException;

class AdapterExistsException extends BaseException {
	public $message = "Tempest: Attempted to register an Adapter that is already registered";
}