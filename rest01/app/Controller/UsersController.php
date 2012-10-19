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
 
 
class UsersController extends AppController {
	
	
	/**
	 * Authentication layer configuration
	 */
	public $components = array(
		
		'Auth' => array(
			'loginRedirect' => array(
				'controller'	=> 'users',
				'action'		=> 'index'
			),
			'logoutRedirect' => array(
				'controller'	=> 'users',
				'action'		=> 'login'
			),
			'allowedActions' => array(
				'*',
			)
		),
		
		'RequestHandler'
	);
	
	
	
	
	
	
	
	
	/**
	 * Edit logged-in user profile.
	 * if user is not authenticated yet AuthComponent will move it to the login action
	 *
	 * We should protect this action with Authentication component but this way we
	 * open our business logic to both FORM and REST requests.
	 */
	public function index() {
		
		// Fetch logged in user's data.
		$user = $this->User->profile( $this->Auth->user('id') );
		
		// prevent incorrect session exceptions
		if ( !$user ) return $this->Session->error( __('invalid session'), array(
			'controller'	=> 'users',
			'action'		=> 'login'
		));
		
		// try to updates profile data
		if ( !empty($this->request->data) ) {
			
			// binds form data to actual logged-in user record!
			$this->request->data['User']['id'] = $this->User->id;
			
			// REST: we always need to setup passwords fields but we want to be optionals params
			// to rest requests!
			if ( !isset($this->request->data['User']['password']) ) 		$this->request->data['User']['password'] 			= '';
			if ( !isset($this->request->data['User']['password_confirm']) ) $this->request->data['User']['password_confirm'] 	= '';
			
			// Save Action
			if ( $this->User->save($this->request->data) ) {
				
				// confirm updated action
				return $this->Session->success( __('profile updated'), array(
					'controller'	=> 'users',
					'action'		=> 'index'
				), 
				// 3rd param -->
				// here we send pass updated user's profile data as 3rd argument to success() method.
				// this is used by REST or AJAX method to send some data back to requesting object.
				$this->User->profile() );
				
			} else {
				
				// 3rd param set to true teach REST response to give back request data structure.
				return $this->Session->error( __('errors found'), null, true );
				
			}
			
		// HTML:
		// setup request data from logged-in user record
		} else {
			
			$this->request->data = $user;
			
		}
		
		// REST: 
		// using this action in "GET" mode will supply profile's data
		// 3rd param send back a user's profile data to a REST request.
		if ( $this->request->is('rest') ) return $this->Session->success( __('user profile'), null, $user );
		
	}
	
	
	
	
	
	
	
	
	/**
	 * Creates new user account
	 */
	public function register() {
		
		if ( !empty($this->request->data) ) {
			
			if ( $this->User->save($this->request->data) ) {
				
				// Save a link to last registered user to welcome it!
				$this->Session->write( 'welcome', $this->User->id );
				
				// Confirm action and suggest next resource to use
				return $this->Session->success( __('user was created'), array(
					'controller' 	=> 'users',
					'action'		=> 'welcome'
				), 
				// 3rd param -->
				// here we send pass new user's profile data as 3rd argument to success() method.
				// this is used by REST or AJAX method to send some data back to requesting object.
				$this->User->profile() ); 
				
			} else {
				
				return $this->Session->error( __('errors found'), null, true );
				
			}
			
		}
		
		// REST: alert a bad usages for GET requests!
		$this->tell( __('you need to send post data to register new users!') );
		
	}
	
	/**
	 * Welcome new registered user
	 */
	public function welcome() {
		
		// user is already logged in!
		if ( $this->Auth->user('id') ) $this->redirect(array(
			'controller'	=> 'users',
			'action'		=> 'index'
		));
		
		// try to read data from last registered user
		$this->User->id = $this->Session->read('welcome');
		
		// can't find a valid user
		if ( !$this->User->read() ) $this->redirect(array(
			'controller' 	=> 'users',
			'action'		=> 'register'
		));
		
		$this->set( 'user', $this->User->data );
		
	}
	
	
	
	
	
	
	
	
	
	
	
	/**
	 * Authenticate User
	 */
	
	public function login() {
		
		if ( $this->request->is('post') ) {
			
			$this->Auth->logout();
			
			// username to lower!
			$this->request->data['User']['username'] = strtolower($this->request->data['User']['username']);
			
			if ( $this->Auth->login() ) {
				
				return $this->Session->success( __('login success'), $this->Auth->redirect(), array(
					'User' => $this->Auth->user()
				));
				
			} else {
				
				return $this->Session->error( __('incorrect username or password'), null, array(
					'requestData' => true
				));
				
			}
			
		}
		
		// REST: alert a bad usages for GET requests!
		if ( $this->request->is('rest') ) return $this->Session->error( __('you need to send post data to login users!') );
		
	}
	
	
	/**
	 * Ends Authentication Session
	 */
	
	public function logout() {
		
		$this->Session->success( __('good bye!'), $this->Auth->logout() );
		
	}
	
	
	
	
	
	
}