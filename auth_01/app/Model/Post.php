<?php
App::uses('AppModel', 'Model');
/**
 * Post Model
 *
 * @property User $User
 * @property Reply $Reply
 */
class Post extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';

/**
 * Validation Rules
 *
 */
	public $validate = array(
		'title' => array(
			'rule' 				=> 'notempty',
			'required' 			=> true
		),
		'content' => array(
			'rule' 				=> 'notempty',
			'required' 			=> true
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
		)
	);

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User'
	);
	
	

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Reply' => array(
			'className' 	=> 'Reply',
			'foreignKey' 	=> 'post_id',
			'dependent' 	=> false,
		)
	);
	
	
/**
 * Custom Validation
 * ensures that given user exists in database
 */
	public function validateUserExists() {
		
		return $this->User->exists( $this->data[$this->alias]['user_id'] );
	
	}
	
	

/**
 * Increase reply counter and last-reply-date
 * -> triggered by Reply::afterSave()
 */
	public function increaseRepliesNum( $postId ) {
		
		// Fetch post's data
		$this->recursive = 0;
		$post = $this->findById($postId,array('num_replies','last_reply_date'));
		if ( empty($post) ) return false;
		
		// Increment replies counter
		$post[$this->alias]['num_replies'] += 1;
		$post[$this->alias]['last_reply_date'] = date('Y-m-d H:i:s',time());
		
		// Save data
		return $this->save($post,false);
		
	}

}
