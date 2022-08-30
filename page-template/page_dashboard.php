<?php
/*
Template Name: _dashboard
*/

global $user_ID;

if (!is_user_logged_in()) {
    wp_redirect(home_url('/login/?redirect_to=' . home_url('/dashboard/')));
    exit;
}

$balance = get_user_meta($user_ID, '_pb_user_balance', true);
if (!is_float($balance) && $balance <= 1) {

    $balance = 0.00;
}



$query = new WP_Query(array('author' => $user_ID, 'post_type' => 'booking', 'meta_key' => 'parcel_order', 'meta_value' => '0'));

$pending_booking = $query->found_posts;

$query = new WP_Query(array('author' => $user_ID, 'post_type' => 'booking', 'meta_key' => 'parcel_order', 'meta_value' => 1));

$order_booking = $query->found_posts;

$total_booking = intval($order_booking + $pending_booking);

$args = array(
    'post_type' => 'booking',
    'meta_key' => 'parcel_order',
    'meta_value' => 1,
    'author' => $user_ID
);

$orders = get_posts($args);

get_header();
?>

<section class="dashboard mt-4">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-10 col-lg-11">
                <h1 class="py-3 font-weight-normal h5">
                    <span class="icon icon-shape bg-success shadow-success rounded-circle text-white mr-2">
                        <i class="fas fa-tachometer-alt"></i>

                    </span>
                    Panel
                </h1>



                <div class="row mx-n2">
                    <div class="col-lg-3 col-sm-6 px-2">
                        <div class="card">
                            <div class="card-body text-center">
                                <a href="<?php echo home_url('/dashboard/balance/') ?>">
                                    <div class="mb-3">
                                        <div class="icon icon-shape bg-primary rounded-circle shadow-primary text-white"><i class="fas fa-wallet"></i></div>
                                    </div>
                                    <h5 class="h5 font-weight-bold mb-1"><?php echo $balance; ?> PLN</h5><span class="d-block text-sm text-muted">Twój balans</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 px-2">
                        <div class="card">
                            <div class="card-body text-center">
                                <a href="<?php echo home_url('/dashboard/saved/') ?>">
                                    <div class="mb-3">
                                        <div class="icon icon-shape bg-danger shadow-danger rounded-circle  text-white"><i class="fas fa-cash-register"></i></div>
                                    </div>
                                    <h5 class="h5 font-weight-bold mb-1"><?php echo $total_booking; ?></h5><span class="d-block text-sm text-muted font-weight-bold">Całkowita liczba paczek</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 px-2">
                        <div class="card">
                            <div class="card-body text-center">
                                <a href="<?php echo home_url('/dashboard/orders/') ?>">
                                    <div class="mb-3">
                                        <div class="icon icon-shape bg-warning shadow-warning rounded-circle  text-white"><i class="fas fa-shopping-basket"></i></div>
                                    </div>
                                    <h5 class="h5 font-weight-bold mb-1"><?php echo $order_booking; ?></h5><span class="d-block text-sm text-muted font-weight-bold">Zamów pakiety</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 px-2">
                        <div class="card">
                            <div class="card-body text-center">
                                <a href="<?php echo home_url('/dashboard/saved/') ?>">
                                    <div class="mb-3">
                                        <div class="icon icon-shape rounded-circle  bg-success shadow-success text-white"><i class="fas fa-receipt"></i></div>
                                    </div>
                                    <h5 class="h5 font-weight-bold mb-1"><?php echo $pending_booking; ?></h5><span class="d-block text-sm text-muted font-weight-bold">Oczekujące pakiety</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>


                <div>
                    <h3 class="h4">Twoje zamówienia</h3>
                    <?php if (empty($orders)) { ?>
                        <div class="text-center p-4">
                            <p><b>nie znaleziono przesyłki</b></p>
                            <a href="<?php echo home_url('/dashboard/add-package/'); ?>" class="btn btn-primary btn-sm">Dodaj przesyłkę</a>
                        </div>
                    <?php } else { ?>
                        <table class="table table-bordered table-responsive-md font-weight-bold text-center">
                            <thead>
                                <tr>

                                    <th scope="col">Zamówione</th>
                                    <th scope="col">przesyłka</th>
                                    <th scope="col">Nadawca</th>
                                    <th scope="col">Odbiorca</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Działania</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($orders as $order) {
                                    $post_id = $order->ID;

                                ?>
                                    <tr>

                                        <td><?php echo get_the_time('j M Y g:ia', $post_id); ?></td>
                                        <td>
                                            <a href="<?php echo home_url('/dashboard/orders/?id=' . $post_id); ?>">
                                                <?php echo pb_package_meta($post_id, 'way_bill'); ?>
                                                <span class="badge badge-sm <?php echo pb_package_meta($post_id, 'service'); ?>"><?php echo pb_get_service_name(pb_package_meta($post_id, 'service')); ?></span></a>
                                        </td>

                                        <td><?php echo pb_package_meta($post_id, 'sender_name'); ?></td>

                                        <td><?php echo pb_package_meta($post_id, 'receiver_name'); ?></td>

                                        <td><?php echo pb_package_meta($post_id, 'parcel_status'); ?></td>
                                        <td>
                                            <a href="<?php echo home_url('/dashboard/orders/?id=' . $post_id); ?>" class="btn btn-info btn-sm py-1 px-2 font-weight-normal" data-toggle="tooltip" data-placement="top" title="View">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="<?php echo home_url('/dashboard/orders/?cancel=1&id=' . $post_id); ?>" onclick="return confirm('Are you sure want to cancel?')" class="btn btn-danger btn-sm py-1 px-2 font-weight-normal" data-toggle="tooltip" data-placement="top" title="Cancel">
                                                <i class="far fa-times-circle"></i>
                                            </a>
                                        </td>
                                        </td>

                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    <?php } ?>

                </div>


            </div>
        </div>
</section>

<?php get_footer(); ?>