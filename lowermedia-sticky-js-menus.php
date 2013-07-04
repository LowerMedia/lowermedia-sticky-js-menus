<?php
/*
Plugin Name: LowerMedia Sticky.js Menu's
Plugin URI: http://lowermedia.net
Description: WordPress add sticky.js to menu navigation.  Activate and make your primary menu sticky!  Sticky means having your navigation always visible, the nav fixes itself to the top of the page.
Version: 0.0.4
Stable: 0.0.1
Author: Pete Lower
Author URI: http://petelower.com
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

/*############################################################################################
#	This plugin was design to work out of the box with any theme by adding a class to 
#	the menu container and then manipulating the HTML tag w/ said class by way of JS
#	
#
#	Plugins tested to work with this theme work a tad bit differently.  Instead of 
#	adding a class it uses custom js files that have the main navigational selectors 
#	already defined.  JS manipulates the menus by using the already defined tags. 
#
#	This plugin has been tested on a growing number of themes including:
#   twentytwelve, twentyeleven, responsive, wp-foundation, required-foundation
#
*/


/*############################################################################################
#
#   ADD STICKY JS FILES/LIBRARIES(STICKY.JS)
#   //This function adds sticky javascript libraries and files
*/

function lowermedia_add_sticky_js()  
{  
	//collect info about the theme to point to theme specific js files
	$theme_data = wp_get_theme();
    //echo 'Theme Title:'.$theme_data['Title'];
    //echo '<br/>Parent Title:'.$theme_data['Template'];


    $supported_themes = array (
    	1=>'twentytwelve',
    	2=>'twentyeleven',
    	3=>'twentyten',
    	4=>'wp-foundation',
    	5=>'required-foundation',
    	6=>'responsive',
	);

    // Register and enque sticky.js - Sticky JS http://www.labs.anthonygarand.com/sticky - Anthony Garand anthonygarand.com
	switch ($theme_data['Template'])
	{
		case $supported_themes[1]://2012
			wp_register_script( 'sticky', plugins_url( '/js/jquery.'.$supported_themes[1].'.sticky.js' , __FILE__ ) , array( 'jquery' ), '1.0.0', true);
			wp_register_script( 'run-sticky', plugins_url( '/js/run-'.$supported_themes[1].'-sticky.js' , __FILE__ ), array( 'sticky' ), '1.0.0', true);
		break;
		case $supported_themes[2]://2011
			wp_register_script( 'sticky', plugins_url( '/js/jquery.'.$supported_themes[2].'.sticky.js' , __FILE__ ) , array( 'jquery' ), '1.0.0', true);
			wp_register_script( 'run-sticky', plugins_url( '/js/run-'.$supported_themes[2].'-sticky.js' , __FILE__ ), array( 'sticky' ), '1.0.0', true);
		break;
		case $supported_themes[3]://2010
			//wp_register_script( 'sticky', plugins_url( '/js/jquery.'.$supported_themes[3].'.sticky.js' , __FILE__ ) , array( 'jquery' ), '1.0.0', true);
			wp_register_script( 'sticky', plugins_url( '/js/jquery.sticky.js' , __FILE__ ) , array( 'jquery' ), '1.0.0', true);
			wp_register_script( 'run-sticky', plugins_url( '/js/run-'.$supported_themes[3].'-sticky.js' , __FILE__ ), array( 'sticky' ), '1.0.0', true);
		break;
		case $supported_themes[4]://WP FOUNDATION
			wp_register_script( 'sticky', plugins_url( '/js/jquery.'.$supported_themes[4].'.sticky.js' , __FILE__ ) , array( 'jquery' ), '1.0.0', true);
			wp_register_script( 'run-sticky', plugins_url( '/js/run-'.$supported_themes[4].'-sticky.js' , __FILE__ ), array( 'sticky' ), '1.0.0', true);
		break;
		case $supported_themes[5]:// REQUIRED FOUNDATION
			wp_register_script( 'sticky', plugins_url( '/js/jquery.'.$supported_themes[5].'.sticky.js' , __FILE__ ) , array( 'jquery' ), '1.0.0', true);
			wp_register_script( 'run-sticky', plugins_url( '/js/run-'.$supported_themes[5].'-sticky.js' , __FILE__ ), array( 'sticky' ), '1.0.0', true);
		break;
		case $supported_themes[6]:// RESPONSIVE
			wp_register_script( 'sticky', plugins_url( '/js/jquery.'.$supported_themes[6].'.sticky.js' , __FILE__ ) , array( 'jquery' ), '1.0.0', true);
			wp_register_script( 'run-sticky', plugins_url( '/js/run-'.$supported_themes[6].'-sticky.js' , __FILE__ ), array( 'sticky' ), '1.0.0', true);
		break;
		default:
			wp_register_script( 'sticky', plugins_url( '/js/jquery.sticky.js' , __FILE__ ) , array( 'jquery' ), '1.0.0', true);
			wp_register_script( 'run-sticky', plugins_url( '/js/run-sticky.js' , __FILE__ ), array( 'sticky' ), '1.0.0', true);
			//if we don't know what div to add sticky to we'll assign the primary menu class and add sticky to that
			function my_wp_nav_menu_args( $args = '' )
			{
				$args['container_class'] = 'lowermedia_add_sticky';
				return $args;
			}
			add_filter( 'wp_nav_menu_args', 'my_wp_nav_menu_args' );
	}
	wp_enqueue_script( 'run-sticky' );
}  
add_action( 'wp_enqueue_scripts', 'lowermedia_add_sticky_js' ); 

# Need some modern classic rock? 
# Please checkout: Item 9 & The Mad Hatters - i9MH.com
?>