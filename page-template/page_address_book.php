<?php
/*
Template Name: _address-book
*/
global $user_ID, $address_book;
if (!is_user_logged_in()) {
    wp_redirect(home_url('/login/?redirect_to=' . home_url('/dashboard/address-book/')));
    exit;
}

if (!empty($_GET['del']) &&  !empty($_GET['id'])) {

    $post_id = intval($_GET['id']);

    $post = get_post($post_id);

    if (($post->post_author == $user_ID || current_user_can('edit_others_posts')) && $post->post_type == 'address_book') {
    } else {

        wp_redirect(home_url('/'));
        exit;
    }

    if (!empty($post)) {

        wp_delete_post($post->ID, true);

        wp_redirect(home_url('/dashboard/address-book/'));
        exit;
    }
}


$http_post = ('POST' == $_SERVER['REQUEST_METHOD']);

if ($http_post) {

    $post_id = intval($_POST['post_id']);

    $args = array(
        'post_title' => sanitize_text_field($_POST['sender_name']),
        'post_type' => 'address_book',
        'post_status' => 'publish'

    );

    if (!empty($post_id)) {

        $args['ID'] = $post_id;

        wp_update_post($args);
    } else {

        $post_id = wp_insert_post($args);
    }


    $address_book->update($post_id, $_POST);

    wp_redirect(home_url('/dashboard/address-book'));

    exit;
}

get_header();


if (!empty($_GET['id'])) {

    get_template_part('template-parts/address_book_form');
} else {

    get_template_part('template-parts/address_book_table');
}


get_footer();
