<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {
	
	
	public $adminActions = array();
	
	/*
	public $__paginate = array(
		'limit' => 99999
	);
	*/
	
	
	
	public function beforeRender() {
		
		parent::beforeRender();
		
		$this->set('roles',array(
			'admin' 	=> 'Blog Manager',
			'author'	=> 'Blog Author'
		));
		
		PowerMenu::setActive('admin.sidebar.users');
	
	}
	
	
	
/**
 * Authenticathion Actions
 */
	function login() {
		
		if ( $this->request->is('post') ) {
			
			if ( $this->Auth->login() ) {
				$this->redirect($this->Auth->redirect());
				
			} else {
				$this->Session->ko(__('Invalid username or password'));
				
			}
			
		}
		
	}
	
	
	function logout() { $this->redirect($this->Auth->logout()); }


/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->set('user', $this->User->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
	}

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		
		
		
		$app_actions = PowerApp::adminActions();
		$this->set(compact('app_actions'));
		

		
		
		if ($this->request->is('post') || $this->request->is('put')) {
			
			
			$this->request->data[$this->User->alias]['permissions'] = array();
			foreach ( PowerApp::adminActionsList() as $name=>$action ) {
				
				$perm = $action['controller'].'__'.$action['method'];
					
				if ( isset($this->request->data[$this->User->alias][$perm]) && !empty($this->request->data[$this->User->alias][$perm]) ) {
					$this->request->data[$this->User->alias]['permissions'][] = $perm;
				}
			}
			
			
			
			if ($this->User->save($this->request->data)) {
				$this->ok(__('The user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->ko(__('The user could not be saved. Please, try again.'));
			}
			
		} else {
			$this->request->data = $this->User->read(null, $id);
			unset($this->request->data[$this->User->alias]['password']);
			
		}
		
	}

/**
 * admin_delete method
 *
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->User->delete()) {
			$this->Session->setFlash(__('User deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('User was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
