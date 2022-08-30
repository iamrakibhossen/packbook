<?php

add_action('admin_menu', 'register_pricing_menu_page');
function register_pricing_menu_page()
{
    add_menu_page('Pricing', 'Pricing', 'manage_options', 'pricing', 'packbook_pricing_page', 'dashicons-tag', 40);
}

function pb_pricing_lists($num = 20)
{

    global $wpdb;

    $pnum = isset($_GET['pnum']) ? intval($_GET['pnum']) : 1;

    $results = $wpdb->get_results(

        "SELECT *
						FROM " . $wpdb->prefix . "pricing
						ORDER BY id DESC
						LIMIT " . ($pnum - 1) * $num . ", " . $pnum * $num


    );

    return $results;
}

function pb_get_pricing($id)
{
    global $wpdb;
    $results = $wpdb->get_results(
        $wpdb->prepare(
            "SELECT *
						FROM " . $wpdb->prefix . "pricing
                        WHERE id = %d
						LIMIT 1",
            $id

        )
    );

    return empty($results[0]) ? [] : $results[0];
}

function pb_add_pricing($args = array())
{

    global $wpdb;

    $default = array(
        'parcel_type' => '',
        'service_type' => '',
        'carrier' => '',
        'dimensions' => '',
        'weight' => '',
        'send_from' => '',
        'send_to' => '',
        'insurance' => '',
        'insurance_price' => '',
        'price_netto' => '',
        'price_vat' => ''
    );

    $args = wp_parse_args($args, $default);

    $arg['parcel_type'] = mb_strtolower($args['parcel_type']);

    $arg['carrier'] = mb_strtolower(str_replace(' ', '_', $args['carrier']));

    $arg['dimensions'] = intval($args['dimensions']);

    $wpdb->insert($wpdb->prefix . 'pricing', $args);

    return true;
}


function packbook_pricing_page()
{

    global $wpdb;



    if (isset($_GET['edit']) && $_GET['edit'] != '' && !isset($_GET['del'])) {

        $id = (int) $_GET['edit'];

        packbook_pricing_page_form($id);
    } else {

        if (isset($_GET['del']) && $_GET['del'] != '') {

            $id = (int) $_GET['edit'];

            $wpdb->delete($wpdb->prefix . "pricing", array('id' => $id));
        }
        $count = $wpdb->get_var(

            "SELECT COUNT(*)
		FROM " . $wpdb->prefix . "pricing
		
		"
        );
        $pnum = isset($_GET['pnum']) ? intval($_GET['pnum']) : 1;
        $per_page = 10;
        $maxpage = ceil($count / $per_page);
        $lists = pb_pricing_lists($per_page);

?>

<div class="wrap">
    <h1 class="wp-heading-inline">
        Pricing</h1>

    <a href="<?php echo admin_url('admin.php?page=pricing&edit=new'); ?>" class="page-title-action">Add New</a>
    <br />

    <ul class="subsubsub">
        <li class="all"><a href="" class="current" aria-current="page">All <span
                    class="count">(<?php echo $count; ?>)</span></a></li>

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
                        <span>ParcelType</span>
                    </th>
                    <th scope="col" id="name" class="manage-column column-name sortable asc"><span>Carrier</span></th>

                    <th scope="col" id="name" class="manage-column column-name sortable asc"><span>dimensions</span>
                    </th>

                    <th scope="col" id="date" class="manage-column column-date sortable asc"><span>Weight</span></th>

                    <th scope="col" id="name" class="manage-column column-name sortable asc"><span>From</span></th>
                    <th scope="col" id="name" class="manage-column column-name sortable asc"><span>To</span></th>
                    <th scope="col" id="name" class="manage-column column-name sortable asc"><span>Insurance</span></th>
                    <th scope="col" id="date" class="manage-column column-date sortable asc"><span>Insurance
                            Price</span></th>
                    <th scope="col" id="name" class="manage-column column-name sortable asc"><span>Price Netto</span>
                    </th>
                    <th scope="col" id="date" class="manage-column column-date sortable asc"><span>Price With VAT</span>
                    </th>

                </tr>
            </thead>

            <tbody id="the-list">


                <?php foreach ($lists as $p) {



                        ?>

                <tr id="pricing-<?php echo $p->id; ?>"
                    class="iedit author-self level-0 pricing-<?php echo $p->id; ?> type-booking status-publish hentry">
                    <th scope="row" class="check-column">
                        <input id="cb-select-<?php echo $p->id; ?>" type="checkbox" name="post[]"
                            value="<?php echo $p->id; ?>">
                    </th>
                    <td class="username column-username has-row-actions column-primary" data-colname="Title">

                        <strong><a class="row-title"
                                href="<?php echo admin_url('admin.php?page=pricing&edit=' . $p->id); ?>"
                                aria-label="“pricing_date” (Edit)"><?php echo ucfirst($p->parcel_type); ?></a></strong>

                        <div class="row-actions"><span class="edit"><a
                                    href="<?php echo admin_url('admin.php?page=pricing&edit=' . $p->id); ?>"
                                    aria-label="Edit “<?php echo $p->id; ?>”">Edit</a> | </span><span class="trash"><a
                                    href="<?php echo admin_url('admin.php?page=pricing&edit=' . $p->id . '&del=1'); ?>"
                                    class="submitdelete"
                                    aria-label="Move “<?php echo $p->id; ?>” to the Trash">Trash</a></span>
                        </div>
                    </td>

                    <td class="name column-name" data-colname="Name"><b><?php echo $p->carrier; ?></b></td>

                    <td class="name column-name" data-colname="Name"><b><?php echo $p->dimensions; ?>
                        </b></td>

                    <td class="name column-name" data-colname="Weight"><?php echo $p->weight; ?></td>

                    <td class="name column-name" data-colname="Name"><?php echo countryName($p->send_from); ?></td>
                    <td class="name column-name" data-colname="Name"><?php echo countryName($p->send_to); ?></td>



                    <td class="name column-name" data-colname="Date"><?php echo $p->insurance; ?></td>
                    <td class="name column-name" data-colname="Date"><?php echo $p->insurance_price; ?></td>

                    <td class="name column-name" data-colname="Date"><?php echo $p->price_netto; ?></td>
                    <td class="name column-name" data-colname="Date"><?php echo $p->price_vat; ?></td>

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
                                <a class="tablenav-pages-navspan button"
                                    href="<?php echo admin_url('admin.php?page=pricing'); ?>&pnum=<?php echo $pnum - 1; ?>"><?php _e('&laquo; Previous', 'lekhook') ?></a>
                            </li>
                            <?php } ?>

                            <?php if ($maxpage != 1 && $maxpage != $pnum) { ?>
                            <li class=" paging-input">
                                <a class="tablenav-pages-navspan button"
                                    href="<?php echo admin_url('admin.php?page=pricing'); ?>&pnum=<?php echo $pnum + 1; ?>"><?php _e('Next &raquo;', 'lekhook') ?></a>
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
function packbook_pricing_page_form($id)
{
    global $wpdb, $user_ID;

    $sender = array(
        'id' => '',
        'parcel' => 'parcel',
        'service_type' => '',
        'carrier' => '100',
        'dimensions' => '250',
        'weight' => '30',
        'send_from' => 'PL',
        'send_to' => 'PL',
        'insurance' => '1000',
        'insurance_price' => '0',
        'price_netto' => '1200',
        'price_vat' => '1549',
    );

    $sender = wp_parse_args(json_decode(json_encode(pb_get_pricing($id))), $sender);

    $http_post = ('POST' == $_SERVER['REQUEST_METHOD']);

    if ($http_post) {

        $errors = new WP_Error();

        $sender = wp_parse_args($_POST, $sender);

        if (empty($sender['id'])) {
            $args = array();
            foreach ($sender as $key => $value) {

                if (in_array($key, array('parcel', 'service_type', 'carrier', 'dimensions', 'weight', 'send_from', 'send_to', 'insurance', 'insurance_price', 'price_netto', 'price_vat'))) {
                    $args[$key] = $value;
                }
            }

            $wpdb->insert($wpdb->prefix . 'pricing', $args);

            if ($wpdb->insert_id) {
                $success = 'Add balance success';
            }
        } else {



            $args = array();
            foreach ($sender as $key => $value) {

                if (in_array($key, array('id', 'parcel', 'service_type', 'carrier', 'dimensions', 'weight', 'send_from', 'send_to', 'insurance', 'insurance_price', 'price_netto', 'price_vat'))) {
                    $args[$key] = $value;
                }
            }

            $wpdb->update($wpdb->prefix . 'pricing', $args, array('id' => $args['id']));

            $success = 'Update balance success';
        }
    }

    ?>
<div class="wrap">

    <h1 class=""> Add pricing</h1>

    <?php if (!empty($success)) {
            echo '<div id="setting-error-settings_updated" class="notice notice-success settings-error is-dismissible"> 
<p><strong>' . $success . '</strong></p></div>';
        }
        ?>
    <form method="POST" action="">
        <table class="form-table" role="presentation">

            <tbody>
                <tr>
                    <th scope="row"><label for="parcel">Parcel Type</label></th>
                    <td><select name="parcel" class="custom-select" required>
                            <option value="parcel" <?php if ($sender['parcel'] == 'parcel') echo ' selected'; ?>>Parcel
                            </option>
                            <option value="envelope" <?php if ($sender['parcel'] == 'envelope') echo ' selected'; ?>>
                                Envelope</option>
                            <option value="pallet" <?php if ($sender['parcel'] == 'cancel') echo ' selected'; ?>>Pallet
                            </option>

                        </select></td>
                </tr>

                <tr>
                    <th scope="row"><label for="carrier">Carrier</label></th>
                    <td><select name="carrier" class="custom-select" required>

                            <option value="dpd" <?php selected($sender['carrier'], 'dpd'); ?>>DPD</option>
                            <option value="dpd_pickup" <?php selected($sender['carrier'], 'dpd_pickup'); ?>>DPD Pickup
                            </option>
                            <option value="inpost_kurier" <?php selected($sender['carrier'], 'inpost_kurier'); ?>>Inpost
                                Kurier</option>
                            <option value="inpost_paczkomaty"
                                <?php selected($sender['carrier'], 'inpost_paczkomaty'); ?>>Inpost Paczkomaty</option>
                            <option value="ups" <?php selected($sender['carrier'], 'ups'); ?>>UPS</option>
                            <option value="ups_access_point" <?php selected($sender['carrier'], 'ups_access_point'); ?>>
                                UPS Access Point</option>
                            <option value="poczta" <?php selected($sender['carrier'], 'poczta'); ?>>Poczta</option>
                            <option value="pocztex" <?php selected($sender['carrier'], 'pocztex'); ?>>Pocztex</option>
                            <option value="paczka_w_ruchu" <?php selected($sender['carrier'], 'paczka_w_ruchu'); ?>>
                                Paczka W RuCHU</option>
                            <option value="ambro_express" <?php selected($sender['carrier'], 'ambro_express'); ?>>Ambro
                                Express</option>
                            <option value="hellmann" <?php selected($sender['carrier'], 'hellmann'); ?>>Hellmann
                            </option>
                            <option value="rohlig_suus" <?php selected($sender['carrier'], 'rohlig_suus'); ?>>Rohlig
                                Suus</option>
                            <option value="schenker" <?php selected($sender['carrier'], 'schenker'); ?>>Schenker
                            </option>

                        </select></td>
                </tr>

                <tr>
                    <th scope="row"><label for="dimensions">dimensions</label></th>
                    <td>
                        <input name="dimensions" type="number" id="dimensions"
                            value="<?php echo sanitize_text_field($sender['dimensions']); ?>" class="medium-text"
                            required>
                    </td>
                </tr>

                <tr>
                    <th scope="row"><label for="weight">Weight</label></th>
                    <td>
                        <input name="weight" type="number" id="weight"
                            value="<?php echo sanitize_text_field($sender['weight']); ?>" class="medium-text" required>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="gateway">From</label></th>
                    <td><?php country_lists('send_from', 'custom-select custom-select-sm', $sender['send_from']); ?>
                    </td>
                </tr>

                <tr>
                    <th scope="row"><label for="send_to">To</label></th>
                    <td><?php country_lists('send_to', 'custom-select custom-select-sm', $sender['send_to']); ?></td>
                </tr>

                <tr>
                    <th scope="row"><label for="insurance">Insurance</label></th>
                    <td>
                        <input name="insurance" type="number" id="insurance"
                            value="<?php echo sanitize_text_field($sender['insurance']); ?>" class="medium-text"
                            required>
                    </td>
                </tr>

                <tr>
                    <th scope="row"><label for="insurance_price"> Insurance Price</label></th>
                    <td>
                        <input name="insurance_price" type="number" id="insurance_price"
                            value="<?php echo sanitize_text_field($sender['insurance_price']); ?>" class="medium-text"
                            required>
                    </td>
                </tr>

                <tr>
                    <th scope="row"><label for="price_netto">Price Netto</label></th>
                    <td>
                        <input name="price_netto" type="number" id="price_netto"
                            value="<?php echo sanitize_text_field($sender['price_netto']); ?>" class="medium-text"
                            required>
                    </td>
                </tr>

                <tr>
                    <th scope="row"><label for="price_vat"> Price With VAT</label></th>
                    <td>
                        <input name="price_vat" type="number" id="price_vat"
                            value="<?php echo sanitize_text_field($sender['price_vat']); ?>" class="medium-text"
                            required>
                    </td>
                </tr>

            </tbody>
        </table>

        <input type="hidden" name="id" value="<?php echo $sender['id']; ?>">

        <p class="submit"><input type="submit" id="submit" class="button button-primary" value="Add pricing"></p>

    </form>
</div>
<?php }


function pb_get_pricing_list($args = array())
{

    global $wpdb;

    $prices = array();

    $default = array(
        'parcel_type' => 'parcel',
        'send_from' => 'PL',
        'send_to' => 'PL',
        'parcel_weight' => '1',
        'parcel_insurance' => '',
        'parcel_length' => '10',
        'parcel_width' => '10',
        'parcel_height' => '10',
    );

    $args = wp_parse_args($args, $default);

    $data = get_transient( md5(json_encode($args)) );

    if( !empty($data) ){
        return $data;
    }

    extract($args);

    $dimensions = intval($parcel_length) + intval($parcel_width) + intval($parcel_height);

    if (!empty($parcel_weight)) {

        $weight = "AND weight >= '$parcel_weight' ";
    } else {

        $weight = '';
    }

    if (!empty($parcel_insurance)) {

        $insurance = "AND insurance >= '$parcel_insurance' ";
    } else {

        $insurance = '';
    }

    if (!empty($dimensions)) {

        $dimensions = " AND dimensions <> '$dimensions' ";
    } else {

        $dimensions = '';
    }

    $result = $wpdb->get_results("
    SELECT *
    FROM  {$wpdb->prefix}pricing
        WHERE parcel_type = '$parcel_type' 
        AND send_from = '$send_from' 
        AND send_to = '$send_to'
        $dimensions
        $weight
        $insurance
        GROUP BY carrier
        ORDER BY price_vat DESC, dimensions DESC, insurance DESC, weight DESC
        LIMIT 0, 20
", ARRAY_A);


    foreach ($result as $r) {

        if ($insurance) {
            $r['price_vat'] = floatval($r['price_vat']) + floatval($r['insurance_price']);
        }


        $prices[$parcel_type][$r['carrier']] = (float)  pb_price($r['price_vat']);
    }

    set_transient( md5( json_encode($args) ), $prices, DAY_IN_SECONDS );

    return $prices;
}

function packbook_ajax_pricing()
{
    $prices = array();


    $prices = pb_get_pricing_list($_POST);

    echo json_encode($prices);
    exit;
}

add_action('wp_ajax_packbook-ajax-pricing', 'packbook_ajax_pricing');
add_action('wp_ajax_nopriv_packbook-ajax-pricing', 'packbook_ajax_pricing');