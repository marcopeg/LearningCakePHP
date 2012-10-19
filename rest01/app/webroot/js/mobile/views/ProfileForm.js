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
 * Profile Form
 * 
 */
define(['jquery','underscore','backbonekit'
	
	,'mobile/views/Form'
	
],function($,_,Backbone

	,Form

) {
	
	return Form.extend({
		
		el: '#profile',
		id: 'profile',
		
		initialize: function() {
			
			this.$apply( 'initialize', arguments );
			
			this.$form 		= this.$el.find( 'form' );
			this.restUrl 	= baseUrl + 'users/index.json';
			
		},
		
		
		
		
		
		/**
		 * Profile Handling
		 */
		
		loadProfile: function() {
			
			$.ajax({
				url: 		this.restUrl,
				type: 		"GET",
				dataType: 	'json',
				success:	this.setProfile,
				error:		this.onProfileError,
				context:	this
			});	
			
		},
		
		setProfile: function( data ) {
			
			this.$form.find('#UserName').val( data.User.name );
			this.$form.find('#UserSurname').val( data.User.surname );
			
		},
		
		onProfileError: function( err ) {
			
			$.mobile.changePage('#login',{
				transition: 'flip'
			});
			
		},
		
		
		
		/**
		 * Form Handling
		 */
		
		onSubmit: function( e ) {
			
			this.$apply( 'onSubmit', arguments );
			
			this.$el.find('form').ajaxSubmit({
				url:		this.restUrl,
				dataType:	'json',
				success: 	_.bind( this.onSuccess, this ),
				error:		_.bind( this.onError, this )
			});
			
		},
		
		onSuccess: function( data ) {
			
			$.noty.confirm( data._response.message );
			
		},
		
		onError: function( err ) {
			
			// Check login status
			err = $.parseJSON(err.responseText);
			if ( err._response.redirect ) return this.onProfileError();
			
			this.$apply( 'onError', arguments );
			
		},

		
	t:3});
	
});