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
 * Desktop Viewport
 *
 */

define(['jquery','underscore','backbonekit'
	
	,'desktop/views/RegistrationForm'
	,'desktop/views/LoginForm'
	,'desktop/views/ProfileForm'

], function($,_,Backbone
	
	,RegistrationForm
	,LoginForm
	,ProfileForm

){
	
	return Backbone.View.extend({
		
		initialize: function() {
			
			// sub views initialization
			this.RegistrationForm 	= new RegistrationForm({	parent:this	});
			this.LoginForm 			= new LoginForm({			parent:this	});
			this.ProfileForm 		= new ProfileForm({			parent:this	});
			
		},
		
		render: function( view ) {
			
			
			
			switch ( view ) {
				
				case 'registration':
					this.LoginForm.hide();
					this.ProfileForm.hide();
					this.RegistrationForm.show();
					break;
					
				case 'login':
					this.LoginForm.show();
					this.ProfileForm.hide();
					this.RegistrationForm.hide();
					break;
					
				case 'profile':
					this.LoginForm.hide();
					this.ProfileForm.show();
					this.RegistrationForm.hide();
					break;	
				
			}
			
			// Hide Curtain
			setTimeout(function(){
				$('#curtaineroftheapp').fadeOut();
			},500);
			
			
		},
		
			
	t:3});
	
});