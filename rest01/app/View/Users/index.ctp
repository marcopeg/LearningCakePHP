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
 * Edit Profile Form
 */


echo $this->element('profile_form');

echo $this->Html->link( __('logout'), array(
	'controller'	=> 'users',
	'action'		=> 'logout'
)); 