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
 
 define(['jquery','underscore','backbonekit'], function($,_,Backbone){
	
	return Backbone.Router.extend({
		
		routes: {
			"register" 	: "register",
			"login"		: "login",
			"profile"	: "profile",
			"*actions"	: "defaultRoute"
		},
		
		defaultRoute: function() {
			
			App.Router.navigate( "login", {trigger:true} );
			
		},
		
		register: function() {
			
			App.Viewport.render('registration');
			
		},
		
		login: function() {
			
			App.Viewport.render('login');
			
		},
		
		profile: function() {
			
			App.Viewport.render('profile');
			
		},
		
	t:3});
	
});