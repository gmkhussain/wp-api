<?php 

add_action( 'init', 'hero_slider_cpt' );
function hero_slider_cpt() {
    $args = array(
      'public'       => true,
      'show_in_rest' => true,
      'label'        => 'hero_slider'
    );
    register_post_type( 'hero_slider', $args );
}