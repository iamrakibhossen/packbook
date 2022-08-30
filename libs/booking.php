<?php

require_once('booking_colum.php');

function booking_default_title_filter()
{
    global $post_type;
    if ('booking' == $post_type) {
        return wp_generate_password(16, false);
    }
}
add_filter('default_title', 'booking_default_title_filter');

function get_booking($post_id)
{

    $data = get_transient('booking_'.$post_id);

    if( !empty($data) ){
        return $data;
    }

    $post = get_post($post_id);

    if (!empty($post)) {

        $post_id = $post->ID;

        $data = array();

        $data['owner'] = $post->post_author;

        //Service Name
        $data['service'] = pb_package_meta($post_id, 'service');

        //Sender Info
        $data['sender_name'] = pb_package_meta($post_id, 'sender_name');
        $data['sender_company'] = pb_package_meta($post_id, 'sender_company');
        $data['sender_email'] = pb_package_meta($post_id, 'sender_email');
        $data['sender_street'] = pb_package_meta($post_id, 'sender_street');
        $data['sender_city'] = pb_package_meta($post_id, 'sender_city');
        $data['sender_postcode'] = pb_package_meta($post_id, 'sender_postcode');
        $data['sender_country'] = pb_package_meta($post_id, 'sender_country');
        $data['sender_country_code'] = pb_package_meta($post_id, 'sender_country_code');
        $data['sender_phone'] = pb_package_meta($post_id, 'sender_phone');

        //receiver Info
        $data['receiver_name'] = pb_package_meta($post_id, 'receiver_name');
        $data['receiver_company'] = pb_package_meta($post_id, 'receiver_company');
        $data['receiver_email'] = pb_package_meta($post_id, 'receiver_email');
        $data['receiver_street'] = pb_package_meta($post_id, 'receiver_street');
        $data['receiver_city'] = pb_package_meta($post_id, 'receiver_city');
        $data['receiver_postcode'] = pb_package_meta($post_id, 'receiver_postcode');
        $data['receiver_country'] = pb_package_meta($post_id, 'receiver_country');
        $data['receiver_country_code'] = pb_package_meta($post_id, 'receiver_country_code');
        $data['receiver_phone'] = pb_package_meta($post_id, 'receiver_phone');

        //Parcel Info
        $data['parcel_type'] = pb_package_meta($post_id, 'parcel_type');
        $data['parcel_weight'] = pb_package_meta($post_id, 'parcel_weight');
        $data['parcel_length'] = pb_package_meta($post_id, 'parcel_length');
        $data['parcel_width'] = pb_package_meta($post_id, 'parcel_width');
        $data['parcel_height'] = pb_package_meta($post_id, 'parcel_height');
        $data['parcel_insurance'] = pb_package_meta($post_id, 'parcel_insurance');
        $data['parcel_description'] = pb_package_meta($post_id, 'parcel_description');
        $data['parcel_user_reference'] = pb_package_meta($post_id, 'parcel_user_reference');
        $data['parcel_shape'] = pb_package_meta($post_id, 'parcel_shape');

        //Total Cost
        $data['total_cost'] = pb_price( pb_package_meta($post_id, 'total_cost') );

        $data['booking_status'] = pb_package_meta($post_id, 'booking_status');

        $data['parcel_order'] = pb_package_meta($post_id, 'parcel_order');

        $data['way_bill'] = pb_package_meta($post_id, 'way_bill');

        $data['parcel_status'] = pb_package_meta($post_id, 'parcel_status');

        $data['parcel_history'] = pb_package_meta($post_id, 'parcel_history');

        set_transient( 'booking_'.$post_id, $data, DAY_IN_SECONDS );

        return $data;
    }

    return array();
}

function packbook_html_value($string, $htmltag = 'span', $attr = 'class')
{
    $string    = trim($string);
    $attrvalue = strtolower(str_replace(" ", '-', $string));
    $attrvalue = preg_replace("/[^A-Za-z0-9 -]/", '', $attrvalue);
    return '<' . $htmltag . ' ' . $attr . ' ="' . $attrvalue . '" >' . $string . '</' . $htmltag . '>';
}


function packbook_history_fields()
{
    global $packbook;
    $history_fields = array(
        'status_date' => array(
            'label' => esc_html__('Date', 'packbook'),
            'field' => 'date',
            'required' => 'false',
            'options' => array()
        ),
        'status_time' => array(
            'label' => esc_html__('Time', 'packbook'),
            'field' => 'time',
            'required' => 'false',
            'options' => array()
        ),
        'status_location' => array(
            'label' => esc_html__('Location', 'packbook'),
            'field' => 'text',
            'required' => 'false',
            'options' => array()
        ),
        'packbook_status' => array(
            'label' => esc_html__('Status', 'packbook'),
            'field' => 'select',
            'required' => 'false',
            'options' => packbook_default_status()
        )


    );
    return apply_filters('packbook_history_fields', $history_fields);
}
function packbook_default_status()
{
    $status = array(
        esc_html__('Pending', 'packbook'),
        esc_html__('Picked up', 'packbook'),
        esc_html__('On Hold', 'packbook'),
        esc_html__('Out for delivery', 'packbook'),
        esc_html__('In Transit', 'packbook'),
        esc_html__('Enroute', 'packbook'),
        esc_html__('Cancelled', 'packbook'),
        esc_html__('Delivered', 'packbook'),
        esc_html__('Returned', 'packbook')
    );
    return apply_filters('packbook_default_status', $status);
}
function packbook_field_generator($field_data, $field_meta, $value = '', $class = '')
{
    $required = $field_data['required'] == 'true' ? 'required' : '';
    if ($field_data['field'] == 'textarea') {
        $field = '<textarea class="' . $class . '" name="' . $field_meta . '" ' . $required . '>' . $value . '</textarea>';
    } elseif ($field_data['field'] == 'select') {
        $field = '<select class="' . $class . '" name="' . $field_meta . '" ' . $required . '>';
        $field .= '<option value="">' . esc_html__('-- Select Type --', 'packbook') . '</option>';
        if (!empty($field_data['options'])) {
            foreach ($field_data['options'] as $_value) {
                $field .= '<option value="' . trim($_value) . '" ' . selected($value, trim($_value), false) . '>' . trim($_value) . '</option>';
            }
        }
        $field .= '</select>';
    } elseif ($field_data['field'] == 'radio') {
        if (!empty($field_data['options'])) {
            $field = '';
            foreach ($field_data['options'] as $_value) {
                $field .= '<p><input class="' . $class . '" id="' . $field_meta . '_' . $_value . '" type="' . $field_data['field'] . '" name="' . $field_meta . '" value="' . $_value . '" ' . $required . '>';
                $field .= '<label for="' . $field_meta . '_' . $_value . '">' . $_value . '</label></p>';
            }
        }
    } elseif ($field_data['field'] == 'checkbox') {
        if (!empty($field_data['options'])) {
            $field = '';
            foreach ($field_data['options'] as $_value) {
                $field .= '<p><input class="' . $class . '" id="' . $field_meta . '_' . $_value . '" type="' . $field_data['field'] . '" name="' . $field_meta . '[]" value="' . $_value . '" ' . $required . '>';
                $field .= '<label for="' . $field_meta . '_' . $_value . '">' . $_value . '</label></p>';
            }
        }
    } else {
        $field = '<input class="' . $class . '" type="' . $field_data['field'] . '" name="' . $field_meta . '" value="' . $value . '" ' . $required . '>';
    }
    return $field;
}
