<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 * @property Post $Post
 * @property Reply $Reply
 */
class User extends AppModel {

/**
 * Validation Rules
 *
 */
	public $validate = array(
		'username' => array(
			'notempty' => array(
				'rule' 		=> 'notempty',
				'required' 	=> true,
			)
		),
		'password' => array(
			'notemty' => array(
				'rule' => 'notempty',
				'required' 	=> true,
				'on'		=> 'create'
			)
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Post' => array(
			'className' => 'Post',
			'foreignKey' => 'user_id',
			'dependent' => false,
		),
		'Reply' => array(
			'className' => 'Reply',
			'foreignKey' => 'user_id',
			'dependent' => false,
		)
	);
	
	
	
	
	
	function beforeSave() {
		
		if ( !empty($this->data[$this->alias]['id']) && empty($this->data[$this->alias]['password']) ) {
			unset($this->data[$this->alias]['password']);
		}
		
		if ( isset($this->data[$this->alias]['password']) ) {
			$this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
		}
		
		if ( isset($this->data[$this->alias]['permissions']) && is_array($this->data[$this->alias]['permissions']) ) {
			$this->data[$this->alias]['permissions'] = serialize($this->data[$this->alias]['permissions']);
		}
		
		return true;
		
	}
	
	
	function afterFind( $users ) {
		
		foreach ( $users as $i=>$user ) {
			
			if ( isset($user[$this->alias]['permissions']) && !empty($user[$this->alias]['permissions']) ) {
				$user[$this->alias]['permissions'] = @unserialize($user[$this->alias]['permissions']);
			}
			
			if ( empty($user[$this->alias]['permissions']) || !is_array($user[$this->alias]['permissions']) ) {
				$user[$this->alias]['permissions'] = array();
			}
			
			// Expose user's properties as virtual fields.
			foreach ( $user[$this->alias]['permissions'] as $perm ) $user[$this->alias][$perm] = true;
			
			$users[$i] = $user;
		
		}
		
		return $users;
		
	}

}
