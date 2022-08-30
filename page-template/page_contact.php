<?php
/*
Template Name: _contact
*/

if ('POST' == $_SERVER['REQUEST_METHOD'] && !wp_verify_nonce($_POST['nonce'], 'contact')) {
    die();
}

$http_post = ('POST' == $_SERVER['REQUEST_METHOD']);

$name = '';
$email = '';
$message = '';

if ($http_post) {
    
    $errors = new WP_Error();
    
    $name = sanitize_text_field( $_POST['fullname'] );
    
    $email = sanitize_email( $_POST['email'] );
    
    $message = sanitize_textarea_field( $_POST['message'] );
    
    if( $name == ''){
        
        $errors->add('empty_fullname', __('<strong>ERROR</strong>: Please enter a fullname.', 'packbook'));
        
    } elseif( $email == ''){
        
        $errors->add('empty_email', __('<strong>ERROR</strong>: Please enter a email address.', 'packbook'));
    
    } elseif( $message == ''){
        
        $errors->add('empty_message', __('<strong>ERROR</strong>: Please enter a message.', 'packbook'));
        
        
    } else {
    
        $blogname = wp_specialchars_decode(get_option('blogname'), ENT_QUOTES);
        
        $message  = sprintf(__('Message: %s', 'lekhook'), $message) . "\r\n\r\n";
        $message .= sprintf(__('Username: %s', 'lekhook'), $name) . "\r\n\r\n";
        $message .= sprintf(__('E-mail: %s', 'lekhook'), $email) . "\r\n";

        @wp_mail(get_option('admin_email'), sprintf(__('%s want\'s to contact'), $name), $message);
        
        $name = $email = $message = '';
        
        $success = true;
    
    }
    
}
get_header();
?>

<section class="slice slice-lg" id="sct-form-contact">
    <div class="container position-relative zindex-100">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-6 text-center">
                <h3>Skontaktuj się z nami</h3>
                <p class="lh-190">Jeśli jest coś, w czym możemy Ci pomóc, daj nam znać. Z przyjemnością zaoferujemy Ci naszą pomoc</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-5">
                <div class="contact-left-head">
                    <h2>Kontakt</h2>
                    <div class="contact-address">
                        <i class="fas fa-map-marker-alt"></i>
                        <p>Polska, Wolsztyn, ul.Rożka 18, 64-200 Wolsztyn</p>
                    </div>
                    <div class="phone-number">
                        <i class="fas fa-phone"></i>
                        <p>+48 511 710 833</p>
                    </div>
                    <div class="email-info">
                        <i class="fas fa-envelope"></i>
                        <p>kontakt@packbook.pl</p>
                    </div>
                    <div class="office-time">
                        <i class="far fa-clock"></i>
                        <p>Mon - Sat: 9:00 - 18:00</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-7">
            
            <?php if(!empty($success)){ ?>
                
                <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Wiadomość wysłano poprawnie</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>

                <?php } elseif (isset($errors) && is_wp_error($errors)) { ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php echo $errors->get_error_message(); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                
                <?php } ?>
                
                <form id="form-contact" method="POST" action="">
                
                    <div class="form-group">
                        <input class="form-control form-control-lg" type="text" name="fullname" placeholder="Twoje imię" value="<?php echo $name;?>">
                    </div>
                    
                    <div class="form-group">
                        <input class="form-control form-control-lg" type="email" name="email" placeholder="email@example.com" value="<?php echo $email;?>">
                    </div>
                    
                    <div class="form-group"><textarea name="message" class="form-control form-control-lg" data-toggle="autosize"
                            placeholder="Powiedz nam kilka słów ..." rows="3"
                            style="overflow: hidden; overflow-wrap: break-word; resize: none; height: 106px;"><?php echo $message;?></textarea>
                    </div>
                    
                    <div class="text-center">
                        <button type="submit" class="btn btn-block btn-lg btn-primary mt-4">Wyślij wiadomość</button>
                    </div>
                    
                    <input type="hidden" name="nonce" id="nonce" value="<?php echo wp_create_nonce('contact'); ?>" />
                    
                </form>
            </div>
        </div>
    </div>
</section>

<?php

get_footer();

?>