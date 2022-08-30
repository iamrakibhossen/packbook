<?php
/*
Template Name: _payment/cancel
*/

if (!is_user_logged_in()) {
    wp_redirect(home_url('/login/?redirect_to=' . home_url('/dashboard/balance/')));
    exit;
}

use Omnipay\Omnipay;

/*
$gateway = Omnipay::create('Stripe');
$gateway->setApiKey('sk_test_51I7IziHVXz7WEghvrNgCBKHyNueBnZ9UY6gAZLGAkJzJu7jPOh7hc0t9C8oZ3mq4cxslu3oHqEOr4JAEnMnqXhdS005PZPzku0');

$formData = array('number' => '4242424242424242', 'expiryMonth' => '6', 'expiryYear' => '2030', 'cvv' => '123');
$response = $gateway->purchase(array('amount' => '160.00', 'currency' => 'usd', 'card' => $formData))->send();

if ($response->isRedirect()) {
    // redirect to offsite payment gateway
    $response->redirect();
} elseif ($response->isSuccessful()) {
    // payment was successful: update database
    var_dump($response->getData());

} else {
    // payment failed: display message to customer
    echo $response->getMessage();
}


// Create a gateway for the PayPal RestGateway
$gateway = Omnipay::create('PayPal_Rest');

// Initialise the gateway
$gateway->initialize(array(
    'clientId' => '',
    'secret' => '',
    'testMode' => true, // Or false when you are ready for live transactions
));

$response = $gateway->purchase([
    'amount' => 10.00,
    'transactionId' => 12344,
    'currency' => 'USD',
    'cancelUrl' => home_url( '/dashboard/balance/' ),
    'returnUrl' => home_url('/dashboard/balance/'),
])->send();

if ($response->isRedirect()) {
    // redirect to offsite payment gateway
    $response->redirect();
} elseif ($response->isSuccessful()) {
    // payment was successful: update database
    var_dump($response->getData());
} else {
    // payment failed: display message to customer
    echo $response->getMessage();
}
*/

get_header();
?>

<section class="dashboard mt-4">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-5">
               


                <div>
                    
                    <div class="alert alert-danger" role="alert">
    <h5 class="alert-heading">Anuluj płatność</h5>
    <hr>
    <p>Zawsze, gdy zajdzie taka potrzeba, używaj narzędzi do obsługi marginesów, aby zachować porządek i ład.</p>
    <a href="<?php echo home_url('/');?>" class="btn btn-sm btn-secondary">Wrócić do domu</a>
</div>

                </div>
            </div>
        </div>
</section>

<?php get_footer(); ?>