<?php
class Form extends AppModel {
	
	public $name = 'Form';
	
	public $useDbConfig = 'form';
	
	public $validate = array(	
		'subject' => 'notEmpty',
		'email' => 'email'
	);
	
}