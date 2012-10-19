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
define(['jquery','underscore','backbonekit','jqp/jquery.form'],function($,_,Backbone) {
	
	return Backbone.View.extend({
		
		events: {
			'submit' : 'onSubmit',
			'click input' : 'resetInput'
		},
		
		initialize: function() {
			
			// Setup 
			this.$el.find('form .input').each(function(){
				
				var $this = $(this);
				$this.addClass('ui-hide-label');
				
				$this.find('input').attr( 'placeholder', $this.find('label').text() );
				
			});
			
			this.$el.find('form fieldset').each(function() {
				
				var $this = $(this);
				var $legend = $this.find('legend').remove();
				
				var $next = $('<div>').addClass('ui-body ui-body-d');
				$next.append( $this.html() );
				
				$this.after( $next ).remove();
				if ( $legend.length ) $next.before( $('<h3>').html( $legend.html() ) );
				
			});
			
		},
		
		
		onSubmit: function( e ) {
			
			e.preventDefault();
			e.stopPropagation();
			
			this.$('.input .error').remove();
		
		},
		
		onError: function( err ) {
			
			// optional parse responseText to JSON
			if ( err.responseText ) err = $.parseJSON(err.responseText);
			
			// apply error message
			_.each( err._response.validationErrors.fields, function( val, name ){
				
				var $err = $('<p>').addClass('error').css({
					color: 'red'
					
				}).html( val );
				
				this.$('#'+name).after( $err );
				
			}, this);
			
		},
		
		resetInput: function( e ) {
			
			$(e.target).parent().find('.error').remove();
			
		},
		
	t:3});
	
});