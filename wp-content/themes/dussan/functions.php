<?php

function dussan_scripts_method() {

	wp_register_script('dussan_plugins',get_template_directory_uri() . '/js/plugins.js','','',true);
	wp_enqueue_script( 'dussan_plugins' );

	wp_register_script('dussan_script',get_template_directory_uri() . '/js/script.js','','',true);
	wp_enqueue_script( 'dussan_script' );

	wp_register_script('dussan_modernizr',get_template_directory_uri() . '/js/libs/modernizr-2.5.3.min.js','','',false);
	wp_enqueue_script( 'dussan_modernizr' );

	wp_enqueue_script( 'jquery' );

}    
 
add_action('wp_enqueue_scripts', 'dussan_scripts_method');
