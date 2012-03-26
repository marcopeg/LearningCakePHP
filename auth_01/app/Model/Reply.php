<?php
App::uses('AppModel', 'Model');
/**
 * Reply Model
 *
 * @property Post $Post
 * @property User $User
 */
class Reply extends AppModel {

/**
 * Validation Rules
 *
 */
	public $validate = array(
		'content' => array(
			'rule' 			=> 'notempty',
			'required' 		=> true
		),
		'user_id' => array(
			'numeric' => array(
				'rule'			=> 'numeric',
				'required'		=> true,
				'allowEmpty'	=> false,
				'on'			=> 'create'
			),
			'userExists' => array(
				'rule' 			=> array( 'validateUserExists' ),
				'message'		=> 'This user does not exists! Please login with a valid user!',
				'on'			=> 'create'
			)
		),
		'post_id' => array(
			'notempty' => array(
				'rule'			=> 'notempty',
				'required'		=> true,
				'on'			=> 'create',
				'message'		=> 'You need to provide a Post\'s id to link this reply to!'
			),
			'numeric' => array(
				'rule'			=> 'numeric',
				'allowEmpty'	=> false,
				'message'		=> 'Please provide a valid Post id!'
			),
			'userExists' => array(
				'rule' 			=> array( 'validatePostExists' ),
				'message'		=> 'This Post does not exists!',
			)
		),
	);

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Post' => array(
			'className' => 'Post',
			'foreignKey' => 'post_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);




/**
 * Custom Validation
 * ensures that given User exists in database
 */
	public function validateUserExists() {
		
		return $this->User->exists( $this->data[$this->alias]['user_id'] );
	
	}
	
/**
 * Custom Validation
 * ensures that given Post exists in database
 */
	public function validatePostExists() {
		
		return $this->Post->exists( $this->data[$this->alias]['post_id'] );
	
	}
	


/**
 * trigger related post's reply conunt increase and last-reply-date update
 */
	public function afterSave( $created ) {
		
		if ( $created ) {
			
			$this->Post->increaseRepliesNum($this->data[$this->alias]['post_id']);
			
		}
	
	}
	
}
