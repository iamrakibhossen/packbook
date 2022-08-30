<?php
/*
Template Name: _add_package
*/

use Respect\Validation\Validator;

global $user_ID, $address_book;

if (!is_user_logged_in()) {
    wp_redirect(home_url('/login/?redirect_to=' . home_url('/dashboard/add-package/')));
    exit;
}

if (!current_user_can('edit_posts')) {
    wp_redirect(home_url('/'));
    exit;
}

if ('POST' == $_SERVER['REQUEST_METHOD'] && !wp_verify_nonce($_POST['nonce'], 'add-package')) {
    die();
}

$service = 'dpd';

$user_info = get_userdata($user_ID);

//Sender Info
$sender_name = $user_info->display_name;
$sender_company = $user_info->user_company;
$sender_email = $user_info->user_email;
$sender_street = $user_info->user_address;
$sender_city = $user_info->user_city;
$sender_postcode = $user_info->user_postcode;
$sender_country = countryName($user_info->user_country);
$sender_country_code = $user_info->user_country;
$sender_phone = $user_info->user_phone;

$defult_receiver = get_user_meta($user_ID, 'default_receiver', true);

if (empty($defult_receiver)) {
    $defult_receiver = 0;
}

$receiver_info = $address_book->get($defult_receiver);

//receiver nfo
$receiver_name = $receiver_info['sender_name'];
$receiver_company = $receiver_info['sender_company'];
$receiver_email = $receiver_info['sender_email'];
$receiver_street = $receiver_info['sender_street'];
$receiver_city = $receiver_info['sender_city'];
$receiver_postcode = $receiver_info['sender_postcode'];
$receiver_country = $receiver_info['sender_country'];
$receiver_country_code = $receiver_info['sender_country_code'];
$receiver_phone = $receiver_info['sender_phone'];

//Parcel Info
$parcel_type = '';
$parcel_weight = '';
$parcel_length = '';
$parcel_width = '';
$parcel_height = '';
$parcel_insurance = '';
$parcel_description = '';
$parcel_user_reference = '';
$parcel_shape = '';


$total_cost = '';

$http_post = ('POST' == $_SERVER['REQUEST_METHOD']);

if (!empty($_GET['id'])) {

    $post_id = intval($_GET['id']);

    $post = get_post($post_id);

    if (($post->post_author == $user_ID || current_user_can('edit_others_posts')) && $post->post_type == 'booking') {
    } else {

        wp_redirect(home_url('/'));
        exit;
    }

    if (pb_package_meta($post->ID, 'parcel_order') == 1) {

        wp_redirect(home_url('/dashboard/orders/?id=' . $post->ID));
        exit;
    }

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
    }
}


if ($http_post) {

    $errors = new WP_Error();



    $service = empty($_POST['service']) ? $service : $_POST['service'];


    //Sender Info
    $sender_name = empty($_POST['sender_name']) ? $sender_name : sanitize_text_field($_POST['sender_name']);
    $sender_company = empty($_POST['sender_company']) ? $sender_company : sanitize_text_field($_POST['sender_company']);
    $sender_email = empty($_POST['sender_email']) ? $sender_email : sanitize_text_field($_POST['sender_email']);
    $sender_street = empty($_POST['sender_street']) ? $sender_street : sanitize_text_field($_POST['sender_street']);
    $sender_city = empty($_POST['sender_city']) ? $sender_city : sanitize_text_field($_POST['sender_city']);
    $sender_postcode = empty($_POST['sender_postcode']) ? $sender_postcode :  sanitize_text_field($_POST['sender_postcode']);
    $sender_country = empty($_POST['sender_country']) ? $sender_country : sanitize_text_field($_POST['sender_country']);
    $sender_country_code = empty($_POST['sender_country_code']) ? $sender_country_code : sanitize_text_field($_POST['sender_country_code']);
    $sender_phone = empty($_POST['sender_phone']) ? $sender_phone : sanitize_text_field($_POST['sender_phone']);

    //receiver Info
    $receiver_name = empty($_POST['receiver_name']) ? $receiver_name : sanitize_text_field($_POST['receiver_name']);
    $receiver_company = empty($_POST['receiver_company']) ? $receiver_company : sanitize_text_field($_POST['receiver_company']);
    $receiver_email = empty($_POST['receiver_email']) ? $receiver_email : sanitize_text_field($_POST['receiver_email']);
    $receiver_street = empty($_POST['receiver_street']) ? $receiver_street : sanitize_text_field($_POST['receiver_street']);
    $receiver_city = empty($_POST['receiver_city']) ? $receiver_city : sanitize_text_field($_POST['receiver_city']);
    $receiver_postcode = empty($_POST['receiver_postcode']) ? $receiver_postcode : sanitize_text_field($_POST['receiver_postcode']);
    $receiver_country = empty($_POST['receiver_country']) ? $receiver_country : sanitize_text_field($_POST['receiver_country']);
    $receiver_country_code = empty($_POST['receiver_country_code']) ? $receiver_country_code : sanitize_text_field($_POST['receiver_country_code']);
    $receiver_phone = empty($_POST['receiver_phone']) ? $receiver_phone : sanitize_text_field($_POST['receiver_phone']);

    $parcel_type = empty($_POST['parcel_type']) ? $parcel_type : $_POST['parcel_type'];
    $parcel_length = empty($_POST['parcel_length']) ? $dimension : $_POST['parcel_length'];
    $parcel_width = empty($_POST['parcel_width']) ? $dimension : $_POST['parcel_width'];
    $parcel_height = empty($_POST['parcel_height']) ? $dimension : $_POST['parcel_height'];
    $parcel_weight = empty($_POST['parcel_weight']) ? $parcel_weight : $_POST['parcel_weight'];
    $parcel_insurance = empty($_POST['parcel_insurance']) ? $parcel_insurance : $_POST['parcel_insurance'];
    $parcel_description = empty($_POST['parcel_description']) ? $parcel_description : $_POST['parcel_description'];


    $total_cost = empty($_POST['total_cost']) ? $total_cost : intval($_POST['total_cost']);


    if (($sender_country_code !== 'PL') && ($receiver_country_code !== 'PL')) {

        $errors->add('destination', __('<strong>ERROR</strong>: Destination error allow only Poland.', 'packbook'));
    } elseif (empty(pb_check_postal_code($sender_postcode, $sender_country_code))) {

        $errors->add('sender_postcode', __('<strong>ERROR</strong>: Sender postal code not a valid.', 'packbook'));
    } elseif (empty(pb_check_postal_code($receiver_postcode, $receiver_country_code))) {

        $errors->add('receiver_postcode', __('<strong>ERROR</strong>: Reciver postal code not a valid.', 'packbook'));
    } elseif (empty($total_cost)) {

        $errors->add('total_cost', __('<strong>ERROR</strong>: Parcel not aviaviable', 'packbook'));
    } elseif (empty($service)) {

        $errors->add('service', __('<strong>ERROR</strong>: Select a carrier', 'packbook'));
    } elseif (empty($sender_name) || empty($sender_country_code) || empty($sender_city) || empty($sender_street) || empty($sender_phone)) {

        $errors->add('service', __('<strong>ERROR</strong>: Please complete sender information', 'packbook'));
    } elseif (empty($receiver_name) || empty($receiver_country_code) || empty($receiver_city) || empty($receiver_street) || empty($receiver_phone)) {

        $errors->add('service', __('<strong>ERROR</strong>: Please complete receiver information', 'packbook'));
    } elseif (empty($parcel_description)) {

        $errors->add('service', __('<strong>ERROR</strong>: Parcel description required.', 'packbook'));
    } else {


        if (isset($_POST['add_package'])) {

            $post_id = $_POST['post_id'];

            $way_bill = wp_generate_password(16, false);

            $args = array(
                'post_title' => $way_bill,
                'post_type' => 'booking',
                'post_status' => 'publish',
                'post_author' => $user_ID,

            );

            if (!empty($post_id)) {

                wp_update_post(['ID' => $post_id]);
            } else {

                $post_id = wp_insert_post($args);
            }

            update_post_meta($post_id, 'service', $service);

            //Sender Info
            update_post_meta($post_id, 'sender_name', $sender_name);
            update_post_meta($post_id, 'sender_company', $sender_company);
            update_post_meta($post_id, 'sender_email', $sender_email);
            update_post_meta($post_id, 'sender_country_code', $sender_country_code);
            update_post_meta($post_id, 'sender_postcode', $sender_postcode);
            update_post_meta($post_id, 'sender_city', $sender_city);
            update_post_meta($post_id, 'sender_street', $sender_street);
            update_post_meta($post_id, 'sender_phone', $sender_phone);

            //Reciver Info
            update_post_meta($post_id, 'receiver_name', $receiver_name);
            update_post_meta($post_id, 'receiver_company', $receiver_company);
            update_post_meta($post_id, 'receiver_email', $receiver_email);
            update_post_meta($post_id, 'receiver_country_code', $receiver_country_code);
            update_post_meta($post_id, 'receiver_postcode', $receiver_postcode);
            update_post_meta($post_id, 'receiver_city', $receiver_city);
            update_post_meta($post_id, 'receiver_street', $receiver_street);
            update_post_meta($post_id, 'receiver_phone', $receiver_phone);


            //Parcel Info
            update_post_meta($post_id, 'parcel_type', $parcel_type);
            update_post_meta($post_id, 'parcel_weight', $parcel_weight);
            update_post_meta($post_id, 'parcel_length', $parcel_length);
            update_post_meta($post_id, 'parcel_width', $parcel_width);
            update_post_meta($post_id, 'parcel_height', $parcel_height);
            update_post_meta($post_id, 'parcel_insurance', $parcel_insurance);
            update_post_meta($post_id, 'parcel_description', $parcel_description);


            update_post_meta($post_id, 'parcel_order', '0');

            update_post_meta($post_id, 'way_bill', $way_bill);


            update_post_meta($post_id, 'total_cost', $total_cost);

            wp_redirect(home_url('/dashboard/orders/?id=' . $post_id));

            exit;
        }
    }
}

get_header();
?>

<section class="packbook-booking mt-4">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-10 col-lg-12">

                <h1 class="py-3 font-weight-normal h5">
                    <span class="icon icon-shape bg-success shadow-success rounded-circle text-white mr-2">
                        <i class="fas fa-tachometer-alt"></i>

                    </span>
                    Add Package
                </h1>


                <?php if (isset($errors) && is_wp_error($errors)) { ?>

                    <?php if (!empty($errors->get_error_message())) { ?>

                        <div class="alert alert-group alert-danger alert-dismissible fade show alert-icon" role="alert">
                            <div class="alert-group-prepend"><span class="alert-group-icon text-"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <line x1="12" y1="16" x2="12" y2="12"></line>
                                        <line x1="12" y1="8" x2="12.01" y2="8"></line>
                                    </svg></span></div>
                            <div class="alert-content"><strong><?php echo $errors->get_error_message(); ?></strong> </div><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        </div>

                    <?php } ?>
                <?php } ?>

                <form id="booking-form" action="<?php echo home_url('/dashboard/add-package/'); ?>" method="POST" autocomplete="off">
                    <div class="w-75">
                        <h5 class="mb-3">Informacje o nadawcy</h5>


                        <div class="form-group row justify-content-end">
                            <label for="sender_name" class="col-sm-4 col-form-label">Pełne imię i nazwisko</label>
                            <div class="col-sm-8 ">
                                <div class="input-group input-group-sm input-group-merge">
                                    <input id="sender_name" name="sender_name" type="text" value="<?php echo sanitize_text_field($sender_name); ?>" class="form-control form-control-append">
                                    <div class="input-group-append" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add sender address book">
                                        <span class="btn btn-info btn-sm"><i class="fas fa-book"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row justify-content-end">
                            <label for="sender_company" class="col-sm-4 col-form-label">Firma</label>
                            <div class="col-sm-8">
                                <input id="sender_company" name="sender_company" type="text" value="<?php echo sanitize_text_field($sender_company); ?>" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="form-group row justify-content-end fv-plugins-icon-container">
                            <label for="sender_country_code" class="col-sm-4 col-form-label">Kraj</label>
                            <div class="col-sm-8">
                                <?php country_lists('sender_country_code', 'custom-select custom-select-sm', $sender_country_code); ?>
                                <div class="fv-plugins-message-container"></div>
                            </div>
                        </div>
                        <div class="form-group row justify-content-start fv-plugins-icon-container">
                            <label for="sender_postcode" class="col-sm-4 col-form-label">Kod pocztowy</label>
                            <div class="col-sm-4">
                                <input id="sender_postcode" name="sender_postcode" type="text" value="<?php echo $sender_postcode; ?>" class="form-control form-control-sm">

                            </div>
                        </div>
                        <div class="form-group row justify-content-start fv-plugins-icon-container">
                            <label for="sender_city" class="col-sm-4 col-form-label">Miasto</label>
                            <div class="col-sm-8">
                                <input id="sender_city" name="sender_city" type="text" value="<?php echo sanitize_text_field($sender_city); ?>" class="form-control form-control-sm">
                                <div class="fv-plugins-message-container"></div>
                            </div>
                        </div>
                        <div class="form-group row justify-content-end fv-plugins-icon-container">
                            <label for="sender_street" class="col-sm-4 col-form-label">Ulica i numer</label>
                            <div class="col-sm-8">
                                <input id="sender_street" name="sender_street" type="text" value="<?php echo sanitize_text_field($sender_street); ?>" class="form-control form-control-sm">
                                <div class="fv-plugins-message-container"></div>
                            </div>
                        </div>
                        <div class="form-group row justify-content-end fv-plugins-icon-container">
                            <label for="sender_email" class="col-sm-4 col-form-label">E-mail </label>
                            <div class="col-sm-8">
                                <input id="sender_email" name="sender_email" type="email" value="<?php echo sanitize_text_field($sender_email); ?>" class="form-control form-control-sm">
                                <div class="fv-plugins-message-container"></div>
                            </div>
                        </div>
                        <div class="form-group row justify-content-end fv-plugins-icon-container">
                            <label for="sender_phone" class="col-sm-4 col-form-label">Telefon</label>
                            <div class="col-sm-8">
                                <input id="sender_phone" name="sender_phone" type="text" value="<?php echo sanitize_text_field($sender_phone); ?>" class="form-control form-control-sm input-mask" placeholder="" maxlength="12" data-mask="00000000000">

                            </div>
                        </div>

                    </div>
                    <hr>

                    <div class="w-75">
                        <h5 class="mb-3">Informacje o odbiorcy</h5>

                        <div class="form-group row justify-content-end fv-plugins-icon-container">
                            <label for="receiver_name" class="col-sm-4 col-form-label">Pełne imię i nazwisko</label>
                            <div class="col-sm-8">
                                <div class="input-group input-group-sm input-group-merge">
                                    <input id="receiver_name" name="receiver_name" type="text" value="<?php echo sanitize_text_field($receiver_name); ?>" class="form-control form-control-append">
                                    <div class="input-group-append" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add receiver address book">
                                        <span class="btn btn-info btn-sm"><i class="fas fa-book"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row justify-content-end">
                            <label for="receiver_company" class="col-sm-4 col-form-label">Firma</label>
                            <div class="col-sm-8">
                                <input id="receiver_company" name="receiver_company" type="text" value="<?php echo sanitize_text_field($receiver_company); ?>" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="form-group row justify-content-end fv-plugins-icon-container">
                            <label for="receiver_country_code" class="col-sm-4 col-form-label">Kraj</label>
                            <div class="col-sm-8">
                                <?php country_lists('receiver_country_code', 'custom-select custom-select-sm', $receiver_country_code); ?>
                                <div class="fv-plugins-message-container"></div>
                            </div>
                        </div>
                        <div class="form-group row justify-content-start fv-plugins-icon-container">
                            <label for="receiver_postcode" class="col-sm-4 col-form-label">Kod pocztowy</label>
                            <div class="col-sm-4">
                                <input id="receiver_postcode" name="receiver_postcode" type="text" value="<?php echo sanitize_text_field($receiver_postcode); ?>" class="form-control form-control-sm">
                                <div class="fv-plugins-message-container"></div>
                            </div>
                        </div>
                        <div class="form-group row justify-content-start fv-plugins-icon-container">
                            <label for="receiver_city" class="col-sm-4 col-form-label">Miasto
                            </label>
                            <div class="col-sm-8">
                                <input id="receiver_city" name="receiver_city" type="text" value="<?php echo sanitize_text_field($receiver_city); ?>" class="form-control form-control-sm">
                                <div class="fv-plugins-message-container"></div>
                            </div>
                        </div>
                        <div class="form-group row justify-content-end fv-plugins-icon-container">
                            <label for="receiver_street" class="col-sm-4 col-form-label">Ulica i numer</label>
                            <div class="col-sm-8">
                                <input id="receiver_street" name="receiver_street" type="text" value="<?php echo sanitize_text_field($receiver_street); ?>" class="form-control form-control-sm">
                                <div class="fv-plugins-message-container"></div>
                            </div>
                        </div>
                        <div class="form-group row justify-content-end fv-plugins-icon-container">
                            <label for="receiver_email" class="col-sm-4 col-form-label">E-mail </label>
                            <div class="col-sm-8">
                                <input id="receiver_email" name="receiver_email" type="email" value="<?php echo sanitize_text_field($receiver_email); ?>" class="form-control form-control-sm">
                                <div class="fv-plugins-message-container"></div>
                            </div>
                        </div>
                        <div class="form-group row justify-content-end fv-plugins-icon-container">
                            <label for="receiver_phone" class="col-sm-4 col-form-label">Telefon</label>
                            <div class="col-sm-8">
                                <input id="receiver_phone" name="receiver_phone" type="text" value="<?php echo sanitize_text_field($receiver_phone); ?>" class="form-control  form-control-sm input-mask" placeholder="" autocomplete="off" maxlength="12" data-mask="00000000000">

                            </div>
                        </div>
                    </div>

                    <hr>

                    <h5 class="mb-3">Informacje o pakiecie</h5>

                    <?php get_template_part('template-parts/booking'); ?>



                    <hr>



                    <div class="mt-5 text-center"><button type="submit" class="btn btn-primary btn-sm">
                            Dodaj przesyłkę

                        </button></div>

                    <?php if (!empty($post_id)) {
                        echo '<input type="hidden" name="post_id" value="' . $post_id . '">';
                    } ?>
                    <input type="hidden" name="nonce" id="nonce" value="<?php echo wp_create_nonce('add-package'); ?>" />
                    <input type="hidden" name="add_package" value="1">


                </form>


            </div>
        </div>
</section>

<?php get_footer(); ?>