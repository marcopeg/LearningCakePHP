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
 
 
window.__requireJsBaseUrl		= baseUrl + '/js/';
window.__backboneKitBaseUrl 	= window.__requireJsBaseUrl + 'libs/backbonekit/amd_src'; 

require.config({
	
	baseUrl: window.__requireJsBaseUrl,
	
	paths: {
		
		// Libraries
		text:			'./libs/require/text'
		//,jquery: 		'./libs/jquery/jquery.182'
		,underscore:	'./libs/underscore/underscore.133'
		,backbone:		'./libs/backbone/backbone.master'
		,backbonekit:	'./libs/backbonekit/kit.inc'
		
		// jQuery Plugins
		,jqp:			'./libs/jquery_plugins'
		,jqNoty:		'./libs/jquery_plugins/noty'
		
	},
	
	shim: {
		
		// Core Libraries
		jquery: { 		exports:'$' }
		,underscore: { 	exports:'_' }
		,backbone: {	exports:'Backbone',		deps:[ 'underscore', 'jquery' ] }
		,backbonekit: {	exports:'Backbone',		deps:[ 'backbone' ] }
		
	}
	
});





/**
 * Global Application Namespace
 */
var App = {};

/**
 * 
 */
define(['jquery','underscore','backbonekit'
		
	// Application Main Module
	,'desktop/views/DesktopViewport'
	,'desktop/cmp/DesktopRouter'
	
	
	// jQuery Plugins
	,'jqp/jquery.form'
	,'jqNoty/amd'
	
	
], function($,_,Backbone
	
	,DesktopViewport
	,DesktopRouter
	
	
	
){
	
	
	// Viewport Initialization
	App.Viewport = new DesktopViewport().appendTo('#content');
	
	// Start Routing
	App.Router = new DesktopRouter;
	Backbone.history.start();
	
	
});