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
 * Login Form
 * 
 */

define(['jquery','underscore','backbonekit'
	
	,'mobile/views/Form'
	
],function($,_,Backbone

	,Form

) {
	
	return Form.extend({
		
		el: '#login',
		id: 'login',
		
		onSubmit: function( e ) {
			
			e.preventDefault();
			e.stopPropagation();
			
			$.mobile.loading( 'show' );
			
			this.$el.find('form').ajaxSubmit({
				url:		baseUrl + 'users/login.json',
				success: 	_.bind( this.onSuccess, this ),
				error:		_.bind( this.onError, this )
			});
			
			
		},
		
		onSuccess: function( data ) {
			
			$.mobile.loading( 'hide' );
			
			$.noty.confirm( 'login success!' );
			
			$.mobile.changePage('#profile',{
				transition: 'flip'
			});
			
			
		},
		
		onError: function( err ) {
			
			$.mobile.loading( 'hide' );
			
			$.noty.error( 'login error' );
			
		},

		
	t:3});
	
});