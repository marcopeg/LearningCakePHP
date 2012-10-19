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
 
 
/**
 * Login Form
 */

echo $this->element( 'login_form' );

echo $this->Html->link( __('register new user'), array(
	'controller' 	=> 'users',
	'action'		=> 'register'
)); 