<?php 
add_action( 'rest_api_init', function () {
	register_rest_route( 'site_settings/v1', '/all', array(
	  'methods' => 'GET',
	  'callback' => 'handle_get_all',
        //   'permission_callback' => function () {
        //   	return current_user_can( 'edit_others_posts' );
        //   }
	) );
  } );
  
  function handle_get_all( $data ) {
	  global $wpdb;
	  $query = "SELECT * FROM `wp_options` 
	  			where
				  	option_name = 'site_logo'
				OR option_name = 'blogname'
				OR option_name = 'site_icon'
				OR option_name = 'blogdescription' 
	   		";
	  $list = $wpdb->get_results($query);
	  
	  $resp = array();
	 
	  for($i=0;$i< count($list) ;$i++) { 
	  	$resp += array(
		  $list[$i]->option_name => $list[$i]->option_value,
		);
	  }
	 
	return $resp;
  }