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

({appDir:"./",baseUrl:"./",dir:"../js-compiled",optimize:"uglify",paths:{text:"./libs/require/text",jquery:"empty:",underscore:"./libs/underscore/underscore.133",backbone:"./libs/backbone/backbone.master",backbonekit:"./libs/backbonekit/kit.inc",jqp:"./libs/jquery_plugins",jqNoty:"./libs/jquery_plugins/noty"},shim:{jquery:{exports:"$"},underscore:{exports:"_"},backbone:{exports:"Backbone",deps:["underscore","jquery"]},backbonekit:{exports:"Backbone",deps:["backbone"]},"jqm/jquery.mobile-1.2.0":{deps:["mobile/jqm_config"]}},modules:[{name:"desktop"},{name:"mobile"}]})