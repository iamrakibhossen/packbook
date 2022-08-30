<?php
/*
Template Name: _import
*/

use Respect\Validation\Validator;

global $user_ID;
if (!is_user_logged_in()) {
    wp_redirect(home_url('/login/?redirect_to=' . home_url('/dashboard/import/')));
    exit;
}

$balance = get_user_meta($user_ID, '_pb_user_balance', true);
$balance = pb_price($balance);



$http_post = ('POST' == $_SERVER['REQUEST_METHOD']);


if ($http_post) {

    $errors = new WP_Error();

    $name = empty($_FILES['csv']) ? '' : $_FILES['csv'];

    if (!empty($name['tmp_name'])) {

        if (Validator::Extension('csv')->validate($name['name']) === false) {

            $errors->add('type', __('<strong>ERROR</strong>: File type not a valid.', 'packbook'));
        } elseif (Validator::Size(null, '10MB')->validate($name['tmp_name']) === false) {

            $errors->add('type', __('<strong>ERROR</strong>: File size 1KB to 10MB.', 'packbook'));
        } else {

            $file = file($name['tmp_name']);

            $file = str_replace(",", ";", $file);

            $rows = array_map('str_getcsv', $file);

            $header = array_shift($rows);

            $header = explode(';', $header[0]);

            $csv = array();
            foreach ($rows as $row) {
                $row = explode(';', $row[0]);
                $csv[] = array_combine($header, $row);
            }

            $i = 1;

            $count = 0;

            $i = 0;

            $count = 0;

            foreach ($csv as $c) {

                $return = import_package_validation($c);

                if (!empty($return)) {

                    $count++;
                }

                if ($i >= 99) {

                    break;
                }

                $i++;
            }

            if (!empty($count)) {

                wp_redirect(home_url('/dashboard/saved/?import=' . $count));

                exit;
            }
        }
    } else {
        $errors->add('type', __('<strong>ERROR</strong>: File not a valid.', 'packbook'));
    }
}
get_header();
?>
<style>
    label.error {
        color: red;
        margin: 4px 0;
        margin-top: -40px;
        position: absolute;

    }
</style>
<section class="dashboard mt-4">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-10 col-lg-8">

                <h1 class="py-3 font-weight-normal h5">
                    <span class="icon icon-shape bg-success shadow-success rounded-circle text-white mr-2">
                        <i class="fas fa-tachometer-alt"></i>

                    </span>
                    Import Przesyłek
                </h1>

                <?php

                if (empty($balance)) {

                ?>

                    <div class="text-center p-4">

                        <p><strong>Add balace before import csv.</strong></p>

                        <p><a class="btn btn-sm btn-success" href="<?php echo home_url('/dashboard/balance/'); ?>">Dodaj saldo</a></p>


                    </div>

                <?php



                } else { ?>

                    <?php if (isset($errors) && is_wp_error($errors)) { ?>

                        <?php if (!empty($errors->get_error_message())) { ?>
                            <div class="error-msg">
                                <div class="alert alert-danger"><strong><?php echo $errors->get_error_message(); ?></strong></div>
                            </div>
                        <?php } ?>
                    <?php } ?>

                    <form id="form-import" action="<?php echo home_url('/dashboard/import/'); ?>" method="POST" enctype="multipart/form-data">



                        <div id="csv-info" class="text-center"></div>

                        <div class="form-group py-4">
                            <div class="row form-row justify-content-center">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <div class="custom-file w-100 overflow-hidden">
                                            <input type="file" class="custom-file-input" id="csv" name="csv">
                                            <label class="custom-file-label" data-browse="Attach" for="csv"><i class="fas fa-file-csv"></i> Choose a CSV file</label>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </form>
                <?php } ?>

                <div>

                    <p>
                        <?php _e('Narzędzie Import ma za zadanie ułatwić Ci hurtowe nadawanie przesyłek. Korzystając z plików CSV, możesz przygotować listę przesyłek do wysyłki oraz automatycznie ją zaimportować bez konieczności ręcznej edycji każdej z nich. Plik powinien być przygotowany zgodnie z poniższym wzorem:', 'packbook'); ?>
                    </p>

                    <p>- <a href="<?php echo home_url('/sample.csv'); ?>">sample.csv</a></p>
                    <p>
                        <b>Przesyłki po załadowaniu z pliku nie są automatycznie zamawianie. Znajdują się one w zakładce
                            Do
                            wysłania.</b>
                    </p>
                    <p>Warto pamiętać:</p>
                    <p>- Maksymalna ilość przesyłek w jednym pliku wynosi 100,</p>
                    <p>- Kolejność nagłówków w pliku CSV dowolna,</p>
                    <p>- Pliki powinny być zakodowane w UTF-8.</p>
                </div>
            </div>

        </div>
    </div>
    </div>
</section>
<script>
    jQuery().ready(function($) {

        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);

            $('#form-import').submit();

        });

    });
</script>
<?php get_footer(); ?>