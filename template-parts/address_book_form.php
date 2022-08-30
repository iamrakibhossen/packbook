<?php

global $address_book;

$post_id = empty($_GET['id']) ? 0 : intval($_GET['id']);

$data = $address_book->get($post_id);

extract($data);


?>
<style>
    label.error {
        color: red;
        margin: 4px 0
    }
</style>
<section class="dashboard mt-4">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-10 col-lg-10">

                <div class="row mb-3">

                    <div class="col-12">

                        <h1 class="py-3 font-weight-bold h5 mb-4">
                            <span class="icon icon-shape rounded-circle bg-success shadow-success text-white mr-3">
                                <i class="fas fa-wallet"></i>

                            </span>

                            <?php _e('Książka adresowa', 'packbook'); ?>

                        </h1>

                    </div>

                    <div class="col-md-12">

                        <form id="address-book" action="" method="POST" autocomplete="off">
                            <div class="w-75">

                                <div class="form-group row justify-content-end fv-plugins-icon-container">
                                    <label for="sender_name" class="col-sm-4 col-form-label">Pełne imię i nazwisko</label>
                                    <div class="col-sm-8">
                                        <input id="sender_name" name="sender_name" type="text" value="<?php echo sanitize_text_field($sender_name); ?>" class="form-control form-control-sm" required>

                                    </div>
                                </div>
                                <div class="form-group row justify-content-end">
                                    <label for="sender_company" class="col-sm-4 col-form-label">Firma</label>
                                    <div class="col-sm-8">
                                        <input id="sender_company" name="sender_company" type="text" value="<?php echo sanitize_text_field($sender_company); ?>" class="form-control form-control-sm">
                                    </div>
                                </div>
                                <div class="form-group row justify-content-end fv-plugins-icon-container">
                                    <label for="sender_country_code" class="col-sm-4 col-form-label">Kraj</label>
                                    <div class="col-sm-8">
                                        <?php country_lists('sender_country_code', 'custom-select custom-select-sm', $sender_country_code); ?>

                                    </div>
                                </div>
                                <div class="form-group row justify-content-start fv-plugins-icon-container">
                                    <label for="sender_postcode" class="col-sm-4 col-form-label">Kod pocztowy</label>
                                    <div class="col-sm-4">
                                        <input id="sender_postcode" name="sender_postcode" type="text" value="<?php echo sanitize_text_field($sender_postcode); ?>" class="form-control form-control-sm" required>

                                    </div>
                                </div>
                                <div class="form-group row justify-content-start fv-plugins-icon-container">
                                    <label for="sender_city" class="col-sm-4 col-form-label">Miasto</label>
                                    <div class="col-sm-8">
                                        <input id="sender_city" name="sender_city" type="text" value="<?php echo sanitize_text_field($sender_city); ?>" class="form-control form-control-sm" required>

                                    </div>
                                </div>
                                <div class="form-group row justify-content-end fv-plugins-icon-container">
                                    <label for="sender_street" class="col-sm-4 col-form-label">Ulica i numer</label>
                                    <div class="col-sm-8">
                                        <input id="sender_street" name="sender_street" type="text" value="<?php echo sanitize_text_field($sender_street); ?>" class="form-control form-control-sm" required>

                                    </div>
                                </div>
                                <div class="form-group row justify-content-end fv-plugins-icon-container">
                                    <label for="sender_email" class="col-sm-4 col-form-label">E-mail </label>
                                    <div class="col-sm-8">
                                        <input id="sender_email" name="sender_email" type="email" value="<?php echo sanitize_text_field($sender_email); ?>" class="form-control form-control-sm" required>

                                    </div>
                                </div>
                                <div class="form-group row justify-content-end fv-plugins-icon-container">
                                    <label for="sender_phone" class="col-sm-4 col-form-label">Telefon</label>
                                    <div class="col-sm-8">
                                        <input id="sender_phone" name="sender_phone" type="text" value="<?php echo sanitize_text_field($sender_phone); ?>" class="form-control form-control-sm input-mask" placeholder="" maxlength="12" data-mask="00000000000" required>

                                    </div>
                                </div>

                                <div class="form-group row justify-content-end fv-plugins-icon-container">

                                    <div class="col-sm-8">

                                        <input type="submit" class="btn btn-success btn-sm btn-block" value="Update">

                                    </div>
                                </div>

                                <input type="hidden" name="post_id" value="<?php echo $post_id;?>">

                            </div>
                        </form>
                        <script>
                            jQuery().ready(function() {
                                jQuery("#address-book").validate();
                            });
                        </script>

                    </div>

                </div>
                <div>


                </div>
            </div>
        </div>
    </div>
</section>