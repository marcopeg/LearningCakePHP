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

define(["jquery","underscore","backbonekit","desktop/views/Form"],function(e,t,n,r){return r.extend({id:"registrationForm",el:"#registration",events:{submit:"onSubmit"},initialize:function(){this.$el.append('<p>Do you have an account? <a href="#login">Go to login!</a></p>'),this.$apply("initialize",arguments),this.$form=this.$el.find("form"),this.restUrl=baseUrl+"users/register.json"},onSubmit:function(e){e.preventDefault(),e.stopPropagation(),this.$el.find("form").ajaxSubmit({url:this.restUrl,dataType:"json",success:t.bind(this.onSuccess,this),error:t.bind(this.onError,this)})},onSuccess:function(t){e.noty.confirm("Ok, profile created!"),App.Router.navigate("login",{trigger:!0})},onError:function(t){e.noty.error("Please check errors!")},t:3})})