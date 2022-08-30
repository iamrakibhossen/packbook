<section class="slice slice-lg" id="sct-form-contact">
    <div class="container position-relative zindex-100">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-6 text-center">
                <h3>Skontaktuj się z nami</h3>
                <p class="lh-190">Jeśli jest coś, w czym możemy Ci pomóc, daj nam znać. Z przyjemnością zaoferujemy Ci naszą pomoc</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-5">
                <div class="contact-left-head">
                    <h2>Kontakt</h2>
                    <div class="contact-address">
                        <i class="fas fa-map-marker-alt"></i>
                        <p>Polska, Wolsztyn, ul.Rożka 18, 64-200 Wolsztyn</p>
                    </div>
                    <div class="phone-number">
                        <i class="fas fa-phone"></i>
                        <p>+48 511 710 833</p>
                    </div>
                    <div class="email-info">
                        <i class="fas fa-envelope"></i>
                        <p>kontakt@packbook.pl</p>
                    </div>
                    <div class="office-time">
                        <i class="far fa-clock"></i>
                        <p>Mon - Sat: 9:00 - 18:00</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-7">


                <form id="form-contact" method="POST" action="<?php home_url('/contact/');?>">

                    <div class="form-group">
                        <input class="form-control form-control-lg" type="text" name="fullname" placeholder="Twoje imię" value="">
                    </div>

                    <div class="form-group">
                        <input class="form-control form-control-lg" type="email" name="email" placeholder="email@example.com" value="">
                    </div>

                    <div class="form-group"><textarea name="message" class="form-control form-control-lg" data-toggle="autosize" placeholder="Powiedz nam kilka słów ..." rows="3" style="overflow: hidden; overflow-wrap: break-word; resize: none; height: 106px;"></textarea>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-block btn-lg btn-primary mt-4">Wyślij wiadomość</button>
                    </div>

                    <input type="hidden" name="nonce" id="nonce" value="2a0b0058e7">

                </form>
            </div>
        </div>
    </div>
</section>