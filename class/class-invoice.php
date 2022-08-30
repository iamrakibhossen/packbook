<?php

class Invoice
{
    private $type;

    public $keys = [];

    public $pbdb;

    public function __construct()
    {
        global $pbdb;

        $this->pbdb = $pbdb;

        add_action('admin_menu', array($this, 'create_menu'));

        $this->keys = [
            'user_id',
            'invoice_create',
            'invoice_due',
            'invoice_status',
            'invoice_type',
            'total_price',
            'due_price',
            'tax_price',
            'discount_price',
            'invoice_guid',
            'payment_id',
            'post_id'
        ];
    }


    public function check_fields($args)
    {
        foreach ($args as $key => $value) {

            if (!in_array($key, $this->keys)) {

                return false;
            }
        }

        return true;
    }

    public function create_menu()
    {
        //add_menu_page('Invoices', 'Invoices', 'manage_options', 'invoice', [$this, 'invoice_list'], 'dashicons-tag', 10);

        //add_submenu_page('invoice', 'Add Invoice', 'Add Invoice', 'manage_options', 'add_invoice', [$this, 'add']);
    }

    public function invoice_list()
    {
    }

    public function add(array $args)
    {

        global $user_ID;

        $default = [
            'user_id' => $user_ID,
            '' => '',
        ];

        $args = wp_parse_args($args, $default);

        $valid = $this->check_fields($args);

        if ($valid === true) {

            $id = $this->pbdb->insert('invoices', $args);

            return $id;
        }

        return false;
    }
}


$invoice = new Invoice();


$args = [];


