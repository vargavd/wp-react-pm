<?php

include "inc/debug.php";
include "inc/custom-post-types.php";
include "inc/custom-taxonomy.php";
include "inc/image-sizes.php";
include "inc/user-roles.php";


// REDIRECT EVERYTHING TO FRONT
add_action('template_redirect', function () {
  // pr1(is_front_page());
  if (!is_home()) {
    wp_redirect(get_bloginfo('home'));
    exit;
  }
});


// ENQUEUE SCRIPTS AND STYLES
function wpreactpm_scripts() {
	wp_enqueue_style( 'wpreactpm-style', get_stylesheet_uri(), array(), filemtime(get_stylesheet_directory() . '/style.css'));

    wp_enqueue_script('wpreactpm-main-script', get_stylesheet_directory_uri() . '/dist/bundle.js', array(), filemtime(get_stylesheet_directory() . '/dist/bundle.js'), true);
}
add_action( 'wp_enqueue_scripts', 'wpreactpm_scripts' );


// REMOVE RSS FEEDS
function wpreactpm_disable_feed() {
    wp_die( __( 'No feed available, the site\' only feature is the <a href="'. esc_url( home_url( '/' ) ) .'">Project Manager</a>!' ) );
}
add_action('do_feed', 'wpreactpm_disable_feed', 1);
add_action('do_feed_rdf', 'wpreactpm_disable_feed', 1);
add_action('do_feed_rss', 'wpreactpm_disable_feed', 1);
add_action('do_feed_rss2', 'wpreactpm_disable_feed', 1);
add_action('do_feed_atom', 'wpreactpm_disable_feed', 1);
add_action('do_feed_rss2_comments', 'wpreactpm_disable_feed', 1);
add_action('do_feed_atom_comments', 'wpreactpm_disable_feed', 1);
remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action( 'wp_head', 'feed_links', 2 );


// DEREGISTER POST CATEGORY TAXONOMY, based on: https://wordpress.stackexchange.com/questions/120418/completely-disable-categories/120422
add_action( 'init', function () {
    register_taxonomy( 'category', array() );
});
unregister_widget( 'WP_Widget_Categories' );


