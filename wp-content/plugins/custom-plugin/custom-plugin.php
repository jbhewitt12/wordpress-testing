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

// WP Shortcode to display text on page or post.
function wp_first_shortcode(){

	$request = wp_remote_get( 'https://jsonplaceholder.typicode.com/posts?_limit=5' );
	if( is_wp_error( $request ) ) {
		return false; // Bail early
	}
	$body = wp_remote_retrieve_body( $request );
	$data = json_decode( $body );
	echo $body;
	if( ! empty( $data ) ) {
	
		// echo '<ul>';
		// foreach( $data as $post ) {
		// 	echo '<li>';
		// 		echo '<p>' . $post->title . '</p>';
		// 	echo '</li>';
		// }
		// echo '</ul>';

		echo '<div class"="container">';
		foreach( $data as $post ) {
			echo '<h2>'.$post->title. '</h2>';
			echo '<p>'.$post->body. '</p>';
		}
		echo '</div>';



	}

	// $request = wp_remote_get( 'https://pippinsplugins.com/edd-api/products' );
	// if( is_wp_error( $request ) ) {
	// 	return false; // Bail early
	// }
	// $body = wp_remote_retrieve_body( $request );
	// echo $body;
	// $data = json_decode( $body );
	// if( ! empty( $data ) ) {
		
	// 	echo '<ul>';
	// 	foreach( $data->products as $product ) {
	// 		echo '<li>';
	// 			echo '<a href="' . esc_url( $product->info->link ) . '">' . $product->info->title . '</a>';
	// 		echo '</li>';
	// 	}
	// 	echo '</ul>';
	// }
}
add_shortcode("custom-plugin", "wp_first_shortcode");


// class CustomPlugin {

// }

// $customPlugin = new CustomPlugin(); 