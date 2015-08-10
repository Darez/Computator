<?php

namespace Entity;

/**
 * @Entity()
 * @Table(name="users")
 * @author Michal Tomczak <michal.tomczak@iteracja.com>
 **/
class User{

	/** 
	 * @Id
	 * @Column(type="integer") 
	 * @GeneratedValue
	 **/
	protected $id;

	/** 
	 * @Column(type="string") 
	 **/
	protected $email;

	/** 
	 * @Column(name="first_name",type="string") 
	 **/
	protected $firstName;

	/** 
	 * @Column(name="last_name",type="string") 
	 **/
	protected $lastName;

	/** 
	 * @Column(name="salt",type="string") 
	 **/
	protected $salt;

	/** 
	 * @Column(name="password",type="string") 
	 **/
	protected $password;

	public function getId(){
		return $this->id;
	}

	public function setEmail($email){
		$this->email=$email;
		return $this;
	}

	public function getEmail(){
		return $this->email;
	}

	public function setFirstName($firstName){
		$this->firstName=$firstName;
		return $this;
	}

	public function getFirstName(){
		return $this->firstName;
	}

	public function setLastName($lastName){
		$this->lastName=$lastName;
		return $this;
	}

	public function getLastName(){
		return $this->lastName;
	}

	public function setSalt($salt){
		$this->salt=$salt;
		return $this;
	}

	public function getSalt(){
		return $this->salt;
	}

	public function setPassword($password){
		$this->password=$password;
		return $this;
	}

	public function getPassword(){
		return $this->password;
	}

	public function __toString(){
		return $this->getFirstName(). ' ' . $this->getLastName();
	}


}