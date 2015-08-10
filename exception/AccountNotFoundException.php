<?php

namespace Exception;
use Arbor\Core\Exception;

class AccountNotFoundException extends Exception{
	
	public function __construct(){
		parent::__construct(1,'Account not found.');
	}
}