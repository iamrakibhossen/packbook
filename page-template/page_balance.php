<?php
/*
Template Name: _balance
*/
global $user_ID;
if (!is_user_logged_in()) {
    wp_redirect(home_url('/login/?redirect_to=' . home_url('/dashboard/balance/')));
    exit;
}



get_header();


$balance = get_user_meta($user_ID, '_pb_user_balance', true);

$balance = pb_price($balance);

$results = pb_user_balance_history_list($user_ID, 10);


?>

<section class="dashboard mt-4">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-10 col-lg-10">

                <div class="row align-items-end justify-content-end">

                    <div class="col-md-6">

                        <h1 class="py-3 font-weight-bold h5">
                            <span class="icon icon-shape rounded-circle bg-success shadow-success text-white mr-3">
                                <i class="fas fa-wallet"></i>

                            </span>

                            Saldo: <?php echo $balance; ?> PLN

                        </h1>

                    </div>

                    <div class="col-md-6">


                        <form class="" action="<?php echo home_url('/payment/'); ?>" method="POST">
                            <div class="form-group py-4">
                                <div class="row form-row">
                                    <div class="col-md-7">
                                        <div class="input-group input-group-sm">

                                            <input type="number" class="form-control" id="input-email" name="payment_gross" min="5" value="15" required>
                                            <div class="input-group-append">
                                                <span class="input-group-text">PLN</span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-5">

                                        <input type="submit" class="btn btn-success btn-sm btn-block" id="input-email" value="Doładuj saldo">

                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div>

                    <?php if (empty($results)) { ?>
                        <div class="text-center p-4">
                            <p><b>Nie znaleziono historii</b></p>

                        </div>
                    <?php } else { ?>
                        <table class="table table table-bordered table-responsive-md font-weight-bold text-center">
                            <thead>

                                <tr>
                                    <th scope="col">Data</th>
                                    <th scope="col">OPIS</th>
                                    <th scope="col">Ilość</th>
                                    <th scope="col">Równowaga po</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($results as $r) {


                                ?>
                                    <tr>
                                        <td><?php echo $r->balance_date; ?></td>
                                        <td><?php echo $r->description; ?></td>
                                        <?php if ($r->balance_type == 'add') { ?>
                                            <td><span class="text-success">+<?php echo $r->amount; ?> <?php echo $r->currency_code; ?></span></td>
                                        <?php } elseif ($r->balance_type == 'spend') { ?>
                                            <td><span class="text-danger">-<?php echo $r->amount; ?> <?php echo $r->currency_code; ?></span></td>
                                        <?php } ?>
                                        <td><?php echo $r->current_balance; ?> <?php echo $r->currency_code; ?></td>
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