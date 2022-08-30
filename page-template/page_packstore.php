<?php
/*
Template Name: _packstore
*/


get_header();
?>

<section class="packstore-bg-banner bg-warning py-5 mb-7">
    <div class="container">
        <div class="about-logo-head text-center">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-grey.png" alt="" class="img-fluid w-25 p-3">
            <p class="text-white py-3 font-weight-normal h5">Z nami kupisz taniej kartony, palety i opakowania u najwiekszych producentow w <br />
                branzy. Wyposaz swoj magazyn lub zamow dedykowane produkty w Packstore</p>
        </div>
        <div class="delivery-agency-logo-list content-section text-center pt-4">
            <ul class="list-inline">
                <li class="list-inline-item logos-wrap mr-3"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/about-box01.png" class="img-fluid px-2"></li>
                <li class="list-inline-item logos-wrap mr-3"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/about-box02.png" class="img-fluid px-2"></li>
                <li class="list-inline-item logos-wrap mr-3"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/about-box03.png" class="img-fluid px-2"></li>
                <li class="list-inline-item logos-wrap mr-3"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/about-box04.png" class="img-fluid px-2"></li>
                <li class="list-inline-item logos-wrap mr-3"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/about-box05.png" class="img-fluid px-2"></li>
                <li class="list-inline-item logos-wrap mr-3"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/about-box06.png" class="img-fluid px-2"></li>
                <li class="list-inline-item logos-wrap mr-3"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/about-box07.png" class="img-fluid px-2"></li>
            </ul>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-3 mb-3 font-weight-bold">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active py-2" id="v-pills-list1-tab" data-toggle="pill" href="#v-pills-list1" role="tab" aria-controls="v-pills-list1" aria-selected="true">Kartony</a>
                    <a class="nav-link py-2" id="v-pills-list2-tab" data-toggle="pill" href="#v-pills-list2" role="tab" aria-controls="v-pills-list2" aria-selected="false">Tektura</a>
                    <a class="nav-link py-2" id="v-pills-list3-tab" data-toggle="pill" href="#v-pills-list3" role="tab" aria-controls="v-pills-list3" aria-selected="false">Tuby</a>
                    <a class="nav-link py-2" id="v-pills-list4-tab" data-toggle="pill" href="#v-pills-list4" role="tab" aria-controls="v-pills-list4" aria-selected="false">Torby papierowe</a>
                    <a class="nav-link py-2" id="v-pills-list5-tab" data-toggle="pill" href="#v-pills-list5" role="tab" aria-controls="v-pills-list5" aria-selected="false">Papier pakowy</a>
                    <a class="nav-link py-2" id="v-pills-list6-tab" data-toggle="pill" href="#v-pills-list6" role="tab" aria-controls="v-pills-list6" aria-selected="false">Koperty</a>
                    <a class="nav-link py-2" id="v-pills-list7-tab" data-toggle="pill" href="#v-pills-list7" role="tab" aria-controls="v-pills-list7" aria-selected="false">Narożniki</a>
                    <a class="nav-link py-2" id="v-pills-list8-tab" data-toggle="pill" href="#v-pills-list8" role="tab" aria-controls="v-pills-list8" aria-selected="false">Folie</a>
                    <a class="nav-link py-2" id="v-pills-list9-tab" data-toggle="pill" href="#v-pills-list9" role="tab" aria-controls="v-pills-list9" aria-selected="false">Woreczki</a>
                    <a class="nav-link py-2" id="v-pills-list10-tab" data-toggle="pill" href="#v-pills-list10" role="tab" aria-controls="v-pills-list10" aria-selected="false">Pianki</a>
                    <a class="nav-link py-2" id="v-pills-list11-tab" data-toggle="pill" href="#v-pills-list11" role="tab" aria-controls="v-pills-list11" aria-selected="false">Wypełniacze</a>
                    <a class="nav-link py-2" id="v-pills-list12-tab" data-toggle="pill" href="#v-pills-list12" role="tab" aria-controls="v-pills-list12" aria-selected="false">Bandowanie</a>
                    <a class="nav-link py-2" id="v-pills-list13-tab" data-toggle="pill" href="#v-pills-list13" role="tab" aria-controls="v-pills-list13" aria-selected="false">Biuro</a>
                    <a class="nav-link py-2" id="v-pills-list14-tab" data-toggle="pill" href="#v-pills-list14" role="tab" aria-controls="v-pills-list14" aria-selected="false">Magazyn</a>
                    <a class="nav-link py-2" id="v-pills-list15-tab" data-toggle="pill" href="#v-pills-list15" role="tab" aria-controls="v-pills-list15" aria-selected="false">Palety plastikowe</a>
                    <a class="nav-link py-2" id="v-pills-list16-tab" data-toggle="pill" href="#v-pills-list16" role="tab" aria-controls="v-pills-list16" aria-selected="false">Palety aluminiowe</a>
                    <a class="nav-link py-2" id="v-pills-list17-tab" data-toggle="pill" href="#v-pills-list17" role="tab" aria-controls="v-pills-list17" aria-selected="false">Palety metalowe</a>
                    <a class="nav-link py-2" id="v-pills-list18-tab" data-toggle="pill" href="#v-pills-list18" role="tab" aria-controls="v-pills-list18" aria-selected="false">Palety i wanny ociekowe</a>
                    <a class="nav-link py-2" id="v-pills-list19-tab" data-toggle="pill" href="#v-pills-list19" role="tab" aria-controls="v-pills-list19" aria-selected="false">Kontenery samowyładowcze</a>
                    <a class="nav-link py-2" id="v-pills-list20-tab" data-toggle="pill" href="#v-pills-list20" role="tab" aria-controls="v-pills-list20" aria-selected="false">Kontenery IBC</a>
                    <a class="nav-link py-2" id="v-pills-list21-tab" data-toggle="pill" href="#v-pills-list21" role="tab" aria-controls="v-pills-list21" aria-selected="false">Skrzyniopalety plastikowe</a>
                    <a class="nav-link py-2" id="v-pills-list22-tab" data-toggle="pill" href="#v-pills-list22" role="tab" aria-controls="v-pills-list22" aria-selected="false">Pojemniki plastikowe</a>
                    <a class="nav-link py-2" id="v-pills-list23-tab" data-toggle="pill" href="#v-pills-list23" role="tab" aria-controls="v-pills-list23" aria-selected="false">Wózki transportowe</a>
                    <a class="nav-link py-2" id="v-pills-list24-tab" data-toggle="pill" href="#v-pills-list24" role="tab" aria-controls="v-pills-list24" aria-selected="false">Zbiorniki przemysłowe</a>
                    <a class="nav-link py-2" id="v-pills-list25-tab" data-toggle="pill" href="#v-pills-list25" role="tab" aria-controls="v-pills-list25" aria-selected="false">Beczki i kanistry</a>
                    <a class="nav-link py-2" id="v-pills-list26-tab" data-toggle="pill" href="#v-pills-list26" role="tab" aria-controls="v-pills-list26" aria-selected="false">Produkty ESD</a>
                    <a class="nav-link py-2" id="v-pills-list27-tab" data-toggle="pill" href="#v-pills-list27" role="tab" aria-controls="v-pills-list27" aria-selected="false">Nadstawki paletowe</a>
                    <a class="nav-link py-2" id="v-pills-list28-tab" data-toggle="pill" href="#v-pills-list28" role="tab" aria-controls="v-pills-list28" aria-selected="false">Kontenery samowyładowcze</a>
                    <a class="nav-link py-2" id="v-pills-list29-tab" data-toggle="pill" href="#v-pills-list29" role="tab" aria-controls="v-pills-list29" aria-selected="false">Drabiny magazynowe</a>
                </div>
            </div>
            <div class="col-md-9 mb-3">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-list1" role="tabpanel" aria-labelledby="v-pills-list1-tab">
                        <div class="row border-top py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img01.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x80 nastopach | PA1S</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">450 zł netto</h4>
                            </div>
                        </div>
                        <div class="row border-top py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img02.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x100 na stopach | PA2S</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">530 zł netto</h4>
                            </div>
                        </div>
                        <div class="row border-top py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img03.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x80 nawymiar | PA1</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">550 zł netto</h4>
                            </div>
                        </div>
                        <div class="row border-top border-bottom py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img04.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x80 nawymiar | PANW</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">850 zł netto</h4>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-list2" role="tabpanel" aria-labelledby="v-pills-list2-tab">
                        <div class="row border-top py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img01.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x80 nastopach | PA1S</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">450 zł netto</h4>
                            </div>
                        </div>
                        <div class="row border-top py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img02.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x100 na stopach | PA2S</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">530 zł netto</h4>
                            </div>
                        </div>
                        <div class="row border-top py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img03.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x80 nawymiar | PA1</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">550 zł netto</h4>
                            </div>
                        </div>
                        <div class="row border-top border-bottom py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img04.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x80 nawymiar | PANW</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">850 zł netto</h4>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-list3" role="tabpanel" aria-labelledby="v-pills-list3-tab">
                        <div class="row border-top py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img01.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x80 nastopach | PA1S</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">450 zł netto</h4>
                            </div>
                        </div>
                        <div class="row border-top py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img02.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x100 na stopach | PA2S</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">530 zł netto</h4>
                            </div>
                        </div>
                        <div class="row border-top py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img03.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x80 nawymiar | PA1</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">550 zł netto</h4>
                            </div>
                        </div>
                        <div class="row border-top border-bottom py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img04.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x80 nawymiar | PANW</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">850 zł netto</h4>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-list4" role="tabpanel" aria-labelledby="v-pills-list4-tab">
                        <div class="row border-top py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img01.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x80 nastopach | PA1S</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">450 zł netto</h4>
                            </div>
                        </div>
                        <div class="row border-top py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img02.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x100 na stopach | PA2S</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">530 zł netto</h4>
                            </div>
                        </div>
                        <div class="row border-top py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img03.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x80 nawymiar | PA1</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">550 zł netto</h4>
                            </div>
                        </div>
                        <div class="row border-top border-bottom py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img04.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x80 nawymiar | PANW</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">850 zł netto</h4>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-list5" role="tabpanel" aria-labelledby="v-pills-list5-tab">
                        <div class="row border-top py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img01.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x80 nastopach | PA1S</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">450 zł netto</h4>
                            </div>
                        </div>
                        <div class="row border-top py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img02.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x100 na stopach | PA2S</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">530 zł netto</h4>
                            </div>
                        </div>
                        <div class="row border-top py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img03.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x80 nawymiar | PA1</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">550 zł netto</h4>
                            </div>
                        </div>
                        <div class="row border-top border-bottom py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img04.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x80 nawymiar | PANW</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">850 zł netto</h4>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-list6" role="tabpanel" aria-labelledby="v-pills-list6-tab">
                        <div class="row border-top py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img01.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x80 nastopach | PA1S</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">450 zł netto</h4>
                            </div>
                        </div>
                        <div class="row border-top py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img02.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x100 na stopach | PA2S</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">530 zł netto</h4>
                            </div>
                        </div>
                        <div class="row border-top py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img03.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x80 nawymiar | PA1</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">550 zł netto</h4>
                            </div>
                        </div>
                        <div class="row border-top border-bottom py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img04.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x80 nawymiar | PANW</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">850 zł netto</h4>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-list7" role="tabpanel" aria-labelledby="v-pills-list7-tab">
                        <div class="row border-top py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img01.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x80 nastopach | PA1S</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">450 zł netto</h4>
                            </div>
                        </div>
                        <div class="row border-top py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img02.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x100 na stopach | PA2S</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">530 zł netto</h4>
                            </div>
                        </div>
                        <div class="row border-top py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img03.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x80 nawymiar | PA1</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">550 zł netto</h4>
                            </div>
                        </div>
                        <div class="row border-top border-bottom py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img04.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x80 nawymiar | PANW</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">850 zł netto</h4>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-list8" role="tabpanel" aria-labelledby="v-pills-list8-tab">
                        <div class="row border-top py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img01.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x80 nastopach | PA1S</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">450 zł netto</h4>
                            </div>
                        </div>
                        <div class="row border-top py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img02.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x100 na stopach | PA2S</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">530 zł netto</h4>
                            </div>
                        </div>
                        <div class="row border-top py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img03.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x80 nawymiar | PA1</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">550 zł netto</h4>
                            </div>
                        </div>
                        <div class="row border-top border-bottom py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img04.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x80 nawymiar | PANW</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">850 zł netto</h4>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-list9" role="tabpanel" aria-labelledby="v-pills-list9-tab">
                        <div class="row border-top py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img01.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x80 nastopach | PA1S</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">450 zł netto</h4>
                            </div>
                        </div>
                        <div class="row border-top py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img02.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x100 na stopach | PA2S</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">530 zł netto</h4>
                            </div>
                        </div>
                        <div class="row border-top py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img03.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x80 nawymiar | PA1</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">550 zł netto</h4>
                            </div>
                        </div>
                        <div class="row border-top border-bottom py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img04.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x80 nawymiar | PANW</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">850 zł netto</h4>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-list10" role="tabpanel" aria-labelledby="v-pills-list10-tab">
                        <div class="row border-top py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img01.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x80 nastopach | PA1S</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">450 zł netto</h4>
                            </div>
                        </div>
                        <div class="row border-top py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img02.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x100 na stopach | PA2S</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">530 zł netto</h4>
                            </div>
                        </div>
                        <div class="row border-top py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img03.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x80 nawymiar | PA1</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">550 zł netto</h4>
                            </div>
                        </div>
                        <div class="row border-top border-bottom py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img04.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x80 nawymiar | PANW</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">850 zł netto</h4>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-list11" role="tabpanel" aria-labelledby="v-pills-list11-tab">
                        <div class="row border-top py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img01.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x80 nastopach | PA1S</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">450 zł netto</h4>
                            </div>
                        </div>
                        <div class="row border-top py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img02.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x100 na stopach | PA2S</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">530 zł netto</h4>
                            </div>
                        </div>
                        <div class="row border-top py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img03.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x80 nawymiar | PA1</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">550 zł netto</h4>
                            </div>
                        </div>
                        <div class="row border-top border-bottom py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img04.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x80 nawymiar | PANW</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">850 zł netto</h4>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-list12" role="tabpanel" aria-labelledby="v-pills-list12-tab">
                        <div class="row border-top py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img01.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x80 nastopach | PA1S</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">450 zł netto</h4>
                            </div>
                        </div>
                        <div class="row border-top py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img02.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x100 na stopach | PA2S</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">530 zł netto</h4>
                            </div>
                        </div>
                        <div class="row border-top py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img03.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x80 nawymiar | PA1</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">550 zł netto</h4>
                            </div>
                        </div>
                        <div class="row border-top border-bottom py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img04.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x80 nawymiar | PANW</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">850 zł netto</h4>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-list13" role="tabpanel" aria-labelledby="v-pills-list13-tab">
                        <div class="row border-top py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img01.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x80 nastopach | PA1S</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">450 zł netto</h4>
                            </div>
                        </div>
                        <div class="row border-top py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img02.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x100 na stopach | PA2S</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">530 zł netto</h4>
                            </div>
                        </div>
                        <div class="row border-top py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img03.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x80 nawymiar | PA1</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">550 zł netto</h4>
                            </div>
                        </div>
                        <div class="row border-top border-bottom py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img04.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x80 nawymiar | PANW</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">850 zł netto</h4>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-list14" role="tabpanel" aria-labelledby="v-pills-list14-tab">
                        <div class="row border-top py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img01.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x80 nastopach | PA1S</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">450 zł netto</h4>
                            </div>
                        </div>
                        <div class="row border-top py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img02.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x100 na stopach | PA2S</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">530 zł netto</h4>
                            </div>
                        </div>
                        <div class="row border-top py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img03.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x80 nawymiar | PA1</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">550 zł netto</h4>
                            </div>
                        </div>
                        <div class="row border-top border-bottom py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img04.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x80 nawymiar | PANW</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">850 zł netto</h4>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-list15" role="tabpanel" aria-labelledby="v-pills-list15-tab">
                        <div class="row border-top py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img01.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x80 nastopach | PA1S</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">450 zł netto</h4>
                            </div>
                        </div>
                        <div class="row border-top py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img02.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x100 na stopach | PA2S</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">530 zł netto</h4>
                            </div>
                        </div>
                        <div class="row border-top py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img03.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x80 nawymiar | PA1</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">550 zł netto</h4>
                            </div>
                        </div>
                        <div class="row border-top border-bottom py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img04.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x80 nawymiar | PANW</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">850 zł netto</h4>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-list16" role="tabpanel" aria-labelledby="v-pills-list16-tab">
                        <div class="row border-top py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img01.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x80 nastopach | PA1S</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">450 zł netto</h4>
                            </div>
                        </div>
                        <div class="row border-top py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img02.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x100 na stopach | PA2S</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">530 zł netto</h4>
                            </div>
                        </div>
                        <div class="row border-top py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img03.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x80 nawymiar | PA1</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">550 zł netto</h4>
                            </div>
                        </div>
                        <div class="row border-top border-bottom py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img04.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x80 nawymiar | PANW</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">850 zł netto</h4>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-list17" role="tabpanel" aria-labelledby="v-pills-list17-tab">
                        <div class="row border-top py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img01.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x80 nastopach | PA1S</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">450 zł netto</h4>
                            </div>
                        </div>
                        <div class="row border-top py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img02.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x100 na stopach | PA2S</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">530 zł netto</h4>
                            </div>
                        </div>
                        <div class="row border-top py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img03.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x80 nawymiar | PA1</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">550 zł netto</h4>
                            </div>
                        </div>
                        <div class="row border-top border-bottom py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img04.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x80 nawymiar | PANW</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">850 zł netto</h4>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-list18" role="tabpanel" aria-labelledby="v-pills-list18-tab">
                        <div class="row border-top py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img01.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x80 nastopach | PA1S</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">450 zł netto</h4>
                            </div>
                        </div>
                        <div class="row border-top py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img02.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x100 na stopach | PA2S</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">530 zł netto</h4>
                            </div>
                        </div>
                        <div class="row border-top py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img03.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x80 nawymiar | PA1</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">550 zł netto</h4>
                            </div>
                        </div>
                        <div class="row border-top border-bottom py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img04.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x80 nawymiar | PANW</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">850 zł netto</h4>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-list19" role="tabpanel" aria-labelledby="v-pills-list19-tab">
                        <div class="row border-top py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img01.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x80 nastopach | PA1S</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">450 zł netto</h4>
                            </div>
                        </div>
                        <div class="row border-top py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img02.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x100 na stopach | PA2S</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">530 zł netto</h4>
                            </div>
                        </div>
                        <div class="row border-top py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img03.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x80 nawymiar | PA1</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">550 zł netto</h4>
                            </div>
                        </div>
                        <div class="row border-top border-bottom py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img04.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x80 nawymiar | PANW</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">850 zł netto</h4>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-list20" role="tabpanel" aria-labelledby="v-pills-list20-tab">
                        <div class="row border-top py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img01.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x80 nastopach | PA1S</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">450 zł netto</h4>
                            </div>
                        </div>
                        <div class="row border-top py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img02.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x100 na stopach | PA2S</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">530 zł netto</h4>
                            </div>
                        </div>
                        <div class="row border-top py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img03.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x80 nawymiar | PA1</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">550 zł netto</h4>
                            </div>
                        </div>
                        <div class="row border-top border-bottom py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img04.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x80 nawymiar | PANW</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">850 zł netto</h4>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-list21" role="tabpanel" aria-labelledby="v-pills-list21-tab">
                        <div class="row border-top py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img01.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x80 nastopach | PA1S</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">450 zł netto</h4>
                            </div>
                        </div>
                        <div class="row border-top py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img02.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x100 na stopach | PA2S</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">530 zł netto</h4>
                            </div>
                        </div>
                        <div class="row border-top py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img03.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x80 nawymiar | PA1</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">550 zł netto</h4>
                            </div>
                        </div>
                        <div class="row border-top border-bottom py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img04.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x80 nawymiar | PANW</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">850 zł netto</h4>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-list22" role="tabpanel" aria-labelledby="v-pills-list22-tab">
                        <div class="row border-top py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img01.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x80 nastopach | PA1S</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">450 zł netto</h4>
                            </div>
                        </div>
                        <div class="row border-top py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img02.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x100 na stopach | PA2S</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">530 zł netto</h4>
                            </div>
                        </div>
                        <div class="row border-top py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img03.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x80 nawymiar | PA1</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">550 zł netto</h4>
                            </div>
                        </div>
                        <div class="row border-top border-bottom py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img04.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x80 nawymiar | PANW</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">850 zł netto</h4>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-list23" role="tabpanel" aria-labelledby="v-pills-list23-tab">
                        <div class="row border-top py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img01.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x80 nastopach | PA1S</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">450 zł netto</h4>
                            </div>
                        </div>
                        <div class="row border-top py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img02.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x100 na stopach | PA2S</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">530 zł netto</h4>
                            </div>
                        </div>
                        <div class="row border-top py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img03.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x80 nawymiar | PA1</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">550 zł netto</h4>
                            </div>
                        </div>
                        <div class="row border-top border-bottom py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img04.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x80 nawymiar | PANW</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">850 zł netto</h4>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-list24" role="tabpanel" aria-labelledby="v-pills-list24-tab">
                        <div class="row border-top py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img01.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x80 nastopach | PA1S</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">450 zł netto</h4>
                            </div>
                        </div>
                        <div class="row border-top py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img02.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x100 na stopach | PA2S</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">530 zł netto</h4>
                            </div>
                        </div>
                        <div class="row border-top py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img03.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x80 nawymiar | PA1</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">550 zł netto</h4>
                            </div>
                        </div>
                        <div class="row border-top border-bottom py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img04.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x80 nawymiar | PANW</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">850 zł netto</h4>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-list25" role="tabpanel" aria-labelledby="v-pills-list25-tab">
                        <div class="row border-top py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img01.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x80 nastopach | PA1S</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">450 zł netto</h4>
                            </div>
                        </div>
                        <div class="row border-top py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img02.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x100 na stopach | PA2S</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">530 zł netto</h4>
                            </div>
                        </div>
                        <div class="row border-top py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img03.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x80 nawymiar | PA1</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">550 zł netto</h4>
                            </div>
                        </div>
                        <div class="row border-top border-bottom py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img04.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x80 nawymiar | PANW</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">850 zł netto</h4>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-list26" role="tabpanel" aria-labelledby="v-pills-list26-tab">
                        <div class="row border-top py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img01.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x80 nastopach | PA1S</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">450 zł netto</h4>
                            </div>
                        </div>
                        <div class="row border-top py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img02.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x100 na stopach | PA2S</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">530 zł netto</h4>
                            </div>
                        </div>
                        <div class="row border-top py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img03.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x80 nawymiar | PA1</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">550 zł netto</h4>
                            </div>
                        </div>
                        <div class="row border-top border-bottom py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img04.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x80 nawymiar | PANW</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">850 zł netto</h4>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-list27" role="tabpanel" aria-labelledby="v-pills-list27-tab">
                        <div class="row border-top py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img01.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x80 nastopach | PA1S</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">450 zł netto</h4>
                            </div>
                        </div>
                        <div class="row border-top py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img02.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x100 na stopach | PA2S</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">530 zł netto</h4>
                            </div>
                        </div>
                        <div class="row border-top py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img03.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x80 nawymiar | PA1</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">550 zł netto</h4>
                            </div>
                        </div>
                        <div class="row border-top border-bottom py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img04.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x80 nawymiar | PANW</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">850 zł netto</h4>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-list28" role="tabpanel" aria-labelledby="v-pills-list28-tab">
                        <div class="row border-top py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img01.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x80 nastopach | PA1S</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">450 zł netto</h4>
                            </div>
                        </div>
                        <div class="row border-top py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img02.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x100 na stopach | PA2S</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">530 zł netto</h4>
                            </div>
                        </div>
                        <div class="row border-top py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img03.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x80 nawymiar | PA1</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">550 zł netto</h4>
                            </div>
                        </div>
                        <div class="row border-top border-bottom py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img04.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x80 nawymiar | PANW</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">850 zł netto</h4>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-list29" role="tabpanel" aria-labelledby="v-pills-list29-tab">
                        <div class="row border-top py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img01.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x80 nastopach | PA1S</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">450 zł netto</h4>
                            </div>
                        </div>
                        <div class="row border-top py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img02.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x100 na stopach | PA2S</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">530 zł netto</h4>
                            </div>
                        </div>
                        <div class="row border-top py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img03.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x80 nawymiar | PA1</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">550 zł netto</h4>
                            </div>
                        </div>
                        <div class="row border-top border-bottom py-4">
                            <div class="col-md-3">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore-img04.png" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5>Paleta aluminiowa 120x80 nawymiar | PANW</h5>
                            </div>
                            <div class="col-md-3">
                                <h4 class="text-primary">850 zł netto</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-2">
    <div class="container border-top border-bottom py-5">
        <div class="row align-items-center">
            <div class="col-md-9">
                <h4>Zamawiasz duże ilości towaru ? Zapytaj o ofertę indywidualną.</h4>
            </div>
            <div class="col-md-3">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore345.png" alt="" class="img-fluid">
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-md-4">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packstore346.png" alt="" class="img-fluid">
            </div>
            <div class="col-md-8">
                <h4>Jesteś sprzedawcą? Z Packbookiem najtaniej, najwygodniej inajbezpieczniej nadasz swój towar do klienta.</h4>
            </div>
        </div>
    </div>
</section>

<section class="delivery-agency-logo">
    <div class="container border-bottom border-top py-4">
        <div class="delivery-agency-logo-list content-section text-center">
            <ul class="list-inline">
                <li class="list-inline-item logos-wrap"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/business/dpd-logo.png" class="img-fluid" alt="DPD"></li>
                <li class="list-inline-item logos-wrap"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/business/ups-logo.png" class="img-fluid w-50" alt="UPS"></li>
                <li class="list-inline-item logos-wrap"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/business/gls-logo.png" class="img-fluid" alt="GLS"></li>
                <li class="list-inline-item logos-wrap"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/business/inpost-logo.png" class="img-fluid" alt="InPost"></li>
                <li class="list-inline-item logos-wrap"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/business/paczka-w-ruchu-logo.png" class="img-fluid w-75" alt="Paczka W Ruchu"></li>
                <li class="list-inline-item logos-wrap"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/business/poczta-polska-logo.png" class="img-fluid" alt="Poczta Polska"></li>
            </ul>
        </div>
    </div>
</section>

<section class="py-4">
    <div class="container border-bottom pb-3">
        <h4 class="text-center">Skorzystaj z całej gamy wszechstronnych usług transportowych i logistycznych…</h4>
        <div class="delivery-agency-logo-list content-section text-center pt-5">
            <ul class="list-inline">
                <li class="list-inline-item logos-wrap"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packbook001.png" class="img"></li>
                <li class="list-inline-item logos-wrap"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packbook002.png" class="img"></li>
                <li class="list-inline-item logos-wrap"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packbook003.png" class="img"></li>
                <li class="list-inline-item logos-wrap"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packbook004.png" class="img"></li>
            </ul>
        </div>
    </div>
</section>

<section class="py-2">
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-md-9">
                <h4>Lub znajdź przewoźnika na Packbook <span class="text-danger">Exchange</span>.</h4>
            </div>
            <div class="col-md-3">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packbookexchange.png" alt="" class="img-fluid">
            </div>
        </div>
    </div>
</section>

<section class="bg-warning py-5">
    <div class="container">
        <h4 class="text-center">Towar dostarczamy naszym Klientom przez serwis <span class="text-primary">Packbook.pl</span></h4>
    </div>
</section>

<section class="py-5">
    <div class="container text-center">
        <div class="row">
            <div class="col-md-3">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packbook-icon1.png" alt="" class="img-fluid h-100 d-inline-block">
            </div>
            <div class="col-md-3">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packbook-icon2.png" alt="" class="img-fluid h-100 d-inline-block">
            </div>
            <div class="col-md-3">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packbook-icon3.png" alt="" class="img-fluid h-100 d-inline-block">
            </div>
            <div class="col-md-3">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/packbook-icon4.png" alt="" class="img-fluid h-100 d-inline-block">
            </div>
        </div>
    </div>
</section>



<?php

get_footer();

?>