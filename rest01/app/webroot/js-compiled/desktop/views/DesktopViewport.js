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

define(["jquery","underscore","backbonekit","desktop/views/RegistrationForm","desktop/views/LoginForm","desktop/views/ProfileForm"],function(e,t,n,r,i,s){return n.View.extend({initialize:function(){this.RegistrationForm=new r({parent:this}),this.LoginForm=new i({parent:this}),this.ProfileForm=new s({parent:this})},render:function(t){switch(t){case"registration":this.LoginForm.hide(),this.ProfileForm.hide(),this.RegistrationForm.show();break;case"login":this.LoginForm.show(),this.ProfileForm.hide(),this.RegistrationForm.hide();break;case"profile":this.LoginForm.hide(),this.ProfileForm.show(),this.RegistrationForm.hide()}setTimeout(function(){e("#curtaineroftheapp").fadeOut()},500)},t:3})})