<?php

session_start();

$carriers = [];

$carriers['parcel'] = [
	'dpd',
	'dpd_picup',
	'inpost_kurier',
	'inpost_paczkomaty',
	'ups',
	'ups_access_point',
	'poczta',
	'pocztex',
	'paczka_w_ruchu',
	'ambro_express'
];

$carriers['envelope'] = $carriers['parcel'];

$carriers['pallet'] = ['ambro_express', 'dpd', 'hellmann', 'rohlig_suus', 'schenker'];

$prices = array();

$prices['parcel'] = array(
	'DPD' => '15.80',
	'DPD Pickup' => '12.00',
	'InPost Kurier' => '12.70',
	'InPost Paczkomaty' => '11.80',
	'UPS' => '19.00',
	'UPS Access Point' => '10.00',
	'POCZTA' => '13.50',
	'PACZKA W RUCHU' => '7.80',
	'Pocztex' => '12.70',
	'Ambro Express' => '189.00'

);

$prices['envelope'] = $prices['parcel'];

$prices['pallet'] = array(
	'Ambro Express' => '189.00',
	'DPD' => '189.00',
	'Hellmann' => '189.00',
	'Rohlig Suus' => '189.00',
	'Schenker' => '189.00'
);

require_once(get_template_directory() . '/options-framework/options-framework.php');

require_once('vendor/autoload.php');

if (!is_admin()) {
	require_once(get_template_directory() . '/payments/init.php');
}

require_once(get_template_directory() . '/libs/init.php');

require_once(get_template_directory() . '/apps/app.php');

require_once(get_template_directory() . '/carriers/carrier.php');

require_once(get_template_directory() . '/class/init.php');

//Set content width
if (!isset($content_width)) {
	$content_width = 700;
}

function to_object($args)
{
	if (is_array($args)) {

		return (object)array_map(__FUNCTION__, $args);
	} else {

		// Return object

		return $args;
	}
}

function to_array($args)
{
	if (is_object($args)) {


		$args = get_object_vars($args);
	}

	if (is_array($args)) {

		return array_map(__FUNCTION__, $args);
	} else {

		// Return array

		return $args;
	}
}

//Action: after_setup_theme
function packbook_after_setup_theme()
{
	load_theme_textdomain('packbook', get_template_directory() . '/languages');

	register_nav_menus(array('top_nav' => 'Top Navigation'));

	add_theme_support('automatic-feed-links');
	add_theme_support('post-thumbnails');
	add_theme_support('custom-background', array('default-color' => 'f2f2f2'));
	add_editor_style();

	show_admin_bar(false);

	//Clean up wp head
	remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
	remove_action('wp_head', 'wp_generator');
	remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
}
add_action('after_setup_theme', 'packbook_after_setup_theme');

function remove_default_image_sizes($sizes)
{

	/* Default WordPress */
	unset($sizes['medium_large']);

	return $sizes;
}

add_filter('intermediate_image_sizes_advanced', 'remove_default_image_sizes');

add_filter('big_image_size_threshold', '__return_false');

//Disable xmlrpc for authors and below
if (!current_user_can('administrator') && !current_user_can('editor')) {
	add_filter('xmlrpc_enabled', '__return_false');
}


//Action: admin_init
function packbook_admin_init2()
{
	//Restrict /wp-admin/ to administrators & editors
	if ((!defined('DOING_AJAX') || !DOING_AJAX) && !current_user_can('administrator') && !current_user_can('editor')) {
		wp_redirect(home_url());
		exit;
	}
}
add_action('admin_init', 'packbook_admin_init2', 1);


//Filter: wp_authenticate_user
function packbook_wp_authenticate_user($userdata)
{
	//Check whether user verified their email
	$verify = get_user_meta($userdata->ID, '_Verify Email', true);
	//user with verified email do not have this usermeta field
	if ($verify != '') {
		return new WP_Error('email_unverified', __('Email not verified. Please check your email for verification link.', 'packbook'));
	}

	//check if captcha is correct
	if ($_POST['formname'] == 'packbook_loginform' && get_option('captcha_public') != '' && get_option('captcha_private') != '') {
		require_once(get_template_directory() . '/recaptchalib.php');

		$privatekey = get_option('captcha_private');
		$reCaptcha = new ReCaptcha($privatekey);

		if ($_POST["g-recaptcha-response"]) {
			$resp = $reCaptcha->verifyResponse(
				$_SERVER["REMOTE_ADDR"],
				$_POST["g-recaptcha-response"]
			);
		}

		if (!$resp->success) {
			return new WP_Error('incorrect_captcha', __('<strong>ERROR</strong>: Incorrect Captcha.', 'packbook'));
		}
	}
	return $userdata;
}
add_filter('wp_authenticate_user', 'packbook_wp_authenticate_user', 1);


add_action('admin_enqueue_scripts', 'add_validate_js');
function add_validate_js()
{
	wp_enqueue_script('my_validate', get_template_directory_uri() . '/assets/js/jquery.validate.min.js', array('jquery'));
}

//Javascripts
function packbook_enqueue_scripts()
{

	wp_enqueue_style('packbook-boxicons', get_template_directory_uri() . '/assets/css/boxicons.min.css');

	wp_enqueue_style('packbook-fontawesome', get_template_directory_uri() . '/assets/@fortawesome/fontawesome-free/css/all.min.css');

	wp_enqueue_style('packbook-bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css');

	wp_enqueue_style('packbook-style', get_stylesheet_directory_uri() . '/assets/css/style.css?v1.5', array('packbook-bootstrap'));

	global $current_user, $wp_rewrite;

	if (is_singular() && comments_open() && get_option('thread_comments') && is_user_logged_in()) {
		wp_enqueue_script('comment-reply');
	}

	if (is_page_template('page-add.php')) {
		wp_enqueue_script('suggest');
	}

	wp_enqueue_script('packbook_bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array('jquery'), null, true);
	wp_enqueue_script('packbook_mask', get_template_directory_uri() . '/assets/js/jquery.mask.min.js', array('jquery'), null, true);
	wp_enqueue_script('packbook_validate', get_template_directory_uri() . '/assets/js/jquery.validate.min.js', array('jquery'), null, true);
	wp_enqueue_script('packbook_custom', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'), null, true);

	//for infinite scroll
	if (function_exists('wp_pagenavi')) {
		$nextSelector = '#navigation a:nth-child(3)';
	} else {
		$nextSelector = '#navigation #navigation-next a';
	}





	$translation_array = array(

		'__imagetoosmall' => sprintf(__('Image is too small (min size: %d x %dpx)', 'packbook'), 10, 10),
		'__incorrectusernamepassword' => __('Incorrect Username/Password', 'packbook'),
		'__invalidimagefile' => __('Invalid image file. Please choose a JPG/GIF/PNG file.', 'packbook'),

		'ajaxurl' => admin_url('admin-ajax.php'),
		//'avatar30' => get_avatar($current_user->ID, '30'),
		//'avatar48' => get_avatar($current_user->ID, '48'),
		'blogname' => get_bloginfo('name'),
		'current_date' => date('j M Y g:ia', current_time('timestamp')),
		'home_url' => home_url(),
		//'infinitescroll' => get_option('infinitescroll'),
		//'lightbox' => get_option('lightbox'),
		'login_url' => wp_login_url($_SERVER['REQUEST_URI']),
		//'nextselector' => $nextSelector,
		'nonce' => wp_create_nonce('ajax-nonce'),
		'site_url' => site_url(),
		//'stylesheet_directory_uri' => get_template_directory_uri(),
		//'stylesheet_directory_uri_child' => get_stylesheet_directory_uri(),
		'u' => $current_user->ID,
		'ui' => $current_user->display_name,
		'ul' => $current_user->user_nicename,
		'user_rewrite' => $wp_rewrite->author_base,
		'currency_symbol' => 'zł',
		'currency' => 'PLN'
	);

	wp_localize_script('packbook_custom', 'obj_packbook', $translation_array);
}
add_action('wp_enqueue_scripts', 'packbook_enqueue_scripts');


//Remove style version
function packbook_style_loader_src($src)
{
	global $wp_version;

	$version_str = '?ver=' . $wp_version;
	$version_str_offset = strlen($src) - strlen($version_str);

	if (substr($src, $version_str_offset) == $version_str)
		return substr($src, 0, $version_str_offset);
	else
		return $src;
}
add_filter('style_loader_src', 'packbook_style_loader_src');

function myplugin_register_query_vars($vars)
{
	$vars[] = 'auth';
	$vars[] = 'callback';
	$vars[] = 'code';
	return $vars;
}
add_filter('query_vars', 'myplugin_register_query_vars');

function generateRandomString($length = 12)
{
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$randomString = '';
	for ($i = 0; $i < $length; $i++) {
		$randomString .= $characters[rand(0, strlen($characters) - 1)];
	}
	return $randomString;
}

/**
 * Build a custom query
 *
 * @param $query obj The WP_Query instance (passed by reference)
 *
 * @link https://codex.wordpress.org/Plugin_API/Action_Reference/pre_get_posts
 */
function myplugin_pre_get_posts($query)
{



	$meta_query = array();

	$auth = get_query_var('auth');

	$meta_query[] = $auth;

	$callback = get_query_var('callback');

	$meta_query[] = $callback;

	$meta_query[] = get_query_var('code');

	$query->set('meta_query', $meta_query);

	if ($auth == 'google') {

		$config = [
			'google' => [
				'client_id'     => '78593690013-boanjrj2407at8bf75pf6jhsgbqg3b66.apps.googleusercontent.com',
				'client_secret' => 'rVF3frREY_pjqu9MnDFzv7Wl',
				'redirect'      => home_url('?callback=google'),
			],
		];

		$socialite = new Overtrue\Socialite\SocialiteManager($config);

		$url = $socialite->create('google')->redirect();

		wp_redirect($url);
		exit;
	} elseif ($auth == 'facebook') {


		$config = [
			'facebook' => [
				'client_id'     => '813101849110939',
				'client_secret' => '72007c4a648df39648b36073b3a91b58',
				'redirect'      => home_url('?callback=facebook'),
			],
		];

		$socialite = new Overtrue\Socialite\SocialiteManager($config);

		$url = $socialite->create('facebook')->redirect();

		wp_redirect($url);
		exit;
	} else if ($callback == 'google') {

		$config = [
			'google' => [
				'client_id'     => '78593690013-boanjrj2407at8bf75pf6jhsgbqg3b66.apps.googleusercontent.com',
				'client_secret' => 'rVF3frREY_pjqu9MnDFzv7Wl',
				'redirect'      => home_url('?callback=google'),
			],
		];

		$socialite = new Overtrue\Socialite\SocialiteManager($config);

		$code = urldecode(get_query_var('code'));



		@$user = @$socialite->create('google')->userFromCode($code);

		if (!empty(@$user)) {

			$email = $user->getEmail();
			$name = $user->getName();

			if (email_exists($email)) {
				$user_id = email_exists($email);
				wp_set_auth_cookie($user_id);
				update_user_meta($user_id, "social_auth_id", $user->getId());
				wp_redirect(home_url('/'));
				exit;
			} else {
				//create a new account and then login
				wp_create_user($name, generateRandomString(), $email);
				$user_id = email_exists($email);
				wp_set_auth_cookie($user_id);
				update_user_meta($user_id, "social_auth_id", $user->getId());
				wp_redirect(home_url('/'));
				exit;
			}
		} else {

			wp_redirect(home_url('/'));
			exit;
		}
	} else if ($callback == 'facebook') {

		$config = [
			'facebook' => [
				'client_id'     => '813101849110939',
				'client_secret' => '72007c4a648df39648b36073b3a91b58',
				'redirect'      => home_url('?callback=facebook'),
			],
		];

		$socialite = new Overtrue\Socialite\SocialiteManager($config);

		$code = urldecode(get_query_var('code'));

		try {

			$user = $socialite->create('facebook')->userFromCode($code);

			if (!empty(@$user)) {

				$email = $user->getEmail();
				$name = $user->getName();

				if (email_exists($email)) {
					$user_id = email_exists($email);
					wp_set_auth_cookie($user_id);
					update_user_meta($user_id, "social_auth_id", $user->getId());
					wp_redirect(home_url('/'));
					exit;
				} else {
					//create a new account and then login
					wp_create_user($name, generateRandomString(), $email);
					$user_id = email_exists($email);
					wp_set_auth_cookie($user_id);
					update_user_meta($user_id, "social_auth_id", $user->getId());
					wp_redirect(home_url('/'));
					exit;
				}
			} else {

				wp_redirect(home_url('/'));
				exit;
			}
		} catch (Exception $e) {
		}
	}
}
add_action('pre_get_posts', 'myplugin_pre_get_posts', 1);


function country_lists($name, $class, $select = '')
{

	$lists = array(
		'AL' => 'Albania',
		'DZ' => 'Austria',
		'BE' => 'Belgia',
		'BA' => 'Bośnia i Hercegowina',
		'BG' => 'Bułgaria',
		'HR' => 'Chorwacja',
		'CY' => 'Cypr',
		'ME' => 'Czarnogóra',
		'CZ' => 'Czechy',
		'DK' => 'Dania',
		'EE' => 'Estonia',
		'FI' => 'Finlandia',
		'FR' => 'Francja',
		'GR' => 'Grecja',
		'ES' => 'Hiszpania',
		'NL' => 'Holandia',
		'IE' => 'Irlandia',
		'IS' => 'Islandia',
		'XK' => 'Kosowo',
		'LI' => 'Lichtenstein',
		'LT' => 'Litwa',
		'LU' => 'Luxemburg',
		'LV' => 'Łotwa',
		'MK' => 'Macedonia',
		'MT' => 'Malta',
		'DE' => 'Niemcy',
		'NO' => 'Norwegia',
		'PL' => 'Polska',
		'PT' => 'Portugalia',
		'RO' => 'Rumunia',
		'SM' => 'San Marino',
		'RS' => 'Serbia',
		'SK' => 'Słowacja',
		'SI' => 'Słowenia',
		'CH' => 'Szwajcaria',
		'SE' => 'Szwecja',
		'TR' => 'Turcja',
		'HU' => 'Węgry',
		'GB' => 'Brytania',
		'IT' => 'Włochy',
		'FO' => 'Wyspy Owcze',
		'RU' => 'Rosja'
	);

	$output = '<select name="' . $name . '" class="' . $class . '">';

	foreach ($lists as $code => $list) {

		if ($code == $select) {

			$output .= '<option value="' . $code . '" selected>' . $list . '</option>';
		} else {

			$output .= '<option value="' . $code . '">' . $list . '</option>';
		}
	}

	$output .= '</select>';

	echo $output;
}

function countryName($country_code)
{

	$lists = array(
		'AL' => 'Albania',
		'DZ' => 'Austria',
		'BE' => 'Belgia',
		'BA' => 'Bośnia i Hercegowina',
		'BG' => 'Bułgaria',
		'HR' => 'Chorwacja',
		'CY' => 'Cypr',
		'ME' => 'Czarnogóra',
		'CZ' => 'Czechy',
		'DK' => 'Dania',
		'EE' => 'Estonia',
		'FI' => 'Finlandia',
		'FR' => 'Francja',
		'GR' => 'Grecja',
		'ES' => 'Hiszpania',
		'NL' => 'Holandia',
		'IE' => 'Irlandia',
		'IS' => 'Islandia',
		'XK' => 'Kosowo',
		'LI' => 'Lichtenstein',
		'LT' => 'Litwa',
		'LU' => 'Luxemburg',
		'LV' => 'Łotwa',
		'MK' => 'Macedonia',
		'MT' => 'Malta',
		'DE' => 'Niemcy',
		'NO' => 'Norwegia',
		'PL' => 'Poland',
		'PT' => 'Portugalia',
		'RO' => 'Rumunia',
		'SM' => 'San Marino',
		'RS' => 'Serbia',
		'SK' => 'Słowacja',
		'SI' => 'Słowenia',
		'CH' => 'Szwajcaria',
		'SE' => 'Szwecja',
		'TR' => 'Turcja',
		'HU' => 'Węgry',
		'GB' => 'Brytania',
		'IT' => 'Włochy',
		'FO' => 'Wyspy Owcze',
		'RU' => 'Russia'
	);

	foreach ($lists as $code => $list) {

		if ($code == $country_code) {

			return $list;
		}
	}

	return $country_code;
}

//Custom usermeta - allow admin to override email verification
function packbook_edit_user_profile($user)
{
	if ('' != $verify_email = get_the_author_meta('_Verify Email', $user->ID)) {
?>
		<table class="form-table">
			<tr>
				<th><label for="emailverify">Email Verification Link</label></th>
				<td>
					<?php $verification_link .= sprintf('%s?email=verify&login=%s&key=%s', home_url('/login/'), rawurlencode($user->user_login), $verify_email); ?>
					<input type="text" name="_Verify_Email" id="_Verify_Email" value="<?php echo $verification_link; ?>" class="regular-text" /><br />
					<span class="description">Leave blank to allow user to login without email verification.</span>
				</td>
			</tr>
		</table>
<?php
	}
}
add_action('edit_user_profile', 'packbook_edit_user_profile');


function packbook_edit_user_profile_update($user_id)
{
	if (!$_POST['_Verify_Email']) {
		delete_user_meta($user_id, '_Verify Email');
	}
}
add_action('edit_user_profile_update', 'packbook_edit_user_profile_update');

/**
 * @param 
 */
function send_mail($user, $title,  $message)
{
	if ($user == 'user') {

		global $user_ID;

		$user = get_user_by('id', $user_ID);
		$email = $user->user_email;
		$name = $user->display_name . ' ' . $title;
	} elseif ($user == 'admin') {

		$email = get_option('admin_email');
		$name = wp_specialchars_decode(get_option('blogname'), ENT_QUOTES) . ' ' . $title;
	} elseif (esc_email($user)) {
		$email = esc_email($user);
		$name = wp_specialchars_decode(get_option('blogname'), ENT_QUOTES) . ' ' . $title;
	} else {

		return false;
	}

	@wp_mail($email, sprintf(__('%s'), $name), $message);

	return true;
}


//Local avatar
function packbook_get_avatar($avatar, $id_or_email, $size, $default, $alt)
{
	if (!is_numeric($id_or_email)) {
		if (is_string($id_or_email)) {
			$user = get_user_by('email', $id_or_email);
			$id_or_email = $user->ID;
		} else if (is_object($id_or_email)) {
			if (!empty($id_or_email->ID)) {
				$id_or_email = $id_or_email->ID;
			}

			if (!empty($id_or_email->comment_author_email)) {
				$user = get_user_by('email', $id_or_email->comment_author_email);
				$id_or_email = $user->ID;
			}
		}
	}

	$avatar_id = get_user_meta($id_or_email, 'packbook_user_avatar', true);

	if ($avatar_id != '' && $avatar_id != 'deleted') {
		if (intval($size) <= 48) {
			$imgsrc = wp_get_attachment_image_src($avatar_id, 'avatar48');
			return '<img alt="avatar" src="' . $imgsrc[0] . '" class="avatar" height="' . $size . '" width="' . $size . '" />';
		} else {
			$imgsrc = wp_get_attachment_image_src($avatar_id, 'thumbnail');
			return '<img alt="avatar" src="' . $imgsrc[0] . '" class="avatar" height="' . $size . '" width="' . $size . '" />';
		}
	} else {
		if (get_option('default_avatar') == '') {
			if ($size <= 64) {
				$default = get_template_directory_uri() . '/assets/images/avatar-48x48.png';
			} else {
				$default = get_template_directory_uri() . '/assets/images/avatar-96x96.png';
			}
		} else {
			if ($size <= 64) {
				$default = get_option('packbook_avatar_48');
			} else {
				$default = get_option('packbook_avatar_96');
			}
		}
		$avatar = '<img alt="avatar" src="' . $default . '" class="avatar" height="' . $size . '" width="' . $size . '" />';
	}

	return $avatar;
}
add_filter('get_avatar', 'packbook_get_avatar', 10, 5);


function get_id_by_slug($page_slug, $slug_page_type = 'page')
{
	$find_page = get_page_by_path($page_slug, OBJECT, $slug_page_type);
	if ($find_page) {
		return $find_page->ID;
	} else {
		return null;
	}
}

function pb_child_pages_id($slug)
{

	$args = array(
		'post_type'   => 'page',
		'post_parent' => get_id_by_slug($slug),
		'fields' => 'ids'
	);

	$ids = get_posts($args);

	return $ids;
}


//Ajax upload avatar
function packbook_upload_avatar()
{
	check_ajax_referer('upload_avatar', 'ajax-nonce');

	if ($_FILES) {
		require_once(ABSPATH . 'wp-admin/includes/image.php');
		require_once(ABSPATH . 'wp-admin/includes/file.php');
		require_once(ABSPATH . 'wp-admin/includes/media.php');

		foreach ($_FILES as $file => $array) {
			$imageTypes = array(
				1, //IMAGETYPE_GIF
				2, //IMAGETYPE_JPEG
				3 //IMAGETYPE_PNG
			);

			$imageinfo = getimagesize($_FILES[$file]['tmp_name']);
			$width = @$imageinfo[0];
			$height = @$imageinfo[1];
			$type = @$imageinfo[2];
			$mime = @$imageinfo['mime'];

			if (!in_array($type, $imageTypes)) {
				@unlink($_FILES[$file]['tmp_name']);
				echo 'error';
				die();
			}

			if ($width <= 1 && $height <= 1) {
				@unlink($_FILES[$file]['tmp_name']);
				echo 'error';
				die();
			}

			if ($mime != 'image/gif' && $mime != 'image/jpeg' && $mime != 'image/png') {
				@unlink($_FILES[$file]['tmp_name']);
				echo 'error';
				die();
			}

			$filename = time() . substr(str_shuffle("genki02468"), 0, 5);

			switch ($type) {
				case 1:
					$ext = '.gif';
					break;
				case 2:
					$ext = '.jpg';
					break;
				case 3:
					$ext = '.png';
					break;
			}
			$_FILES[$file]['name'] = 'avatar-' . $filename . $ext;

			add_image_size('avatar48', 48, 48, true);
			$attach_id = media_handle_upload($file, 'none', array('post_title' => 'Avatar for UserID ' . $_POST['avatar-userid']));

			if (is_wp_error($attach_id)) {
				@unlink($_FILES[$file]['tmp_name']);
				echo 'error';
				die();
			} else {
				$user_avatar = get_user_meta($_POST['avatar-userid'], 'packbook_user_avatar', true);
				if ($user_avatar != '' && $user_avatar != 'deleted')
					wp_delete_attachment($user_avatar, true);

				update_user_meta($_POST['avatar-userid'], 'packbook_user_avatar', $attach_id);

				//attach the avatar to the user settings page so that it's not orphaned in the media library
				$settings_page = get_page_by_path('settings');

				global $wpdb;
				$wpdb->query(
					$wpdb->prepare(
						"UPDATE $wpdb->posts 
						SET post_parent = %d
						WHERE ID = %d
						",
						$settings_page->ID,
						$attach_id
					)
				);
			}
		}
	}

	$return = array();

	$thumbnail = wp_get_attachment_image_src($attach_id, 'thumbnail');
	$return['thumbnail'] = $thumbnail[0];
	$return['id'] = $attach_id;
	echo json_encode($return);

	exit;
}
add_action('wp_ajax_packbook-upload-avatar', 'packbook_upload_avatar');

//Delete avatar
function packbook_delete_avatar()
{
	$nonce = $_POST['nonce'];

	if (!wp_verify_nonce($nonce, 'ajax-nonce'))
		die();

	$user_avatar = get_user_meta($_POST['id'], 'packbook_user_avatar', true);

	if ($user_avatar != '' && $user_avatar != 'deleted') {
		$upload_dir = wp_upload_dir();
		$avatar48_img = wp_get_attachment_image_src($user_avatar, 'avatar48');
		$avatar48_img_path = str_replace($upload_dir['baseurl'], $upload_dir['basedir'], $avatar48_img[0]);

		if (file_exists($avatar48_img_path))
			unlink($avatar48_img_path);

		wp_delete_attachment($user_avatar, true);
		update_user_meta($_POST['id'], 'packbook_user_avatar', 'deleted');
	}
	exit;
}
add_action('wp_ajax_packbook-delete-avatar', 'packbook_delete_avatar');


function pb_package_meta($post_id, $name, $single = true)
{

	$meta = get_post_meta($post_id, $name, $single);

	if (empty($meta)) {
		$meta = '';
	}
	return $meta;
}


function pb_get_service_name($name = '')
{

	$services = [
		'dpd' => 'DPD',
		'dpd_pickup' => 'DPD Pickup',
		'inpost_kurier' => 'Inpost Kurier',
		'inpost_paczkomaty' => 'Inpost Paczkomaty',
		'ups' => 'UPS',
		'ups_access_point' => 'UPS Access Point',
		'poczta' => 'Poczta',
		'pocztex' => 'Pocztex',
		'paczka_w_ruchu' => 'Paczka W Ruchu',
		'ambro_express' => 'Ambro Express',
		'hellmann' => 'Hellmann',
		'rohlig_suus' => 'Rohlig Suus',
		'schenker' => 'Schenker'
	];

	$service = '';

	if (array_key_exists($name, $services)) {
		return $services[$name];
	}

	return $service;
}

/**
 * @param string $key
 * @return string $raw_key
 */
function pb_sanitize_key($key)
{
	$raw_key = $key;
	$key     = strtolower($key);
	$key     = preg_replace('/[^a-z0-9_\-]/', '_', $key);

	/**
	 * Filters a sanitized key string.
	 *
	 * @since 3.0.0
	 *
	 * @param string $key     Sanitized key.
	 * @param string $raw_key The key prior to sanitization.
	 */
	return apply_filters('sanitize_key', $key, $raw_key);
}


/**
 * @param string $url
 * @param string $method
 * @param mixed $args
 * @return mixed
 */
function pb_call_soap($url, $method, $args)
{
	$options = array(
		'exceptions' => true,
		'trace' => 1,
		'cache_wsdl' => WSDL_CACHE_NONE,
		'stream_context' => stream_context_create(
			array(
				'ssl' => array(
					'verify_peer' => false,
					'verify_peer_name' => false
				)
			)
		)

	);

	$client = new \SoapClient($url, $options);

	try {
		$result = $client->__soapCall($method, [$args]);
		return $result;
	} catch (Exception $e) {
		return new WP_Error('error', __($e->getMessage()));
	}
}

function soapxml_to_array()
{

	$response = file_get_contents('http://packbook.me/soap.xml');
	$response = preg_replace("/(<\/?)(\w+):([^>]*>)/", "$1$2$3", $response);
	$xml = new SimpleXMLElement($response);
	$body = $xml->xpath('//SBody')[0];
	$array = json_decode(json_encode((array)$body), TRUE);

	return $array;
}


//Change default email
function packbook_mail_from($email)
{
	if ('' != $outgoing_email = of_get_option('outgoing_email')) {
		return $outgoing_email;
	} else {
		return $email;
	}
}
add_filter('wp_mail_from', 'packbook_mail_from');

function packbook_mail_from_name($name)
{
	if ('' != $outgoing_email_name = of_get_option('outgoing_email_name')) {
		return $outgoing_email_name;
	} else {
		return $name;
	}
}
add_filter('wp_mail_from_name', 'packbook_mail_from_name');


add_action('init', 'pb_rewrites_init');
function pb_rewrites_init()
{
	add_rewrite_rule(
		'invoice/([0-9]+)/?$',
		'index.php?invoice&invoice_id=$matches[1]',
		'top'
	);
}

add_filter('query_vars', 'pb_query_vars');
function pb_query_vars($query_vars)
{
	$query_vars[] = 'invoice_id';
	return $query_vars;
}

function analytics_rewrite_catch()
{
	global $wp_query;

	//get_query_var('invoice_id');

	if (array_key_exists('invoice_id', $wp_query->query_vars)) {

		get_template_part('invoice');

		exit;
	}
}
add_action('template_redirect', 'analytics_rewrite_catch');
