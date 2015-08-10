<?php

namespace Mapper;
use Arbor\Core\Mapper;
use Exception\AccountNotFoundException;

class Account extends Mapper{
	
	public function cast($value){
		$entity=$this->getService('doctrine')->getEntityManager()->getRepository('Entity\Account')->findOneById($value);
		if(!$entity)
			throw new AccountNotFoundException();

		return $entity;
	}
}
