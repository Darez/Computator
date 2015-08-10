<?php

namespace Service;

use Arbor\Contener\ServiceConfig;


class Salt{
	
	private $entityManager;

	public function __construct(ServiceConfig $serviceConfig){		
	}

	public function encode($password,$salt){
		$salted = $password.'{'.$salt.'}';
		$digest = hash('sha512', $salted, true);
		for($i=1; $i < 5000; $i++){
	        $digest = hash('sha512', $digest.$salted, true);
		}

		return base64_encode($digest);
	}
}