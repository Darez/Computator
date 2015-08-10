<?php

namespace Formatter;

use Arbor\Component\Form\FormFormatter;
use Arbor\Component\Form\FormField;


/**
 * Formatter for login form.
 */
class LoginFormFormatter implements FormFormatter{

	/**
	 * {@inheritdoc}
	 */
	public function renderField(FormField $field){

		$field->addClass('form-control');
		$tags=$field->getTags();
		$groupClass='form-group';
		if(isset($tags['disabled']) && $tags['disabled']){
			$groupClass.=' hide';
		}
		if(!$field->isValid()){
			$groupClass.=' has-error';
		}

		if($field->isRequired()){
			$groupClass.=' has-required';
		}

		$field->setTag('placeholder',$field->getLabel());
		$html='<div class="'.$groupClass.'">
			'.$field->componentRender().'
			'.(!$field->isValid()?'<label class="alert-error">'.$field->getError().'</label>':'').'
		</div>';

		return $html;
	}

	/**
	 * {@inheritdoc}
	 */
	public function renderFormBegin($tags){
		if(!isset($tags['class'])){
			$tags['class']='';
		}

		$tags['class'].=' form';
		$template='<FORM ';
		foreach($tags as $kTag=>$tag){
			if($tag!='')
				$template.=$kTag.'="'.$tag.'" ';
		}

		$template.=' >';

		$template.='<fieldset>';                    

		return $template;
	}

	/**
	 * {@inheritdoc}
	 */
	public function renderFormEnd(){
		return '</fieldset></FORM>';
	}

	/**
	 * {@inheritdoc}
	 */
	public function renderSubmit($tags){
		if(!isset($tags['class'])){
			$tags['class']='';
		}

		$tags['class'].=' btn btn-primary';

		$button='<BUTTON ';
		foreach($tags as $kTag=>$tag){
			if($tag!='')
				$button.=$kTag.'="'.$tag.'" ';
		}

		$button.='>Apply</BUTTON>';

		return $button;
	}
}