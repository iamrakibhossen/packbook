<?php

global $address_book;

$args = array(
    'post_type' => 'address_book',
    'author' => $user_ID
);

$address_books = get_posts($args);

?>

<section class="dashboard mt-4">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-10 col-lg-10">

                <div class="row align-items-end justify-content-end mb-3">

                    <div class="col-md-6">

                        <h1 class="py-3 font-weight-bold h5 mb-0">
                            <span class="icon icon-shape rounded-circle bg-success shadow-success text-white mr-3">
                                <i class="fas fa-wallet"></i>

                            </span>

                            <?php _e('Książka adresowa', 'packbook'); ?>

                        </h1>

                    </div>

                    <div class="col-md-6 text-right">

                        <a href="?id=new" class="btn btn-success btn-sm ">Add New</a>

                    </div>
                </div>
                <div>

                    <table class="table table table-bordered table-responsive-md font-weight-bold text-center">
                        <thead>

                            <tr>
                                <th scope="col">
                                    <span class="icon icon-shape icon-sm text-grey">
                                        <i class="fas fa-star text-warning"></i>
                                    </span>
                                </th>
                                <th scope="col">Name</th>
                                <th scope="col">Address</th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($address_books as $address) {

                                $post_id = $address->ID;

                                $data = $address_book->get($post_id);

                                extract($data);

                            ?>



                                <tr>
                                    <td>
                                        <span class="masonry-filter icon icon-shape icon-sm <?php if (pacebook_default_receiver($post_id)) {
                                                                                    echo 'text-warning';
                                                                                } else {
                                                                                    echo 'text-grey';
                                                                                } ?>" data-toggle="tooltip" data-placement="top" title="Add Default" data-original-title="Add Default">
                                            <i class="fas fa-star"></i>
                                        </span>
                                    </td>
                                    <td><?php echo $sender_name; ?></td>
                                    <td>

                                        <p><?php echo $sender_email; ?></p>
                                        <p><?php echo $sender_postcode; ?>, <?php echo $sender_city; ?> - <?php echo countryName($sender_country_code); ?></p>
                                        <p>
                                            <?php echo $sender_street; ?>
                                        </p>

                                    </td>
                                    <td>

                                        <a href="<?php echo home_url('/dashboard/address-book/?id=' . $post_id); ?>" class="btn btn-info btn-sm py-1 px-2 font-weight-normal"><i class="far fa-edit"></i></a>
                                        <a href="<?php echo home_url('/dashboard/address-book/?del=1&id=' . $post_id); ?>" onclick="return confirm('Are you sure to delete?')" class="btn btn-danger btn-sm py-1 px-2 font-weight-normal">
                                            <i class="far fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>

                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>