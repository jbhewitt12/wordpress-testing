<?php

/**
* @package CustomPlugin
*/

/*
Plugin Name: Custom Plugin 
Plugin URI: http://localhost/wordpress-testing/custom-plugin
Description: A custom plugin for WordPress.
Version: 1.0.0
Author: Joshua Hewitt
Author URI: https://github.com/jbhewitt12
License: GPLv2 or later
Text Domain: custom-plugin
*/

if (!defined('ABSPATH')){
	die;
}

// WP Shortcode to display list of posts from external API.
function custom_shortcode(){

	$request = wp_remote_get( 'https://jsonplaceholder.typicode.com/posts?_limit=10' );
	if( is_wp_error( $request ) ) {
		return false; // end if something goes wrong
	}
	$body = wp_remote_retrieve_body( $request );
	$data = json_decode( $body );
	// echo $body;
	if( ! empty( $data ) ) {

		echo '<div class"="container">';
		foreach( $data as $post ) {
			echo '<h2>'.$post->title. '</h2>';
			echo '<p>'.$post->body. '</p>';
		}
		echo '</div>';

	}

}
add_shortcode("custom-plugin", "custom_shortcode");
