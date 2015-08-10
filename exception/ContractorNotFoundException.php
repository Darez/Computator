<?php

namespace Exception;
use Arbor\Core\Exception;

class ContractorNotFoundException extends Exception{
	
	public function __construct(){
		parent::__construct(1,'Contractor not found.');
	}
}