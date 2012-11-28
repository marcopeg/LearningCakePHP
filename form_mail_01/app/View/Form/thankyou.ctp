<?php
/**
 * Thankyou Page View
 */

echo $this->Html->tag('h1', $this->Html->link('&laquo; CakePHP Tutorial', array('controller'=>'pages'), array('escape'=>false)));
echo $this->Html->tag('h2', 'Message was sent!');
echo $this->Html->tag('p', 'We really thank you for sending us a feedback!');
echo $this->Html->tag('p', '<i>{{ please check your spam folder \'cause this mail is a simple test and sender is a fake address! }}</i>');
echo $this->Html->link('Send another message &raquo', array('controller'=>'form'), array('escape'=>false));