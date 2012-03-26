<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses( 'CakePanelController', 'CakePanel.Controller' );

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends CakePanelController {
	
	public $components = array(
		'Auth' => array(
			'loginAction'			=> array( 'controller'=>'users', 'action'=>'login', 'admin'=>false ),
			'loginRedirect' 		=> array( 'controller'=>'posts', 'admin'=>true ),
			'logoutRedirect' 		=> array( 'controller'=>'posts', 'admin'=>true ),
			'authorize'				=> 'Controller'
		),
	);
	
	public function beforeFilter() {
		
		if ( empty($this->request->params['admin']) ) {
			$this->Auth->allow( '*' );
			
		} else {
			$this->Auth->allow( 'login', 'logout', 'index' );
			
		}
		
		
	}
	
	public function isAuthorized() {
		
		if ( empty($this->request->params['admin']) ) return true;
		
		// Superuser access control.
		if ( $this->Auth->user('role') == 'admin' ) return true;
		
		// Permission based access control.
		if ( $this->Auth->user(get_class($this) . '__*') ) return true;
		if ( $this->Auth->user(get_class($this) . '__' . $this->request->params['action']) ) return true;
		
		return false;
	
	}
	
	
}
