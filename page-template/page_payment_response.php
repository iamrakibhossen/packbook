<?php
/*
Template Name: _payment/response
*/

if (!is_user_logged_in()) {
    wp_redirect(home_url('/login/?redirect_to=' . home_url('/payment/')));
    exit;
}

get_template_part('payments/payment-response');
    exit;

