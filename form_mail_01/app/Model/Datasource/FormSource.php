<?php

class FormSource extends DataSource {
	
	protected $_schema = array(
		'forms' => array(
			'email' => array( 'type'=>'string' ),
			'subject' => array( 'type'=>'string' ),
			'message' => array( 'type'=>'text' )
		)
	);
	
	public function listSources() {
		
		return array('forms');
		
	}
	
	public function describe( $model ) {
		
		return $this->_schema['forms'];
		
	}
	
	public function create( $model, $fields = array(), $values = array() ) {
	
		$data = array_combine($fields, $values);
		
		return true;
	
	}
	
}