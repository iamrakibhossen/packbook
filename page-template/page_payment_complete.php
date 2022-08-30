<?php
/*
Template Name: _payment/complete
*/

if (!is_user_logged_in()) {
    wp_redirect(home_url('/login/?redirect_to=' . home_url('/dashboard/balance/')));
    exit;
}

$balance = get_user_meta($user_ID, '_pb_user_balance', true);
if (!is_float($balance) && $balance <= 1) {

    $balance = 0.00;
}

get_header();
?>

<section class="dashboard mt-4">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-5">
                
<div class="modal-content"><div class="modal-header"><h5 class="modal-title h6" id="modal_title_6">Zapłata</h5></div><div class="modal-body"><div class="py-3 text-center"><i class="fas fa-check-circle fa-4x text-success"></i><h5 class="heading h4 mt-4">Odnoszący sukcesy</h5><h6>Dokonałeś płatności, a Twoje aktualne saldo wynosi <br/><b><?php echo $balance;?> PLN</b>.</h6></div></div><div class="modal-footer"><a href="<?php echo home_url('/dashboard/balance/'); ?>" class="btn btn-sm btn-success">Sprawdź saldo</a></div></div>
                
            </div>
        </div>
</section>

<?php get_footer(); ?>