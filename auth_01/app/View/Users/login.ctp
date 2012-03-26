<?php

echo $this->Html->tag( 'h2', 'User Login' );


echo $this->Form->create();
echo $this->Form->input('username');
echo $this->Form->input('password');
echo $this->Form->end('Login');
