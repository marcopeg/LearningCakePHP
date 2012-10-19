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

define(["jquery","underscore","backbonekit","mobile/views/Form"],function(e,t,n,r){return r.extend({el:"#login",id:"login",onSubmit:function(n){n.preventDefault(),n.stopPropagation(),e.mobile.loading("show"),this.$el.find("form").ajaxSubmit({url:baseUrl+"users/login.json",success:t.bind(this.onSuccess,this),error:t.bind(this.onError,this)})},onSuccess:function(t){e.mobile.loading("hide"),e.noty.confirm("login success!"),e.mobile.changePage("#profile",{transition:"flip"})},onError:function(t){e.mobile.loading("hide"),e.noty.error("login error")},t:3})})