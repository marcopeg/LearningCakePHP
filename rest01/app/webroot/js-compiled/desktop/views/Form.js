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

define(["jquery","underscore","backbonekit"],function(e,t,n){return n.View.extend({initialize:function(){this.$el.hide(),this.parent.$el.append(this.$el),this.$el.find("input").each(function(){e(this).attr("placeholder",e(this).parent().find("label").text())})},hide:function(){return this.$el.hide(),this.render(!1)},show:function(){return this.$el.fadeIn(),this.render(!0)},t:3})})