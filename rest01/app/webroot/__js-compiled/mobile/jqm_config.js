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

define(["jquery","underscore","backbonekit","mobile/views/RegistrationForm","mobile/views/LoginForm","mobile/views/ProfileForm"],function(e,t,n,r,i,s){App.RegistrationForm=new r,App.LoginForm=new i,App.ProfileForm=new s,e(document).bind("mobileinit",function(){setTimeout(function(){App.$curtain.fadeOut()},500)}),e("#profile").bind("pagebeforeshow",App.ProfileForm.loadProfile)})