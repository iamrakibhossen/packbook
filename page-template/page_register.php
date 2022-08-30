<?php
/*
Template Name: _register
*/

define("DONOTCACHEPAGE", true);

if (is_user_logged_in()) {
    wp_redirect(home_url());
    exit;
}

if ('POST' == $_SERVER['REQUEST_METHOD'] && !wp_verify_nonce($_POST['nonce'], 'register')) {
    die();
}

if (!get_option('users_can_register')) {
    wp_redirect(home_url('/login/?registration=disabled'));
    exit;
}

if (get_option('captcha_public') != '' && get_option('captcha_private') != '')
    require_once(get_template_directory() . '/recaptchalib.php');

$http_post = ('POST' == $_SERVER['REQUEST_METHOD']);

$user_login = uniqid();

$user_email = '';

$user_type = 'private';

$user_nip = '';

$check_terms = '';

$display_name = '';

$user_phone = '';

if ($http_post) {
    if (isset($_GET['action']) && $_GET['action'] == 'resend') {
        if (empty($_POST['user_email'])) {
            $resend_status = __('<strong>ERROR</strong>: Enter email address.', 'packbook');
        } else {
            if (get_option('captcha_public') != '' && get_option('captcha_private') != '') {
                $privatekey = get_option('captcha_private');
                $reCaptcha = new ReCaptcha($privatekey);

                if ($_POST["g-recaptcha-response"]) {
                    $resp = $reCaptcha->verifyResponse(
                        $_SERVER["REMOTE_ADDR"],
                        $_POST["g-recaptcha-response"]
                    );
                }

                if (!$resp->success) {
                    $resend_status = __('<strong>ERROR</strong>: Incorrect Captcha.', 'packbook');
                } else {
                    $user = get_user_by('email', sanitize_email($_POST['user_email']));

                    if ($user) {
                        $verify_email = get_user_meta($user->ID, '_Verify Email', true);

                        if ($verify_email != '') {
                            $blogname = wp_specialchars_decode(get_option('blogname'), ENT_QUOTES);

                            $message  = sprintf(__('Thank you for registering with %s.', 'packbook'), $blogname) . "\r\n\r\n";
                            $message .= sprintf(__('Username: %s', 'packbook'), $user->user_login) . "\r\n\r\n";
                            $message .= __('Please click the link to verify your email:', 'packbook') . "\r\n";
                            $message .= sprintf('%s?email=verify&login=%s&key=%s', home_url('/login/'), rawurlencode($user->user_login), $verify_email);

                            wp_mail($user->user_email, sprintf(__('%s Account Registration', 'packbook'), $blogname), $message);

                            $resend_status = 'success';
                        } else {
                            $resend_status = __('<strong>ERROR</strong>: Account is already activated.', 'packbook');
                        }
                    } else {
                        $resend_status = __('<strong>ERROR</strong>: Email not found.', 'packbook');
                    }
                }
            } else {
                $user = get_user_by('email', sanitize_email($_POST['user_email']));

                if ($user) {
                    $verify_email = get_user_meta($user->ID, '_Verify Email', true);

                    if ($verify_email != '') {
                        $blogname = wp_specialchars_decode(get_option('blogname'), ENT_QUOTES);

                        $message  = sprintf(__('Thank you for registering with %s.', 'packbook'), $blogname) . "\r\n\r\n";
                        $message .= sprintf(__('Username: %s', 'packbook'), $user->user_login) . "\r\n\r\n";
                        $message .= __('Please click the link to verify your email:', 'packbook') . "\r\n";
                        $message .= sprintf('%s?email=verify&login=%s&key=%s', home_url('/login/'), rawurlencode($user->user_login), $verify_email);

                        wp_mail($user->user_email, sprintf(__('[%s] Account Registration', 'packbook'), $blogname), $message);

                        $resend_status = 'success';
                    } else {
                        $resend_status = __('<strong>ERROR</strong>: Account is already activated.', 'packbook');
                    }
                } else {
                    $resend_status = __('<strong>ERROR</strong>: Email not found.', 'packbook');
                }
            }
        }
    } else {

        $user_login = $_POST['user_login'];

        $user_email = $_POST['user_email'];

        $user_type = $_POST['user_type'];

        $user_nip = $_POST['user_nip'];

        $check_terms = $_POST['check_terms'];

        $display_name = $_POST['display_name'];

        $user_phone = $_POST['user_phone'];

        $errors = packbook_register_new_user($user_login, $user_email);

        if (!is_wp_error($errors)) {
            $redirect_to = home_url('/login/?registration=done');
            wp_safe_redirect($redirect_to);
            exit();
        }
    }
}

//function from wp-includes\user.php
function packbook_register_new_user($user_login, $user_email)
{
    $errors = new WP_Error();

    $sanitized_user_login = sanitize_user($user_login);
    /**
     * Filter the email address of a user being registered.
     *
     * @since 2.1.0
     *
     * @param string $user_email The email address of the new user.
     */
    $user_email = apply_filters('user_registration_email', $user_email);

    // Check the username
    if ($sanitized_user_login == '') {
        $errors->add('empty_username', __('<strong>ERROR</strong>: Please enter a username.', 'packbook'));
    } elseif (!validate_username($user_login)) {
        $errors->add('invalid_username', __('<strong>ERROR</strong>: This username is invalid because it uses illegal characters. Please enter a valid username.', 'packbook'));
        $sanitized_user_login = '';
    } elseif (username_exists($sanitized_user_login)) {
        $errors->add('username_exists', __('<strong>ERROR</strong>: This username is already registered. Please choose another one.', 'packbook'));
    }

    // Check the e-mail address
    if ($user_email == '') {
        $errors->add('empty_email', __('<strong>ERROR</strong>: Please type your e-mail address.', 'packbook'));
    } elseif (!is_email($user_email)) {
        $errors->add('invalid_email', __('<strong>ERROR</strong>: The email address isn&#8217;t correct.', 'packbook'));
        $user_email = '';
    } elseif (email_exists($user_email)) {
        $errors->add('email_exists', __('<strong>ERROR</strong>: This email is already registered, please choose another one.', 'packbook'));
    }

    //edited: added to check the passwords
    if ($_POST['user_pass'] == '') {

        $errors->add('password_blank', "<strong>ERROR</strong>: Password cannot be blank.", 'packbook');
    }

    if (strlen($_POST['user_pass']) < 6) {
        $errors->add('password_too_short', "<strong>ERROR</strong>: Passwords must be at least 6 characters long", 'packbook');
    }

    if (!$_POST['check_terms'] == 1) {
        $errors->add('check_terms', "<strong>ERROR</strong>: I agree to the terms and conditions", 'packbook');
    }

    if ($_POST['user_type'] == 'bussiness' && $_POST['user_nip'] == '') {
        $errors->add('user_nip_blank', "<strong>ERROR</strong>: Provide valid Bussiness NIP", 'packbook');
    }

    if ($_POST['user_type'] == 'bussiness') {

        $nip_data = pb_get_nip($_POST['user_nip']);

        if ($nip_data === false) {

            $errors->add('user_nip', "<strong>ERROR</strong>: NIP address not a valid.", 'packbook');
        }
    }

    //edited: check if captcha is correct
    if (get_option('captcha_public') != '' && get_option('captcha_private') != '') {
        $privatekey = get_option('captcha_private');
        $reCaptcha = new ReCaptcha($privatekey);

        if ($_POST["g-recaptcha-response"]) {
            $resp = $reCaptcha->verifyResponse(
                $_SERVER["REMOTE_ADDR"],
                $_POST["g-recaptcha-response"]
            );
        }

        if (!$resp->success) {
            $errors = new WP_Error('incorrect_captcha', __('<strong>ERROR</strong>: Incorrect Captcha.', 'packbook'));
        }
    }



    /**
     * Fires when submitting registration form data, before the user is created.
     *
     * @since 2.1.0
     *
     * @param string   $sanitized_user_login The submitted username after being sanitized.
     * @param string   $user_email           The submitted email.
     * @param WP_Error $errors               Contains any errors with submitted username and email,
     *                                       e.g., an empty field, an invalid username or email,
     *                                       or an existing username or email.
     */
    do_action('register_post', $sanitized_user_login, $user_email, $errors);

    /**
     * Filter the errors encountered when a new user is being registered.
     *
     * The filtered WP_Error object may, for example, contain errors for an invalid
     * or existing username or email address. A WP_Error object should always returned,
     * but may or may not contain errors.
     *
     * If any errors are present in $errors, this will abort the user's registration.
     *
     * @since 2.1.0
     *
     * @param WP_Error $errors               A WP_Error object containing any errors encountered
     *                                       during registration.
     * @param string   $sanitized_user_login User's username after it has been sanitized.
     * @param string   $user_email           User's email.
     */
    $errors = apply_filters('registration_errors', $errors, $sanitized_user_login, $user_email);

    if ($errors->get_error_code())
        return $errors;

    //$user_pass = wp_generate_password( 12, false); //edited: dun generate password
    $user_pass = trim($_POST['user_pass']); //edited: strip white spaces
    $user_id = wp_create_user($sanitized_user_login, $user_pass, $user_email);
    if (!$user_id || is_wp_error($user_id)) {
        $errors->add('registerfail', sprintf(__('<strong>ERROR</strong>: Couldn&#8217;t register you&hellip; please contact the <a href="mailto:%s">webmaster</a> !', 'packbook'), get_option('admin_email')));
        return $errors;
    }

    //update_user_option( $user_id, 'default_password_nag', true, true ); //Set up the Password change nag. //edited: dun nag

    //wp_new_user_notification( $user_id, $user_pass ); //edited: dun notify

    wp_update_user(array('ID' => $user_id, 'display_name' => sanitize_text_field($_POST['display_name'])));

    update_user_meta($user_id, 'user_type', $_POST['user_type']);


    if (!empty($nip_data)) {

        update_user_meta($user_id, 'user_nip_data', $nip_data);

        if (!empty($nip_data['nip'])) {
            update_user_meta($user_id, 'user_nip', $nip_data['nip']);
        }

        if (!empty($nip_data['name'])) {
            update_user_meta($user_id, 'user_company', $nip_data['name']);
        }

        if (!empty($nip_data['zipCode'])) {
            update_user_meta($user_id, 'user_postcode', $nip_data['zipCode']);
        }

        if (!empty($nip_data['postCity'])) {
            update_user_meta($user_id, 'user_city', $nip_data['postCity']);
        }

        if (!empty($nip_data['street'])) {
            update_user_meta($user_id, 'user_address', $nip_data['street']);
        }

        update_user_meta($user_id, 'user_country', 'PL');
    }

    $mask_password = str_pad(substr($user_pass, -3), strlen($user_pass), '*', STR_PAD_LEFT); //edited: mask paswword

    //add user meta to verify email
    $verify_email = wp_generate_password(20, false);
    update_user_meta($user_id, '_Verify Email', $verify_email);

    $blogname = wp_specialchars_decode(get_option('blogname'), ENT_QUOTES);

    $message  = sprintf(__('Thank you for registering with %s.', 'packbook'), $blogname) . "\r\n\r\n";
    $message .= sprintf(__('Email: %s', 'packbook'), $user_email) . "\r\n";
    $message .= sprintf(__('Password: %s', 'packbook'), $mask_password) . "\r\n\r\n";
    $message .= __('Please click the link to verify your email:', 'packbook') . "\r\n";
    $message .= sprintf('%s?email=verify&login=%s&key=%s', home_url('/login/'), rawurlencode($sanitized_user_login), $verify_email);

    wp_mail($user_email, sprintf(__('%s Account Registration', 'packbook'), $blogname), $message);

    //notify admin when new user register
    //$message  = sprintf(__('New user registration on your site %s:', 'packbook'), $blogname) . "\r\n\r\n";
    //$message .= sprintf(__('Username: %s', 'packbook'), $sanitized_user_login) . "\r\n\r\n";
    //$message .= sprintf(__('E-mail: %s', 'packbook'), $user_email) . "\r\n";

    //@wp_mail(get_option('admin_email'), sprintf(__('[%s] New User Registration'), $blogname), $message);

    return $user_id;
}

get_header();
?>

<section class="signup">
    <div class="container d-flex flex-column">
        <div class="row align-items-center justify-content-center min-vh-100">
            <div class="col-md-8 col-lg-5 py-6">
                <div>

                    <?php if (isset($_GET['action']) && $_GET['action'] == 'resend') { ?>
                        <h1 class="h3 text-center"><?php _e('Activation Email', 'packbook') ?></h1>

                        <?php if ($resend_status && $resend_status == 'success') { ?>
                            <div class="error-msg">
                                <div class="alert alert-success"><strong><?php _e('Please check your email for activation.', 'packbook'); ?></strong></div>
                            </div>
                        <?php } else if ($resend_status && $resend_status != 'success') { ?>
                            <div class="error-msg">
                                <div class="alert alert-warning"><strong><?php echo $resend_status; ?></strong></div>
                            </div>
                        <?php } ?>

                        <br />

                        <form id="resendform" action="<?php echo home_url('/signup/?action=resend'); ?>" method="post">
                            <div class="form-group">
                                <label class="form-label" for="user_email"><?php _e('Email', 'packbook'); ?></label>
                                <input class="form-control" type="text" name="user_email" id="user_email" value="" />
                            </div>

                            <?php
                            if (get_option('captcha_public') != '' && get_option('captcha_private') != '') {
                                $publickey = get_option('captcha_public');
                            ?>
                                <script src="https://www.google.com/recaptcha/api.js" async defer></script>
                                <div class="g-recaptcha" data-sitekey="<?php echo $publickey; ?>"></div>
                            <?php }    ?>

                            <br />
                            <input type="hidden" name="action" value="resend" />
                            <input type="hidden" name="nonce" id="nonce" value="<?php echo wp_create_nonce('register'); ?>" />
                            <input type="submit" class="btn btn-success btn-block btn-packbook-custom" name="wp-submit" id="wp-submit" value="<?php _e('Resend', 'packbook'); ?>" />

                            <br />
                            <p class="moreoptions"><?php _e('Check your junk/spam folder if you did not receive the activation email', 'packbook'); ?></p>
                        </form>
                    <?php } else { ?>
                        <div class="mb-5 text-center">
                            <h6 class="h3 mb-1">Create your account</h6>
                        </div><span class="clearfix"></span>

                        <div class="row">
                            <div class="col-sm-6">
                                <a href="<?php echo home_url('?auth=google'); ?>" class="btn btn-block btn-google-plus btn-icon-label">
                                    <span class="btn-inner--icon">
                                        <i class="fab fa-google"></i>
                                    </span>
                                    <span class="btn-inner--text">Google</span>
                                </a>
                            </div>
                            <div class="col-sm-6">
                                <a href="<?php echo home_url('?auth=facebook'); ?>" class="btn btn-block btn-facebook btn-icon-label">
                                    <span class="btn-inner--icon">
                                        <i class="fab fa-facebook"></i>
                                    </span>
                                    <span class="btn-inner--text">Facebook</span>
                                </a>
                            </div>
                        </div>

                        <hr class="divider divider-icon-fade divider-icon" />

                        <?php if (isset($errors) && is_wp_error($errors)) { ?>
                            <div class="error-msg">
                                <div class="alert alert-danger"><strong><?php echo $errors->get_error_message(); ?></strong></div>
                            </div>
                        <?php } ?>

                        <form name="registerform" id="registerform" action="<?php echo home_url('/signup/'); ?>" method="post" autocomplete="false">
                            <div class="form-group">
                                <label class="form-control-label d-block">Type of Account</label>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="user_type" name="user_type" class="custom-control-input" value="private" <?php if ($user_type == 'private') echo ' checked'; ?>>
                                    <label class="custom-control-label" for="user_type">Private</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline2" name="user_type" class="custom-control-input" value="bussiness" <?php if ($user_type == 'bussiness') echo ' checked'; ?>>
                                    <label class="custom-control-label" for="customRadioInline2">Bussiness</label>
                                </div>
                            </div>
                            <div class="form-group<?php if ($user_type == 'private') echo ' d-none'; ?>" id="signup-nnp">
                                <label class="form-control-label">NIP</label>
                                <div class="input-group input-group-merge input-group-sm">
                                    <input type="text" name="user_nip" class="form-control form-control-append" id="input-name" placeholder="" value="<?php echo $user_nip; ?>">
                                    <div class="input-group-append" data-toggle="tooltip" data-placement="top" title="If you want to create an account with an EU VAT number, please enter it during registration.">
                                        <span class="input-group-text"><i class='bx bx-help-circle'></i></span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-control-label" for="display-name">Full name or surename</label>
                                <input type="text" name="display_name" class="form-control form-control-sm" id="display-name" placeholder="" value="<?php echo $display_name; ?>" required>
                            </div>
                           
                            <div class="form-group">
                                <label class="form-control-label" for="user-email">Email address</label>
                                <input type="email" name="user_email" class="form-control form-control-sm" id="user-email" placeholder="" value="<?php echo $user_email; ?>" required>
                            </div>
                            <div class="form-group mb-4">
                                <label class="form-control-label" for="user-pass">Password</label>
                                <input type="password" name="user_pass" class="form-control form-control-sm" id="user-pass" placeholder="" required>
                            </div>
                            <div class="my-4">
                                <div class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" name="check_terms" class="custom-control-input" id="check-terms" value="1" <?php if ($check_terms == '1') echo ' checked'; ?> required="true">
                                    <label class="custom-control-label" for="check-terms">I agree to the <a target="_blank" href="<?php echo home_url('/terms/'); ?>">terms and conditions</a></label>
                                </div>
                            </div>
                            <div class="my-4">
                                <div class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" name="check_newsletter" class="custom-control-input" id="check-newsletter" value="1" checked>
                                    <label class="custom-control-label" for="check-newsletter">Subscribe newsletter</label>
                                </div>
                            </div>
                            <div class="my-4">
                                <div class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" name="check_updates" class="custom-control-input" id="check-updates" value="1" checked>
                                    <label class="custom-control-label" for="check-updates">Get new Updates</label>
                                </div>
                            </div>
                            <div class="mt-4 text-center">
                                <button type="submit" class="btn btn-primary btn-block">
                                    Create an account
                                </button>
                            </div>

                            <input type="hidden" name="nonce" id="nonce" value="<?php echo wp_create_nonce('register'); ?>" />

                            <input type="hidden" name="user_login" id="user_login" value="<?php echo $user_login; ?>" />

                        </form>


                        <div class="mt-4 text-center">Already have an acocunt? <a href="<?php echo home_url('/login/'); ?>" class=" font-weight-bold">Login</a></div>

                        <div class="mt-4 pt-3 text-center delimiter-top"><a href="<?php echo home_url('/signup/?action=resend'); ?>" class=" font-weight-bold">Resend activation email</a></div>

                    <?php } ?>

                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>