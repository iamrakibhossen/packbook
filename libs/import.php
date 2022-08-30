<?php

function pb_import_key_init($key = '')
{

    $en = array(
        'service', 'sender_name', 'sender_company', 'sender_email', 'sender_street', 'sender_city', 'sender_postcode', 'sender_country', 'sender_phone', 'receiver_name', 'receiver_company', 'receiver_email', 'receiver_street', 'receiver_city', 'receiver_postcode', 'receiver_country', 'receiver_phone', 'type', 'weight', 'length', 'width', 'height', 'insurance', 'description', 'user_reference'
    );

    $pl = array(
        'serwis', 'imie_nadawcy', 'firma_nadawca', 'email_nadawcy', 'ulica_nadawcy', 'miejscowosc_nadawcy', 'kod_pocztowy_nadawcy', 'kraj_nadawcy', 'telefon_nadawcy', 'imie_odbiorca', 'firma_odbiorca', 'odbiorca_email', 'odbiorca_ulica', 'odbiorca_miejscowosc', 'odbiorca_kod_pocztowy', 'odbiorca_kraj', 'odbiorca_telefon', 'typ', 'waga', 'dlugosc', 'szerokosc', 'wysokosc', 'ubezpieczenie', 'opis', 'numer_rejerencyjny'
    );

    $key = str_replace($pl, $en, $key);

    return $key;
}

function import_package_validation($args)
{

    global $booking, $user_ID;

    foreach ($args as $key => $value) {

        $key = pb_import_key_init($key);

        $args[$key] = $value;
    }

    if (empty($args['service'])) {
        return false;
    }

    $way_bill = wp_generate_password(16, false);

    $p_args = array(
        'post_title' => $way_bill,
        'post_type' => 'booking',
        'post_status' => 'publish',
        'post_author' => $user_ID,

    );

    $args['parcel_order'] = 0;

    $args['parcel_create'] = $user_ID;

    $args['way_bill'] = $way_bill;

    if (!empty($args['sender_country'])) {
        $args['sender_country_code'] = $args['sender_country'];
    }

    if (!empty($args['receiver_country'])) {
        $args['receiver_country_code'] = $args['receiver_country'];
    }

    if (!empty($args['type'])) {
        $args['parcel_type'] = $args['type'];
    }

    if (!empty($args['weight'])) {
        $args['parcel_weight'] = $args['weight'];
    }

    if (!empty($args['length'])) {
        $args['parcel_length'] = $args['length'];
    }

    if (!empty($args['width'])) {
        $args['parcel_width'] = $args['width'];
    }

    if (!empty($args['height'])) {
        $args['parcel_height'] = $args['height'];
    }

    if (!empty($args['insurance'])) {
        $args['parcel_insurance'] = $args['insurance'];
    }

    if (!empty($args['description'])) {
        $args['parcel_description'] = $args['description'];
    }

    if (!empty($args['user_reference'])) {
        $args['parcel_user_reference'] = $args['user_reference'];
    }


    $post_id = wp_insert_post($p_args);

    if ($post_id) {

        $booking->update($post_id, $args);

        return $post_id;
    }
}
