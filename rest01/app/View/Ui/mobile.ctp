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
 * jQuery Mobile App
 * =================
 *
 * This is a "one page app" skeleton handled with jQueryMobile for developement convenience.
 */

$this->layout = 'ajax';
?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<link rel="apple-touch-icon" href="<?php echo Router::url('/css/icons/Icon@2x.png') ?>">
		
		<title>imCloud</title>
		
		<?php
		// Default CSS
		echo $this->Html->css(array(
			'jqm/jquery.mobile-1.2.0',
			'mobile'
		));
		
		
		// Default Javascript
		// [outputted at the end of the body tag]
		$this->Html->script(array(
			'libs/html5shiv/html5shiv' 	=> 'lt IE 9',
			'libs/require/require-jquery.js'	=> array( 'data-main'=>'mobile' )
		),array(
			'inline' => false
		));
		?>
		
	</head>
	<body>
		
		
		
		<!--[[   R E G I S T R A T I O N   P A G E   ]]-->
		<div data-role="page" id="registration">
			
			<div data-role="header" data-position="fixed">
				<h1>New User</h1>
				<a href="#login" data-icon="arrow-r" data-rel="__dialog" data-transition="flip"  class="ui-btn-right">Login</a>
			</div>
			
			<div data-role="content">
				<?php echo $this->element( 'registration_form' ) ?>
			</div>
		
		</div>
		
		
		
		<!--[[   L O G I N   P A G E   ]]-->
		<div data-role="page" id="login">
			
			<div data-role="header" data-position="fixed">
				<h1>Login Form</h1>
				<a href="#registration" data-icon="arrow-r" data-transition="flip"  class="ui-btn-right">New
				</a>
			</div>
			
			<div data-role="content">
				<?php echo $this->element( 'login_form' ) ?>
			</div>
		
		</div>
		
		
		<!--[[   P R O F I L E   P A G E   ]]-->
		<div data-role="page" id="profile">
			
			<div data-role="header" data-position="fixed">
				<a href="#login" data-icon="delete" data-transition="flip">Logout</a>
				<h1>Profile Form</h1>
			</div>
			
			<div data-role="content">
				<?php echo $this->element( 'profile_form' ) ?>
			</div>
		
		</div>
		
		
		<div id="curtaineroftheapp"></div>
		
		
		<?php
		/**
		 * Javascript Output Point
		 */
		
		echo $this->fetch( 'script' );
		
		echo $this->Html->tag(array(
			'name' => 'script',
			'type' => 'text/javascript',
			'content' => 'var baseUrl = "'.Router::url('/').'";'
		));
		?>
		
	</body>
</html>



