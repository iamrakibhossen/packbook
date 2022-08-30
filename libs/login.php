<?php

//Disable xmlrpc for authors and below
if (!current_user_can('administrator') && !current_user_can('editor')) {
    add_filter('xmlrpc_enabled', '__return_false');
}


//Action: admin_init
function packbook_admin_init()
{
    //Restrict /wp-admin/ to administrators & editors
    if ((!defined('DOING_AJAX') || !DOING_AJAX) && !current_user_can('administrator') && !current_user_can('editor')) {
        wp_redirect(home_url());
        exit;
    }
}
add_action('admin_init', 'packbook_admin_init', 1);


//Action: login_init
function packbook_login_init()
{
    //Restrict access to wp-login.php
    if (!isset($_REQUEST) || empty($_REQUEST) || $_GET['action'] == 'register') {
        wp_redirect(home_url());
        exit;
    }
}
add_action('login_init', 'packbook_login_init', 1);


//Redirect login page from wp-login.php to /login/
function packbook_login_url($login_url, $redirect)
{
    $login_url = home_url('/login/');

    if (!empty($redirect)) {
        //prevent duplicate redirect_to parameters
        $duplicate_redirect = substr_count($redirect, 'redirect_to');
        if ($duplicate_redirect >= 1) {
            $redirect = substr($redirect, 0, (strrpos($redirect, '?')));
        }

        $login_url = add_query_arg('redirect_to', rawurlencode($redirect), $login_url);
    } else {
        $login_url = add_query_arg('redirect_to', rawurlencode(home_url('/')), $login_url);
    }

    return $login_url;
}
add_filter('login_url', 'packbook_login_url', 10, 2);


//Action: wp_login_failed
function packbook_login_failed($username)
{
    //Redirect login page if login failed
    $referrer = $_SERVER['HTTP_REFERER'];

    if ($referrer == home_url() . '/login/') $referrer = $referrer . '?redirect_to=' . home_url(); // in rare case where user access /login/ page directly

    if (!empty($referrer) && !strstr($referrer, 'wp-login') && !strstr($referrer, 'wp-admin') && (!defined('DOING_AJAX') || !DOING_AJAX)) {
        //notify unverified users to activate their account
        $userdata = get_user_by('login', $username);
        $verify = get_user_meta($userdata->ID, '_Verify Email', true);
        //user with verified email do not have this usermeta field
        if ($verify != '') {
            $verify = '&email=unverified';
        }

        if (strpos($referrer, '&login=failed')) {
            wp_safe_redirect($referrer . $verify);
        } else {
            wp_safe_redirect($referrer . $verify . '&login=failed');
        }
        exit;
    }
}
add_action('wp_login_failed', 'packbook_login_failed');

