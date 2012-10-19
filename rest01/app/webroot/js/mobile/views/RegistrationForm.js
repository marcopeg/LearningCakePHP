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
		
		el: '#registration',
		id: 'registration',
		
		initialize: function() {
			
			this.$apply( 'initialize', arguments );
			
			this.$form 		= this.$el.find( 'form' );
			this.restUrl 	= baseUrl + 'users/register.json';
			
		},
		
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
			
			$.noty.confirm( 'registration success, now login!' );
			
			$.mobile.changePage('#login',{
				transition: 'flip'
			});
			
		},

		
	t:3});
	
});