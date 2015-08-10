<?php

namespace Controller;

use Arbor\Core\Controller;
use Arbor\Provider\Response;
use Formatter\LoginFormFormatter;
use Arbor\Component\Form\EmailField;
use Arbor\Component\Form\PasswordField;

class Authenticate extends Controller{

	public function index(){

	}
	
	public function login(){

		$form=$this->createForm();
		if($form->isValid()){
			$data=$form->getData();
			$user=$this->findOne('User',array('email'=>$data['email']));

			if(!$user){
				$form->getField('email')->setError('Email or password invalid.');
			}
			else{
				$hash=$this->getService('salt')->encode($data['password'],$user->getSalt());
				if($hash!=$user->getPassword()){
					$form->getField('email')->setError('Email or password invalid.');
				}
				else{
					$this->getRequest()->getSession()->set('user.id',$user->getId());
					$response=new Response();
					$response->redirect('/');
					return $response;
				}

			}

		}
		return compact('form');
	}

	private function createForm()
	{
		$builder = $this->getService('form')->create();
		$builder->setValidatorService($this->getService('validator'));
		$builder->setFormatter(new LoginFormFormatter());

		$builder->addField(new EmailField(array(
			'name'=>'email',
			'label'=>'Email',
			'required'=>true,
		)));

		$builder->addField(new PasswordField(array(
			'name'=>'password',
			'label'=>'Password',
			'required'=>true,
		)));

		$builder->submit($this->getRequest());

		return $builder;
	}


}