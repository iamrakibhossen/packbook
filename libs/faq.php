<?php

function pb_faq_type_init()
{
    // FAQ post type
    $labels = array(
        'name'               => esc_html_x('FAQ', 'post type general name', 'packbook'),
        'singular_name'      => esc_html_x('FAQ', 'post type singular name', 'packbook'),
        'menu_name'          => esc_html_x('FAQ', 'admin menu', 'packbook'),
        'name_admin_bar'     => esc_html_x('FAQ', 'add new on admin bar', 'packbook'),
        'add_new'            => esc_html_x('Add New', 'faq', 'packbook'),
        'add_new_item'       => esc_html__('Add New FAQ', 'packbook'),
        'new_item'           => esc_html__('New FAQ', 'packbook'),
        'edit_item'          => esc_html__('Edit FAQ', 'packbook'),
        'view_item'          => esc_html__('View FAQ', 'packbook'),
        'all_items'          => esc_html__('All FAQ', 'packbook'),
        'search_items'       => esc_html__('Search FAQ', 'packbook'),
        'parent_item_colon'  => esc_html__('Parent FAQ:', 'packbook'),
        'not_found'          => esc_html__('No faqs found.', 'packbook'),
        'not_found_in_trash' => esc_html__('No faqs found in Trash.', 'packbook')
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'faq'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'feeds'              => false,
        'menu_position'      => null,
        'menu_icon'          => 'dashicons-tickets-alt',
        'supports'           => array('title', 'editor')
    );

    register_post_type('faq', $args);

    $labels = array(
        'name'              => esc_html_x('FAQ Categories', 'taxonomy general name', 'packbook'),
        'singular_name'     => esc_html_x('FAQ Category', 'taxonomy singular name', 'packbook'),
        'search_items'      => esc_html__('Search FAQ Categories', 'packbook'),
        'all_items'         => esc_html__('All FAQ Categories', 'packbook'),
        'parent_item'       => esc_html__('Parent FAQ Category', 'packbook'),
        'parent_item_colon' => esc_html__('Parent FAQ Category:', 'packbook'),
        'edit_item'         => esc_html__('Edit FAQ Category', 'packbook'),
        'update_item'       => esc_html__('Update Category', 'packbook'),
        'add_new_item'      => esc_html__('Add New FAQ Category', 'packbook'),
        'new_item_name'     => esc_html__('New FAQ Category Name', 'packbook'),
        'menu_name'         => esc_html__('Categories', 'packbook'),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => false,
        'query_var'         => false,
        'show_in_menu'      => true,
        'show_in_nav_menus' => true,
        'show_in_quick_edit' => true,
        'rewrite'           => array('slug' => 'faq-cat'),
    );

    register_taxonomy('faq_cat', array('faq'), $args);
}

add_action('init', 'pb_faq_type_init', 0);
