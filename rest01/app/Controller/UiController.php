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
 
 
 
class UiController extends AppController {
	
	public function beforeFilter() {
		
		parent::beforeFilter();
		
		#Configure::write( 'debug', 0 );
		
	}
	
	public function index() {
		
		// mobile goes to jQuery Mobile
		if ( $this->request->isMobile() ) {
			
			$this->redirect(array(
				'action' => 'mobile'
			));
		
		// modern browsers goes to Desktop Web App
		} else if ( !PowerConfig::get('request.ua.ie') ) {
			
			$this->redirect(array(
				'action' => 'desktop'
			));	
			
		}
		
		// IE users will receive a meaningful alert then should continue to
		// the standard HTML static interface
		
	}
	
	public function desktop() {}
	
	public function mobile() {}
	
}