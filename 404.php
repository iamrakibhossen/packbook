<?php

/** 
 * 404 Page Template
 * @package Packbook
 * @author Rakib <iamrakibhossen@gmail.com>
 * @version 1.0
 */

get_header(); ?>

<div class="container">
	<div class="row justify-content-center">
		<div class="bigmsg py-8 text-center text-dark">
			<h1><?php _e('This page was not found :(', 'packbook'); ?></h1>
			<h5><?php _e('Error code 404. The page has been deleted or the address entered is incorrect.', 'packbook'); ?>
			</h5>

			<a href="<?php echo esc_url(home_url()); ?>" class="btn btn-primary btn-sm active mt-3">Back to Homepage</a>
		</div>
	</div>
</div>

<?php get_footer(); ?>