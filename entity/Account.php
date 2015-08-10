<?php

namespace Entity;

/**
 * @Entity()
 * @Table(name="accounts")
 * @author Michal Tomczak <michal.tomczak@iteracja.com>
 **/
class Account{

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
	 * @Column(name="bank",type="string") 
	 **/
	protected $bank;

	/** 
	 * @Column(name="number",type="string") 
	 **/
	protected $number;

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

	public function setBank($bank){
		$this->bank=$bank;
		return $this;
	}

	public function getBank(){
		return $this->bank;
	}

	public function setNumber($number){
		$this->number=$number;
		return $this;
	}

	public function getNumber(){
		return $this->number;
	}


}