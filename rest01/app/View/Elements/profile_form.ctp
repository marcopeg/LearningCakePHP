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
 * Profile Form Element
 */

echo $this->Form->create('User');

echo $this->Form->inputs(array(
	'legend' => PowerString::tpl( __('My Profile :: {User.fullName} '), $this->data, array('::  ') ),
	'name',
	'surname'
));

echo $this->Form->inputs(array(
	'legend' => __('Change Password'),
	'password',
	'password_confirm' => array( 'type'=>'password' )
));

echo $this->Form->end('Apply Changes');
?>