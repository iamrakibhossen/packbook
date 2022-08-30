<?php
/*
Template Name: _payment
*/

if (!is_user_logged_in()) {
    wp_redirect(home_url('/login/?redirect_to=' . home_url('/payment/')));
    exit;
}



if (empty($_POST['payment_gross'])) {
    wp_redirect(home_url('/dashboard/balance/'));
    exit;
}

$payment_gross = pb_price($_POST['payment_gross']);

get_header();
?>


<?php
$stripeConfigData = configItemData('payments.gateway_configuration.stripe');
$currency = $stripeConfigData['currency'];
$currencySymbol = $stripeConfigData['currencySymbol'];
$testMode = $stripeConfigData['testMode'];
$stripeTestingPublishKey = $stripeConfigData['stripeTestingPublishKey'];
$stripeLivePublishKey = $stripeConfigData['stripeLivePublishKey'];
$enable = $stripeConfigData['enable'];
$currency = configItemData('payments.gateway_configuration.paypal.currency');
$currencySymbol = configItemData('payments.gateway_configuration.paypal.currencySymbol');
?>


<style>
    .lw-validation-message {
        color: red;
    }

    .lw-show-till-loading {
        display: none;
    }

    .lw-page-loader {
        position: fixed;
        width: 100%;
        height: 100vh;
        left: 0;
        top: 0;
        z-index: 99;
        background: rgba(0, 0, 0, .5);
    }

    .lw-page-loader .spinner-border {
        position: absolute;
        left: 50%;
        top: 50%;
    }

    fieldset.lw-fieldset {
        border: 2px solid #e1e1e1;
        padding: 0 1.4em 1.4em 1.4em;
        border-radius: 4px;
        /* width:300px; */
        width: 100%;
    }

    .form-check-inline {
        width: 46%;
    }

    .form-check-label {
        width: 100%;
    }

    .lw-fieldset-legend-font {
        font-size: 14px;
        margin-bottom: 20px;
        /* height: 10px; */
        line-height: 10px;
        border-bottom: none;
        width: auto;
        border: 0;
        padding: 0 10px;
    }

    .lw-payment-gateway-icon,
    .lw-payment-gateway-icon-small {
        max-height: 50px;
        max-width: 100%;
        height: 48px;
        width: auto;
        display: block;
        margin: 0 auto;
    }

    .lw-logo-container {
        text-align: center;
        margin-bottom: 20px;
    }

    .lw-logo {
        /* max-height: 100px; */
        max-width: 100%;
    }

    .lw-logo-section {
        margin-top: 180px;
        text-align: center;
    }

    @media screen and (max-width: 767px) {
        .form-check-inline {
            width: 100%;
        }

        .lw-logo-section {
            margin-top: 0;
            margin-bottom: 50px;
        }
    }
</style>
<section>

    <!-- Show loader when process payment request -->
    <div class="d-flex justify-content-center">
        <div class="lw-page-loader lw-show-till-loading">
            <div class="spinner-border" role="status"></div>
        </div>
    </div>
    <!-- Show loader when process payment request -->

    <div class="pt-4 mb-5 container" id="lwCheckoutForm">
        <div class="row align-items-center justify-content-center">

            <!-- col-md-8 -->
            <div class="col-md-5 py-5 pr-md-0">
                <!-- payment gateway start -->
                <form method="post" id="lwPaymentForm">
                    <div class="card bg-white rounded-0">
                        <!-- Payment Page header -->
                        <div class="card-header">
                            <h3 class="text-center">Dokończ płatność</h3>
                        </div>
                        <!-- /Payment Page header -->
                        <div class="card-body">

                            <!-- Info Message -->
                            <!-- show validation message block -->
                            <div id="lwValidationMessage" class="lw-validation-message"></div>
                            <!-- / show validation message block -->

                            <?php
                            // Get config data
                            $configData = configItem();
                            $userDetails = [
                                'amounts' => [ // at least one currency amount is required
                                    'PLN'   => $payment_gross,
                                ],
                                'order_id'      => 'ORDS' . uniqid(), // required in instamojo, Iyzico, Paypal, Paytm gateways
                                'customer_id'   => $user_ID, // required in Iyzico, Paytm gateways
                                'item_name'     => 'Topup Balance', // required in Paypal gateways
                                'item_id'       => 'ITEM' . uniqid(), // required in Iyzico, Paytm gateways
                                'item_qty'      => 1,
                                'payer_email'   => get_the_author_meta('user_email', $user_ID), // required in instamojo, Iyzico, Stripe gateways
                                'payer_name'    => ucfirst(get_the_author_meta('display_name', $user_ID)), // required in instamojo, Iyzico gateways
                                'payer_mobile' => get_the_author_meta('user_phone', $user_ID),
                                'description'   => 'Add money for buying package at Packbook', // Required for stripe
                                'ip_address'    => getUserIpAddr(), // required only for iyzico 
                                'address'       => get_the_author_meta('user_street', $user_ID), // required in Iyzico gateways
                                'city'          => get_the_author_meta('user_city', $user_ID),  // required in Iyzico gateways
                                'country'       => countryName(get_the_author_meta('user_country', $user_ID)) // required in Iyzico gateways
                            ];
                            ?>

                            <?php
                            if (!$configData) {
                                echo '<div class="alert alert-warning text-center">Unable to load configuration.</div>';
                            } else {
                                $configItem = $configData['payments']['gateway_configuration'];

                                $configItem = array_reverse($configItem);


                                $configItem['p24']  =  $configItem['stripe'];

                                $configItem['googlepay']  =  $configItem['stripe'];


                                //show payment gateway radio button
                                foreach ($configItem as $key => $value) {

                                    $img = $key;

                                    if ($key == 'p24') {
                                        $key = 'stripe';
                                    } else if ($key == 'googlepay') {
                                        $key = 'stripe';
                                    }

                                    if ($value['enable'] and in_array($key, ['paypal', 'stripe'])) { ?>
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label" for="paymentOption-<?= $img ?>">
                                                <fieldset class="lw-fieldset mr-3 mb-3">
                                                    <legend class="lw-fieldset-legend-font">
                                                        <input class="form-check-input" type="radio" required="true" id="paymentOption-<?= $img ?>" name="paymentOption" value="<?= $key ?>" <?php if ($img == 'stripe') {
                                                                                                                                                                                                    echo 'checked';
                                                                                                                                                                                                }; ?>>

                                                    </legend>
                                                    <img class="lw-payment-gateway-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/payment-images/<?= $img ?>.jpg">
                                                </fieldset>
                                            </label>
                                        </div>
                                <?php  }
                                } ?>
                                <h3 id="lwPaymentAmount" class="text-center">

                                    <hr><?php echo $userDetails['amounts']['PLN']; ?> <?php echo $currency; ?>
                                    <hr />

                                </h3>
                                <!--  checkout form submit button -->
                                <button type="submit" value="Proceed to Pay" class="btn btn-lg btn-block btn-success">Przejdź do płatności</button>
                                <!-- / checkout form submit button -->
                            <?php   } ?>
                        </div>
                    </div>
                </form>
                <!-- /payment gateway end -->
            </div>

        </div>
    </div>
</section>
<!-- get configuration data -->

<!-- / get configuration data -->
<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript">
    var userDetails = <?= json_encode($userDetails) ?>;
    $('input[name=paymentOption]').change(function() {
        var gatewayCurrency = "<?= $currency ?>",
            currencySymbol = "<?= $currencySymbol ?>",
            formattedAmount = '<hr>' + userDetails['amounts'][gatewayCurrency] + ' ' + gatewayCurrency + '<hr>';
        $('#lwPaymentAmount').html(formattedAmount);
    });
</script>

<!-- Jquery Form submit in script tag -->
<script type="text/javascript">
    $(document).ready(function() {
        //submit checkout form
        $('#lwPaymentForm').on('submit', function(e) {

            e.preventDefault();
            var paymentOption = $('input[name=paymentOption]:checked').val(),
                testMode = "<?= $testMode ?>",
                stripePublishKey = '';
            $(".lw-show-till-loading").show();
            // Check stripe test or production mode
            if (testMode) {
                stripePublishKey = "<?= $stripeTestingPublishKey ?>";
            } else {
                stripePublishKey = "<?= $stripeLivePublishKey ?>";
            }

            userDetails['paymentOption'] = paymentOption;

            // Stripe script for send ajax request to server side start
            if (paymentOption == 'stripe') {
                $.ajax({
                    type: 'post', //form method
                    context: this,
                    url: '<?php echo home_url("/payment/process/"); ?>', // post data url
                    dataType: "JSON",
                    data: userDetails, // form serialize data
                    error: function(err) {
                        var error = err.responseText
                        string = '';
                        console.log(err);
                        //on error show alert message
                        string += '<div class="alert alert-danger" role="alert">' + err.responseText + '</div>';

                        $('#lwValidationMessage').html(string);
                        //alert("AJAX error in request: " + JSON.stringify(err.responseText, null, 2));

                        //hide loader after ajax request complete
                        $(".lw-show-till-loading").hide();
                    },
                    success: function(response) {

                        var stripe = Stripe(stripePublishKey);
                        stripe.redirectToCheckout({
                            // Make the id field from the Checkout Session creation API response
                            // available to this file, so you can provide it as parameter here
                            // instead of the {{CHECKOUT_SESSION_ID}} placeholder.
                            sessionId: response.id,
                        }).then(function(result) {
                            // If `redirectToCheckout` fails due to a browser or network
                            // error, display the localized error message to your customer
                            // using `result.error.message`.
                            var string = '';
                            //on error show alert message
                            string += '<div class="alert alert-danger" role="alert">' + result.error.message + '</div>';

                            $('#lwValidationMessage').html(string);
                        });

                    }
                });
            } else if (paymentOption == 'paypal') {

                //show loader before ajax request
                $(".lw-show-till-loading").show();

                //send ajax request with form data to server side processing
                $.ajax({
                    type: 'post', //form method
                    context: this,
                    url: '<?php echo home_url("/payment/process/"); ?>', // post data url
                    dataType: "JSON",
                    data: $('#lwPaymentForm').serialize() + '&' + $.param(JSON.parse('<?php echo json_encode($userDetails) ?>')), // form serialize data
                    error: function(err) {
                        var error = err.responseText;

                        //on error show alert message
                        alert("AJAX error in request: " + JSON.stringify(err.responseText, null, 2));
                        //hide loader after ajax request complete
                        $(".lw-show-till-loading").hide();
                    },
                    success: function(response) {
                        console.log()
                        //check server side validation
                        if (typeof(response.validationMessage)) {

                            var messageData = [];
                            var string = '';

                            $.each(response.validationMessage, function(index, value) {
                                messageData = value;
                                string += '<div>' + messageData + '</div>';
                            });

                            $('#lwValidationMessage').html(string);

                            //hide loader after ajax request complete
                            $(".lw-show-till-loading").hide();
                        }

                        //paypal response
                        if (response.paymentOption == "paypal") {
                            //on success load paypalUrl page
                            window.location.href = response.paypalUrl;
                        }
                    }
                });
            }
            // Stripe script for send ajax request to server side end

        });
    });
</script>
<!-- /  Jquery Form submit in script tag -->

<?php
if ($stripeConfigData['enable']) { ?>
    <!-- load stripe inline widget script -->

    <script type="text/javascript" src="https://js.stripe.com/v3"></script>
    <!-- load stripe inline widget script -->
<?php } ?>
<?php get_footer(); ?>