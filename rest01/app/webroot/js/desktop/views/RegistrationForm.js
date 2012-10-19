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
		
		id: 'registrationForm',
		el: '#registration',
		
		events: {
			'submit' : 'onSubmit'
		},
		
		initialize: function() {
			
			this.$el.append('<p>Do you have an account? <a href="#login">Go to login!</a></p>');
			
			this.$apply( 'initialize', arguments );
			
			this.$form 		= this.$el.find( 'form' );
			this.restUrl 	= baseUrl + 'users/register.json';
			
		},
		
		onSubmit: function( e ) {
			
			e.preventDefault();
			e.stopPropagation();
			
			this.$el.find('form').ajaxSubmit({
				url:		this.restUrl,
				dataType:	'json',
				success: 	_.bind( this.onSuccess, this ),
				error:		_.bind( this.onError, this )
			});
			
		},
		
		onSuccess: function( data ) {
			
			$.noty.confirm("Ok, profile created!");
			
			App.Router.navigate( 'login', { trigger:true} );
			
		},
		
		onError: function( err ) {
			
			$.noty.error("Please check errors!");
			
		},
		
		
	t:3});
	
});