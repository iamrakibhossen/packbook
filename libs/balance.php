<?php

function pb_price($job_listing_cost = 0, $currency = false)
{

    if (empty($job_listing_cost)) {
        $job_listing_cost = 0;
    }

    $job_listing_cost = (float) $job_listing_cost;

    if ($currency === true) {

        $currency = ' PLN';
    } else {
        $currency = '';
    }

    return apply_filters('pb_price_format', number_format($job_listing_cost, 2, '.', '')) . $currency;
}

function pb_user_balance_history($user_id = 0, $amount = 0, $type = 'add', $balance = 0, $description)
{

    global $wpdb;

    //add to notification center
    $wpdb->query(
        $wpdb->prepare(
            "INSERT INTO " . $wpdb->prefix . "balance (user_id, amount, currency_code, balance_type, current_balance, description)
				VALUES (%d, %f, %s, %s, %f, %s)
				",
            $user_id,
            $amount,
            'PLN',
            $type,
            $balance,
            $description
        )
    );
}

function pb_user_balance($user_id = 0, $amount = 0, $type = 'add', $description = 'Payment done')
{

    $balance = get_user_meta($user_id, '_pb_user_balance', true);

    $balance = pb_price($balance);

    $amount = pb_price($amount);

    if ($type == 'add') {

        $balance += $amount;
    } elseif ($type == 'spend') {

        $balance = $balance - $amount;
    }

    $balance = pb_price($balance);

    update_user_meta($user_id, '_pb_user_balance', $balance);

    pb_user_balance_history($user_id, $amount, $type, $balance, $description);


    return true;
}

function pb_user_balance_history_list($user_id = 0, $num = 20)
{

    global $wpdb;

    $pnum = isset($_GET['pnum']) ? intval($_GET['pnum']) : 1;

    $results = $wpdb->get_results(
        $wpdb->prepare(
            "SELECT *
						FROM " . $wpdb->prefix . "balance
						WHERE user_id = %d
						ORDER BY id DESC
						LIMIT " . ($pnum - 1) * $num . ", " . $pnum * $num,
            $user_id
        )
    );

    return $results;
}

function add_payment($user_id = 0, $gateway, $txn_id, $payment_gross = 0.00, $payment_status)
{

    global $wpdb;

    //add to notification center
    $wpdb->query(
        $wpdb->prepare(
            "INSERT INTO " . $wpdb->prefix . "payments (user_id, gateway, txn_id, payment_gross, currency_code, payment_status)
				VALUES (%d, %s, %s, %f, %s, %s)
				",
            $user_id,
            $gateway,
            $txn_id,
            pb_price($payment_gross),
            'PLN',
            $payment_status
        )
    );
}


function pb_payment_lists($num = 20)
{

    global $wpdb;

    $pnum = isset($_GET['pnum']) ? intval($_GET['pnum']) : 1;

    $results = $wpdb->get_results(

        "SELECT *
						FROM " . $wpdb->prefix . "payments
						ORDER BY payment_id DESC
						LIMIT " . ($pnum - 1) * $num . ", " . $pnum * $num


    );

    return $results;
}

function pb_get_payment($id)
{
    global $wpdb;
    $results = $wpdb->get_results(
        $wpdb->prepare(
            "SELECT *
						FROM " . $wpdb->prefix . "payments
                        WHERE payment_id = %d
						LIMIT 1",
            $id

        )
    );

    return empty($results[0]) ? [] : $results[0];
}

add_action('admin_menu', 'register_payments_menu_page');
function register_payments_menu_page()
{
    add_menu_page('Payments', 'Payments', 'manage_options', 'payments', 'packbook_payments_page', 'dashicons-tag', 40);
}

function packbook_payments_page()
{

    if (isset($_GET['edit']) && $_GET['edit'] != '') {

        $id = (int) $_GET['edit'];

        packbook_payments_page_form($id);
    } else {

        global $wpdb;
        $count = $wpdb->get_var(

            "SELECT COUNT(*)
		FROM " . $wpdb->prefix . "payments
		
		"
        );
        $pnum = isset($_GET['pnum']) ? intval($_GET['pnum']) : 1;
        $per_page = 10;
        $maxpage = ceil($count / $per_page);
        $lists = pb_payment_lists($per_page);

?>

        <div class="wrap">
            <h1 class="wp-heading-inline">
                Payments</h1>

            <a href="<?php echo admin_url('admin.php?page=payments&edit=new'); ?>" class="page-title-action">Add New</a>
            <br />

            <ul class="subsubsub">
                <li class="all"><a href="" class="current" aria-current="page">All <span class="count">(<?php echo $count; ?>)</span></a></li>

            </ul>

            <br />
            <br />
            <br />

            <form id="posts-filter" method="get">


                <table class="wp-list-table widefat fixed striped table-view-list posts">
                    <thead>
                        <tr style="height: 35px">
                            <td id="cb" class="manage-column column-cb check-column">
                                <input id="cb-select-all-1" type="checkbox">
                            </td>
                            <th scope="col" id="username" class="manage-column column-username column-primary sortable desc">
                                <span>Username</span>
                            </th>
                            <th scope="col" id="name" class="manage-column column-name sortable asc"><span>Gatway</span></th>

                            <th scope="col" id="name" class="manage-column column-name sortable asc"><span>Amount</span></th>

                            <th scope="col" id="date" class="manage-column column-date sortable asc"><span>TrxId</span></th>

                            <th scope="col" id="name" class="manage-column column-name sortable asc"><span>Status</span></th>
                            <th scope="col" id="date" class="manage-column column-date sortable asc"><span>Date</span>
                            </th>

                        </tr>
                    </thead>

                    <tbody id="the-list">


                        <?php foreach ($lists as $p) {

                            $user = get_user_by('id', $p->user_id);

                        ?>

                            <tr id="payment-<?php echo $p->payment_id; ?>" class="iedit author-self level-0 payment-<?php echo $p->payment_id; ?> type-booking status-publish hentry">
                                <th scope="row" class="check-column">
                                    <input id="cb-select-<?php echo $p->payment_id; ?>" type="checkbox" name="post[]" value="<?php echo $p->payment_id; ?>">
                                </th>
                                <td class="username column-username has-row-actions column-primary" data-colname="Title">

                                    <strong><a class="row-title" href="<?php echo admin_url('admin.php?page=payments&edit=' . $p->payment_id); ?>" aria-label="“payment_date” (Edit)"><?php echo $user->display_name; ?></a></strong>

                                    <div class="row-actions"><span class="edit"><a href="<?php echo admin_url('admin.php?page=payments&edit=' . $p->payment_id); ?>" aria-label="Edit “<?php echo $p->payment_id; ?>”">Edit</a> | </span><span class="trash"><a href="<?php echo admin_url('admin.php?page=payments&edit=' . $p->payment_id . '&del=1'); ?>" class="submitdelete" aria-label="Move “<?php echo $p->payment_id; ?>” to the Trash"></a></span>
                                    </div>
                                </td>

                                <td class="name column-name" data-colname="Name"><b><?php echo ucfirst($p->gateway); ?></b></td>

                                <td class="name column-name" data-colname="Name"><b><?php echo $p->payment_gross; ?> <?php echo $p->currency_code; ?></b></td>

                                <td class="name column-name" data-colname="TnxId">#<?php echo $p->txn_id; ?></td>

                                <td class="name column-name" data-colname="Date"><?php echo $p->payment_status; ?></td>
                                <td class="date column-date" data-colname="Date"><?php echo $p->payment_date; ?></td>

                            </tr>

                        <?php } ?>



                    </tbody>



                </table>
                <div class="tablenav bottom">

                    <div class="tablenav-pages ">

                        <span class="pagination-links">

                            <?php if ($maxpage != 0) { ?>
                                <span id="navigation">
                                    <ul class="pagination-links ">
                                        <?php if ($pnum != 1 && $maxpage >= $pnum) { ?>
                                            <li class=" paging-input">
                                                <a class="tablenav-pages-navspan button" href="<?php echo admin_url('admin.php?page=payments'); ?>&pnum=<?php echo $pnum - 1; ?>"><?php _e('&laquo; Previous', 'lekhook') ?></a>
                                            </li>
                                        <?php } ?>

                                        <?php if ($maxpage != 1 && $maxpage != $pnum) { ?>
                                            <li class=" paging-input">
                                                <a class="tablenav-pages-navspan button" href="<?php echo admin_url('admin.php?page=payments'); ?>&pnum=<?php echo $pnum + 1; ?>"><?php _e('Next &raquo;', 'lekhook') ?></a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </span>
                            <?php } ?>
                        </span>
                    </div>
                    <br class="clear">

                </div>

            </form>





            <div class="clear"></div>
        </div>
    <?php
    }
}

/**
 * Meta box display callback.
 *
 * @param WP_Post $post Current post object.
 */
function packbook_payments_page_form($id)
{
    global $wpdb, $user_ID;

    $sender = array(
        'payment_id' => '',
        'gateway' => '',
        'payment_gross' => '0.00',
        'payment_status' => 'complete',
        'txn_id' => '',
        'user_id' => '',
    );

    $sender = wp_parse_args(json_decode(json_encode(pb_get_payment($id))), $sender);
	
	$old = $sender['payment_status'];

    $http_post = ('POST' == $_SERVER['REQUEST_METHOD']);

    if ($http_post) {

        $errors = new WP_Error();

        $sender = wp_parse_args($_POST, $sender);
		
		$sender['user_id'] = intval( $sender['user_id'] );
		
		$sender['payment_gross'] = pb_price( $sender['payment_gross'] );
		
		if( empty($sender['user_id']) ){
			
			$errors->add('user_id', __('<strong>ERROR</strong>: User ID required', 'packbook'));
			
		} elseif( empty($sender['gateway']) ){
			
			$errors->add('gateway', __('<strong>ERROR</strong>: Payment gateway required.', 'packbook'));
			
		} elseif( empty($sender['payment_gross']) || $sender['payment_gross'] < 1 ){
			
			$errors->add('payment_gross', __('<strong>ERROR</strong>: Amount must required greater than 0', 'packbook'));
			
		} else{

			if (empty($sender['payment_id'])) {

				add_payment($sender['user_id'], $sender['gateway'], $sender['txn_id'], $sender['payment_gross'], $sender['payment_status']);

				if ( $sender['payment_status'] == 'complete' && empty($sender['payment_id']) ) {
					
					pb_user_balance($sender['user_id'], $sender['payment_gross'], 'add', 'Balance Added via ' . ucfirst($sender['gateway']) );
					
					$customer = get_userdata( $sender['user_id'] );
					$email = $customer->user_email;
					$customer_name = $customer->display_name;
					$amount = pb_price($sender['payment_gross'], true);

					$subject = __('Payment Receipt', 'packbook');
					$headers = 'From: "' . html_entity_decode(get_bloginfo('name')) . '" <' . get_bloginfo('admin_email') . '>';
					$message = "Hello " . $customer_name . "\n\n";
					$message .= "You have successfully made a payment of " . $amount . " via ". ucfirst($sender['gateway']) .".\n\n";
					$message .= "Thank you.";

					@wp_mail($email, $subject, $message, $headers);
				}

				$success = 'Add balance success';
				
			} else {

				if ($sender['payment_status'] == 'refund' && $old == 'complete' ) {
					
					pb_user_balance($sender['user_id'], $sender['payment_gross'], 'spend');
					
				} else if ($sender['payment_status'] == 'complete' && $old == 'refund' ) {
					pb_user_balance($sender['user_id'], $sender['payment_gross'], 'add', 'Balance Added via ' . ucfirst($sender['gateway']) );
				}

				$args = array();

				$args['payment_id'] = stripslashes_deep($sender['payment_id']);

				$args['payment_status'] = stripslashes_deep($sender['payment_status']);
				$args['payment_gross'] = stripslashes_deep($sender['payment_gross']);
				$args['gateway'] = stripslashes_deep($sender['gateway']);
				$args['txn_id'] = stripslashes_deep($sender['txn_id']);
				$args['user_id'] = stripslashes_deep($sender['user_id']);

				$wpdb->update($wpdb->prefix . 'payments', $args, array('payment_id' => $args['payment_id']));

				$success = 'Update balance success';
				
				if( empty($args['payment_id']) ){
				
				
				
				}
				
			}
		
		}
    }

    ?>
    <div class="wrap">

        <h1 class=""> Add Payment</h1>
		
		<?php if (isset($errors) && is_wp_error($errors)) { ?>

                    <?php if (!empty($errors->get_error_message())) { ?>
					
					<div id="setting-error-settings_updated" class="notice notice-error settings-error is-dismissible"> 
<p><strong><?php echo $errors->get_error_message(); ?></strong></p></div>
					
					 <?php } ?>
                <?php } ?>


        <?php if (!empty($success)) {
            echo '<div id="setting-error-settings_updated" class="notice notice-success settings-error is-dismissible"> 
<p><strong>' . $success . '</strong></p></div>';
        }
        ?>
        <form method="POST" action="">
            <table class="form-table" role="presentation">

                <tbody>

                    <tr>
                        <th scope="row"><label for="user_id">UserId</label></th>
                        <td><input name="user_id" type="number" id="user_id" value="<?php echo sanitize_text_field($sender['user_id']); ?>" class="medium-text" required></td>
                    </tr>

                    <tr>
                        <th scope="row"><label for="gateway">Payment Gateway</label></th>
                        <td><select name="gateway" class="custom-select" required>
						        <option value="">Select gateway</option>
                                <option value="paypal" <?php if ($sender['gateway'] == 'paypal') echo ' selected'; ?>>PayPal</option>
                                <option value="stripe" <?php if ($sender['gateway'] == 'stripe') echo ' selected'; ?>>Stripe</option>
                                <option value="bank" <?php if ($sender['gateway'] == 'bank') echo ' selected'; ?>>Bank</option>
                            </select></td>
                    </tr>

                    <tr>
                        <th scope="row"><label for="payment_gross">Amount</label></th>
                        <td>
                            <input name="payment_gross" type="number" id="payment_gross" value="<?php echo sanitize_text_field($sender['payment_gross']); ?>" class="medium-text" required>
                        </td>
                    </tr>

                    <tr>
                        <th scope="row"><label for="txn_id">Transaction ID</label></th>
                        <td><input name="txn_id" type="text" id="txn_id" value="<?php echo $sender['txn_id']; ?>" class="regular-text" required></td>
                    </tr>

                    <tr>
                        <th scope="row"><label for="payment_status">Payment Status</label></th>
                        <td><select name="payment_status" class="custom-select" required>
                                <option value="complete" <?php if ($sender['payment_status'] == 'complete') echo ' selected'; ?>>Complete</option>
                                <option value="refund" <?php if ($sender['payment_status'] == 'refund') echo ' selected'; ?>>Refund</option>
                            </select></td>
                    </tr>

                </tbody>
            </table>

            <input type="hidden" name="payment_id" value="<?php echo $sender['payment_id']; ?>">

            <p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Add Payment"></p>

        </form>
    </div>
<?php }
