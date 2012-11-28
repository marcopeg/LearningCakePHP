<?php

echo $this->Html->tag('h1', $this->Html->link('&laquo; CakePHP Tutorial', array('controller'=>'pages'), array('escape'=>false)));
echo $this->Html->tag('h2', 'Send Mail Form');

// Mail Form
echo $this->Form->create();
echo $this->Form->input('email' ,array(
	'label' => 'Mail To'
));
echo $this->Form->input('subject');
echo $this->Form->input('message');
echo $this->Form->end('Send Message');
