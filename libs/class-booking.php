<?php

use Respect\Validation\Validator;

class Booking
{

    private $keys;

    public $services = [];

    public $parcel_type = [];

    public function __construct()
    {

        $this->services = [
            'dpd',
            'dpd_pickup',
            'fedex',
            'gls',
            'inpost_kurier',
            'inpost_paczkomaty',
            'ups',
            'ups_access_point',
            'poczta',
            'pocztex',
            'paczka_w_ruchu',
            'ambro_express',
            'rohlig_suus',
            'schenker'
        ];

        $this->parcel_type = [
            'parcel',
            'envelope',
            'pallet'
        ];

        $keys = [

            /* Sender */
            'sender_name',
            'sender_company',
            'sender_email',
            'sender_street',
            'sender_city',
            'sender_postcode',
            'sender_country',
            'sender_country_code',
            'sender_phone',

            /* Receiver */
            'receiver_name',
            'receiver_company',
            'receiver_email',
            'receiver_street',
            'receiver_city',
            'receiver_postcode',
            'receiver_country',
            'receiver_country_code',
            'receiver_phone',

            /* Parcel Information */
            'parcel_type',
            'parcel_weight',
            'parcel_length',
            'parcel_width',
            'parcel_height',
            'parcel_insurance',
            'parcel_description',
            'parcel_user_reference',
            'parcel_shape',

            /* Order Info */
            'total_cost',
            'service',
            'way_bill',
            'parcel_order',
            'parcel_order_date',
            'parcel_status',
            'parcel_create'

        ];

        $this->keys = $keys;
    }

    public function getKeys()
    {

        return (array) $this->keys;
    }

    public function get($id)
    {

        $id = intval($id);
        $post = get_post($id);

        $data = [];

        if (!empty($post)) {

            $post_id = $post->ID;

            foreach ($this->keys as $key) {

                $data[$key] = pb_package_meta($post_id, $key);
            }
        }

        return $data;
    }

    public function update($id, $args = [])
    {

        $post_id = intval($id);

        foreach ($args as $key => $value) {

            if (in_array($key, $this->keys)) {

                update_post_meta($post_id, $key, $value);
            }
        }
    }

    public function validPackage($data = [])
    {

        extract($data);

        if (!in_array($service, $this->services)) {

            return 'Service not a valid';
        }

        if (!in_array($parcel_type, $this->parcel_type)) {

            return 'Not a valid parcel type';
        }

        if (empty($sender_name) || empty($sender_email) || empty($sender_postcode) || empty($sender_city) || empty($sender_country_code) || empty($sender_phone)) {

            return 'Sender information fields missing.';
        }

        if (Validator::CountryCode()->validate($sender_country_code) === false) {

            return 'Sender country not a valid support only ISO alpha 2';
        }

        if (empty($receiver_name) || empty($receiver_email) || empty($receiver_postcode) || empty($receiver_city) || empty($receiver_country_code) || empty($receiver_phone)) {

            return 'Receiver information fields missing.';
        }

        if (Validator::CountryCode()->validate($receiver_country_code) === false) {

            return 'Receiver country not a valid support only ISO alpha 2';
        }

        if ($sender_country_code !== 'PL' || $receiver_country_code !== 'PL') {

            return 'Destination Error, support only poland to abroad and aborad to poland';
        }

        if (Validator::Email()->validate($sender_email) === false) {

            return 'Sender email not a valid';
        }

        if (Validator::Email()->validate($receiver_email) === false) {

            return 'Receiver email not a valid';
        }

        if (empty(pb_check_postal_code($sender_postcode, $sender_country_code))) {

            return 'Sender Postal code not a valid';
        }

        if (empty(pb_check_postal_code($receiver_postcode, $receiver_country_code))) {

            return 'Receiver Postal code not a valid';
        }

        if (Validator::Phone()->validate($sender_phone) === false) {

            return 'Sender phone number not a valid';
        }

        if (Validator::Phone()->validate($receiver_phone) === false) {

            return 'Receiver phone number not a valid';
        }

        return true;
    }
}


$booking = new Booking();
