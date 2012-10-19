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

define(["jquery","underscore","backbonekit","desktop/views/Form"],function(e,t,n,r){return r.extend({id:"loginForm",el:"#login",events:{submit:"onSubmit"},initialize:function(){this.$el.append('<p>Or register and <a href="#register">create new account!</a></p>'),this.$apply("initialize",arguments)},onSubmit:function(e){e.preventDefault(),this.$el.find("form").ajaxSubmit({url:baseUrl+"users/login.json",success:t.bind(this.onSuccess,this),error:t.bind(this.onError,this)})},onSuccess:function(t){e.noty.confirm("Ok, logged in"),App.Router.navigate("profile",{trigger:!0})},onError:function(t){e.noty.error("Login failed")},t:3})})