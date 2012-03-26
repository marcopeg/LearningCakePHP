<?php
App::uses('AppController', 'Controller');
/**
 * Replies Controller
 *
 * @property Reply $Reply
 */
class RepliesController extends AppController {


/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Reply->recursive = 0;
		$this->set('replies', $this->paginate());
	}

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->Reply->id = $id;
		if (!$this->Reply->exists()) {
			throw new NotFoundException(__('Invalid reply'));
		}
		$this->set('reply', $this->Reply->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			
			// Bind to login user. (move to model's beforeSave??)
			$this->request->data[$this->Reply->alias]['user_id'] = $this->Auth->user('id');
			
			$this->Reply->create();
			if ($this->Reply->save($this->request->data)) {
				$this->Session->setFlash(__('The reply has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The reply could not be saved. Please, try again.'));
			}
		}
		$posts = $this->Reply->Post->find('list');
		$this->set(compact('posts', 'users'));
	}

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->Reply->id = $id;
		if (!$this->Reply->exists()) {
			throw new NotFoundException(__('Invalid reply'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Reply->save($this->request->data)) {
				$this->Session->setFlash(__('The reply has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The reply could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Reply->read(null, $id);
		}
		$posts = $this->Reply->Post->find('list');
		$users = $this->Reply->User->find('list',array( 'fields' => array( 'User.id', 'User.username' ) ));
		$this->set(compact('posts', 'users'));
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
		$this->Reply->id = $id;
		if (!$this->Reply->exists()) {
			throw new NotFoundException(__('Invalid reply'));
		}
		if ($this->Reply->delete()) {
			$this->Session->setFlash(__('Reply deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Reply was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
