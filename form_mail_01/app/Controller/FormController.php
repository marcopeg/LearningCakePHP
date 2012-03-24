<?php
class FormController extends AppController {
	
	public $name = 'Form';
	
	public function index() {
		
		if ( $this->request->is('post') ) {
			
			if ( $this->Form->save($this->request->data) ) {
				
				$this->redirect(array(
					'controller' 	=> 'Form',
					'action'		=> 'thankyou'
				));
				
			}
		
		}
	
	}
	
	public function thankyou() {}
	
}