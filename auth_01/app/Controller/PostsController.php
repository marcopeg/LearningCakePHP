<?php
App::uses('AppController', 'Controller');
/**
 * Posts Controller
 *
 * @property Post $Post
 */
class PostsController extends AppController {





	public function index() {
		
		echo "Blog's public access";
		exit;
	
	}









/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Post->recursive = 0;
		$this->set('posts', $this->paginate());
	}

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->Post->id = $id;
		if (!$this->Post->exists()) {
			throw new NotFoundException(__('Invalid post'));
		}
		$this->set('post', $this->Post->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			
			// Bind to login user.
			$this->request->data[$this->Post->alias]['user_id'] = $this->Auth->user('id');
			
			
			$this->Post->create();
			if ($this->Post->save($this->request->data)) {
				$this->Session->setFlash(__('The post has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The post could not be saved. Please, try again.'));
			}
		}
		$users = $this->Post->User->find('list',array( 'fields' => array( 'User.id', 'User.username' ) ));
		$this->set(compact('users'));
	}

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		
		$this->Post->id = $id;
		if (!$this->Post->exists()) {
			throw new NotFoundException(__('Invalid post'));
		}
		
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Post->save($this->request->data)) {
				$this->Session->setFlash(__('The post has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The post could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Post->read(null, $id);
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
		$this->Post->id = $id;
		if (!$this->Post->exists()) {
			throw new NotFoundException(__('Invalid post'));
		}
		if ($this->Post->delete()) {
			$this->Session->setFlash(__('Post deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Post was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
