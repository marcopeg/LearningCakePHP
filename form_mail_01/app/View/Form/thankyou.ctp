<?php
/**
 * Thankyou page view
 */
 
echo $this->Html->tag( 'h2', 'Message was sent!' );
echo $this->Html->tag( 'p', 'We really thank you for sending us a feedback!' );
echo $this->Html->link( 'Send another message &raquo', array( 'controller'=>'form' ), array( 'escape'=>false ));