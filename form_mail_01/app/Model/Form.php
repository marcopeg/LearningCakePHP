<?php
class Form extends AppModel {
	
	public $name = 'Form';
	
	// public $useTable = false; // For testing pourpose only!
	
	public $useDbConfig = 'form';
	
	public $validate = array(
		
		'subject' => 'notEmpty',
		
		'email' => 'email'
		
	);
	
}