<?php
/*
Template Name: _settings
*/
if (!is_user_logged_in()) {
	wp_redirect(home_url('/login/?redirect_to=' . home_url('/dashboard/settings/')));
	exit;
}

//Save Settings
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['form_name'] == 'save_settings_form') {
	if ($_GET['user'] && (current_user_can('administrator') || current_user_can('editor'))) {
		$user_info = get_userdata($_GET['user']);
		$errors = packbook_edit_user($_GET['user']);
	} else {
		$user_info = get_userdata($user_ID);
		$errors = packbook_edit_user($user_ID);
	}

	if ($_POST['user_company'] != $user_info->user_company)
		update_user_meta($user_info->ID, 'user_company', sanitize_text_field($_POST['user_company']));
	if ($_POST['user_phone'] != $user_info->user_phone)
		update_user_meta($user_info->ID, 'user_phone', sanitize_text_field($_POST['user_phone']));
	if ($_POST['user_type'] != $user_info->user_type)
		update_user_meta($user_info->ID, 'user_type', sanitize_text_field($_POST['user_type']));
	if ($_POST['user_nnp'] != $user_info->user_nnp)
		update_user_meta($user_info->ID, 'user_nip', sanitize_text_field($_POST['user_nip']));
	if ($_POST['user_country'] != $user_info->user_country)
		update_user_meta($user_info->ID, 'user_country', sanitize_text_field($_POST['user_country']));
	if ($_POST['user_postcode'] != $user_info->user_postcode)
		update_user_meta($user_info->ID, 'user_postcode', sanitize_text_field($_POST['user_postcode']));
	if ($_POST['user_city'] != $user_info->user_city)
		update_user_meta($user_info->ID, 'user_city', sanitize_text_field($_POST['user_city']));
	if ($_POST['user_address'] != $user_info->user_address)
		update_user_meta($user_info->ID, 'user_address', sanitize_text_field($_POST['user_address']));


	$savesuccess = '1';
}

//function from wp-admin/includes/user.php
function packbook_edit_user($user_id = 0)
{
	global $wp_roles;
	$user = new stdClass;
	if ($user_id) {
		$update = true;
		$user->ID = (int) $user_id;
		$userdata = get_userdata($user_id);
		$user->user_login = wp_slash($userdata->user_login);
	} else {
		$update = false;
	}

	if (!$update && isset($_POST['user_login']))
		$user->user_login = sanitize_user($_POST['user_login'], true);

	$pass1 = $pass2 = '';
	if (isset($_POST['pass1']))
		$pass1 = $_POST['pass1'];
	if (isset($_POST['pass2']))
		$pass2 = $_POST['pass2'];

	if (isset($_POST['role']) && current_user_can('edit_users')) {
		$new_role = sanitize_text_field($_POST['role']);
		$potential_role = isset($wp_roles->role_objects[$new_role]) ? $wp_roles->role_objects[$new_role] : false;
		// Don't let anyone with 'edit_users' (admins) edit their own role to something without it.
		// Multisite super admins can freely edit their blog roles -- they possess all caps.
		if ((is_multisite() && current_user_can('manage_sites')) || $user_id != get_current_user_id() || ($potential_role && $potential_role->has_cap('edit_users')))
			$user->role = $new_role;

		// If the new role isn't editable by the logged-in user die with error
		$editable_roles = get_editable_roles();
		if (!empty($new_role) && empty($editable_roles[$new_role]))
			wp_die(__('You can&#8217;t give users that role.', 'packbook'));
	}

	//edited: store the original email
	$original_user_email = $userdata->user_email;

	if (isset($_POST['user_email']))
		$user->user_email = sanitize_text_field(wp_unslash($_POST['user_email']));
	if (isset($_POST['url'])) {
		if (empty($_POST['url']) || $_POST['url'] == 'http://') {
			$user->user_url = '';
		} else {
			$user->user_url = esc_url_raw($_POST['url']);
			$protocols = implode('|', array_map('preg_quote', wp_allowed_protocols()));
			$user->user_url = preg_match('/^(' . $protocols . '):/is', $user->user_url) ? $user->user_url : 'http://' . $user->user_url;
		}
	}
	if (isset($_POST['first_name']))
		$user->first_name = sanitize_text_field($_POST['first_name']);
	if (isset($_POST['last_name']))
		$user->last_name = sanitize_text_field($_POST['last_name']);
	if (isset($_POST['nickname']))
		$user->nickname = sanitize_text_field($_POST['nickname']);
	if (isset($_POST['display_name']))
		$user->display_name = sanitize_text_field($_POST['display_name']);

	if (isset($_POST['description']))
		$user->description = trim($_POST['description']);

	foreach (wp_get_user_contact_methods($user) as $method => $name) {
		if (isset($_POST[$method]))
			$user->$method = sanitize_text_field($_POST[$method]);
	}

	if ($update) {
		$user->rich_editing = isset($_POST['rich_editing']) && 'false' == $_POST['rich_editing'] ? 'false' : 'true';
		$user->admin_color = isset($_POST['admin_color']) ? sanitize_text_field($_POST['admin_color']) : 'fresh';
		$user->show_admin_bar_front = isset($_POST['admin_bar_front']) ? 'true' : 'false';
	}

	$user->comment_shortcuts = isset($_POST['comment_shortcuts']) && 'true' == $_POST['comment_shortcuts'] ? 'true' : '';

	$user->use_ssl = 0;
	if (!empty($_POST['use_ssl']))
		$user->use_ssl = 1;

	$errors = new WP_Error();

	/* checking that username has been typed */
	if ($user->user_login == '')
		$errors->add('user_login', __('<strong>ERROR</strong>: Please enter a username.', 'packbook'));

	/* checking the password has been typed twice */
	/**
	 * Fires before the password and confirm password fields are checked for congruity.
	 *
	 * @since 1.5.1
	 *
	 * @param string $user_login The username.
	 * @param string &$pass1     The password, passed by reference.
	 * @param string &$pass2     The confirmed password, passed by reference.
	 */
	do_action_ref_array('check_passwords', array($user->user_login, &$pass1, &$pass2));

	if ($update) {
		if (empty($pass1) && !empty($pass2))
			$errors->add('pass', __('<strong>ERROR</strong>: You entered your new password only once.', 'packbook'), array('form-field' => 'pass1'));
		elseif (!empty($pass1) && empty($pass2))
			$errors->add('pass', __('<strong>ERROR</strong>: You entered your new password only once.', 'packbook'), array('form-field' => 'pass2'));

		//edited: added to check password length
		if (!empty($pass1) && !empty($pass2))
			if (strlen($pass1) < 6) {
				$errors->add('password_too_short', "<strong>ERROR</strong>: Passwords must be at least 6 characters long", 'packbook');
			}
	} else {
		if (empty($pass1))
			$errors->add('pass', __('<strong>ERROR</strong>: Please enter your password.', 'packbook'), array('form-field' => 'pass1'));
		elseif (empty($pass2))
			$errors->add('pass', __('<strong>ERROR</strong>: Please enter your password twice.', 'packbook'), array('form-field' => 'pass2'));
	}

	/* Check for "\" in password */
	if (false !== strpos(wp_unslash($pass1), "\\"))
		$errors->add('pass', __('<strong>ERROR</strong>: Passwords may not contain the character "\\".', 'packbook'), array('form-field' => 'pass1'));

	/* checking the password has been typed twice the same */
	if ($pass1 != $pass2)
		$errors->add('pass', __('<strong>ERROR</strong>: Please enter the same password in the two password fields.', 'packbook'), array('form-field' => 'pass1'));

	if (!empty($pass1))
		$user->user_pass = $pass1;

	if (!$update && isset($_POST['user_login']) && !validate_username($_POST['user_login']))
		$errors->add('user_login', __('<strong>ERROR</strong>: This username is invalid because it uses illegal characters. Please enter a valid username.', 'packbook'));

	if (!$update && username_exists($user->user_login))
		$errors->add('user_login', __('<strong>ERROR</strong>: This username is already registered. Please choose another one.', 'packbook'));

	/* checking e-mail address */
	$verify_new_email = $user_id; //edited: verify new email
	if (empty($user->user_email)) {
		$errors->add('empty_email', __('<strong>ERROR</strong>: Please enter an email address.', 'packbook'), array('form-field' => 'user_email'));
	} elseif (!is_email($user->user_email)) {
		$errors->add('invalid_email', __('<strong>ERROR</strong>: The email address isn&#8217;t correct.', 'packbook'), array('form-field' => 'user_email'));
	} elseif (($owner_id = email_exists($user->user_email)) && (!$update || ($owner_id != $user->ID))) {
		$errors->add('email_exists', __('<strong>ERROR</strong>: This email is already registered, please choose another one.', 'packbook'), array('form-field' => 'user_email'));
		//edited: requires email verification if email is changed
	} elseif ($userdata->user_email != $_POST['user_email'] && !current_user_can('administrator') && !current_user_can('editor')) {
		//store new email temporarily
		update_user_meta($user_id, '_new_email', $user->user_email);

		$new_email_key = wp_generate_password(20, false);
		update_user_meta($user_id, '_new_email_key', $new_email_key);

		$blogname = wp_specialchars_decode(get_option('blogname'), ENT_QUOTES);

		$message .= __('Please click the link to verify your email:', 'packbook') . "\r\n";
		$message .= home_url('/settings/');
		$message .= sprintf('?email=verify&login=%s&key=%s', rawurlencode($user->user_login), $new_email_key);

		wp_mail($user->user_email, sprintf(__('[%s] Email Verification', 'packbook'), $blogname), $message);

		$user->user_email = $original_user_email;
		$verify_new_email = 'verify_new_email';
	}

	/**
	 * Fires before user profile update errors are returned.
	 *
	 * @since 2.8.0
	 *
	 * @param array   &$errors An array of user profile update errors, passed by reference.
	 * @param bool    $update  Whether this is a user update.
	 * @param WP_User &$user   WP_User object, passed by reference.
	 */
	do_action_ref_array('user_profile_update_errors', array(&$errors, $update, &$user));

	if ($errors->get_error_codes())
		return $errors;

	if ($update) {
		$user_id = wp_update_user($user);
	} else {
		$user_id = wp_insert_user($user);
		wp_new_user_notification($user_id, isset($_POST['send_password']) ? wp_unslash($pass1) : '');
	}
	return $verify_new_email; //edited: verify new email
}

//check email verification
if (isset($_GET['user_email']) && $_GET['user_email'] == 'verify') {
	if ($_GET['user'] && (current_user_can('administrator') || current_user_can('editor')))
		$user_info = get_userdata($_GET['user']);
	else
		$user_info = get_userdata($user_ID);

	if ($_GET['login'] == $user_info->user_login && $_GET['key'] == $user_info->_new_email_key) {
		wp_update_user(array('ID' => $user_info->ID, 'user_email' => get_user_meta($user_info->ID, '_new_email', true)));
		delete_user_meta($user_info->ID, '_new_email');
		delete_user_meta($user_info->ID, '_new_email_key');
		$email_verified = 'yes';
	} else {
		$email_verified = 'no';
	}
}

//retreive latest userinfo even after updating above
if (isset($_GET['user']) && (current_user_can('administrator') || current_user_can('editor')))
	$user_info = get_userdata($_GET['user']);
else
	$user_info = get_userdata($user_ID);

if (!$user_info) wp_die(__('No Such User.', 'packbook'));

if (user_can($user_info->ID, 'administrator') && !current_user_can('administrator')) wp_die(__('Administrator Profile: No Access', 'packbook'));



get_header();
?>

<section class="packbook-booking mt-4">
	<div class="container">
		<div class="row align-items-center justify-content-center">
			<div class="col-md-10 col-lg-11">
				<h1 class="py-3 font-weight-bold h5">
					<span class="icon icon-shape icon-md bg-success shadow-success text-white mr-3">
						<i class="fas fa-cog"></i>

					</span>

					Settings
				</h1>


				<?php if (isset($errors) && is_wp_error($errors)) { ?>
					<div class="error-msg">
						<div class="alert alert-warning"><strong><?php echo $errors->get_error_message(); ?></strong></div>
					</div>
				<?php } else if (isset($savesuccess) && $savesuccess == '1') { ?>
					<div class="error-msg">
						<div class="alert alert-success"><strong><?php _e('Settings Saved.', 'packbook'); ?></strong></div>
					</div>
				<?php } ?>

				<?php if (isset($errors) && $errors == 'verify_new_email') { ?>
					<div class="error-msg">
						<div class="alert alert-warning">
							<strong><?php _e('Your email will be changed upon verification. Please check your new email for verification link.', 'packbook'); ?></strong>
						</div>
					</div>
				<?php } ?>

				<?php if (isset($email_verified) && $email_verified == 'yes') { ?>
					<div class="error-msg">
						<div class="alert alert-success">
							<strong><?php _e('Your email has been verified and updated.', 'packbook'); ?></strong>
						</div>
					</div>
				<?php } else if (isset($email_verified) && $email_verified == 'no') { ?>
					<div class="error-msg">
						<div class="alert alert-warning">
							<strong><?php _e('Invalid verification key', 'packbook'); ?></strong>
						</div>
					</div>
				<?php } ?>

				<div class="w-75">



					<form name="avatarform" id="avatarform" method="post" enctype="multipart/form-data">

						<label class="form-label strong" for="packbook_user_avatar">
							<b><?php _e('Avatar (Recommended 300 x 300px)', 'packbook'); ?></b>
						</label>

						<div class="row pt-3">

							<div class="col-md-3 border-right">
								<div class="upload-wrapper text-center" style="width: 100px; height: 100px">

									<input id="packbook_user_avatar" style="width: 100px; height: 100px" class=" upload custom-input-file custom-input-file--2 bg-white" type="file" name="packbook_user_avatar" accept="image/*" tabindex="110" />

									<label for="packbook_user_avatar">
										<span style="font-size: 40px">
											<i class="fas fa-cloud-upload-alt text-white mr-2"></i>
										</span>
									</label>

								</div>
							</div>
							<div class="col-md-4">


								<?php if ($user_info->packbook_user_avatar != '' && $user_info->packbook_user_avatar != 'deleted') {
									$imgsrc = wp_get_attachment_image_src($user_info->packbook_user_avatar, 'thumbnail');
								} ?>
								<div id="avatar-wrapper" <?php if ($user_info->packbook_user_avatar == '' || $user_info->packbook_user_avatar == 'deleted') echo ' class="hide"' ?>>
									<img src="<?php echo $imgsrc[0]; ?>" alt="" class="rounded img-polaroid" width="100" height="100" />
									<button id="avatar-delete" class="btn btn-danger btn-sm" data-id="<?php echo $user_info->ID; ?>" type="button"><i class="fa fa-times"></i></button>
								</div>

							</div>
						</div>
						<input type="hidden" name="avatar-userid" id="avatar-userid" value="<?php echo $user_info->ID; ?>" />
						<input type="hidden" name="action" id="action" value="packbook-upload-avatar" />
						<input type="hidden" name="ajax-nonce" id="ajax-nonce" value="<?php echo wp_create_nonce('upload_avatar'); ?>" />
						<div class="ajax-loader-avatar ajax-loader hide"><i class="fas fa-2x fa-spinner fa-spin"></i></div>
						<div class="error-msg-avatar"></div>
					</form>

					<hr>

					<form id="settingsform" name="settingsform" action="<?php echo home_url('/dashboard/settings/');
																		echo empty($_GET['user']) ? '' : '?user='  . $_GET['user']; ?>" method="post" enctype="multipart/form-data">

						<div class="form-group row justify-content-end fv-plugins-icon-container"><label for="display_name" class="col-sm-4 col-form-label">Pełne imię i nazwisko</label>
							<div class="col-sm-8"><input class="form-control form-control-sm" type="text" name="display_name" id="display_name" value="<?php echo esc_attr($user_info->display_name); ?>" tabindex="40" />
								<div class="fv-plugins-message-container"></div>
							</div>
						</div>
						<div class="form-group row justify-content-end"><label for="user_company" class="col-sm-4 col-form-label">Firma</label>
							<div class="col-sm-8"><input id="user_company" name="user_company" type="text" value="<?php echo sanitize_text_field($user_info->user_company); ?>" class="form-control form-control-sm"></div>
						</div>

						<div class="form-group row justify-content-end fv-plugins-icon-container"><label for="user_email" class="col-sm-4 col-form-label">E-mail </label>
							<div class="col-sm-8"><input id="user_email" name="user_email" type="email" value="<?php echo esc_attr($user_info->user_email); ?>" required="required" class="form-control form-control-sm">
								<div class="fv-plugins-message-container"></div>
							</div>
						</div>
						<div class="form-group row justify-content-end fv-plugins-icon-container"><label for="user_phone" class="col-sm-4 col-form-label">Telefon</label>
							<div class="col-sm-8"><input id="user_phone" name="user_phone" type="tel" value="<?php echo esc_attr($user_info->user_phone); ?>" class="form-control form-control-sm">
								<div class="fv-plugins-message-container"></div>
							</div>
						</div>

						<div class="form-group row">
							<label class="col-sm-4 col-form-label">typ konta</label>
							<div class="col-sm-8">
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" id="user_type" name="user_type" class="custom-control-input" value="private" <?php if ($user_info->user_type == 'private') echo ' checked'; ?>>
									<label class="custom-control-label" for="user_type">Prywatny</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
									<input type="radio" id="customRadioInline2" name="user_type" class="custom-control-input" value="bussiness" <?php if ($user_info->user_type == 'bussiness') echo ' checked'; ?>>
									<label class="custom-control-label" for="customRadioInline2">Biznes</label>
								</div>
							</div>
						</div>
						<div class="row form-group<?php if ($user_info->user_type == 'private') echo ' d-none'; ?>" id="signup-nnp">
							<label class="col-sm-4 form-control-label">NIP</label>
							<div class="col-sm-8 input-group input-group-sm input-group-merge">
								<input type="text" name="user_nip" class="form-control form-control-append" id="input-name" placeholder="" value="<?php echo $user_info->user_nip; ?>">
								<div class="input-group-append" data-toggle="tooltip" data-placement="top" title="If you want to create an account with an EU VAT number, please enter it during registration.">
									<span class="input-group-text"><i class='bx bx-help-circle'></i></span>
								</div>
							</div>
						</div>

				</div>
				<hr>

				<div class="w-75">
					<h5 class="mb-3">Adres</h5>


					<div class="form-group row justify-content-end fv-plugins-icon-container"><label for="user_country" class="col-sm-4 col-form-label">Kraj</label>
						<div class="col-sm-8">
							<?php country_lists('user_country', 'custom-select custom-select-sm', $user_info->user_country); ?>
							<div class="fv-plugins-message-container"></div>
						</div>
					</div>
					<div class="form-group row justify-content-start fv-plugins-icon-container"><label for="user_postcode" class="col-sm-4 col-form-label">Kod pocztowy</label>
						<div class="col-sm-4"><input id="user_postcode" name="user_postcode" type="text" value="<?php echo sanitize_text_field($user_info->user_postcode); ?>" required="required" class="form-control form-control-sm">
							<div class="fv-plugins-message-container"></div>
						</div>
					</div>
					<div class="form-group row justify-content-start fv-plugins-icon-container"><label for="user_city" class="col-sm-4 col-form-label">Miasto
						</label>
						<div class="col-sm-8"><input id="user_city" name="user_city" type="text" value="<?php echo sanitize_text_field($user_info->user_city); ?>" class="form-control form-control-sm">
							<div class="fv-plugins-message-container"></div>
						</div>
					</div>
					<div class="form-group row justify-content-end fv-plugins-icon-container"><label for="user_address" class="col-sm-4 col-form-label">Ulica i numer</label>
						<div class="col-sm-8"><input id="user_address" name="user_address" type="text" value="<?php echo sanitize_text_field($user_info->user_address); ?>" class="form-control form-control-sm">
							<div class="fv-plugins-message-container"></div>
						</div>
					</div>

				</div>

				<hr />

				<div class="w-75">
					<h5 class="mb-3">Hasło</h5>


					<div class="form-group row justify-content-end"><label for="pass1" class="col-sm-4 col-form-label">nowe hasło</label>
						<div class="col-sm-8"><input class="form-control form-control-sm" type="password" name="pass1" id="pass1" size="20" value="" autocomplete="off" tabindex="20" /></div>
					</div>

					<div class="form-group row justify-content-end"><label for="pass2" class="col-sm-4 col-form-label">Potwierdź hasło</label>
						<div class="col-sm-8"><input class="form-control form-control-sm" type="password" name="pass2" id="pass2" size="20" value="" autocomplete="off" tabindex="30" /></div>
					</div>

				</div>

				<hr />



				<input type="hidden" name="user_login" id="user_login" value="<?php echo esc_attr($user_info->user_login); ?>" />
				<input type="hidden" name="form_name" id="form_name" value="save_settings_form" />

				<div class="mt-5 text-right"><button type="submit" class="btn btn-primary btn-sm">
						Zapisz zmiany

					</button></div>



				</form>


			</div>
		</div>
</section>

<?php

wp_enqueue_script('packbook_jquery_form', get_template_directory_uri() . '/assets/js/jquery.form.min.js', array('jquery'), null, true);

get_footer(); ?>