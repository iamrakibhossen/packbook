<?php
/*
Template Name: _dashboard/send
*/

global $user_ID;

if (!is_user_logged_in()) {
    wp_redirect(home_url('/login/?redirect_to=' . home_url('/dashboard/saved/')));
    exit;
}

$ploc = 1;

if (isset($_GET['pnum']) && $_GET['pnum'] != '') {
    $ploc = intval($_GET['pnum']);
}

if (!empty($_GET['del']) &&  !empty($_GET['id'])) {

    $post_id = intval($_GET['id']);

    $post = get_post($post_id);

    if (($post->post_author == $user_ID || current_user_can('edit_others_posts')) && $post->post_type == 'booking') {
    } else {

        wp_redirect(home_url('/'));
        exit;
    }


    if (!empty($post)) {


        wp_delete_post($post->ID, true);

        wp_redirect(home_url('/dashboard/saved/?pnum=' . $ploc));
        exit;
    }
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
    'meta_value' => 0,
    'author' => $user_ID,
    'posts_per_page' => $limit,
    'offset' => $offset
);

$to_send = get_posts($args);

$count = 0;
if (!empty($to_send)) {
    $count = count($to_send);
}

get_header();
?>

<section class="dashboard mt-4">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-10 col-lg-12">
                <h1 class="py-3 font-weight-normal h5">
                    <span class="icon icon-shape bg-success shadow-success rounded-circle text-white mr-2">
                        <i class="fas fa-copy"></i>

                    </span>
                    <?php _e('Zachowane', 'packbook'); ?>
                </h1>

                <?php if (!empty($_GET['import'])) { ?>

                    <div class="alert alert-group alert-outline-success alert-dismissible fade show alert-icon" role="alert">
                        <div class="alert-group-prepend">
                            <span class="alert-group-icon text-">
                                <i class="fas fa-plus"></i>
                            </span>
                        </div>
                        <div class="alert-content text-danger">
                            <strong>New Import <?php echo $_GET['import']; ?> packages successfully, Now you can confirm order.</strong>
                        </div>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                <?php } ?>

                <div>

                    <?php if (empty($to_send)) { ?>
                        <div class="text-center p-4">
                            <p><b>nie znaleziono przesyłki</b></p>
                            <a href="<?php echo home_url('/dashboard/add-package/'); ?>" class="btn btn-primary btn-sm">Dodaj przesyłkę
                            </a>
                        </div>
                    <?php } else { ?>
                        <table class="table table-bordered table-responsive-md font-weight-bold text-center">
                            <thead>
                                <tr>
                                    <th scope="col">Dodany</th>

                                    <th scope="col">Nadawca</th>
                                    <th scope="col">Odbiorca</th>
                                    <th scope="col">Paczka</th>
                                    <th scope="col">Działania</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($to_send as $send) {

                                    $post_id = $send->ID;

                                ?>
                                    <tr>

                                        <td><?php echo get_the_time('j M Y \@g:ia', $post_id); ?></td>

                                        <td><?php echo pb_package_meta($post_id, 'sender_name'); ?></td>
                                        <td><?php echo pb_package_meta($post_id, 'receiver_name'); ?></td>
                                        <td><?php echo ucfirst(pb_package_meta($post_id, 'parcel_type')); ?></td>
                                        <td>

                                            <a href="<?php echo home_url('/dashboard/add-package/?id=' . $post_id); ?>" class="btn btn-primary btn-sm py-1 px-2 font-weight-normal" data-toggle="tooltip" data-placement="top" title="" data-original-title="Ordered">
                                                <i class="fas fa-shopping-basket"></i>
                                            </a>

                                            <a href="<?php echo home_url('/dashboard/saved/?del=1&id=' . $post_id . '&pnum=' . $ploc); ?>" onclick="return confirm('Are you sure to delete?')" class="btn btn-danger btn-sm py-1 px-2 font-weight-normal" data-toggle="tooltip" data-placement="top" title="Remove">
                                                <i class="far fa-times-circle"></i>
                                            </a>
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
            </div>
        </div>
</section>

<?php get_footer(); ?>