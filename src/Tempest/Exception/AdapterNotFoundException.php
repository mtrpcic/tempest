<?php
namespace Tempest\Exception;
use \Tempest\Exception\BaseException;

class AdapterNotFoundException extends BaseException {
	public $message = "Tempest: Attempt to use adapter that was not defined";
}