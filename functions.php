<?php
wp_enqueue_style( 'style', get_stylesheet_uri() );

function register_my_menu() {
	register_nav_menu('header-menu',__( 'Header Menu' ));
}
add_action( 'init', 'register_my_menu' );

add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails' );

add_image_size( 'window-preview', 300, 300, true );
?>