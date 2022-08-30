<?php
/*
Template Name: _payment/process
*/

if (!is_user_logged_in()) {
    wp_redirect(home_url('/login/?redirect_to=' . home_url('/payment/')));
    exit;
}

get_template_part('payments/payment-process');
    exit;

