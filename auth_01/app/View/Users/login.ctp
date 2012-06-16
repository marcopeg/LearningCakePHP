<?php
#$this->extend('CakePanel.Common/login');

$this->assign('title_for_view','User\'s Login');


echo $this->Form->create(null);


// Fields container.
echo $this->Html->tag( 'div',array(
	
	$this->Form->input('username',array(
		'placeholder' 	=> 'email@example.com',
		'div' 			=> array( 'class'=>'field' )
	)),
	
	$this->Form->input('password',array(
		'placeholder' 	=> 'xxx',
		'div' 			=> array( 'class'=>'field' )
	))
	

// Fields container options.	
), array(
	'class'=>'login_fields'
));

echo $this->Form->end(array(
	'label' => 'Login',
	'class' => 'btn btn-primary',
	'div' 	=> array( 'class'=>'login_actions' )
));
