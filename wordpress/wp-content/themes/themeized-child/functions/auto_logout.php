<?php

$logoutpageid = '32';


// echo "asda -->" . is_page($logoutpageid) ;

// if( is_user_logged_in() && !is_page($logoutpageid) ) {
//     echo "Login hai..";
//     //add_action('init', 'wp_destroy_all_other_sessions');
//     // wp_logout();
// } else {
    
// }




function auto_logout() {
	//change these 2 items
	$logoutpageid = '32'; //Page ID of your login page
	$loginusername = 'admin'; //username of the WordPress user account to impersonate

    if (is_page($logoutpageid)) { //only attempt to auto-login if at www.site.com/auto-login/ (i.e. www.site.com/?p=1234 )
        
         add_action('init', 'wp_destroy_all_other_sessions');
         wp_logout();
         wp_redirect( home_url() );
        exit;

    } else {
	    // if(is_page($loginpageid)) {
	    //     //prevent viewing of login page even if logged in
	    //     wp_redirect( home_url() );
	    //     exit;
    	// }
    }
}
add_action('wp', 'auto_logout', 1);