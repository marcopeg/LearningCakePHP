<?php
/**
 * CakePHP + CakePOWER REST Service Tutorial Demo
 * ==============================================
 *
 * @author:		Marco Pegoraro
 * @contact:	marco(dot)pegoraro(at)gmail(dot)com
 * @follow:		@thepeg
 * @blog:		http://movableapp.com
 * @blog:		http://consulenza-web.com
 *
 * This sofware is distributed under MIT license.
 * Please read the "readme.txt" file from the root of this package
 *
 */
 
 
class User extends AppModel {
	
	// Our model uses a custom datasource to handle data persistency.
	// we should move to a database in every moment!
	public $useDbConfig = 'json_users';
	
	
	/**
	 * Validation Rules
	 */
	public $validate = array(
		'username' => array(
			'notempty' => array(
				'rule' 			=> 'notEmpty',
				'required' 		=> true,
				'allowEmpty' 	=> false,
				'message' 		=> 'username missing'
			)
		),
		'password' => array(
			'notempty' => array(
				'rule' 			=> 'notEmpty',
				'required' 		=> true,
				'allowEmpty' 	=> false,
				'message' 		=> 'password missing',
				'on'			=> 'create'
			)
		),
		'password_confirm' => array(
			'notempty' => array(
				'rule' 			=> 'notEmpty',
				'required' 		=> true,
				'allowEmpty' 	=> false,
				'message' 		=> 'please confirm password',
				'on'			=> 'create'
			),
			'equalto' => array(
				'rule'			=> array( 'equalToField', 'password' ),
				'required'		=> true,
				'message'		=> 'password confirmation does not match your password'
			),
		),
	);
	
	
	/**
	 * Compose a virtual field "fullName".
	 * this could be done with CakePHP virtual fields when dealing with a SQL datasource!
	 */
	public function afterFind( $data ) {
		
		foreach ( $data as $i=>$record ) {
			
			// Name and surname
			if ( !empty($record[$this->alias]['name']) ) 	$record[$this->alias]['fullName'] = 	$record[$this->alias]['name'];
			if ( !empty($record[$this->alias]['surname']) ) $record[$this->alias]['fullName'] .= 	' ' . $record[$this->alias]['surname'];
			if ( isset($record[$this->alias]['fullName']) ) $record[$this->alias]['fullName'] = 	trim($record[$this->alias]['fullName']);
			
			// Fallback to username
			if ( empty($record[$this->alias]['fullName']) && isset($record[$this->alias]['username']) ) {		
				$record[$this->alias]['fullName'] = $record[$this->alias]['username'];
			}
			
			$data[$i] = $record;
			
		}
		
		return $data;
		
	}
	
	
	/**
	 * Has user's password before save data to persistance layer
	 */
	public function beforeSave() {
		
		// Username to lower!
		if ( !empty($this->data[$this->alias]['username'])) {
			$this->data[$this->alias]['username'] = strtolower($this->data[$this->alias]['username']);
		}
		
		// Hash password or remove field!
		if ( !empty($this->data[$this->alias]['password'])) {
			$this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
		} else {
			unset($this->data[$this->alias]['password']);
		}
		
		return true;
		
	}
	
	/**
	 * Return a user profile data.
	 * [simply removes password from dataset!]
	 */
	public function profile( $id = null ) {
		
		// Set internal ID from optional param
		if ( $id ) $this->id = $id;
		
		// try to find a record or return an error code
		$item = $this->read();
		if ( !$item ) return false;
		
		// unset unrequired fields and return a profile dataset
		unset($item[$this->alias]['password']);
		return $item;
		
	}
	
}