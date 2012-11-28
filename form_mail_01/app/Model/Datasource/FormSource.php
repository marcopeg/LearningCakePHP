<?php
App::uses('CakeEmail', 'Network/Email');

class FormSource extends DataSource {
	
	protected $_schema = array(
		'forms' => array(
			'email' 	=> array( 'type'=>'string' ),
			'subject' 	=> array( 'type'=>'string' ),
			'message' 	=> array( 'type'=>'text' )
		)
	);
	
	public function listSources() {
		return array('forms');
	}
	
	public function describe($model) {
		return $this->_schema['forms'];
	}
	
	public function create($model, $fields = array(), $values = array()) {
		
		$data = array_combine($fields, $values);
		
		// Create the email object and set receiver.
		$email = new CakeEmail();
		$email->to($data['email']);
		
		// Form based data.
		$email->from('noreply@yourcustomserver.com');
		$email->subject($data['subject']);
		
		// HTML template info.
		$email->emailFormat('html');
		$email->template('form');
		$email->viewVars($data);
		
		// Send email
		if ($email->send()) {
			return true;
		} else {
			return false;
		}
			
	}
	
}