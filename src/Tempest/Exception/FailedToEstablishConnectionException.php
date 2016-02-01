<?php
namespace Tempest\Exception;
use \Tempest\Exception\BaseException;

class FailedToEstablishConnectionException extends BaseException {
	public $message = "Tempest: Failed to get a connection to the database";
}