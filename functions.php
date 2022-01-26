<?php

function theme_enqueue_styles() {
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', [] );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles', 20 );

function avada_lang_setup() {
	$lang = get_stylesheet_directory() . '/languages';
	load_child_theme_textdomain( 'Avada', $lang );
}
add_action( 'after_setup_theme', 'avada_lang_setup' );

add_image_size( 'staff-photo', 220, 300 );

add_filter( 'image_size_names_choose', 'staff_photo_size' );

add_action('widgets_init', 'header_widgets_init');

function staff_photo_size( $sizes ) {
  return array_merge( $sizes, array(
    'staff-photo' => __('Staff photo size'),
  ));
}

function header_widgets_init() {
  register_sidebar( array(
    'name' => 'Header institution logo',
    'id' => 'header-inst-logo',
    'before_widget' => '<div id="%1$s" class="%2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2>',
    'after_title' => '</h2>',
  ) );
}
