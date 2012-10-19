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

	,'desktop/views/Form'

], function($,_,Backbone

	,Form

){
	
	return Form.extend({
		
		id: 'loginForm',
		el: '#login',
		
		events: {
			'submit' : 'onSubmit'
		},
		
		initialize: function() {
			
			// Pre DOM manipulations
			this.$el.append('<p>Or register and <a href="#register">create new account!</a></p>');
			
			// parent::initialize()
			this.$apply( 'initialize', arguments );
			
		},
		
		onSubmit: function( e ) {
			
			e.preventDefault();
			
			this.$el.find('form').ajaxSubmit({
				url:		baseUrl + 'users/login.json',
				success: 	_.bind( this.onSuccess, this ),
				error:		_.bind( this.onError, this )
			});
			
		},
		
		onSuccess: function( data ) {
			
			$.noty.confirm("Ok, logged in");
			
			App.Router.navigate( 'profile', { trigger:true} );
			
		},
		
		onError: function( err ) {
			
			//console.log( $.parseJSON(err.responseText) );
			$.noty.error("Login failed");
			
		},
		
	t:3});
	
});