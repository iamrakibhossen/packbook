<?php

/*
* Creating a function to create our CPT
*/

function custom_post_type()
{

    // Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x('Bookings', 'Post Type General Name', 'packbook'),
        'singular_name'       => _x('Booking', 'Post Type Singular Name', 'packbook'),
        'menu_name'           => __('Bookings', 'packbook'),
        'parent_item_colon'   => __('Parent Booking', 'packbook'),
        'all_items'           => __('All Bookings', 'packbook'),
        'view_item'           => __('View Booking', 'packbook'),
        'add_new_item'        => __('Add New Booking', 'packbook'),
        'add_new'             => __('Add New', 'packbook'),
        'edit_item'           => __('Edit Booking', 'packbook'),
        'update_item'         => __('Update Booking', 'packbook'),
        'search_items'        => __('Search Booking', 'packbook'),
        'not_found'           => __('Not Found', 'packbook'),
        'not_found_in_trash'  => __('Not found in Trash', 'packbook'),
    );

    // Set other options for Custom Post Type

    $args = array(
        'label'               => __('bookings', 'packbook'),
        'description'         => __('Booking news and reviews', 'packbook'),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array('title', 'revisions'),

        'hierarchical'        => false,
        'public'              => false,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => false,
        'exclude_from_search' => false,
        'publicly_queryable'  => false,
        'capability_type' => 'post',

        'show_in_rest' => false,

    );

    // Registering your Custom Post Type
    register_post_type('booking', $args);
}

/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/

add_action('init', 'custom_post_type', 0);

/**
 * Register meta boxes.
 */
function packbook_register_meta_boxes()
{
    add_meta_box('packbook-booking-package', __('Package', 'packbook'), 'packbook_booking_package', 'booking');
    add_meta_box('packbook-booking-sender', __('Sender', 'packbook'), 'packbook_booking_sender', 'booking');
    add_meta_box('packbook-booking-receiver', __('Reciver', 'packbook'), 'packbook_booking_receiver', 'booking');

    //add_meta_box('packbook-booking-status', __('Status', 'packbook'), 'packbook_booking_status', 'booking');
}
add_action('add_meta_boxes', 'packbook_register_meta_boxes');

/**
 * Meta box display callback.
 *
 * @param WP_Post $post Current post object.
 */
function packbook_booking_package($post)
{



    $post_id = $post->ID;


    $service = pb_package_meta($post_id, 'service');

    //Parcel Info
    $parcel_type = pb_package_meta($post_id, 'parcel_type');
    $parcel_weight = pb_package_meta($post_id, 'parcel_weight');
    $parcel_length = pb_package_meta($post_id, 'parcel_length');
    $parcel_width = pb_package_meta($post_id, 'parcel_width');
    $parcel_height = pb_package_meta($post_id, 'parcel_height');
    $parcel_insurance = pb_package_meta($post_id, 'parcel_insurance');
    $parcel_description = pb_package_meta($post_id, 'parcel_description');
    $parcel_user_reference = pb_package_meta($post_id, 'parcel_user_reference');
    $parcel_shape = pb_package_meta($post_id, 'parcel_shape');


    $total_cost = pb_package_meta($post_id, 'total_cost');

?>

    <table class="form-table" role="presentation">

        <tbody>


            <tr>
                <th scope="row">Parcel Type</th>
                <td>
                    <select name="parcel_type" class="postform">
                        <option value="parcel" <?php selected($parcel_type, 'parcel'); ?>>Parcel</option>
                        <option value="envelope" <?php selected($parcel_type, 'envelope'); ?>>Envelope</option>
                        <option value="pallet" <?php selected($parcel_type, 'pallet'); ?>>Pallet</option>
                    </select>
                </td>
            </tr>

            <tr>
                <th scope="row">Carrier</th>
                <td>
                    <select name="package[service]" class="postform">
                        <option value="dpd" <?php selected($service, 'dpd'); ?>>DPD</option>
                        <option value="dpd_pickup" <?php selected($service, 'dpd_pickup'); ?>>DPD Pickup</option>
                        <option value="inpost_kurier" <?php selected($service, 'inpost_kurier'); ?>>Inpost Kurier</option>
                        <option value="inpost_paczkomaty" <?php selected($service, 'inpost_paczkomaty'); ?>>Inpost Paczkomaty</option>
                        <option value="ups" <?php selected($service, 'ups'); ?>>UPS</option>
                        <option value="ups_access_point" <?php selected($service, 'ups_access_point'); ?>>UPS Access Point</option>
                        <option value="poczta" <?php selected($service, 'poczta'); ?>>Poczta</option>
                        <option value="pocztex" <?php selected($service, 'pocztex'); ?>>Pocztex</option>
                        <option value="paczka_w_ruchu" <?php selected($service, 'paczka_w_ruchu'); ?>>Paczka W RuCHU</option>
                        <option value="ambro_express" <?php selected($service, 'ambro_express'); ?>>Ambro Express</option>
                        <option value="hellmann" <?php selected($service, 'hellmann'); ?>>Hellmann</option>
                        <option value="rohlig_suus" <?php selected($service, 'rohlig_suus'); ?>>Rohlig Suus</option>
                        <option value="schenker" <?php selected($service, 'schenker'); ?>>Schenker</option>
                    </select>
                </td>
            </tr>

            <tr>
                <th scope="row">
                    <label for="cost">Price</label>
                </th>
                <td><input name="total_cost" type="text" id="cost" value="<?php echo pb_price($total_cost); ?>" class="medium-text"> PLN</td>
            </tr>

            <tr>
                <th scope="row">
                    <label for="insurance">Insurance</label>
                </th>
                <td><input name="parcel_insurance" type="text" id="insurance" value="<?php echo pb_price($parcel_insurance); ?>" class="medium-text"> PLN</td>
            </tr>

            <tr>
                <th scope="row">
                    <label for="weight">Weight</label>
                </th>
                <td><input name="parcel_weight" type="text" id="weight" value="<?php echo floatval($parcel_weight); ?>" class="small-text"> kg</td>

            </tr>

            <tr>
                <th scope="row">
                    <label for="dimensions">Dimensions</label>
                </th>
                <td scope="row">Length <input name="parcel_length" type="text" id="length" value="<?php echo absint($parcel_length); ?>" class="small-text"> &nbsp;&nbsp; X &nbsp;&nbsp;
                    Width <input name="parcel_width" type="text" id="width" value="<?php echo absint($parcel_width); ?>" class="small-text"> &nbsp;&nbsp; X &nbsp;&nbsp;
                    Height <input name="parcel_height" type="text" id="height" value="<?php echo absint($parcel_height); ?>" class="small-text"> cm</td>

            </tr>

            <tr>
                <th scope="row">
                    <label for="content">Content</label>
                </th>
                <td><textarea name="parcel_description" type="text" id="content" rows="3" cols="40"><?php echo sanitize_text_field($parcel_description); ?></textarea></td>

            </tr>

            <tr>
                <th scope="row">
                    <label for="user_reference">User Reference</label>
                </th>
                <td><input name="parcel_user_reference" type="text" id="user_reference" value="<?php echo $parcel_user_reference; ?>" class="regular-text"></td>
            </tr>


        </tbody>
    </table>

<?php }

/**
 * Meta box display callback.
 *
 * @param WP_Post $post Current post object.
 */
function packbook_booking_sender($post)
{
    $post_id = $post->ID;

    //Sender Info
    $sender_name = pb_package_meta($post_id, 'sender_name');
    $sender_company = pb_package_meta($post_id, 'sender_company');
    $sender_email = pb_package_meta($post_id, 'sender_email');
    $sender_street = pb_package_meta($post_id, 'sender_street');
    $sender_city = pb_package_meta($post_id, 'sender_city');
    $sender_postcode = pb_package_meta($post_id, 'sender_postcode');
    $sender_country = pb_package_meta($post_id, 'sender_country');
    $sender_country_code = pb_package_meta($post_id, 'sender_country_code');
    $sender_phone = pb_package_meta($post_id, 'sender_phone');


?>

    <table class="form-table" role="presentation">

        <tbody>

            <tr>
                <th scope="row"><label for="sender_name">Full Name</label></th>
                <td><input name="sender_name" type="text" id="sender_name" value="<?php echo sanitize_text_field($sender_name); ?>" class="regular-text"></td>
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
                <td><input name="sender_postcode" type="text" id="sender_postcode" value="<?php echo sanitize_text_field($sender_postcode); ?>" class="medium-text"></td>
            </tr>

            <tr>
                <th scope="row"><label for="sender_city">City</label></th>
                <td><input name="sender_city" type="text" id="sender_city" value="<?php echo sanitize_text_field($sender_city); ?>" class="regular-text"></td>
            </tr>

            <tr>
                <th scope="row"><label for="sender_street">Street and number</label></th>
                <td><input name="sender_street" type="text" id="sender_street" value="<?php echo sanitize_text_field($sender_street); ?>" class="regular-text"></td>
            </tr>

            <tr>
                <th scope="row"><label for="sender_email">E-mail</label></th>
                <td><input name="sender_email" type="email" id="sender_email" value="<?php echo sanitize_text_field($sender_email); ?>" class="regular-text"></td>
            </tr>

            <tr>
                <th scope="row"><label for="sender_phone">Phone</label></th>
                <td><input name="sender_phone" type="number" id="sender_phone" value="<?php echo sanitize_text_field($sender_phone); ?>" class="regular-text"></td>
            </tr>

        </tbody>
    </table>

<?php }


/**
 * Meta box display callback.
 *
 * @param WP_Post $post Current post object.
 */
function packbook_booking_receiver($post)
{

    $post_id = $post->ID;
    
    //receiver Info
    $receiver_name = pb_package_meta($post_id, 'receiver_name');
    $receiver_company = pb_package_meta($post_id, 'receiver_company');
    $receiver_email = pb_package_meta($post_id, 'receiver_email');
    $receiver_street = pb_package_meta($post_id, 'receiver_street');
    $receiver_city = pb_package_meta($post_id, 'receiver_city');
    $receiver_postcode = pb_package_meta($post_id, 'receiver_postcode');
    $receiver_country = pb_package_meta($post_id, 'receiver_country');
    $receiver_country_code = pb_package_meta($post_id, 'receiver_country_code');
    $receiver_phone = pb_package_meta($post_id, 'receiver_phone');

?>

    <table class="form-table" role="presentation">

        <tbody>

            <tr>
                <th scope="row"><label for="receiver_name">Full Name</label></th>
                <td><input name="receiver_name" type="text" id="receiver_name" value="<?php echo sanitize_text_field($receiver_name); ?>" class="regular-text"></td>
            </tr>

            <tr>
                <th scope="row"><label for="receiver_company">Company Name</label></th>
                <td><input name="receiver_company" type="text" id="receiver_company" value="<?php echo sanitize_text_field($receiver_company); ?>" class="regular-text"></td>
            </tr>

            <tr>
                <th scope="row"><label for="receiver_country_code">Country</label></th>
                <td>
                    <?php country_lists('receiver_country_code', 'custom-select', $receiver_country_code); ?>
                </td>
            </tr>

            <tr>
                <th scope="row"><label for="receiver_postcode">Postcode</label></th>
                <td><input name="receiver_postcode" type="text" id="receiver_postcode" value="<?php echo sanitize_text_field($receiver_postcode); ?>" class="medium-text"></td>
            </tr>

            <tr>
                <th scope="row"><label for="receiver_city">City</label></th>
                <td><input name="receiver_city" type="text" id="receiver_city" value="<?php echo sanitize_text_field($receiver_city); ?>" class="regular-text"></td>
            </tr>

            <tr>
                <th scope="row"><label for="receiver_street">Street and number</label></th>
                <td><input name="receiver_street" type="text" id="receiver_street" value="<?php echo sanitize_text_field($receiver_street); ?>" class="regular-text"></td>
            </tr>

            <tr>
                <th scope="row"><label for="receiver_email">E-mail</label></th>
                <td><input name="receiver_email" type="email" id="receiver_email" value="<?php echo sanitize_text_field($receiver_email); ?>" class="regular-text"></td>
            </tr>

            <tr>
                <th scope="row"><label for="receiver_phone">Phone</label></th>
                <td><input name="receiver_phone" type="number" id="receiver_phone" value="<?php echo sanitize_text_field($receiver_phone); ?>" class="regular-text"></td>
            </tr>

        </tbody>
    </table>

<?php }



function packbook_booking_status($post)
{

    $shipments = maybe_unserialize(get_post_meta($post->ID, 'bookings_update', true));



?>

    <div class="pb-sh-wrap">
        <table id="shipment-history" class="pb-shipment-history" style="width:100%">
            <thead>
                <tr>
                    <?php foreach (packbook_history_fields() as $history_name => $history_fields) : ?>
                        <th class="tbl-sh-<?php echo $history_name; ?>"><?php echo $history_fields['label']; ?></th>
                    <?php endforeach; ?>
                    <?php do_action('packbook_shipment_history_header'); ?>
                    <th class="tbl-sh-action">&nbsp;</th>
                </tr>
            </thead>
            <tbody data-repeater-list="packbook_shipments_update">
                <?php $shipment_history = $shipments;
                ?>
                <?php if (!empty($shipment_history)) :

                    $i = 0;

                    foreach ($shipment_history as $shipment) :
                ?>
                        <tr data-repeater-item class="history-data">
                            <?php foreach (packbook_history_fields() as $history_name => $history_value) : ?>
                                <?php


                                $value = !empty($shipment[$history_name]) ? $shipment[$history_name] : '';
                                $picker_class = '';
                                if ($history_name == 'status_date') {
                                    $picker_class = 'packbook-datepicker';
                                } elseif ($history_name == 'status_time') {
                                    $picker_class = 'packbook-timepicker';
                                }
                                ?>
                                <td class="tbl-sh-<?php echo $history_name; ?>">
                                    <?php echo packbook_field_generator($history_value, 'history[' . $i . '][' . $history_name . ']', $value, $picker_class . ' status_' . $history_name); ?>
                                </td>
                            <?php endforeach;
                            $i++; ?>
                            <?php do_action('packbook_shipment_history_data_editable', $shipment); ?>
                            <td class="tbl-sh-action">
                                <input data-repeater-delete type="button" class="pb-delete" value="<?php esc_html_e('Delete', 'packbook') ?>" />
                            </td>
                        </tr>
                <?php
                    endforeach;
                endif; ?>
            </tbody>
        </table>
    </div>
    <?php do_action('before_packbook_shipment_history', $post->ID); ?>


<?php


}

function packbook_history_order($history)
{
    if (empty($history) && !is_array($history)) {
        return array();
    }
    if (!array_key_exists('date', packbook_history_fields())) {
        return array_reverse($history);
    }
    $sort_by_date   = array();
    $sort_by_time   = array();
    $has_date       = true;
    $has_time       = true;
    usort($history, function ($date_a, $date_b) {
        if (!array_key_exists('date', $date_a)) {
            return $date_a;
        }
        return strcmp($date_a["date"], $date_b["date"]);
    });
    foreach ($history as $key => $value) {
        if (!array_key_exists('date', $value)) {
            $has_date   = false;
            break;
        }
        $sort_by_date[$value['date']][] = $value;
    }
    if (!$has_date) {
        return array_reverse($history);
    }
    $reverse_date = array_reverse($sort_by_date);

    foreach ($reverse_date as $value) {
        if (is_array($value)) {
            if (array_key_exists('time', $value[0])) {
                usort($value, function ($time_a, $time_b) {
                    return strcmp($time_a["time"], $time_b["time"]);
                });
                $value = array_reverse($value);
            }
        }
        foreach ($value as $time) {
            $sort_by_time[] = $time;
        }
    }
    return $sort_by_time;
}

/**
 * Save meta box content.
 *
 * @param int $post_id Post ID
 */
function packbook_save_meta_box($post_id)
{
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if ($parent_id = wp_is_post_revision($post_id)) {
        $post_id = $parent_id;
    }

    if ( 'booking' !== $_POST['post_type'] ) {
        return;
    }
     
    global $booking;

    $booking->update($post_id, $_POST);

}
add_action('save_post', 'packbook_save_meta_box');


