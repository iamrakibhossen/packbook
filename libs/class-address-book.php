<?php

class Address_Book
{
    private $keys;

    public function __construct()
    {
        $keys = [
            'sender_name',
            'sender_company',
            'sender_email',
            'sender_street',
            'sender_city',
            'sender_postcode',
            'sender_country',
            'sender_country_code',
            'sender_phone',
        ];

        $this->keys = $keys;
    }

    /**
     * getKeys function
     *
     * @return mixed
     */
    public function getKeys()
    {
        return $this->keys;
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

    
}


$address_book = new Address_Book();
