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
 
 
 
 /**
 * DEPLOYMENT INSTRUCTIONS:
 * --------------------------------------------------
 * 
 * 1. rename "webroot/js" to "webroot/js-dev"
 * 2. open "Terminal" from "webroot/js-dev"
 * 3. type: "node ./r.js -o build.js"
 *
 */


({
    appDir: 	"./",
    baseUrl: 	"./",
    dir: 		"../js-compiled",
    
    //Comment out the optimize line if you want
    //the code minified by UglifyJS
    optimize: "uglify",
    
    paths: {
		
		// Libraries
		text:			'./libs/require/text'
		,jquery: 		'empty:'
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
		
		
		// Setup jqm_configuration dependency object
		,'jqm/jquery.mobile-1.2.0' : { deps: [ 'mobile/jqm_config' ] }
		
	},

    modules: [{
	    name: "desktop"
    },{
	    name: "mobile"
    }]
    
})
