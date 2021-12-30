<?php

/****my_slider_args category in posttype***/
$my_slider_args = array(
    'labels' => array(
    'name' => 'hero_slider',
    'singular_name' => 'hero_slider'),
    'description' => 'Allows you to build custom hero_slider items and link them to categories',
	'menu_icon' => 'dashicons-images-alt2',
    'public' => true,
    'show_ui' => true,
    'menu_position' => 20,
    'supports' => array('title', 'editor', 'thumbnail'),
    'has_archive' => true,
    'rewrite' => array('slug' => 'hero_slider'),
    'can_export' => true
);

/* http://codex.wordpress.org/Function_Reference/register_post_type */
register_post_type('hero_slider', $my_slider_args);

$categories_labels = array(
    'label' => 'Categories',
    'hierarchical' => true,
    'query_var' => true
);

/*  Register taxonomies for extra post type capabilities */
register_taxonomy('my_slider_categories', 'hero_slider', $categories_labels);
/****./my_slider_args in posttype***/
