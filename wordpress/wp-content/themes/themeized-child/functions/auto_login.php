<?php

// $loginusername = "admin";


function auto_login() {
	//change these 2 items
	$loginpageid = '2'; //Page ID of your login page
	$loginusername = 'guest'; //username of the WordPress user account to impersonate

    if (!empty($loginusername) && !is_user_logged_in() && is_page($loginpageid)) {
        //only attempt to auto-login if at www.site.com/auto-login/ (i.e. www.site.com/?p=1234 )

        //get user's ID
        $user = get_user_by('login', $loginusername);
        $user_id = $user->ID;

        //login
        wp_set_current_user($user_id, $loginusername);
        wp_set_auth_cookie($user_id);
        do_action('wp_login', $loginusername);

        //redirect to home page after logging in (i.e. don't show content of www.site.com/?p=1234 )
        wp_redirect( 'https://localhost/projects/_rd/VueWP/wordpress/wp-admin/post-new.php?post_type=store_locator' );
        exit;

    } else {
        if(is_page($loginpageid)) {
            //prevent viewing of login page even if logged in
            wp_redirect( 'https://localhost/projects/_rd/VueWP/wordpress/wp-admin/post-new.php?post_type=store_locator' );
            exit;
        }
    }
}
add_action('wp', 'auto_login', 0);