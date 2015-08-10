<?php

namespace Mapper;
use Arbor\Core\Mapper;
use Exception\ContractorNotFoundException;

class Contractor extends Mapper{
	
	public function cast($value){
		$entity=$this->getService('doctrine')->getEntityManager()->getRepository('Entity\Contractor')->findOneById($value);
		if(!$entity)
			throw new ContractorNotFoundException();

		return $entity;
	}
}
