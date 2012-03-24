<?php

echo $this->Html->tag( 'h2', 'The Form' );

echo $this->Form->create();

echo $this->Form->input( 'email' );

echo $this->Form->input( 'subject' );

echo $this->Form->input( 'message' );

echo $this->Form->end('Send Message');
