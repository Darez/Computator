<?php

namespace Entity;

/**
 * @Entity()
 * @Table(name="contractors")
 * @author Michal Tomczak <michal.tomczak@iteracja.com>
 **/
class Contractor{

	/** 
	 * @Id
	 * @Column(type="integer") 
	 * @GeneratedValue
	 **/
	protected $id;

	/** 
	 * @Column(type="string") 
	 **/
	protected $name;

	/** 
	 * @Column(name="address",type="text") 
	 **/
	protected $address;

	/** 
	 * @Column(name="tax_id",type="string") 
	 **/
	protected $taxId;

	public function getId(){
		return $this->id;
	}

	public function setName($name){
		$this->name=$name;
		return $this;
	}

	public function getName(){
		return $this->name;
	}

	public function setAddress($address){
		$this->address=$address;
		return $this;
	}

	public function getAddress(){
		return $this->address;
	}

	public function setTaxId($taxId){
		$this->taxId=$taxId;
		return $this;
	}

	public function getTaxId(){
		return $this->taxId;
	}


}