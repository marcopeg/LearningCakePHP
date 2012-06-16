<?php
echo $this->Form->create('User',array( 'class'=>'form uniformForm' ));

	echo $this->Html->widget(array(
		'title' 	=> 'Edit Content',
		'content' 	=> array(
			$this->Form->input('id'),
			$this->Form->input('username'),
			$this->Form->inputs(array(
					'legend' => 'Password',
					'password',
					'confirm_password' => array( 'data-tipsy-gravity'=>'sw' )
				)),
			$this->Form->input('role')
		)
	));
	
	
	
	ob_start();
	foreach ( $app_actions as $area=>$controllers ) {
		echo $this->Html->tag( 'h4', $area );
		
		foreach ( $controllers as $controller=>$actions ) {
			
			$fields = array(
				'legend' => $controller
			);
			
			foreach ( $actions as $action=>$info ) {
				
				$permName = $controller . '__' . $action;
				
				$fields[$permName] = array(
					'type' => 'checkbox',
					'label' => $info['label']
				);
			
			}
			
			echo $this->Form->inputs($fields);
		
		}
		
	}
	
	echo $this->Html->widget( 'Permissions', ob_get_clean() );

echo $this->Form->end(__('Submit'));
