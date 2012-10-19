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
 * jQuery Mobile Startup
 * 
 */
define(['jquery','underscore','backbonekit'
	
	,'mobile/views/RegistrationForm'
	,'mobile/views/LoginForm'
	,'mobile/views/ProfileForm'

],function($,_,Backbone
	
	,RegistrationForm
	,LoginForm
	,ProfileForm
	
) {
	
	
	/**
	 * Set up internal views who handles forms
	 */
	
	App.RegistrationForm 	= new RegistrationForm();
	App.LoginForm 			= new LoginForm();
	App.ProfileForm 		= new ProfileForm();
	
	
	
	$(document).bind("mobileinit", function(){
		
		setTimeout(function(){
			App.$curtain.fadeOut();
		},500);
		
	});
	
	
	$('#profile').bind('pagebeforeshow', App.ProfileForm.loadProfile );
	
	
});