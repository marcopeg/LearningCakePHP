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
		
		id: 'profileForm',
		el: '#profile',
		
		events: {
			'submit' : 'onSubmit'
		},
		
		initialize: function() {
			
			// Pre DOM manipulations
			this.$el.append('<p><a href="#logout" style="margin-left:10px">Logout!</a></p>');
			
			// parent::initialize()
			this.$apply( 'initialize', arguments );
			
			this.$form 		= this.$el.find( 'form' );
			this.restUrl 	= baseUrl + 'users/index.json';
			
		},
		
		render: function( shown ) {
			
			if ( shown ) this.loadProfile();
			
		},
		
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
			
			$.noty.error( "Login required!" );
			
			App.Router.navigate( 'login', { trigger:true });
			
		},
		
		onSubmit: function( e ) {
			
			e.preventDefault();
			
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
			
			err = $.parseJSON(err.responseText);
			if ( err._response.redirect ) this.onProfileError();
			
		},
		
	t:3});
	
});