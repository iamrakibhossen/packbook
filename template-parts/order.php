<?php

global $user_ID;

$balance = get_user_meta($user_ID, '_pb_user_balance', true);


$balance = pb_price($balance);

if (
    !empty($_GET['id'])
) {

    $post_id = intval($_GET['id']);

    $post = get_post($post_id);

    if (!empty($post)) {

        $post_id = $post->ID;


        //Service Name
        $service = pb_package_meta($post_id, 'service');

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

        //Total Cost
        $total_cost = pb_package_meta($post_id, 'total_cost');

        $way_bill = pb_package_meta($post_id, 'way_bill');
    }
}

$status = array('date' => '', 'status' => '', 'note' => '');

$http_post = ('POST' == $_SERVER['REQUEST_METHOD']);

if ($http_post) {


    $post_id = intval($_GET['id']);

    $history = ['date' => current_time('mysql'), 'status' => 'order', 'note' => 'Ordered confirm'];

    update_post_meta($post_id, 'parcel_order', 1);

    update_post_meta($post_id, 'parcel_history', $history);

    pb_user_balance($user_ID, $total_cost, 'spend', 'parcel - ' . $way_bill);

    update_post_meta($post_id, 'booking_status', [$history]);

    update_post_meta($post_id, 'parcel_status', 'Order');

    update_post_meta($post_id, 'parcel_order_date', current_time('mysql'));

    update_post_meta($post_id, 'parcel_create', $user_ID);


    $invoice = getLabels($post_id);

    $user_info = get_userdata($user_ID);

    $blogname = wp_specialchars_decode(get_option('blogname'), ENT_QUOTES);


     $headers = 'From: Packbook <noreply@packbook.pl>' . "\r\n";


    $message  = sprintf(__('Thank you for order at %s.', 'packbook'), $blogname) . "\r\n\r\n";
    $message .= sprintf(__('Parcel: %s', 'packbook'), ucfirst($parcel_type)) . "\r\n\r\n";
    $message .= sprintf(__('Service: %s', 'packbook'), pb_get_service_name($service) ) . "\r\n\r\n";
    $message .=  sprintf(__('ID: %s', 'packbook'), $way_bill) . "\r\n\r\n";
    $message .=  sprintf(__('Price: %s', 'packbook'), pb_price($total_cost, true) ) . "\r\n\r\n";

    @wp_mail($user_info->user_email, sprintf(__('%s Order new parcel', 'packbook'), $user_info->display_name), $message, $headers, [$invoice]);
}


?>


<h1 class="h5"><?php echo $way_bill; ?> <span class="badge badge-primary badge-sm <?php echo $service; ?>"><?php echo pb_get_service_name($service); ?></span></h1>

<hr />

<div class="row font-weight-bold">

    <div class="col-md-4 mb-4">
        <h5 class="mb-3 h6">Informacje o nadawcy</h5>


        <div class="row mb-2">

            <div class="col-sm-8">
                <?php echo $sender_name; ?>
            </div>
        </div>

        <div class="row mb-2">

            <div class="col-sm-8">
                <?php echo $sender_company; ?>
            </div>
        </div>



        <div class="row mb-2">
            <div class="col-sm-8">
                <?php echo $sender_postcode; ?>, <?php echo $sender_city; ?> - <?php echo countryName($sender_country_code); ?>
            </div>
        </div>


        <div class="row mb-2">


            <div class="col-sm-8">
                <?php echo $sender_street; ?>
            </div>
        </div>


        <div class="row mb-2">
            <div class="col-sm-8">
                <?php echo $sender_email; ?>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-sm-8">
                <?php echo $sender_phone; ?>
            </div>
        </div>

    </div>


    <div class="col-md-4 mb-4">
        <h5 class="mb-3 h6">Informacje o odbiorcy</h5>


        <div class="row mb-2">

            <div class="col-sm-8">
                <?php echo $receiver_name; ?>
            </div>
        </div>

        <div class="row mb-2">

            <div class="col-sm-8">
                <?php echo $receiver_company; ?>
            </div>
        </div>



        <div class="row mb-2">
            <div class="col-sm-8">
                <?php echo $receiver_postcode; ?>, <?php echo $receiver_city; ?> - <?php echo countryName($receiver_country_code); ?>
            </div>
        </div>


        <div class="row mb-2">


            <div class="col-sm-8">
                <?php echo $receiver_street; ?>
            </div>
        </div>

        <div class="row mb-2">
            <div class="col-sm-8">
                <?php echo $receiver_email; ?>
            </div>
        </div>

        <div class="row mb-2">
            <div class="col-sm-8">
                <?php echo $receiver_phone; ?>
            </div>
        </div>


    </div>

    <style>
        .checkpoint.svelte-11xb61l:after {
            position: absolute;
            display: block;
            width: 2px;
            top: 0px;
            bottom: 0px;
            left: 9px;
            content: "";
            border-left: 2px dotted#CCC;
            z-index: 1
        }

        .checkpoint.svelte-11xb61l:first-of-type:after {
            height: calc(100% - 1rem);
            top: inherit
        }

        .checkpoint.svelte-11xb61l:last-of-type:after {
            height: 1rem;
            bottom: inherit
        }

        .checkpoint__icon.svelte-11xb61l {
            position: absolute;
            left: 0px;
            width: 21px;
            height: 21px;
            font-size: 21px;
            border-radius: 50%;
            background: white;
            z-index: 5
        }

        .checkpoint__detail.svelte-11xb61l {
            margin-left: 30px
        }
    </style>

    <div class="col-md-4">


        <?php

        $booking_status = pb_package_meta($post_id, 'booking_status');

        if (!is_array($booking_status)) {
            $booking_status = [];
        }

        ?>
        <h5 class="mb-2 ml-2 h6 font-weight-normal"><span class="font-weight-bold">Trancking History</span></h5>

        <ul class="list-unstyled position-relative">


            <?php foreach ($booking_status as $key => $value) {

            ?>

                <li class="relative flex py-3 checkpoint text-sm svelte-11xb61l">
                    <div class="flex-shrink-0 checkpoint__icon svelte-11xb61l">
                        <div class="absolute z-10">
                            <i class="far fa-clock checkpoint__icon svelte-11xb61l text-success"></i>
                        </div>
                    </div>
                    <div class="checkpoint__detail flex-grow flex flex-col svelte-11xb61l">
                        <div class="block">
                            <div class="block">
                                <div class="inline-block">
                                    <div class="svelte-jc2gcs">
                                        <p class="text-dark mb-0 font-weight-normal small"><?php echo date('M d Y g:i a', strtotime($value['date'])); ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="inline font-weight-bold"><?php echo ucfirst($value['status']); ?></div>
                        </div>
                        <div class="font-weight-normal small"><?php echo $value['note']; ?></div>
                    </div>
                </li>

            <?php } ?>

            <li class="relative flex py-3 checkpoint text-sm svelte-11xb61l">
                <div class="flex-shrink-0 checkpoint__icon svelte-11xb61l">
                    <div class="absolute z-10">
                        <i class="far fa-clock checkpoint__icon svelte-11xb61l text-success"></i>
                    </div>
                </div>
                <div class="checkpoint__detail flex-grow flex flex-col svelte-11xb61l">
                    <div class="block">
                        <div class="block">
                            <div class="inline-block">
                                <div class="svelte-jc2gcs">
                                    <p class="text-dark mb-0 font-weight-normal small"><?php echo get_the_time('M d Y g:i a', $post_id); ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="inline font-weight-bold">Parcel</div>
                    </div>
                    <div class="font-weight-normal small">Added Parcel</div>
                </div>
            </li>

        </ul>

    </div>


    <div class="col-md-6">

        <hr>
        <h5 class="mb-3 h6">Informacje o pakiecie</h5>

        <div class="row mb-2">

            <div class="col-sm-4">
                <?php _e('Paczka', 'packbook'); ?>
            </div>
            <div class="col-sm-8">
                <?php echo ucfirst($parcel_type); ?>
            </div>
        </div>

        <div class="row mb-2">

            <div class="col-sm-4">
                <?php _e('Wymiary', 'packbook'); ?>
            </div>
            <div class="col-sm-8">
                <?php echo $parcel_length; ?> X <?php echo $parcel_width; ?> X <?php echo $parcel_height; ?>
            </div>
        </div>

        <div class="row mb-2">

            <div class="col-sm-4">
                <?php _e('Waga', 'packbook'); ?>
            </div>
            <div class="col-sm-8">
                <?php echo $parcel_weight; ?> kg
            </div>
        </div>

        <div class="row mb-2">

            <div class="col-sm-4">
                <?php _e('Wartość ubezpieczenia', 'packbook'); ?>
            </div>
            <div class="col-sm-8">
                <?php echo pb_price($parcel_insurance); ?> PLN
            </div>
        </div>

        <div class="row mb-2">

            <div class="col-sm-4">
                <?php _e('Description', 'packbook'); ?>
            </div>
            <div class="col-sm-8">
                <?php echo $parcel_description; ?>
            </div>
        </div>

        <div class="row mb-2">

            <div class="col-sm-4">
                <?php _e('User Reference', 'packbook'); ?>
            </div>
            <div class="col-sm-8">
                <?php echo $parcel_user_reference; ?>
            </div>
        </div>



    </div>




    <div class="col-md-6">

        <hr>

        <h5 class="mb-3 h6">Szczegóły zamówienia</h5>

        <form class="" method="POST">


            <?php if (get_post_meta($post_id, 'parcel_order', true) == 1) { ?>

                <div class="row mb-2 font-weight-bold">
                    <div class="col-sm-4">
                        <?php _e('Trancking ID', 'packbook'); ?>
                    </div>
                    <div class="col-sm-8">
                        <?php echo get_post_meta($post_id, 'way_bill', true); ?>
                    </div>

                </div>

                <?php $status = get_post_meta($post_id, 'parcel_history', true); ?>

                <div class="row mb-2 font-weight-bold">


                    <div class="col-sm-4">
                        <?php _e('Ordered', 'packbook'); ?>
                    </div>
                    <div class="col-sm-8">
                        <?php echo  date('M d Y g:i a', strtotime($status['date'])); ?>
                    </div>

                </div>

                <div class="row mb-2 font-weight-bold">


                    <div class="col-sm-4">
                        <?php _e('Price with VAT', 'packbook'); ?>
                    </div>
                    <div class="col-sm-8">
                        <?php echo pb_price($total_cost); ?> PLN
                    </div>

                </div>

                <div class="row mb-2 font-weight-bold">

                    <div class="col-md-4">
                        <?php _e('Status', 'packbook'); ?>
                    </div>
                    <div class="col-sm-8">

                        <?php echo $status['note']; ?>

                    </div>

                    <hr>

                    <div class="col-md">
                        <a href="#" class="btn btn-block btn-google-plus btn-icon-label btn-sm">
                            <span class="btn-inner--icon">
                                <i class="fas fa-file-invoice-dollar"></i>
                            </span>
                            <span class="btn-inner--text">Download Invoice</span>
                        </a>
                    </div>
                    <div class="col-sm-6">
                        <a href="#" class="btn btn-block btn-facebook btn-icon-label btn-sm">
                            <span class="btn-inner--icon">
                                <i class="fas fa-file-pdf"></i>
                            </span>
                            <span class="btn-inner--text">Download Label</span>
                        </a>
                    </div>


                </div>


            <?php } else { ?>

                <?php if ($total_cost >= $balance) { ?>

                    <p>Pobierz Saldo zamówienia jest niskie, doładuj saldo</p>
                    <p>Potrzebujesz równowagi: <?php echo pb_price($total_cost); ?> PLN</p>
                    <p>Aktualne saldo: <?php echo pb_price($balance); ?> PLN</p>

                    <p><a class="btn btn-sm btn-success" href="<?php echo home_url('/dashboard/balance/'); ?>">Dodaj saldo</a></p>

                <?php  } else { ?>

                    <p>Potrzebujesz równowagi: <?php echo pb_price($total_cost); ?> PLN</p>

                    <button class="btn btn-sm btn-danger"><?php _e('Confirm Order and Payment'); ?></button>

                <?php } ?>

            <?php } ?>

            <input type="hidden" name="nonce" id="nonce" value="<?php echo wp_create_nonce('order'); ?>" />

        </form>

    </div>




</div>