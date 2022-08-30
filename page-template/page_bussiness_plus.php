<?php
/*
Template Name: _business-plus
*/

use Respect\Validation\Validator;

global $user_ID;
if (!is_user_logged_in()) {
    wp_redirect(home_url('/login/?redirect_to=' . home_url('/bussiness-plus/')));
    exit;
}

if ('POST' == $_SERVER['REQUEST_METHOD'] && !wp_verify_nonce($_POST['nonce'], 'bussiness')) {
    die();
}

$http_post = ('POST' == $_SERVER['REQUEST_METHOD']);

$name = '';
$company = '';
$phone = '';
$nip = '';
$email = '';
$message = '';

if ($http_post) {
    
    $errors = new WP_Error();
    
    $name = sanitize_text_field( $_POST['fullname'] );
	
	$company = sanitize_text_field( $_POST['company'] );
	
	$phone = sanitize_text_field( $_POST['phone'] );
	
	$nip = sanitize_text_field( $_POST['nip'] );
    
    $email = sanitize_email( $_POST['email'] );
    
    $message = sanitize_textarea_field( $_POST['message'] );
    
    if( $name == ''){
        
        $errors->add('empty_fullname', __('<strong>ERROR</strong>: Please enter a fullname.', 'packbook'));
		
	} elseif( $company == '' ){
        
        $errors->add('empty_company', __('<strong>ERROR</strong>: Please enter a valid company name.', 'packbook'));
		
    } elseif( pb_check_nip($nip) === false ){
        
        $errors->add('empty_nip', __('<strong>ERROR</strong>: Please enter a valid NIP.', 'packbook'));
		
    
		
    } elseif( Validator::Phone()->validate($phone) === false ){
        
        $errors->add('empty_phone', __('<strong>ERROR</strong>: Please enter a valid phone numer.', 'packbook'));
        
    } elseif( Validator::Email()->validate($email) === false){
        
        $errors->add('empty_email', __('<strong>ERROR</strong>: Please enter a email address.', 'packbook'));
    
    } elseif( $message == ''){
        
        $errors->add('empty_message', __('<strong>ERROR</strong>: Please enter a message.', 'packbook'));
        
        
    } else {
    
        $blogname = wp_specialchars_decode(get_option('blogname'), ENT_QUOTES);
		
		$edit = home_url('wp-admin/user-edit.php?user_id='.$user_ID);
        
        $text = "Apply for bussiness plus account" . "\r\n\r\n";
        $text .= sprintf(__('Name: %s', 'lekhook'), $name) . "\r\n\r\n";
		$text .= sprintf(__('Company: %s', 'lekhook'), $company) . "\r\n\r\n";
		$text .= sprintf(__('NIP: %s', 'lekhook'), $nip) . "\r\n\r\n";
		$text .= sprintf(__('Phone: %s', 'lekhook'), $phone) . "\r\n\r\n";
        $text .= sprintf(__('E-mail: %s', 'lekhook'), $email) . "\r\n\r\n";
		$text .= sprintf(__('Message: %s', 'lekhook'), $message) . "\r\n\r\n";
		
		$text .= sprintf(__('Edit user: %s', 'lekhook'), $edit) . "\r\n\r\n";
		

        @wp_mail(get_option('admin_email'), sprintf(__('%s apply for bussiness plus'), $name), $text);
        
        $name = $email = $message = $company = $nip = $phone = '';
        
        $success = true;
    
    }
    
}
get_header();
?>

<section class="slice slice-lg" id="sct-form-contact">
    <div class="container position-relative zindex-100">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-6 text-center">
                <h3>Chcesz otrzymać ofertę indywidualną?</h3>
                <p class="lh-190">Nadajesz przesyłki i zależy Ci na specjalnych warunkach współpracy? Podaj nam swoje dane kontaktowe, a na pewno się odezwiemy.</p>
            </div>
        </div>
        <div class="row  justify-content-center">
         
            <div class="col-md-10">
            
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
                
				<div class="form-row">
				
				<div class="col-md-6">
                    <div class="form-group">
                        <input class="form-control form-control-sm" type="text" name="fullname" placeholder="<?php _e('Imię', 'packbook');?>" value="<?php echo $name;?>" required>
                    </div>
                    
                    <div class="form-group">
                        <input class="form-control form-control-sm" type="text" name="company" placeholder="<?php _e('Nazwa firmy', 'packbook');?>" value="<?php echo $company;?>" required>
                    </div>
					
					 <div class="form-group">
                        <input class="form-control form-control-sm" type="text" name="nip" placeholder="<?php _e('NIP ( numer identyfikacji podatkowej)', 'packbook');?>" value="<?php echo $nip;?>" required>
                    </div>
					
					<div class="form-group">
                        <input class="form-control form-control-sm" type="text" name="phone" placeholder="<?php _e('Numer telefonu', 'packbook');?>" value="<?php echo $phone;?>" required>
                    </div>
					
					<div class="form-group">
                        <input class="form-control form-control-sm" type="email" name="email" placeholder="<?php _e('Adres email ', 'packbook');?>" value="<?php echo $email;?>" required>
                    </div>
					
                </div>
				
				<div class="col-md-6">
                    <div class="form-group"><textarea name="message" class="form-control form-control-sm" data-toggle="autosize"
                            placeholder="Wiadomość (Warto podać przewidywany wolumen przesyłek, )" rows="3"
                            style="overflow: hidden; overflow-wrap: break-word; resize: none; height: 260px;" required><?php echo $message;?></textarea>
                    </div>
                   </div>
				   
				   </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-sm btn-primary mt-4"><?php _e('Wyślij zapytanie', 'packbook');?></button>
                    </div>
                    
                    <input type="hidden" name="nonce" id="nonce" value="<?php echo wp_create_nonce('bussiness'); ?>" />
                    
                </form>
            </div>
        </div>
    </div>
</section>

<?php

get_footer();

?>