<?php

namespace Tempest\Exception;

class BaseException extends \Exception {
	protected $message = "Tempest Exception";
	
	public function buildMessage($message){
		return "{$this->message} ($message)";
	}

	public function __construct($message, $code = 0){
		parent::__construct($this->buildMessage($message), $code);
	}
}