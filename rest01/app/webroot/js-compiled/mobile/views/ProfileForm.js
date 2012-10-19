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

define(["jquery","underscore","backbonekit","mobile/views/Form"],function(e,t,n,r){return r.extend({el:"#profile",id:"profile",initialize:function(){this.$apply("initialize",arguments),this.$form=this.$el.find("form"),this.restUrl=baseUrl+"users/index.json"},loadProfile:function(){e.ajax({url:this.restUrl,type:"GET",dataType:"json",success:this.setProfile,error:this.onProfileError,context:this})},setProfile:function(e){this.$form.find("#UserName").val(e.User.name),this.$form.find("#UserSurname").val(e.User.surname)},onProfileError:function(t){e.mobile.changePage("#login",{transition:"flip"})},onSubmit:function(e){this.$apply("onSubmit",arguments),this.$el.find("form").ajaxSubmit({url:this.restUrl,dataType:"json",success:t.bind(this.onSuccess,this),error:t.bind(this.onError,this)})},onSuccess:function(t){e.noty.confirm(t._response.message)},onError:function(t){t=e.parseJSON(t.responseText);if(t._response.redirect)return this.onProfileError();this.$apply("onError",arguments)},t:3})})