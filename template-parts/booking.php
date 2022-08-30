<?php

if (
    !empty($_GET['id'])
) {

    $post_id = intval($_GET['id']);

    $post = get_post($post_id);

    if (!empty($post)) {

        $post_id = $post->ID;

        $service = pb_package_meta($post_id, 'service');

        //Parcel Info
        $parcel_type = pb_package_meta($post_id, 'parcel_type');
        $parcel_weight = pb_package_meta($post_id, 'parcel_weight');
        $parcel_length = pb_package_meta($post_id, 'parcel_length');
        $parcel_width = pb_package_meta($post_id, 'parcel_width');
        $parcel_height = pb_package_meta($post_id, 'parcel_height');
        $parcel_parcel_insurance = pb_package_meta($post_id, 'parcel_parcel_insurance');
        $parcel_description = pb_package_meta($post_id, 'parcel_description');
        $parcel_user_reference = pb_package_meta($post_id, 'parcel_user_reference');
        $parcel_shape = pb_package_meta($post_id, 'parcel_shape');

        //Total Cost
        $total_cost = pb_package_meta($post_id, 'total_cost');
    }
} else {

    $service = 'dpd';

    //Parcel Info
    $parcel_type = 'parcel';
    $parcel_weight = '1';
    $parcel_length = '20';
    $parcel_width = '10';
    $parcel_height = '10';
    $parcel_parcel_insurance = '';
    $parcel_description = '';
    $parcel_user_reference = '';
    $parcel_shape = '';
}
$http_post = ('POST' == $_SERVER['REQUEST_METHOD']);

if ($http_post) {
    $parcel_type = empty($_POST['parcel_type']) ? $parcel_type : $_POST['parcel_type'];
    $parcel_length = empty($_POST['parcel_length']) ? $dimension : $_POST['parcel_length'];
    $parcel_width = empty($_POST['parcel_width']) ? $dimension : $_POST['parcel_width'];
    $parcel_height = empty($_POST['parcel_height']) ? $dimension : $_POST['parcel_height'];
    $parcel_weight = empty($_POST['parcel_weight']) ? $parcel_weight : $_POST['parcel_weight'];
    $parcel_insurance = empty($_POST['parcel_insurance']) ? $parcel_insurance : $_POST['parcel_insurance'];
    $parcel_description = empty($_POST['parcel_description']) ? $parcel_description : $_POST['parcel_description'];


    $service = empty($_POST['service']) ? $service : $_POST['service'];

    $total_cost = floatval($_POST['total_cost']);
}

?>


<div class="row">
    <div class="<?php if (is_home()) {
                    echo 'col-sm-5';
                } else {
                    echo 'col-sm-8';
                } ?>">
        <div class="form-group" id="parcel_type">
            <label class="form-control-label d-block font-weight-bold">Rodzaj przesyłki</label>
            <div class="d-inline d-md-flex btn-group-toggle" data-toggle="buttons">
                <label class="ml-2 ml-md-0 mb-3 btn btn-sm btn-primary<?php if ($parcel_type == 'parcel') echo ' active'; ?>">
                    <input type="radio" name="parcel_type" value="parcel" id="radioButton2" autocomplete="off" <?php if ($parcel_type == 'parcel') echo ' checked'; ?>>
                    Paczka
                </label>
                <label class="mb-3 btn btn-sm btn-primary<?php if ($parcel_type == 'envelope') echo ' active'; ?>">
                    <input type="radio" name="parcel_type" value="envelope" id="radioButton3" autocomplete="off" <?php if ($parcel_type == 'envelope') echo ' checked'; ?>> Dokumenty
                </label>
                <label class="mb-3 btn btn-sm btn-primary<?php if ($parcel_type == 'pallet') echo ' active'; ?>">
                    <input type="radio" name="parcel_type" value="pallet" id="radioButton4" autocomplete="off" <?php if ($parcel_type == 'pallet') echo ' checked'; ?>> Paleta
                </label>
                <?php if (is_home()) { ?>
                    <label class="mb-3 btn btn-sm btn-primary<?php if ($parcel_type == 'contaner') echo ' active'; ?>">
                        <input type="radio" name="parcel_type" value="contaner" id="radioButton4" autocomplete="off" <?php if ($parcel_type == 'contaner') echo ' checked'; ?>>
                        Kontener
                    </label>
                    <label class="mb-3 btn btn-sm btn-primary<?php if ($parcel_type == 'atypical') echo ' active'; ?>">
                        <input type="radio" name="parcel_type" value="atypical" autocomplete="off" <?php if ($parcel_type == 'atypical') echo ' checked'; ?>> Nietypowe
                    </label>
                <?php } ?>
            </div>
        </div>


        <div class="all-metas" id="all-meta">
            <div class="form-group">
                <label class="form-control-label font-weight-bold">Wymiary</label>
                <div class="row form-row">
                    <div class="col-md-4">
                        <div class="form-group">

                            <div class="input-group input-group-sm">

                                <input type="number" class="form-control pr-1" id="input-email" name="parcel_length" value="<?php echo $parcel_length; ?>">
                                <div class="input-group-append">
                                    <span class="input-group-text">cm</span>
                                </div>
                            </div>
                            <label class="text-center form-control-label d-block font-weight-light">Długość</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">

                            <div class="input-group input-group-sm">

                                <input type="number" class="form-control pr-0" id="input-email" name="parcel_width" value="<?php echo $parcel_width; ?>">
                                <div class="input-group-append">
                                    <span class="input-group-text">cm</span>
                                </div>
                            </div>
                            <label class="text-center form-control-label d-block font-weight-light">Szerokość</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">

                            <div class="input-group input-group-sm">

                                <input type="number" class="form-control pr-0" id="input-email" name="parcel_height" value="<?php echo $parcel_height; ?>">
                                <div class="input-group-append">
                                    <span class="input-group-text">cm</span>
                                </div>
                            </div>
                            <label class="text-center form-control-label d-block font-weight-light">Wysokość</label>
                        </div>
                    </div>
                </div>
            </div>


            <div class="form-group">
                <div class="row form-row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-control-label font-weight-bold">Waga</label>
                            <div class="input-group input-group-sm">

                                <input type="number" class="form-control pr-1" id="input-email" name="parcel_weight" value="<?php echo $parcel_weight; ?>">
                                <div class="input-group-append">
                                    <span class="input-group-text">kg</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label class="form-control-label font-weight-bold">Wartość ubezpieczenia</label>
                            <div class="input-group input-group-sm">

                                <input type="number" class="form-control" id="input-email" name="parcel_insurance" value="<?php echo $parcel_insurance; ?>">
                                <div class="input-group-append">
                                    <span class="input-group-text">zł</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>



        <div class="all-metas" id="contaner-meta" style="display: none;">
            <div class="form-group">
                <div class="row form-row">

                    <div class="col-md-5">
                        <div class="form-group">
                            <label class="form-control-label font-weight-bold">Kategoria</label>
                            <select name="contaner_category" class="custom-select custom-select-sm">
                                <option value="FCL">FCL</option>
                                <option value="LCL">LCL</option>

                            </select>
                        </div>
                    </div>
                </div>

            </div>


            <div class="form-group">
                <div class="row form-row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-control-label font-weight-bold">Waga</label>
                            <div class="input-group input-group-sm">

                                <input type="text" class="form-control" id="input-email" name="contaner_parcel_weight[kg]" value="1">
                                <div class="input-group-append">
                                    <span class="input-group-text">kg</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label class="form-control-label font-weight-bold">Wartość ubezpieczenia</label>
                            <div class="input-group input-group-sm">

                                <input type="text" class="form-control" id="input-email" name="contaner_parcel_insurance" value="">
                                <div class="input-group-append">
                                    <span class="input-group-text">zł</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


        <div class="all-metas" id="atypical-meta" style="display: none;">
            <div class="form-group">
                <div class="row form-row">

                    <div class="col-md-5">
                        <div class="form-group">
                            <label class="form-control-label font-weight-bold">Kategoria</label>
                            <select name="atypical_category" class="custom-select custom-select-sm">
                                <option value="Furniture">Meble</option>
                                <option value="Cars">Samochody</option>

                            </select>
                        </div>
                    </div>
                </div>

            </div>


            <div class="form-group">
                <div class="row form-row">

                    <div class="col-md-5">
                        <div class="form-group">
                            <label class="form-control-label font-weight-bold">Twój budżet</label>
                            <div class="input-group input-group-sm">

                                <input type="text" class="form-control" id="input-email" name="atypical_budget" value="">
                                <div class="input-group-append">
                                    <span class="input-group-text">zł</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>






    </div>


    <?php if (is_home()) { ?>

        <div class="col-sm-4">
            <div class="form-group   ml-3">
                <label class="form-control-label font-weight-bold">Miejsce nadania</label>

                <div class="row form-row">
                    <div class="col-md-5">
                        <?php country_lists('sender_country_code', 'custom-select custom-select-sm', 'PL'); ?>
                    </div>
                    <div class="col-4">
                        <input type="text" name="sender_postcode" class="form-control form-control-sm" id="sender_postcode" placeholder="Postcode" value="87-100">
                    </div>
                </div>
            </div>

            <div class="form-group ml-3">
                <label class="form-control-label font-weight-bold">Miejsce doręczenia</label>

                <div class="row form-row">
                    <div class="col-md-5">

                        <?php country_lists('receiver_country_code', 'custom-select custom-select-sm', 'PL'); ?>

                    </div>
                    <div class="col-4">
                        <input type="text" name="receiver_postcode" class="form-control form-control-sm" id="receiver_postcode" placeholder="Postcode" value="00-791">
                    </div>
                </div>
            </div>

        </div>

        <div class="col-sm-3"><img class="img-fluid" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/homeform.png"></div>

    <?php } else { ?>

        <div class="form-group col-12">
            <label class="form-control-label font-weight-bold" for="parcel_description">Description</label>

            <div class="row form-row">
                <div class="col-md-6">

                    <textarea name="parcel_description" id="parcel_description" class="form-control form-control-sm d-block" rows="2" cols="20"><?php echo $parcel_description; ?></textarea>
                    <div class="help-block mt-1">
                        Make sure that the contents of your shipment are not on the
                        <a target="_blank" rel="noopener" class="link-txt focus-link" href="/" tabindex="58">
                            prohibited goods
                        </a>
                        lists.
                    </div>
                </div>

            </div>
        </div>

        <div class="form-group col-12">
            <label class="form-control-label font-weight-bold" for="parcel_user_reference">User Reference</label>

            <div class="row form-row">
                <div class="col-md-6">

                    <input type="text" name="parcel_user_reference" id="parcel_user_reference" class="form-control form-control-sm d-block" value="<?php echo $parcel_user_reference; ?>">

                </div>

            </div>
        </div>

    <?php } ?>

</div>


<div class="all-prices" id="all-price">

    <div class="form-group text-left mt-1 mb-5 prices text-center">
        <label class="form-control-label d-block font-weight-bold mb-3 text-dark">Wycena (z VAT)</label>
        <div class="d-inline d-md-flex justify-content-md-center btn-group-toggle" data-toggle="buttons">

            <label class="ml-2 ml-md-0 mb-3 btn p-2 border bg-white active" data-id="dpd">
                <input type="radio" name="service" id="radioButton2" autocomplete="off" value="dpd" <?php if ($service == 'dpd') echo ' checked'; ?>>
                <span class="bg-danger px-4 py-2 d-block text-white mb-1 rounded">DPD</span>
                <span id="carrier-price" class="d-block font-weight-bolder text-dark"></span>
            </label>

            <label class="mb-3 btn p-2 border bg-white btn-sm" data-id="dpd_pickup">
                <input type="radio" name="service" id="radioButton2" autocomplete="off" value="dpd_pickup" <?php if ($service == 'dpd_pickup') echo ' checked'; ?>>
                <span class="bg-danger px-3 py-0 d-block text-white mb-1 lh-130 rounded">DPD<span class="d-block font-weight-light">Pickup</span></span>
                <span id="carrier-price" class="d-block font-weight-bolder text-dark"></span>
            </label>


            <label class=" mb-3 btn p-2 border bg-white" data-id="gls">
                <input type="radio" name="service" id="radioButton2" autocomplete="off" value="gls" <?php if ($service == 'gls') echo ' checked'; ?>>
                <span class="bg-warning px-4 py-2 d-block text-dark mb-1 rounded">GLS</span>
                <span id="carrier-price" class="d-block font-weight-bolder text-dark">12.66 zł</span>
            </label>

            <label class=" mb-3 btn p-2 border bg-white" data-id="fedex">
                <input type="radio" name="service" id="radioButton2" autocomplete="off" value="fedex" <?php if ($service == 'fedex') echo ' checked'; ?>>
                <span class="bg-secondary px-4 py-2 d-block text-dark mb-1 rounded">Fed<span class="text-danger">Ex</span></span>
                <span id="carrier-price" class="d-block font-weight-bolder text-dark">12.66 zł</span>
            </label>

            <label class=" mb-3 btn p-2 border bg-white" data-id="tnt">
                <input type="radio" name="service" id="radioButton2" autocomplete="off" value="tnt" <?php if ($service == 'tnt') echo ' checked'; ?>>
                <span class="bg-danger px-4 py-2 d-block text-light mb-1 rounded">TNT</span>
                <span id="carrier-price" class="d-block font-weight-bolder text-dark">12.66 zł</span>
            </label>

            <label class="mb-3 btn p-2 border bg-white btn-sm" data-id="inpost_kurier">
                <input type="radio" name="service" id="radioButton2" autocomplete="off" value="inpost_kurier" <?php if ($service == 'inpost_kurier') echo ' checked'; ?>>
                <span class="bg-warning px-4 py-0 d-block text-dark mb-1 lh-130 rounded">InPost
                    <span class="d-block font-weight-light">Kurier</span></span>
                <span id="carrier-price" class="d-block font-weight-bolder text-dark"></span>
            </label>

            <label class="mb-3 btn p-2 border bg-white btn-sm" data-id="inpost_paczkomaty">
                <input type="radio" name="service" id="radioButton2" autocomplete="off" value="inpost_paczkomaty" <?php if ($service == 'inpost_paczkomaty') echo ' checked'; ?>>
                <span class="bg-warning px-2 py-0 d-block text-dark mb-1 lh-130 rounded">InPost
                    <span class="d-block font-weight-light">Paczkomaty</span></span>
                <span id="carrier-price" class="d-block font-weight-bolder text-dark"></span>
            </label>

            <label class="mb-3 btn p-2 border bg-white btn-sm" data-id="ups">
                <input type="radio" name="service" id="radioButton2" autocomplete="off" value="ups" <?php if ($service == 'ups') echo ' checked'; ?>>
                <span class="bg-dark px-4 py-2 d-block text-warning mb-1 rounded">UPS</span>
                <span id="carrier-price" class="d-block font-weight-bolder text-dark"></span>
            </label>




            <label class="mb-3 btn p-2 border bg-white btn-sm" data-id="ups_access_point">
                <input type="radio" name="service" id="radioButton2" autocomplete="off" value="ups_access_point" <?php if ($service == 'ups_access_point') echo ' checked'; ?>>
                <span class="bg-dark px-2 py-0 d-block text-warning mb-1 lh-130 rounded">UPS
                    <span class="d-block font-weight-light">Access Point</span></span>
                <span id="carrier-price" class="d-block font-weight-bolder text-dark"></span>
            </label>

        </div>

        <div class="d-inline d-md-flex justify-content-md-center btn-group-toggle" data-toggle="buttons">
            <label class="mb-3 btn p-2 border bg-white btn-sm" data-id="poczta">
                <input type="radio" name="service" id="radioButton2" autocomplete="off" value="poczta" <?php if ($service == 'poczta') echo ' checked'; ?>>
                <span class="bg-danger px-3 py-0 d-block text-white mb-1 lh-130 rounded">Poczta
                    <span class="d-block font-weight-light text-white">Polska</span></span>
                </span>
                <span id="carrier-price" class="d-block font-weight-bolder text-dark"></span>
            </label>

            <label class="mb-3 btn p-2 border bg-white btn-sm" data-id="pocztex">
                <input type="radio" name="service" id="radioButton2" autocomplete="off" value="pocztex" <?php if ($service == 'pocztex') echo ' checked'; ?>>
                <span class="bg-dark-danger px-3 py-2 d-block text-white mb-1 rounded">Pocztex</span>
                <span id="carrier-price" class="d-block font-weight-bolder text-dark"></span>
            </label>

            <label class="mb-3 btn p-2 border bg-white btn-sm" data-id="paczka_w_ruchu">
                <input type="radio" name="service" id="radioButton2" autocomplete="off" value="paczka_w_ruchu" <?php if ($service == 'paczka_w_ruchu') echo ' checked'; ?>>
                <span class="bg-dark px-1 py-0 d-block text-white mb-1 lh-130 rounded">PACZKA
                    <span class="d-block font-weight-bold text-success">W RUCHU</span></span>
                <span id="carrier-price" class="d-block font-weight-bolder text-dark"></span>
            </label>

            <label class="mb-3 btn p-2 border bg-white btn-sm" data-id="ambro_express">
                <input type="radio" name="service" id="radioButton2" autocomplete="off" value="ambro_express" <?php if ($service == 'ambro_express') echo ' checked'; ?>>
                <span class="bg-secondary px-3 py-0 d-block text-dark mb-1 lh-130 rounded">Ambro
                    <span class="d-block font-weight-light">Express</span></span>
                <span id="carrier-price" class="d-block font-weight-bolder text-dark"></span>
            </label>



        </div>
    </div>
</div>

<div class="all-prices" id="pallet-price" style="display: none;">

    <div class="form-group text-left mt-5 mb-5 prices">
        <label class="form-control-label d-block font-weight-bold">Wycena (z VAT)</label>
        <div class="d-flex justify-content-center btn-group-toggle" data-toggle="buttons">
            <label class="btn p-2 border bg-white" data-id="ambro_express">
                <input type="radio" name="service" id="radioButton2" autocomplete="off" value="ambro_express" <?php if ($service == 'ambro_express') echo ' checked'; ?>>
                <span class="bg-secondary px-4 py-2 d-block text-dark mb-1">Ambro Express</span>
                <span id="carrier-price" class="d-block font-weight-bolder text-dark"></span>
            </label>

            <label class="btn p-2 border bg-white" data-id="dpd">
                <input type="radio" name="service" id="radioButton2" autocomplete="off" value="dpd" <?php if ($service == 'dpd') echo ' checked'; ?>>
                <span class="bg-danger px-5 py-2 d-block text-white mb-1">DPD</span>
                <span id="carrier-price" class="d-block font-weight-bolder text-dark"></span>
            </label>

            <label class="btn p-2 border bg-white" data-id="hellmann">
                <input type="radio" name="service" id="radioButton2" autocomplete="off" value="hellmann" <?php if ($service == 'hellmann') echo ' checked'; ?>>
                <span class="bg-dark-danger px-4 py-2 d-block text-white mb-1">Hellmann</span>
                <span id="carrier-price" class="d-block font-weight-bolder text-dark"></span>
            </label>

            <label class="btn p-2 border bg-white" data-id="rohlig_suus">
                <input type="radio" name="service" id="radioButton2" autocomplete="off" value="rohlig_suus" <?php if ($service == 'rohlig_suus') echo ' checked'; ?>>
                <span class="bg-light-primary px-4 py-2 d-block text-white mb-1">Rohlig Suus</span>
                <span id="carrier-price" class="d-block font-weight-bolder text-dark"></span>
            </label>

            <label class="btn p-2 border bg-white" data-id="schenker">
                <input type="radio" name="service" id="radioButton2" autocomplete="off" value="schenker" <?php if ($service == 'schenker') echo ' checked'; ?>>
                <span class="bg-light-danger px-4 py-2 d-block text-white mb-1">Schenker</span>
                <span id="carrier-price" class="d-block font-weight-bolder text-dark"></span>
            </label>


        </div>
    </div>
</div>

<div class="all-prices" id="contaner-price" style="display: none;">

    <div class="form-group text-left mt-5 mb-5 prices">

        <div class="d-flex justify-content-center btn-group-toggle" data-toggle="buttons">

            <label class="btn p-2 border bg-white">
                <input type="radio" name="service" id="radioButton2" autocomplete="off" value="Hellmann">
                <span class="bg-dark-danger px-5 py-2 d-block text-white mb-1">Hellmann</span>
                <span class="d-block font-weight-normal text-dark">Zapytaj o wycenę</span>
            </label>

            <label class="btn p-2 border bg-white">
                <input type="radio" name="service" id="radioButton2" autocomplete="off" value="Rohlig Suus">
                <span class="bg-warning px-5 py-2 d-block text-dark mb-1">Rohlig Suus</span>
                <span class="d-block font-weight-normal text-dark">Zapytaj o wycenę</span>
            </label>

            <label class="btn p-2 border bg-white">
                <input type="radio" name="service" id="radioButton2" autocomplete="off" value="Schenker">
                <span class="bg-dark px-5 py-2 d-block text-white mb-1">Schenker</span>
                <span class="d-block font-weight-normal text-dark">Zapytaj o wycenę</span>
            </label>





        </div>
    </div>
</div>

<div class="all-prices" id="atypical-price" style="display: none;">

    <div class="text-center py-4">Przesyłki nietypowe obsługiwane są przez serwisy <b>Packbook
            Wymieniać się</b> oraz <b>Clicktrans</b>. <br>Wystaw zlecenie i otrzymaj indywidualne oferty od
        najlepszych Przewoźników.</div>
</div>

<input type="hidden" id="total_cost" name="total_cost" value="0">