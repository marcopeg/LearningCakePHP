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

define(["jquery","underscore","backbonekit","jqp/jquery.form"],function(e,t,n){return n.View.extend({events:{submit:"onSubmit","click input":"resetInput"},initialize:function(){this.$el.find("form .input").each(function(){var t=e(this);t.addClass("ui-hide-label"),t.find("input").attr("placeholder",t.find("label").text())}),this.$el.find("form fieldset").each(function(){var t=e(this),n=t.find("legend").remove(),r=e("<div>").addClass("ui-body ui-body-d");r.append(t.html()),t.after(r).remove(),n.length&&r.before(e("<h3>").html(n.html()))})},onSubmit:function(e){e.preventDefault(),e.stopPropagation(),this.$(".input .error").remove()},onError:function(n){n.responseText&&(n=e.parseJSON(n.responseText)),t.each(n._response.validationErrors.fields,function(t,n){var r=e("<p>").addClass("error").css({color:"red"}).html(t);this.$("#"+n).after(r)},this)},resetInput:function(t){e(t.target).parent().find(".error").remove()},t:3})})