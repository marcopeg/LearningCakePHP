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
 * Welcome page,
 * shown after registration
 */

echo $this->Html->tag(array(
	'name' 		=> 'h2',
	'content'	=> PowerString::tpl( __('Welcome {User.fullName}'), $user )
));

echo $this->Html->tag('p', __('Your data are in our db.<br>Now you can login!') );

echo $this->Html->ul(array(
	$this->Html->link(
		__('login now'),
		array( 'controller'=>'users', 'action'=>'login' )
	),
	$this->Html->link(
		__('add another user'),
		array( 'controller'=>'users', 'action'=>'register' )
	)
));