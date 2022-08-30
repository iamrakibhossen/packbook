<?php

/**
 * @package Packbook
 * @subpackage Index Page Template
 * 
 * @author Rakib Hossen <contact@iamrakib.com>
 * @var 1.0.0
 * @since 1.0.0
 */

get_header();

?>
<style>
    .btn-group-sm>.btn,
    .btn-sm {
        padding: .5rem 0.8rem;
    }
</style>
<section class="packbook-booking py-5" style="background:linear-gradient(to top,#edf2f7,#f9fcff);">
    <h2 class="text-center mb-5 font-weight-normal">Wyceń i wyślij przesyłkę</h2>
    <div class="container-fluid px-lg-5">
        <div class="row align-items-center">

            <div class="col-md-12 py-3">


                <form id="booking-form" action="<?php echo home_url('/dashboard/add-package/'); ?>" method="POST" autocomplete="off">

                    <?php get_template_part('template-parts/booking'); ?>
                    <input type="hidden" name="nonce" id="nonce" value="<?php echo wp_create_nonce('add-package'); ?>" />
                    <div class="mt-5 text-center"><button type="submit" class="btn text-dark bg-dark-warning btn-sm active">
                            Dodaj przesyłkę

                        </button></div>

                </form>
            </div>
        </div>
    </div>

    <div class="apps-icon text-center py-5 mt-5">
            <div class="d-inline mr-5">
                <a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/ios.png" class="img-fluid" alt=""></a>
            </div>
            <div class="d-inline">
                <a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/android.png" class="img-fluid" alt=""></a>
            </div>
        </div>
</section>

<section class="delivery-agency-logo extra-ag">
    <div class="container-fluid">
        <div class="delivery-agency-logo-list content-section text-center border-bottom border-top">
            <ul class="list-inline pt-3">
                <li class="list-inline-item logos-wrap"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/image24.png" class="img-fluid" alt=""></li>
                <li class="list-inline-item logos-wrap"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/image13.png" class="img-fluid" alt=""></li>
                <li class="list-inline-item logos-wrap"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/image16.png" class="img-fluid" alt=""></li>
                <li class="list-inline-item logos-wrap"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/image18.png" class="img-fluid" alt=""></li>
                <li class="list-inline-item logos-wrap"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/image12.jpg" class="img-fluid" alt=""></li>
                <li class="list-inline-item logos-wrap"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/image6.png" class="img-fluid" alt=""></li>
                <li class="list-inline-item logos-wrap"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/image7.png" class="img-fluid" alt=""></li>
                <li class="list-inline-item logos-wrap"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/image14.png" class="img-fluid" alt=""></li>
                <li class="list-inline-item logos-wrap"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/image15.png" class="img-fluid" alt=""></li>
                <li class="list-inline-item logos-wrap"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/image30.png" class="img-fluid" alt=""></li>
                <li class="list-inline-item logos-wrap"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/image29.png" class="img-fluid" alt=""></li>
                <li class="list-inline-item logos-wrap"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/image8.png" class="img-fluid" alt=""></li>
                <li class="list-inline-item logos-wrap"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/image11.png" class="img-fluid" alt=""></li>
                <li class="list-inline-item logos-wrap"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/image9.png" class="img-fluid" alt=""></li>
            </ul>
        </div>
    </div>
</section>
<section class="prowadzisz-sklep py-5">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-5 ml-auto">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/image5.png" class="img-fluid" alt="">
            </div>
            <div class="col-md-6 mt-3 mt-md-0">
                <h4 class="font-weight-bolder">Prowadzisz sklep internetowy ?</h4>
                <p>Poznaj nasze rozwiązania dla branży <strong>e-commerce</strong></p>
                <p>Poznaj nasz cennik i płać do <strong>70%</strong> mniej za przesyłki!</p>
                <p>Gwarantujemy pełną opiekę handlową oraz pomoc w przypadku reklamacji.</p>
                <p>Do tego otrzymujesz od nas dostęp do darmowego i prostego w obsłudze panelu klienta <br> oraz możliwość wzięcia udziału w kilku różnych programach partnerskich.</p>
                <div class="row">
                    <div class="col-lg-10 mt-5">
                        <div class="card hover-shadow-lg hover-translate-y-n3 bg-sklep-card mr-5 py-4">
                            <div class="card-body py-5 text-center h-100 ">
                                <h3 class="csm-card-text h4 text-white">3 RANDOM ARTICLES (TITLES WITH LINKS) FROM “BLOG” PAGE</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="bg-two-block py-4">
    <div class="container-fluid">
        <div class="row justify-content-center py-4">
            <div class="col-md-3">
                <h4 class="font-weight-bolder text-white text-center">Packbook wspiera małe, średnie i duże przedsiębiorstwa w automatyzacji procesów logistycznych. Dzięki nam przesyłki kurierskie w Twojej firmie staną się o wiele tańsze.</h4>
            </div>
        </div>
    </div>
</section>
<section class="home-two-block py-5">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="card hover-shadow-lg hover-translate-y-n3 mr-5 border-0 shadow-none">
                    <div class="card-body py-5 text-center h-100">
                        <h4 class="font-weight-bolder"></h4>
                        <p class="font-weight-bold">Przeczytaj nasz poradnik i zapoznaj się z listą towarów zabronionych.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card hover-shadow-lg hover-translate-y-n3 bg-sklep-card mr-5">
                    <div class="card-body py-5 text-center h-100">
                        <p class="font-weight-bold text-white">Sprawdź, jak najłatwiej nadać przesyłkę do poszczególnych krajów spoza Unii Europejskiej.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card hover-shadow-lg hover-translate-y-n3 mr-5 border-0 shadow-none">
                    <div class="card-body py-5 text-center h-100">
                        <p class="font-weight-bold">Dowiedz się, jak spakować poszczególne elementy niestandardowe, takie jak na przykład szkło, czy elektronikę.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="solutions-block py-3">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-5 ml-auto">
                <h4 class="font-weight-bolder">Rozwiązania</h4>
                <p>Z <strong>Packbookiem</strong> w prosty sposób zaimportujesz zamówienia z największych i najpopularniejszych platform sklepowych i handlowych w jedno miejsce.</p>
                <p>Dzięki naszym rozwiązaniom możesz automatycznie kontrolować stan zamówień, generować i drukować dokumenty przewozowe oraz zlecać odbiór paczek i ładunków.</p>
                <a href="#" class="btn rounded btn-solutions px-5 mt-4">KONTAKT</a>
            </div>
            <div class="col-md-6 mt-3 mt-md-0">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/solutions.png" class="img-fluid float-right" alt="">
            </div>
        </div>
    </div>
</section>
<section class="delivery-agency-logo extra-ag">
    <div class="container-fluid">
        <div class="delivery-agency-logo-list content-section text-center border-bottom border-top">
            <ul class="list-inline pt-3">
                <li class="list-inline-item logos-wrap "><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/image31.png" class="img-fluid" alt=""></li>
                <li class="list-inline-item logos-wrap"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/image32.png" class="img-fluid" alt=""></li>
                <li class="list-inline-item logos-wrap"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/image33.png" class="img-fluid" alt=""></li>
                <li class="list-inline-item logos-wrap"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/image34.png" class="img-fluid" alt=""></li>
                <li class="list-inline-item logos-wrap"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/image35.png" class="img-fluid" alt=""></li>
                <li class="list-inline-item logos-wrap"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/image36.png" class="img-fluid" alt=""></li>
                <li class="list-inline-item logos-wrap"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/image37a.png" class="img-fluid" alt=""></li>
                <li class="list-inline-item logos-wrap"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/image38.png" class="img-fluid" alt=""></li>
                <li class="list-inline-item logos-wrap"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/image39.png" class="img-fluid" alt=""></li>
                <li class="list-inline-item logos-wrap"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/image40.png" class="img-fluid" alt=""></li>
            </ul>
        </div>
    </div>
</section>
<section class="prowadzisz-sklep py-5">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-4 ml-auto">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/image19.png" class="img-fluid" alt="">
            </div>
            <div class="col-md-7 mt-3 mt-md-0">
                <h4 class="font-weight-bolder">Integracja</h4>
                <p>Kurier w sklepie internetowym jest najbardziej pożądaną formą dostawy zakupów zrobionych przez Internet. Według raportu „ <br> E-commerce w Polsce 2019” od Gemius, aż 71% klientów wskazują obecność przesyłki <br> kurierskiej jako najbardziej zachęcającą do finalizacji transakcji.</p>
                <p>Wybierz najbardziej dopasowaną do Twoich potrzeb integrację z kurierem, sklepem internetowym lub platformą handlową i <br> ciesz się szerokim gronem zadowolonych klientów!</p>
                <div class="row">
                    <div class="col-md-5 mt-5">
                        <div class="card hover-shadow-lg hover-translate-y-n3 bg-sklep-card mr-5 py-4">
                            <div class="card-body py-5 text-center h-100">
                                <h4 class="csm-card-text font-weight-bolder text-white">3 RANDOM ARTICLES (TITLES WITH LINKS) FROM “BLOG” PAGE</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="bg-two-block py-4">
    <div class="container-fluid">
        <div class="row justify-content-center py-4">
            <div class="col-md-3">
                <h4 class="font-weight-bolder text-white text-center">Korzystaj z usług Packbooka i Packboxa <br> i zbieraj punkty cashback</h4>
            </div>
        </div>
    </div>
</section>
<section class="shopping-block py-5">
    <div class="container-fluid">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-3">
                <div class="card hover-shadow-lg hover-translate-y-n3 mr-5 border-0 shadow-none">
                    <div class="card-body py-5 h-100">
                        <h4 class="font-weight-bolder text-center">SHOPPING POINTS</h4>
                        <p class="font-weight-bold">Przy każdym zakupie zbierasz także Shopping Points Odkryj niezwykłe korzyści i promocjeZrealizuj swoje Shopping Points i zapewnij sobie oszczędności</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 text-center mr-3">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/image23.png" class="img-fluid" alt="">
                <h4 class="text-shopping-middle font-weight-bolder pt-5">Wymieniaj punkty cashback na zakupy w tysiącach sklepów na całym świecie! Napisz do nas, a wyślemy Ci zaproszenie do programu i umożliwimy pobranie aplikacji.</h4>
            </div>
            <div class="col-md-3">
                <div class="card hover-shadow-lg hover-translate-y-n3 bg-sklep-card mr-5 py-2">
                    <div class="card-body py-5 h-100">
                        <h4 class="csm-card-text font-weight-bolder text-white text-center">CASHBACK</h4>
                        <p class="font-weight-bold text-white">Do 5% sumy zakupów wraca do Ciebie z powrotem Wykorzystaj zebrany cashback, aby ponownie zrobić zakupy Opcjonalna wypłata zgromadzonej kwoty od 22,50 PLN</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="apps-icon text-center pt-4">
            <div class="d-inline mr-3">
                <a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/ios.png" class="img-fluid" alt=""></a>
            </div>
            <div class="d-inline">
                <a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/android.png" class="img-fluid" alt=""></a>
            </div>
        </div>
    </div>
</section>
<section class="solutions-block py-4">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-5 ml-auto">
                <h4 class="font-weight-bolder">Nowa jakość w logistyce</h4>
                <h4>Nasze rozwiązania technologiczne wspierają branżę logistyczną oraz pozwalają na sprawne zarządzanie wysyłkami.</h4>
                <h4 class="font-weight-bolder">Tylko z nami nadasz przesyłkę, dokumenty, palety, kontener oraz zamówisz pełen, dedykowany transport.</h4>
                <h4 class="font-weight-bolder">Chcesz usprawnić logistykę w Twojej firmie? Opowiedz nam o swoich potrzebach, a przygotujemy dla Ciebie ofertę indywidualną!</h4>
                <a href="#" class="btn rounded btn-solutions px-5 mt-4">KONTAKT</a>
            </div>
            <div class="col-md-6 mt-3 mt-md-0">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/image25.png" class="img-fluid float-right" alt="">
            </div>
        </div>
    </div>
</section>
<section class="prowadzisz-sklep py-5">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-5 ml-auto">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/image37.png" class="img-fluid" alt="">
            </div>
            <div class="col-md-6 mt-3 mt-md-0 mr-5">
                <h4 class="font-weight-bolder">Packbox – pierwszy na polskim rynku otwarty automat do nadań i odbiorów paczek</h4>
                <p>Rozpoczynamy pracę nad siecią otwartych automatów paczkowych 24/7 obsługiwanych przez współpracujące z nami firmy kurierskie, sieci handlowe, sklepy internetowe, samorządy, urzędy oraz wspólnoty mieszkaniowe. Nasza strategia rozwoju obejmuje kilka krajów w Unii Europejskiej – dzięki sieci Packbox w prosty, tani i bezpieczny sposób nadasz i odbierzesz swoje przesyłki z wielu miejsc w kilku krajach w Europie.</p>
            </div>
        </div>
        <div class="text-center py-5">
            <h4 class="font-weight-bolder">Zgłoś się do nas, jeśli:</h4>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-2">
                <div class="card hover-shadow-lg hover-translate-y-n3 bg-sklep-card">
                    <div class="card-body py-5 text-center h-100">
                        <h4 class="font-weight-bolder text-white">Chcesz zainwestować w projekt</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card hover-shadow-lg hover-translate-y-n3 bg-sklep-card">
                    <div class="card-body py-5 text-center h-100">
                        <h4 class="font-weight-bolder text-white">Masz lokalizację pod Packboxa</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card hover-shadow-lg hover-translate-y-n3 bg-sklep-card">
                    <div class="card-body py-5 text-center h-100">
                        <h4 class="font-weight-bolder text-white">Jesteś operatorem kurierskim lub</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card hover-shadow-lg hover-translate-y-n3 bg-sklep-card">
                    <div class="card-body py-5 text-center h-100">
                        <h4 class="font-weight-bolder text-white">Jesteś producentem maszyn</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="prowadzisz-sklep py-5">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-4 ml-auto">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/image26.png" class="img-fluid" alt="">
            </div>
            <div class="col-md-7 mt-3 mt-md-0 mr-5">
                <h4 class="font-weight-bolder">Jak działamy?</h4>
                <p>Na polskim rynku działamy od lipca 2020 roku. Nasz serwis Packbook pozwala firmom na szybkie i tanie nadawanie przesyłek kurierskich. Oferujemy najwyższej jakości <br> usługi w konkurencyjnych cenach oraz udostępniamy całą gamę nowoczesnych narzędzi automatyzujących procesy logistyczne.</p>
                <p>Wkrótce uruchomimy dla naszych klientów platformę <strong>Packbook Exchange</strong>, która łączy ze sobą osoby szukające transportu dla dużych, niestandardowych <br> przesyłek z profesjonalnymi i sprawdzonymi firmami transportowymi. Naszym celem jest skupienie wokół siebie jak największej ilości przewoźników <br> i udostępnienie naszym klientom możliwości znalezienia taniego transportu dla takich nietypowych ładunków jak meble, pojazdy, czy maszyny.</p>
                <div class="row pt-5">
                    <div class="col-md-4">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/exchange.png" class="img-fluid" alt="">
                    </div>
                    <div class="col-md-4 ml-auto">
                        <div class="apps-icons">
                            <div class="d-block mr-md-2">
                                <a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/ios.png" class="img-fluid" alt=""></a>
                            </div>
                            <div class="d-block mt-2">
                                <a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/android.png" class="img-fluid" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="solutions-block py-4">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-5 ml-auto">
                <h4 class="font-weight-bolder">Zaoszczędzimy twój czas, pieniądze i wysiłek</h4>
                <p>Skontaktuj się z nami już dziś!</p>
                <a href="#" class="btn rounded btn-solutions px-5 mt-4">KONTAKT</a>
            </div>
            <div class="col-md-6 mt-3 mt-md-0">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/image27.png" class="img-fluid float-right" alt="">
            </div>
        </div>
    </div>
</section>

<?php get_template_part('template-parts/contact-form'); ?>
<?php

get_footer();

?>