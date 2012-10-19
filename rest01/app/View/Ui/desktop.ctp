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
 * Desktop App Interface
 * =====================
 *
 * creates an one-page-app to be handled by javascript with transitione effects
 * and AJAX client/server comunications
 *
 * NOTICE: forms are shared between every kind of applications so become very easy to
 * add or remove fields to each app!
 *
 */

$this->layout = 'ajax';

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>imCloud</title>
		
		<?php
		// Default CSS
		echo $this->Html->css(array(
			'desktop'
		));
		?>
		
	</head>
	<body>
		<?php
		
		/**
		 * Page Main DOM Structure
		 */
		echo $this->Html->tag(array(
			'id' 		=> 'content',
			'content' 	=> array(
				
				# Registration Form
				array(
					'id'		=> 'registration',
					'class'		=> 'card-panel',
					'content' 	=> $this->element( 'registration_form' )
				),
				
				# Login Form
				array(
					'id'		=> 'login',
					'class'		=> 'card-panel',
					'content' 	=> $this->element( 'login_form' )
				),
				
				# Profile Update Form
				array(
					'id'		=> 'profile',
					'class'		=> 'card-panel',
					'content' 	=> $this->element( 'profile_form' )
				)
			
			)
		));
		
		
		
		
		/**
		 * Intro Curtain
		 */
		echo '<div id="curtaineroftheapp"></div>';
		
		
		
		
		/**
		 * Javascript Output Point
		 */
		
		echo $this->Html->script(array(
			'libs/html5shiv/html5shiv' 	=> 'lt IE 9',
			'libs/require/require-jquery.js'	=> array( 'data-main'=>'desktop' )
		));
		
		echo $this->Html->tag(array(
			'name' => 'script',
			'type' => 'text/javascript',
			'content' => 'var baseUrl = "'.Router::url('/').'";'
		));
		?>
		
		
		
		
	</body>
</html>


