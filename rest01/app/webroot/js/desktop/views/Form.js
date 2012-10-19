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

define(['jquery','underscore','backbonekit'], function($,_,Backbone){
	
	return Backbone.View.extend({
		
		initialize: function() {
			
			this.$el.hide();
			this.parent.$el.append( this.$el );
			
			// label to placeholder utility
			this.$el.find('input').each(function(){
				$(this).attr( 'placeholder', $(this).parent().find('label').text() );
			});
			
		},
		
		hide: function() {
			
			this.$el.hide();
			
			return this.render( false );
			
		},
		
		show: function() {
			
			this.$el.fadeIn();
			
			return this.render( true );
			
		},
		
	t:3});
	
});