<?php
/*
Template Name: _orders
*/

if ('POST' == $_SERVER['REQUEST_METHOD'] && !wp_verify_nonce($_POST['nonce'], 'order')) {
    die();
}

global $user_ID;
if (!is_user_logged_in()) {
    wp_redirect(home_url('/login/?redirect_to=' . home_url('/dashboard/orders/')));
    exit;
}

$page = 1;
$limit = 50;
$offset = 0;

if (isset($_GET['pnum']) && $_GET['pnum'] != '') {
    $page = $_GET['pnum'];
    $offset = $limit * $page - $limit;
}

$args = array(
    'post_type' => 'booking',
    'meta_key' => 'parcel_order',
    'meta_value' => 1,
    'author' => $user_ID,
    'posts_per_page' => $limit,
    'offset' => $offset

);

$orders = get_posts($args);

get_header();
?>

<section class="dashboard mt-4">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-10 col-lg-11">



                <?php

                if (
                    !empty($_GET['id'])
                ) {

                    $post_id = intval($_GET['id']);

                    $post = get_post($post_id);

                    if (!empty($post)) {

                        $post_id = $post->ID;

                        get_template_part('template-parts/order');
                    }
                } else {


                ?>


                    <div>
                        <h1 class="py-3 font-weight-normal h5">
                            <span class="icon icon-shape bg-success shadow-success rounded-circle text-white mr-2">
                                <i class="fas fa-tachometer-alt"></i>

                            </span>
                            <?php _e('Zamówione', 'packbook'); ?>
                        </h1>
                        <?php if (empty($orders)) { ?>
                            <div class="text-center p-4">
                                <p><b>nie znaleziono przesyłki</b></p>
                                <a href="<?php echo home_url('/dashboard/add-package/'); ?>" class="btn btn-primary btn-sm">Dodaj przesyłkę
                                </a>
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
                                                <a href="<?php echo home_url('/dashboard/orders/?cancel=1&id=' . $post_id); ?>" onclick="return confirm('Are you sure to delete?')" class="btn btn-danger btn-sm py-1 px-2 font-weight-normal" data-toggle="tooltip" data-placement="top" title="Cancel">
                                                    <i class="far fa-times-circle"></i>
                                                </a>
                                            </td>
                                            </td>

                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        <?php } ?>

                        <?php if ($count >= $limit) { ?>
                            <div class="bootstrap-pagination">
                                <nav>
                                    <ul class="pagination justify-content-center">
                                        <li class="page-item"><a class="page-link" href="?pnum=<?php echo $page + 1; ?>" class="btn btn-navi">Next <i class="fa fa-chevron-right"></i></a></li>
                                    </ul>
                                </nav>
                            </div>
                        <?php } ?>

                    </div>

                <?php } ?>

            </div>
        </div>
</section>

<?php get_footer(); ?>