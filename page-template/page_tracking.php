<?php
/*
Template Name: _tracking
*/


get_header();
?>
<style>
    .checkpoint.svelte-11xb61l:after {
        position: absolute;
        display: block;
        width: 2px;
        top: 0px;
        bottom: 0px;
        left: 9px;
        content: "";
        border-left: 2px dotted#CCC;
        z-index: 1
    }

    .checkpoint.svelte-11xb61l:first-of-type:after {
        height: calc(100% - 1rem);
        top: inherit
    }

    .checkpoint.svelte-11xb61l:last-of-type:after {
        height: 1rem;
        bottom: inherit
    }

    .checkpoint__icon.svelte-11xb61l {
        position: absolute;
        left: 0px;
        width: 21px;
        height: 21px;
        font-size: 21px;
        border-radius: 50%;
        background: white;
        z-index: 5
    }

    .checkpoint__detail.svelte-11xb61l {
        margin-left: 30px
    }
</style>
<section class="packbook-booking py-5" style="background:linear-gradient(to top,#edf2f7,#f9fcff);">

    <div class="container">

        <h2 class="text-center mb-5 font-weight-normal">Śledzenie paczek</h2>

        <form id="booking-form" action="" method="POST" autocomplete="off">

            <div class="row justify-content-center">
                <div class="col-12 col-md-6">
                    <div class="input-group mb-4">

                        <input type="text" class="form-control" id="input-email" name="insurance" placeholder="Wprowadź numer śledzenia" value="">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-warning btn-icon">
                                <span class="btn-inner--icon">
                                    <i class="fas fa-search"></i>
                                </span>
                                <span class="btn-inner--text">Szukaj</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <div class="row pt-5">

            <div class="col-md-4">

                <ul class="list-unstyled position-relative">
                    <h5 class="mb-0 ml-4 h6 font-weight-normal"><span class="font-weight-bold">Trancking</span> - FZ1RwCWiIi66cBOt <span class="badge badge-sm dpd">DPD</span></h5>
                    <li class="relative flex py-3 checkpoint text-sm svelte-11xb61l">
                        <div class="flex-shrink-0 checkpoint__icon svelte-11xb61l">
                            <div class="absolute z-10">

                                <i class="far fa-check-circle checkpoint__icon svelte-11xb61l text-success"></i>
                            </div>
                        </div>
                        <div class="checkpoint__detail flex-grow flex flex-col svelte-11xb61l">
                            <div class="block">
                                <div class="block">
                                    <div class="inline-block">
                                        <div class="svelte-jc2gcs">
                                            <p class="text-dark mb-0 font-weight-normal small">Mar 21 2021 05:05 pm</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="inline font-weight-bold">Pickup Parcel </div>
                            </div>
                            <div class="font-weight-normal small">Warszawa - Poland</div>
                        </div>
                    </li>
                    <li class="relative flex py-3 checkpoint text-sm svelte-11xb61l">
                        <div class="flex-shrink-0 checkpoint__icon svelte-11xb61l">
                            <div class="absolute z-10">
                                <i class="far fa-clock checkpoint__icon svelte-11xb61l text-success"></i>
                            </div>
                        </div>
                        <div class="checkpoint__detail flex-grow flex flex-col svelte-11xb61l">
                            <div class="block">
                                <div class="block">
                                    <div class="inline-block">
                                        <div class="svelte-jc2gcs">
                                            <p class="text-dark mb-0 font-weight-normal small">Mar 21 2021 04:23 pm</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="inline font-weight-bold">Confirm Ordering</div>
                            </div>
                            <div class="font-weight-normal small">Warszawa - Poland</div>
                        </div>
                    </li>

                </ul>

            </div>

        </div>



    </div>

</section>

<section class="packbook-booking py-5">

    <div class="container">
        <h3>Pomoc w śledzeniu przesyłek</h3>
        <h6>Przygotowaliśmy odpowiedzi na pytania związane ze śledzeniem przesyłek i tematami pokrewnymi.</h6>
    </div>
</section>
<?php

get_footer();

?>