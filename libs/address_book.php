<?php

/*
* Creating a function to create our CPT
*/

function address_book_post_type()
{

    // Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x('Address Books', 'Post Type General Name', 'packbook'),
        'singular_name'       => _x('Address Book', 'Post Type Singular Name', 'packbook'),
        'menu_name'           => __('Address Books', 'packbook'),
        'parent_item_colon'   => __('Parent Address Book', 'packbook'),
        'all_items'           => __('All Address Books', 'packbook'),
        'view_item'           => __('View Address Book', 'packbook'),
        'add_new_item'        => __('Add New Address Book', 'packbook'),
        'add_new'             => __('Add New', 'packbook'),
        'edit_item'           => __('Edit Address Book', 'packbook'),
        'update_item'         => __('Update Address Book', 'packbook'),
        'search_items'        => __('Search Address Book', 'packbook'),
        'not_found'           => __('Not Found', 'packbook'),
        'not_found_in_trash'  => __('Not found in Trash', 'packbook'),
    );

    // Set other options for Custom Post Type

    $args = array(
        'label'               => __('Address Books', 'packbook'),
        'description'         => __('Address Book', 'packbook'),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array('title'),

        'hierarchical'        => false,
        'public'              => false,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 6,
        'can_export'          => true,
        'has_archive'         => false,
        'exclude_from_search' => false,
        'publicly_queryable'  => false,
        'capability_type' => 'post',

        'show_in_rest' => false,

    );

    // Registering your Custom Post Type
    register_post_type('address_book', $args);
}

/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/

add_action('init', 'address_book_post_type', 0);

/**
 * Register meta boxes.
 */
function address_book_register_meta_boxes()
{
    add_meta_box('address-book-info', __('Information', 'packbook'), 'address_book_info', 'address_book');
}
add_action('add_meta_boxes', 'address_book_register_meta_boxes');

/**
 * Meta box display callback.
 *
 * @param WP_Post $post Current post object.
 */
function address_book_info($post)
{
    $post_id = empty($post->ID) ? 0 : $post->ID;

    global $address_book;

    $data = $address_book->get($post_id);

    extract($data);


?>

    <style>
        label.error {
            display: block;
            color: red;
            padding: 5px 0
        }
    </style>

    <table class="form-table" role="presentation">

        <tbody>

            <tr>
                <th scope="row"><label for="sender_name">Full Name</label></th>
                <td><input name="sender_name" type="text" id="sender_name" value="<?php echo sanitize_text_field($sender_name); ?>" class="regular-text" required></td>
            </tr>

            <tr>
                <th scope="row"><label for="sender_company">Company Name</label></th>
                <td><input name="sender_company" type="text" id="sender_company" value="<?php echo sanitize_text_field($sender_company); ?>" class="regular-text"></td>
            </tr>

            <tr>
                <th scope="row"><label for="sender_country_code">Country</label></th>
                <td>
                    <?php country_lists('sender_country_code', 'custom-select', $sender_country_code); ?>
                </td>
            </tr>

            <tr>
                <th scope="row"><label for="sender_postcode">Postcode</label></th>
                <td><input name="sender_postcode" type="text" id="sender_postcode" value="<?php echo sanitize_text_field($sender_postcode); ?>" class="medium-text" required></td>
            </tr>

            <tr>
                <th scope="row"><label for="sender_city">City</label></th>
                <td><input name="sender_city" type="text" id="sender_city" value="<?php echo sanitize_text_field($sender_city); ?>" class="regular-text" required></td>
            </tr>

            <tr>
                <th scope="row"><label for="sender_street">Street and number</label></th>
                <td><input name="sender_street" type="text" id="sender_street" value="<?php echo sanitize_text_field($sender_street); ?>" class="regular-text" required></td>
            </tr>

            <tr>
                <th scope="row"><label for="sender_email">E-mail</label></th>
                <td><input name="sender_email" type="email" id="sender_email" value="<?php echo sanitize_text_field($sender_email); ?>" class="regular-text" required></td>
            </tr>

            <tr>
                <th scope="row"><label for="sender_phone">Phone</label></th>
                <td><input name="sender_phone" type="text" id="sender_phone" value="<?php echo sanitize_text_field($sender_phone); ?>" class="regular-text" required></td>
            </tr>

        </tbody>
    </table>

    <script>
        jQuery().ready(function() {
            jQuery("#post").validate();
        });
    </script>

<?php }

add_action('save_post', 'pb_save_address_book', 10, 3);

function pb_save_address_book($post_id)
{


    if ('address_book' !== $_POST['post_type']) {
        return;
    }

    global $address_book;

    $address_book->update($post_id, $_POST);
}

//Likes
function pb_ajax_default_receiver()
{
    $nonce = $_POST['nonce'];

    if (!wp_verify_nonce($nonce, 'ajax-nonce'))
        die();


    global $wpdb, $user_ID, $user_identity;

    $post_id = intval($_POST['post_id']);
    if ($_POST['default_receiver'] == 'like') {


        update_user_meta($user_ID, 'default_receiver', $post_id);

        echo 1;
    } else if ($_POST['default_receiver'] == 'unlike') {

        update_user_meta($user_ID, 'default_receiver', 0);

        echo 1;
    }

    exit;
}
add_action('wp_ajax_default-receiver', 'pb_ajax_default_receiver');


if (!function_exists('pacebook_default_receiver')) :
    function pacebook_default_receiver($post_id)
    {
        global $user_ID;
        $usermeta_id = get_user_meta($user_ID, 'default_receiver', true);

        if ($usermeta_id == $post_id) {
            return true;
        }
        return false;
    }
endif;
