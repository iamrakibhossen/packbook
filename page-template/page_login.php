<?php
/*
Template Name: _login
*/

define("DONOTCACHEPAGE", true);

if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    if (wp_verify_nonce($_GET['nonce'], 'logout')) {
        wp_logout();
        wp_safe_redirect(home_url('/login/?action=loggedout'));
        exit();
    }
}

if (is_user_logged_in()) {
    wp_redirect(home_url());
    exit;
}

if (get_option('captcha_public') != '' && get_option('captcha_private') != '')
    require_once(get_template_directory() . '/recaptchalib.php');

get_header();
?>

<section>
    <div class="container d-flex flex-column">
        <div class="row align-items-center justify-content-center min-vh-100">
            <div class="col-md-8 col-lg-5 py-6">
                <div>
                    <div class="mb-5 text-center">
                        <h6 class="h3 mb-1">Login </h6>
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
                    <?php if (isset($_GET['action']) && $_GET['action'] == 'loggedout' && empty($_GET['login'])) { ?>
                        <div class="error-msg-incorrect">
                            <div class="alert alert-success">
                                <strong><?php _e('Logged Out Successfully', 'packbook'); ?></strong>
                            </div>
                        </div>
                    <?php } ?>

                    <?php if (isset($_GET['pw']) && $_GET['pw'] == 'reset') {   ?>
                        <div class="error-msg-incorrect">
                            <div class="alert alert-success">
                                <strong><?php _e('Your password has been reset.', 'packbook'); ?></strong>
                            </div>
                        </div>
                    <?php } else if (isset($_GET['registration']) && $_GET['registration'] == 'disabled') {   ?>
                        <div class="error-msg-incorrect">
                            <div class="alert alert-warning">
                                <strong><?php _e('User registration is currently closed.', 'packbook'); ?></strong>
                            </div>
                        </div>
                    <?php } else if (isset($_GET['registration']) && $_GET['registration'] == 'done') {   ?>
                        <div class="error-msg-incorrect">
                            <div class="alert alert-success">
                                <strong><?php _e('To activate account, please check your email for verification link.', 'packbook'); ?></strong>
                            </div>
                        </div>
                    <?php } else if (isset($_GET['email']) && $_GET['email'] == 'unverified') {   ?>
                        <div class="error-msg-incorrect">
                            <div class="alert alert-warning">
                                <strong><?php _e('Account not activated yet. Please check your email for verification link.', 'packbook'); ?></strong>
                            </div>
                        </div>
                        <?php } else if (isset($_GET['email']) && $_GET['email'] == 'verify') {
                        $user = get_user_by('login', $_GET['login']);
                        $key = get_user_meta($user->ID, '_Verify Email', true);
                        if ($key == $_GET['key']) {
                            delete_user_meta($user->ID, '_Verify Email', $key);
                        ?>
                            <div class="error-msg-incorrect">
                                <div class="alert alert-success">
                                    <strong><?php _e('Verification success. You may login now.', 'packbook'); ?></strong>
                                </div>
                            </div>
                        <?php } else { ?>
                            <div class="error-msg-incorrect">
                                <div class="alert alert-warning">
                                    <strong><?php _e('Invalid verification key', 'packbook'); ?></strong>
                                </div>
                            </div>
                        <?php }
                    } else if (isset($_GET['login']) && $_GET['login'] == 'failed') { ?>
                        <div class="error-msg-incorrect">
                            <div class="alert alert-warning">
                                <strong><?php _e('Incorrect Username', 'packbook'); ?>/<?php _e('Password', 'packbook');
                                                                                        if (get_option('captcha_public') != '' && get_option('captcha_private') != '') {
                                                                                            echo '/';
                                                                                            _e('Captcha', 'packbook');
                                                                                        } ?></strong>
                            </div>
                        </div>
                    <?php } ?>

                    <form name="loginform" id="loginform" action="<?php echo site_url('wp-login.php', 'login_post'); ?>" method="post">

                        <div class="form-group">
                            <label class="form-control-label">Email address</label>
                            <input type="text" name="log" class="form-control form-control-prepend" id="input-email" placeholder="" required>
                        </div>
                        <div class="form-group mb-4">
                            <div class="d-flex align-items-center justify-content-between">
                                <div><label class="form-control-label">Password</label></div>
                                <div class="mb-2"><a href="<?php echo home_url('/recover/'); ?>" class="small text-muted border-primary">Forgot
                                        password</a></div>
                            </div>
                            <input type="password" name="pwd" class="form-control form-control-prepend" id="input-password" placeholder="" required>
                        </div>

                        <input type="hidden" name="rememberme" id="rememberme" value="forever" />
                        <input type="hidden" name="redirect_to" id="redirect_to" value="<?php if (!empty($_GET['redirect_to'])) {
                                                                                            echo esc_attr($_GET['redirect_to']);
                                                                                        } else {
                                                                                            echo esc_attr(home_url('/'));
                                                                                        } ?>" />
                        <input type="hidden" name="nonce" id="nonce" value="<?php echo wp_create_nonce('login'); ?>" />

                        <div class="mt-4 text-center">
                            <button type="submit" class="btn btn-primary btn-block">
                                <span class="btn-inner--text">Login</span>

                            </button>
                        </div>
                    </form>

                    <div class="mt-4 text-center">Don't have an account? <a href="<?php echo home_url('/signup/'); ?>" class=" font-weight-bold">Create for
                            free</a></div>

                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>