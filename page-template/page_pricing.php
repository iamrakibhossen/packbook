<?php
/*
Template Name: _pricing
*/


get_header();
?>

<section class="py-6">
    <div class="container">
        <h1 class="text-center">Cennik przesyłek kurierskich</h1>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
           
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="second-tab" data-toggle="tab" href="#second" role="tab" aria-controls="second" aria-selected="false">DPD</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="theree-tab" data-toggle="tab" href="#theree" role="tab" aria-controls="theree" aria-selected="false">InPost</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="four-tab" data-toggle="tab" href="#four" role="tab" aria-controls="four" aria-selected="false">UPS</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="five-tab" data-toggle="tab" href="#five" role="tab" aria-controls="five" aria-selected="false">GLS</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="first" role="tabpanel" aria-labelledby="first-tab">
            <div class="pricelist-box-wrapper">
                
                <!-- DOMESTIC SERVICE -->
                <div class="row pricelist-box-header border">
                    <div class="col text-center">
                        <h2>USŁUGA KRAJOWA</h2>
                    </div>
                </div>
                <div class="pricelist-box-container">
                    <div class="row border bgpricetable">
                        <div class="col-sm-5">
                            <p></p>
                        </div>
                        <div class="col-sm-7 border-left">
                            <div class="row">
                                <div class="col">
                                    <p>Waga 1 paczki</p>
                                </div>
                                <div class="col text-center">
                                    <p>Cena netto</p>
                                </div>
                                <div class="col text-right">
                                    <p>Cena brutto</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="dox-price-list-box">
                        <div class="row border">
                            <div class="col-sm-5 dox-price-secenitem pt-2">
                                <div class="row">
                                    <div class="col text-center">
                                        <p>DOX</p>
                                    </div>
                                    <div class="col text-center">
                                        <i class="fas fa-envelope text-body"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-7 border-left">
                                <div class="row">
                                    <div class="col">
                                        <p>DOX</p>
                                    </div>
                                    <div class="col text-center">
                                        <p>13.69 PLN</p>
                                    </div>
                                    <div class="col text-right">
                                        <p>16.84 PLN</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="parcel-price-list-box">
                        <div class="row border">
                            <div class="col-sm-5 dox-price-secenitem pt-2">
                                <div class="row">
                                    <div class="col text-center">
                                        <p>Paczka</p>
                                    </div>
                                    <div class="col text-center">
                                        <i class="fas fa-box text-body"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-7 border-left">
                                <div class="row border-bottom">
                                    <div class="col">
                                        <p>do 5 kg</p>
                                    </div>
                                    <div class="col text-center">
                                        <p>13.69 PLN</p>
                                    </div>
                                    <div class="col text-right">
                                        <p>16.84 PLN</p>
                                    </div>
                                </div>
                                <div class="row border-bottom">
                                    <div class="col">
                                        <p>od 5 to 10 kg</p>
                                    </div>
                                    <div class="col text-center">
                                        <p>14.39 PLN</p>
                                    </div>
                                    <div class="col text-right">
                                        <p>17.70 PLN</p>
                                    </div>
                                </div>
                                <div class="row border-bottom">
                                    <div class="col">
                                        <p>od 10 to 20 kg</p>
                                    </div>
                                    <div class="col text-center">
                                        <p>15.79 PLN</p>
                                    </div>
                                    <div class="col text-right">
                                        <p>19.42 PLN</p>
                                    </div>
                                </div>
                                <div class="row border-bottom">
                                    <div class="col">
                                        <p>od 20 to 31.5 kg</p>
                                    </div>
                                    <div class="col text-center">
                                        <p>17.19 PLN</p>
                                    </div>
                                    <div class="col text-right">
                                        <p>21.14 PLN</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <p>od 31.5 to 50 kg</p>
                                    </div>
                                    <div class="col text-center">
                                        <p>78.00 PLN</p>
                                    </div>
                                    <div class="col text-right">
                                        <p>95.94 PLN</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pallet-price-list-box">
                        <div class="row border">
                            <div class="col-sm-5 dox-price-secenitem pt-2">
                                <div class="row">
                                    <div class="col text-center">
                                        <p>Paleta</p>
                                    </div>
                                    <div class="col text-center">
                                        <i class="fas fa-wallet text-body"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-7 border-left">
                                <div class="row border-bottom">
                                    <div class="col">
                                        <p>do 5 kg</p>
                                    </div>
                                    <div class="col text-center">
                                        <p>13.69 PLN</p>
                                    </div>
                                    <div class="col text-right">
                                        <p>16.84 PLN</p>
                                    </div>
                                </div>
                                <div class="row border-bottom">
                                    <div class="col">
                                        <p>od 5 do 10 kg</p>
                                    </div>
                                    <div class="col text-center">
                                        <p>14.39 PLN</p>
                                    </div>
                                    <div class="col text-right">
                                        <p>17.70 PLN</p>
                                    </div>
                                </div>
                                <div class="row border-bottom">
                                    <div class="col">
                                        <p>od 10 do 20 kg</p>
                                    </div>
                                    <div class="col text-center">
                                        <p>15.79 PLN</p>
                                    </div>
                                    <div class="col text-right">
                                        <p>19.42 PLN</p>
                                    </div>
                                </div>
                                <div class="row border-bottom">
                                    <div class="col">
                                        <p>od 20 do 31.5 kg</p>
                                    </div>
                                    <div class="col text-center">
                                        <p>17.19 PLN</p>
                                    </div>
                                    <div class="col text-right">
                                        <p>21.14 PLN</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <p>od 31.5 do 50 kg</p>
                                    </div>
                                    <div class="col text-center">
                                        <p>78.00 PLN</p>
                                    </div>
                                    <div class="col text-right">
                                        <p>95.94 PLN</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>

                <!-- ADDITIONAL SERVICES -->

                <div class="row pricelist-box-header border">
                    <div class="col text-center">
                        <h2>DODATKOWE USŁUGI</h2>
                    </div>
                </div>
                <div class="row border bgpricetable">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>Nazwa serwisu</p>
                    </div>
                    <div class="col-sm-5 border-left">
                        <div class="row">
                            <div class="col">
                                <p>Cena netto</p>
                            </div>
                            <div class="col text-right">
                                <p>Cena brutto</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>Parcel insurance of a package with value higher that 500 PLN and weight to 31.50 kg <sup class="text-primary">(1)</sup></p>
                    </div>
                    <div class="col-sm-5 border-left">
                        <div class="row">
                            <div class="col">
                                <p>2.16 PLN</p>
                            </div>
                            <div class="col text-right">
                                <p>2.66 PLN</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border-left">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>Parcel insurance of a package with value higher that 500 PLN and weight from 31.51 kg <sup class="text-primary">(1)</sup></p>
                    </div>
                    <div class="col-sm-5 border-left border-right">
                        <div class="row">
                            <div class="col">
                                <p>6.00 PLN</p>
                            </div>
                            <div class="col text-right">
                                <p>7.38 PLN</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border-top border-left">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>Non-standard element to 31.50 kg <sup class="text-primary">(2)</sup></p>
                    </div>
                    <div class="col-sm-5 border-left border-right">
                        <div class="row">
                            <div class="col">
                                <p>36.90 PLN</p>
                            </div>
                            <div class="col text-right">
                                <p>45.39 PLN</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border-top border-left border-right">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>Non-standard element from 31.51 kg <sup class="text-primary">(2)</sup></p>
                    </div>
                    <div class="col-sm-5 border-left">
                        <div class="row">
                            <div class="col">
                                <p>120.00 PLN</p>
                            </div>
                            <div class="col text-right">
                                <p>147.60 PLN</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border-top border-left border-right">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>Cash on delivery Standard from 0.01 PLN <sup class="text-primary">(3)</sup></p>
                    </div>
                    <div class="col-sm-5 border-left">
                        <div class="row">
                            <div class="col">
                                <p>3.99 PLN</p>
                            </div>
                            <div class="col text-right">
                                <p>4.91 PLN</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>Return of documents</p>
                    </div>
                    <div class="col-sm-5">
                        <div class="row border-left">
                            <div class="col">
                                <p>16.17 PLN</p>
                            </div>
                            <div class="col text-right">
                                <p>19.89 PLN</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- NON-STANDARD SERVICES -->
                
                <div class="row pricelist-box-header border">
                    <div class="col text-center">
                        <h2>USŁUGI NIETYPOWE</h2>
                    </div>
                </div>
                <div class="row border bgpricetable">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>Nazwa serwisu</p>
                    </div>
                    <div class="col-sm-5 border-left">
                        <div class="row">
                            <div class="col">
                                <p>Cena netto</p>
                            </div>
                            <div class="col text-right">
                                <p>Cena brutto</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>Address correction</p>
                    </div>
                    <div class="col-sm-5 border-left">
                        <div class="row">
                            <div class="col">
                                <p>100.00% package price</p>
                            </div>
                            <div class="col text-right">
                                <p>100.00% package price</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border-left">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>The same branch address correction</p>
                    </div>
                    <div class="col-sm-5 border-left border-right">
                        <div class="row">
                            <div class="col">
                                <p>10.00 PLN</p>
                            </div>
                            <div class="col text-right">
                                <p>12.30 PLN</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border-top border-left">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>Manual letter</p>
                    </div>
                    <div class="col-sm-5 border-left border-right">
                        <div class="row">
                            <div class="col">
                                <p>5.00 PLN</p>
                            </div>
                            <div class="col text-right">
                                <p>6.15 PLN</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border-top border-left border-right">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>Return to sender</p>
                    </div>
                    <div class="col-sm-5 border-left">
                        <div class="row">
                            <div class="col">
                                <p>Basic fee</p>
                            </div>
                            <div class="col text-right">
                                <p>Basic fee</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border-top border-left border-right">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>SMS notification</p>
                    </div>
                    <div class="col-sm-5 border-left">
                        <div class="row">
                            <div class="col">
                                <p>0.08 PLN</p>
                            </div>
                            <div class="col text-right">
                                <p>0.10 PLN</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>Return of undeliverable shipment</p>
                    </div>
                    <div class="col-sm-5">
                        <div class="row border-left">
                            <div class="col">
                                <p>100% charge for the parcel</p>
                            </div>
                            <div class="col text-right">
                                <p>100% charge for the parcel</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>Package exceeding an acceptable weight/dimensional limit</p>
                    </div>
                    <div class="col-sm-5">
                        <div class="row border-left">
                            <div class="col">
                                <p>According to the Partner's price list</p>
                            </div>
                            <div class="col text-right">
                                <p>According to the Partner's price list</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>Dispatch of a package inconsistent with an order (within an acceptable weight limit)</p>
                    </div>
                    <div class="col-sm-5">
                        <div class="row border-left">
                            <div class="col">
                                <p>According to the price list</p>
                            </div>
                            <div class="col text-right">
                                <p>According to the price list</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>Sending or attempting to send dangerous goods (especially pyrotechnics)</p>
                    </div>
                    <div class="col-sm-5">
                        <div class="row border-left">
                            <div class="col">
                                <p>2,000.00 PLN</p>
                            </div>
                            <div class="col text-right">
                                <p>2,460.00 PLN</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>Payment fee (PayPal)</p>
                    </div>
                    <div class="col-sm-5">
                        <div class="row border-left">
                            <div class="col">
                                <p>0.80 PLN + 0.81% from the paid amount</p>
                            </div>
                            <div class="col text-right">
                                <p>0.98 PLN + 1.00% from the paid amount</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>Sending a vindicatory reminder (cost of a priority registered letter)</p>
                    </div>
                    <div class="col-sm-5">
                        <div class="row border-left">
                            <div class="col">
                                <p>8.40 PLN</p>
                            </div>
                            <div class="col text-right">
                                <p>8.40 PLN</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>Wysłanie faktury w wersji papierowej (koszt listu poleconego priorytetowego)</p>
                    </div>
                    <div class="col-sm-5">
                        <div class="row border-left">
                            <div class="col">
                                <p>8.40 PLN</p>
                            </div>
                            <div class="col text-right">
                                <p>8.40 PLN</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>Re-transfer fee</p>
                    </div>
                    <div class="col-sm-5">
                        <div class="row border-left">
                            <div class="col">
                                <p>2.00 PLN</p>
                            </div>
                            <div class="col text-right">
                                <p>2.46 PLN</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>Verification transfer fee</p>
                    </div>
                    <div class="col-sm-5">
                        <div class="row border-left">
                            <div class="col">
                                <p>5.00 PLN</p>
                            </div>
                            <div class="col text-right">
                                <p>6.15 PLN</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>A fee for paying out the funds from a prepaid account <sup>(4)</sup></p>
                    </div>
                    <div class="col-sm-5">
                        <div class="row border-left">
                            <div class="col">
                                <p>10.00 PLN</p>
                            </div>
                            <div class="col text-right">
                                <p>12.30 PLN</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pricelist-notes pt-4">
                <p><span class="text-primary">(1)</span> W przypadku paczek do odbioru opłata wynosi od 0.00 PLN.</p>
                <p><span class="text-primary">(2)</span> Opłata pobierana, jeżeli w wyniku weryfikacji przewoźnik stwierdzi, że najdłuższy bok paczki był dłuższy niż 120 cm (maksymalnie 200 cm) lub jeden z pozostałych przekroczył 60 cm. Może być również obciążony wszystkimi paczkami, które wymagały sortowania ręcznego, np. opakowania delikatne, o nieregularnych kształtach, zawijane tylko w folię itp.</p>
                <p><span class="text-primary">(3)</span> Kwota pobrania jest wysyłana do nadawcy do 7 dni roboczych po dostawie. Maksymalne pobranie 1500,00 £.</p>
                <p><span class="text-primary">(4)</span> Opłata jest naliczana przy składaniu zlecenia wypłaty środków, które nie zostały wykorzystane do zamówienia usług.</p>
            </div>
            <div class="pricelist-service-info pt-5">
                <div class="row">
                    <div class="col-sm-7">
                        <div class="pricelist-left-box">
                            <div class="pricelist-box-head pb-3">
                                <h2>Niskie ceny to nie wszystko. Dodatkowo oferujemy:</h2>
                            </div>
                            <p>Konto przedpłacone i pełna kontrola nad wydatkami.</p>
                            <p>Jedna faktura zbiorcza na koniec miesiąca.</p>
                            <p>Szybkie pobieranie zwraca w następnym dniu roboczym po dostawie.</p>
                            <p>W cenie paliwo i opłaty drogowe.</p>
                            <p>Cennik biznesowy od 40 pakietów miesięcznie.</p>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="pricelist-right-box text-center pt-5">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/support-team.png" alt="" class="img-fluid">
                            <h4 class="pt-2">Do you have any questions?</h4>
                            <a href="<?php echo home_url('/contact/'); ?>" target="_blank" class="text-underline">Kontakt</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="second" role="tabpanel" aria-labelledby="second-tab">
        <div class="pricelist-box-wrapper">
                
                <!-- DOMESTIC SERVICE -->
                <div class="row pricelist-box-header border">
                    <div class="col text-center">
                        <h2>USŁUGA KRAJOWA</h2>
                    </div>
                </div>
                <div class="pricelist-box-container">
                    <div class="row border bgpricetable">
                        <div class="col-sm-5">
                            <p></p>
                        </div>
                        <div class="col-sm-7 border-left">
                            <div class="row">
                                <div class="col">
                                    <p>Waga 1 paczki</p>
                                </div>
                                <div class="col text-center">
                                    <p>Cena netto</p>
                                </div>
                                <div class="col text-right">
                                    <p>Cena brutto</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="dox-price-list-box">
                        <div class="row border">
                            <div class="col-sm-5 dox-price-secenitem pt-2">
                                <div class="row">
                                    <div class="col text-center">
                                        <p>DOX</p>
                                    </div>
                                    <div class="col text-center">
                                        <i class="fas fa-envelope text-body"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-7 border-left">
                                <div class="row">
                                    <div class="col">
                                        <p>DOX</p>
                                    </div>
                                    <div class="col text-center">
                                        <p>13.69 PLN</p>
                                    </div>
                                    <div class="col text-right">
                                        <p>16.84 PLN</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="parcel-price-list-box">
                        <div class="row border">
                            <div class="col-sm-5 dox-price-secenitem pt-2">
                                <div class="row">
                                    <div class="col text-center">
                                        <p>Paczka</p>
                                    </div>
                                    <div class="col text-center">
                                        <i class="fas fa-box text-body"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-7 border-left">
                                <div class="row border-bottom">
                                    <div class="col">
                                        <p>do 5 kg</p>
                                    </div>
                                    <div class="col text-center">
                                        <p>13.69 PLN</p>
                                    </div>
                                    <div class="col text-right">
                                        <p>16.84 PLN</p>
                                    </div>
                                </div>
                                <div class="row border-bottom">
                                    <div class="col">
                                        <p>od 5 to 10 kg</p>
                                    </div>
                                    <div class="col text-center">
                                        <p>14.39 PLN</p>
                                    </div>
                                    <div class="col text-right">
                                        <p>17.70 PLN</p>
                                    </div>
                                </div>
                                <div class="row border-bottom">
                                    <div class="col">
                                        <p>od 10 to 20 kg</p>
                                    </div>
                                    <div class="col text-center">
                                        <p>15.79 PLN</p>
                                    </div>
                                    <div class="col text-right">
                                        <p>19.42 PLN</p>
                                    </div>
                                </div>
                                <div class="row border-bottom">
                                    <div class="col">
                                        <p>od 20 to 31.5 kg</p>
                                    </div>
                                    <div class="col text-center">
                                        <p>17.19 PLN</p>
                                    </div>
                                    <div class="col text-right">
                                        <p>21.14 PLN</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <p>od 31.5 to 50 kg</p>
                                    </div>
                                    <div class="col text-center">
                                        <p>78.00 PLN</p>
                                    </div>
                                    <div class="col text-right">
                                        <p>95.94 PLN</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pallet-price-list-box">
                        <div class="row border">
                            <div class="col-sm-5 dox-price-secenitem pt-2">
                                <div class="row">
                                    <div class="col text-center">
                                        <p>Paczka</p>
                                    </div>
                                    <div class="col text-center">
                                        <i class="fas fa-wallet text-body"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-7 border-left">
                                <div class="row border-bottom">
                                    <div class="col">
                                        <p>do 5 kg</p>
                                    </div>
                                    <div class="col text-center">
                                        <p>13.69 PLN</p>
                                    </div>
                                    <div class="col text-right">
                                        <p>16.84 PLN</p>
                                    </div>
                                </div>
                                <div class="row border-bottom">
                                    <div class="col">
                                        <p>od 5 to 10 kg</p>
                                    </div>
                                    <div class="col text-center">
                                        <p>14.39 PLN</p>
                                    </div>
                                    <div class="col text-right">
                                        <p>17.70 PLN</p>
                                    </div>
                                </div>
                                <div class="row border-bottom">
                                    <div class="col">
                                        <p>od 10 to 20 kg</p>
                                    </div>
                                    <div class="col text-center">
                                        <p>15.79 PLN</p>
                                    </div>
                                    <div class="col text-right">
                                        <p>19.42 PLN</p>
                                    </div>
                                </div>
                                <div class="row border-bottom">
                                    <div class="col">
                                        <p>od 20 to 31.5 kg</p>
                                    </div>
                                    <div class="col text-center">
                                        <p>17.19 PLN</p>
                                    </div>
                                    <div class="col text-right">
                                        <p>21.14 PLN</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <p>od 31.5 to 50 kg</p>
                                    </div>
                                    <div class="col text-center">
                                        <p>78.00 PLN</p>
                                    </div>
                                    <div class="col text-right">
                                        <p>95.94 PLN</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>

                <!-- ADDITIONAL SERVICES -->

                <div class="row pricelist-box-header border">
                    <div class="col text-center">
                        <h2>ADDITIONAL SERVICES</h2>
                    </div>
                </div>
                <div class="row border bgpricetable">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>Service name</p>
                    </div>
                    <div class="col-sm-5 border-left">
                        <div class="row">
                            <div class="col">
                                <p>Net price</p>
                            </div>
                            <div class="col text-right">
                                <p>Gross price</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>Parcel insurance of a package with value higher that 500 PLN and weight to 31.50 kg <sup class="text-primary">(1)</sup></p>
                    </div>
                    <div class="col-sm-5 border-left">
                        <div class="row">
                            <div class="col">
                                <p>2.16 PLN</p>
                            </div>
                            <div class="col text-right">
                                <p>2.66 PLN</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border-left">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>Parcel insurance of a package with value higher that 500 PLN and weight from 31.51 kg <sup class="text-primary">(1)</sup></p>
                    </div>
                    <div class="col-sm-5 border-left border-right">
                        <div class="row">
                            <div class="col">
                                <p>6.00 PLN</p>
                            </div>
                            <div class="col text-right">
                                <p>7.38 PLN</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border-top border-left">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>Non-standard element to 31.50 kg <sup class="text-primary">(2)</sup></p>
                    </div>
                    <div class="col-sm-5 border-left border-right">
                        <div class="row">
                            <div class="col">
                                <p>36.90 PLN</p>
                            </div>
                            <div class="col text-right">
                                <p>45.39 PLN</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border-top border-left border-right">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>Non-standard element from 31.51 kg <sup class="text-primary">(2)</sup></p>
                    </div>
                    <div class="col-sm-5 border-left">
                        <div class="row">
                            <div class="col">
                                <p>120.00 PLN</p>
                            </div>
                            <div class="col text-right">
                                <p>147.60 PLN</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border-top border-left border-right">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>Cash on delivery Standard from 0.01 PLN <sup class="text-primary">(3)</sup></p>
                    </div>
                    <div class="col-sm-5 border-left">
                        <div class="row">
                            <div class="col">
                                <p>3.99 PLN</p>
                            </div>
                            <div class="col text-right">
                                <p>4.91 PLN</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>Return of documents</p>
                    </div>
                    <div class="col-sm-5">
                        <div class="row border-left">
                            <div class="col">
                                <p>16.17 PLN</p>
                            </div>
                            <div class="col text-right">
                                <p>19.89 PLN</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- NON-STANDARD SERVICES -->
                
                <div class="row pricelist-box-header border">
                    <div class="col text-center">
                        <h2>NON-STANDARD SERVICES</h2>
                    </div>
                </div>
                <div class="row border bgpricetable">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>Service name</p>
                    </div>
                    <div class="col-sm-5 border-left">
                        <div class="row">
                            <div class="col">
                                <p>Net price</p>
                            </div>
                            <div class="col text-right">
                                <p>Gross price</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>Address correction</p>
                    </div>
                    <div class="col-sm-5 border-left">
                        <div class="row">
                            <div class="col">
                                <p>100.00% package price</p>
                            </div>
                            <div class="col text-right">
                                <p>100.00% package price</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border-left">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>The same branch address correction</p>
                    </div>
                    <div class="col-sm-5 border-left border-right">
                        <div class="row">
                            <div class="col">
                                <p>10.00 PLN</p>
                            </div>
                            <div class="col text-right">
                                <p>12.30 PLN</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border-top border-left">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>Manual letter</p>
                    </div>
                    <div class="col-sm-5 border-left border-right">
                        <div class="row">
                            <div class="col">
                                <p>5.00 PLN</p>
                            </div>
                            <div class="col text-right">
                                <p>6.15 PLN</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border-top border-left border-right">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>Return to sender</p>
                    </div>
                    <div class="col-sm-5 border-left">
                        <div class="row">
                            <div class="col">
                                <p>Basic fee</p>
                            </div>
                            <div class="col text-right">
                                <p>Basic fee</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border-top border-left border-right">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>SMS notification</p>
                    </div>
                    <div class="col-sm-5 border-left">
                        <div class="row">
                            <div class="col">
                                <p>0.08 PLN</p>
                            </div>
                            <div class="col text-right">
                                <p>0.10 PLN</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>Return of undeliverable shipment</p>
                    </div>
                    <div class="col-sm-5">
                        <div class="row border-left">
                            <div class="col">
                                <p>100% charge for the parcel</p>
                            </div>
                            <div class="col text-right">
                                <p>100% charge for the parcel</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>Package exceeding an acceptable weight/dimensional limit</p>
                    </div>
                    <div class="col-sm-5">
                        <div class="row border-left">
                            <div class="col">
                                <p>According to the Partner's price list</p>
                            </div>
                            <div class="col text-right">
                                <p>According to the Partner's price list</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>Dispatch of a package inconsistent with an order (within an acceptable weight limit)</p>
                    </div>
                    <div class="col-sm-5">
                        <div class="row border-left">
                            <div class="col">
                                <p>According to the price list</p>
                            </div>
                            <div class="col text-right">
                                <p>According to the price list</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>Sending or attempting to send dangerous goods (especially pyrotechnics)</p>
                    </div>
                    <div class="col-sm-5">
                        <div class="row border-left">
                            <div class="col">
                                <p>2,000.00 PLN</p>
                            </div>
                            <div class="col text-right">
                                <p>2,460.00 PLN</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>Payment fee (PayPal)</p>
                    </div>
                    <div class="col-sm-5">
                        <div class="row border-left">
                            <div class="col">
                                <p>0.80 PLN + 0.81% from the paid amount</p>
                            </div>
                            <div class="col text-right">
                                <p>0.98 PLN + 1.00% from the paid amount</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>Sending a vindicatory reminder (cost of a priority registered letter)</p>
                    </div>
                    <div class="col-sm-5">
                        <div class="row border-left">
                            <div class="col">
                                <p>8.40 PLN</p>
                            </div>
                            <div class="col text-right">
                                <p>8.40 PLN</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>Wysłanie faktury w wersji papierowej (koszt listu poleconego priorytetowego)</p>
                    </div>
                    <div class="col-sm-5">
                        <div class="row border-left">
                            <div class="col">
                                <p>8.40 PLN</p>
                            </div>
                            <div class="col text-right">
                                <p>8.40 PLN</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>Re-transfer fee</p>
                    </div>
                    <div class="col-sm-5">
                        <div class="row border-left">
                            <div class="col">
                                <p>2.00 PLN</p>
                            </div>
                            <div class="col text-right">
                                <p>2.46 PLN</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>Verification transfer fee</p>
                    </div>
                    <div class="col-sm-5">
                        <div class="row border-left">
                            <div class="col">
                                <p>5.00 PLN</p>
                            </div>
                            <div class="col text-right">
                                <p>6.15 PLN</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>A fee for paying out the funds from a prepaid account <sup>(4)</sup></p>
                    </div>
                    <div class="col-sm-5">
                        <div class="row border-left">
                            <div class="col">
                                <p>10.00 PLN</p>
                            </div>
                            <div class="col text-right">
                                <p>12.30 PLN</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pricelist-notes pt-4">
                <p><span class="text-primary">(1)</span> For collection packages, the fee is charged from 0.00 PLN.</p>
                <p><span class="text-primary">(2)</span> The fee charged if, as a result of the verification, the carrier finds that the longest side of the package was longer than 120 cm (max 200 cm) or, one of the other sides, exceeded 60 cm. It can also be charged to all packages that required manual sorting e.g. delicate, irregularly shaped packages, wrapped only in foil, etc.</p>
                <p><span class="text-primary">(3)</span> The picking amount is sent to the shipper up to 7 business days after delivery. Maximum download £1,500.00.</p>
                <p><span class="text-primary">(4)</span> The fee is charged when you place an order to withdraw funds that were not used to order services.</p>
            </div>
            <div class="pricelist-service-info pt-5">
                <div class="row">
                    <div class="col-sm-7">
                        <div class="pricelist-left-box">
                            <div class="pricelist-box-head pb-3">
                                <h2>Low prices are not everything. In addition, we offer:</h2>
                            </div>
                            <p>Prepaid account and full control over expenses.</p>
                            <p>One blanket invoice at the end of the month.</p>
                            <p>Fast download returns on the next business day after delivery.</p>
                            <p>Fuel and road toll included.</p>
                            <p>Business price list from 40 packages per month.</p>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="pricelist-right-box text-center pt-5">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/support-team.png" alt="" class="img-fluid">
                            <h4 class="pt-2">Do you have any questions?</h4>
                            <a href="<?php echo home_url('/contact/'); ?>" target="_blank" class="text-underline">Contact</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="theree" role="tabpanel" aria-labelledby="theree-tab">
        <div class="pricelist-box-wrapper">
                
                <!-- DOMESTIC SERVICE -->
                <div class="row pricelist-box-header border">
                    <div class="col text-center">
                        <h2>DOMESTIC SERVICE</h2>
                    </div>
                </div>
                <div class="pricelist-box-container">
                    <div class="row border bgpricetable">
                        <div class="col-sm-5">
                            <p></p>
                        </div>
                        <div class="col-sm-7 border-left">
                            <div class="row">
                                <div class="col">
                                    <p>Weight of 1 parcel</p>
                                </div>
                                <div class="col text-center">
                                    <p>Net price</p>
                                </div>
                                <div class="col text-right">
                                    <p>Gross price</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="dox-price-list-box">
                        <div class="row border">
                            <div class="col-sm-5 dox-price-secenitem pt-2">
                                <div class="row">
                                    <div class="col text-center">
                                        <p>DOX</p>
                                    </div>
                                    <div class="col text-center">
                                        <i class="fas fa-envelope text-body"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-7 border-left">
                                <div class="row">
                                    <div class="col">
                                        <p>DOX</p>
                                    </div>
                                    <div class="col text-center">
                                        <p>13.69 PLN</p>
                                    </div>
                                    <div class="col text-right">
                                        <p>16.84 PLN</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="parcel-price-list-box">
                        <div class="row border">
                            <div class="col-sm-5 dox-price-secenitem pt-2">
                                <div class="row">
                                    <div class="col text-center">
                                        <p>Parcel</p>
                                    </div>
                                    <div class="col text-center">
                                        <i class="fas fa-box text-body"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-7 border-left">
                                <div class="row border-bottom">
                                    <div class="col">
                                        <p>to 5 kg</p>
                                    </div>
                                    <div class="col text-center">
                                        <p>13.69 PLN</p>
                                    </div>
                                    <div class="col text-right">
                                        <p>16.84 PLN</p>
                                    </div>
                                </div>
                                <div class="row border-bottom">
                                    <div class="col">
                                        <p>from 5 to 10 kg</p>
                                    </div>
                                    <div class="col text-center">
                                        <p>14.39 PLN</p>
                                    </div>
                                    <div class="col text-right">
                                        <p>17.70 PLN</p>
                                    </div>
                                </div>
                                <div class="row border-bottom">
                                    <div class="col">
                                        <p>from 10 to 20 kg</p>
                                    </div>
                                    <div class="col text-center">
                                        <p>15.79 PLN</p>
                                    </div>
                                    <div class="col text-right">
                                        <p>19.42 PLN</p>
                                    </div>
                                </div>
                                <div class="row border-bottom">
                                    <div class="col">
                                        <p>from 20 to 31.5 kg</p>
                                    </div>
                                    <div class="col text-center">
                                        <p>17.19 PLN</p>
                                    </div>
                                    <div class="col text-right">
                                        <p>21.14 PLN</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <p>from 31.5 to 50 kg</p>
                                    </div>
                                    <div class="col text-center">
                                        <p>78.00 PLN</p>
                                    </div>
                                    <div class="col text-right">
                                        <p>95.94 PLN</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pallet-price-list-box">
                        <div class="row border">
                            <div class="col-sm-5 dox-price-secenitem pt-2">
                                <div class="row">
                                    <div class="col text-center">
                                        <p>Parcel</p>
                                    </div>
                                    <div class="col text-center">
                                        <i class="fas fa-wallet text-body"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-7 border-left">
                                <div class="row border-bottom">
                                    <div class="col">
                                        <p>to 5 kg</p>
                                    </div>
                                    <div class="col text-center">
                                        <p>13.69 PLN</p>
                                    </div>
                                    <div class="col text-right">
                                        <p>16.84 PLN</p>
                                    </div>
                                </div>
                                <div class="row border-bottom">
                                    <div class="col">
                                        <p>from 5 to 10 kg</p>
                                    </div>
                                    <div class="col text-center">
                                        <p>14.39 PLN</p>
                                    </div>
                                    <div class="col text-right">
                                        <p>17.70 PLN</p>
                                    </div>
                                </div>
                                <div class="row border-bottom">
                                    <div class="col">
                                        <p>from 10 to 20 kg</p>
                                    </div>
                                    <div class="col text-center">
                                        <p>15.79 PLN</p>
                                    </div>
                                    <div class="col text-right">
                                        <p>19.42 PLN</p>
                                    </div>
                                </div>
                                <div class="row border-bottom">
                                    <div class="col">
                                        <p>from 20 to 31.5 kg</p>
                                    </div>
                                    <div class="col text-center">
                                        <p>17.19 PLN</p>
                                    </div>
                                    <div class="col text-right">
                                        <p>21.14 PLN</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <p>from 31.5 to 50 kg</p>
                                    </div>
                                    <div class="col text-center">
                                        <p>78.00 PLN</p>
                                    </div>
                                    <div class="col text-right">
                                        <p>95.94 PLN</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>

                <!-- ADDITIONAL SERVICES -->

                <div class="row pricelist-box-header border">
                    <div class="col text-center">
                        <h2>ADDITIONAL SERVICES</h2>
                    </div>
                </div>
                <div class="row border bgpricetable">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>Service name</p>
                    </div>
                    <div class="col-sm-5 border-left">
                        <div class="row">
                            <div class="col">
                                <p>Net price</p>
                            </div>
                            <div class="col text-right">
                                <p>Gross price</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>Parcel insurance of a package with value higher that 500 PLN and weight to 31.50 kg <sup class="text-primary">(1)</sup></p>
                    </div>
                    <div class="col-sm-5 border-left">
                        <div class="row">
                            <div class="col">
                                <p>2.16 PLN</p>
                            </div>
                            <div class="col text-right">
                                <p>2.66 PLN</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border-left">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>Parcel insurance of a package with value higher that 500 PLN and weight from 31.51 kg <sup class="text-primary">(1)</sup></p>
                    </div>
                    <div class="col-sm-5 border-left border-right">
                        <div class="row">
                            <div class="col">
                                <p>6.00 PLN</p>
                            </div>
                            <div class="col text-right">
                                <p>7.38 PLN</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border-top border-left">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>Non-standard element to 31.50 kg <sup class="text-primary">(2)</sup></p>
                    </div>
                    <div class="col-sm-5 border-left border-right">
                        <div class="row">
                            <div class="col">
                                <p>36.90 PLN</p>
                            </div>
                            <div class="col text-right">
                                <p>45.39 PLN</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border-top border-left border-right">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>Non-standard element from 31.51 kg <sup class="text-primary">(2)</sup></p>
                    </div>
                    <div class="col-sm-5 border-left">
                        <div class="row">
                            <div class="col">
                                <p>120.00 PLN</p>
                            </div>
                            <div class="col text-right">
                                <p>147.60 PLN</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border-top border-left border-right">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>Cash on delivery Standard from 0.01 PLN <sup class="text-primary">(3)</sup></p>
                    </div>
                    <div class="col-sm-5 border-left">
                        <div class="row">
                            <div class="col">
                                <p>3.99 PLN</p>
                            </div>
                            <div class="col text-right">
                                <p>4.91 PLN</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>Return of documents</p>
                    </div>
                    <div class="col-sm-5">
                        <div class="row border-left">
                            <div class="col">
                                <p>16.17 PLN</p>
                            </div>
                            <div class="col text-right">
                                <p>19.89 PLN</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- NON-STANDARD SERVICES -->
                
                <div class="row pricelist-box-header border">
                    <div class="col text-center">
                        <h2>NON-STANDARD SERVICES</h2>
                    </div>
                </div>
                <div class="row border bgpricetable">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>Service name</p>
                    </div>
                    <div class="col-sm-5 border-left">
                        <div class="row">
                            <div class="col">
                                <p>Net price</p>
                            </div>
                            <div class="col text-right">
                                <p>Gross price</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>Address correction</p>
                    </div>
                    <div class="col-sm-5 border-left">
                        <div class="row">
                            <div class="col">
                                <p>100.00% package price</p>
                            </div>
                            <div class="col text-right">
                                <p>100.00% package price</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border-left">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>The same branch address correction</p>
                    </div>
                    <div class="col-sm-5 border-left border-right">
                        <div class="row">
                            <div class="col">
                                <p>10.00 PLN</p>
                            </div>
                            <div class="col text-right">
                                <p>12.30 PLN</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border-top border-left">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>Manual letter</p>
                    </div>
                    <div class="col-sm-5 border-left border-right">
                        <div class="row">
                            <div class="col">
                                <p>5.00 PLN</p>
                            </div>
                            <div class="col text-right">
                                <p>6.15 PLN</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border-top border-left border-right">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>Return to sender</p>
                    </div>
                    <div class="col-sm-5 border-left">
                        <div class="row">
                            <div class="col">
                                <p>Basic fee</p>
                            </div>
                            <div class="col text-right">
                                <p>Basic fee</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border-top border-left border-right">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>SMS notification</p>
                    </div>
                    <div class="col-sm-5 border-left">
                        <div class="row">
                            <div class="col">
                                <p>0.08 PLN</p>
                            </div>
                            <div class="col text-right">
                                <p>0.10 PLN</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>Return of undeliverable shipment</p>
                    </div>
                    <div class="col-sm-5">
                        <div class="row border-left">
                            <div class="col">
                                <p>100% charge for the parcel</p>
                            </div>
                            <div class="col text-right">
                                <p>100% charge for the parcel</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>Package exceeding an acceptable weight/dimensional limit</p>
                    </div>
                    <div class="col-sm-5">
                        <div class="row border-left">
                            <div class="col">
                                <p>According to the Partner's price list</p>
                            </div>
                            <div class="col text-right">
                                <p>According to the Partner's price list</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>Dispatch of a package inconsistent with an order (within an acceptable weight limit)</p>
                    </div>
                    <div class="col-sm-5">
                        <div class="row border-left">
                            <div class="col">
                                <p>According to the price list</p>
                            </div>
                            <div class="col text-right">
                                <p>According to the price list</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>Sending or attempting to send dangerous goods (especially pyrotechnics)</p>
                    </div>
                    <div class="col-sm-5">
                        <div class="row border-left">
                            <div class="col">
                                <p>2,000.00 PLN</p>
                            </div>
                            <div class="col text-right">
                                <p>2,460.00 PLN</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>Payment fee (PayPal)</p>
                    </div>
                    <div class="col-sm-5">
                        <div class="row border-left">
                            <div class="col">
                                <p>0.80 PLN + 0.81% from the paid amount</p>
                            </div>
                            <div class="col text-right">
                                <p>0.98 PLN + 1.00% from the paid amount</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>Sending a vindicatory reminder (cost of a priority registered letter)</p>
                    </div>
                    <div class="col-sm-5">
                        <div class="row border-left">
                            <div class="col">
                                <p>8.40 PLN</p>
                            </div>
                            <div class="col text-right">
                                <p>8.40 PLN</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>Wysłanie faktury w wersji papierowej (koszt listu poleconego priorytetowego)</p>
                    </div>
                    <div class="col-sm-5">
                        <div class="row border-left">
                            <div class="col">
                                <p>8.40 PLN</p>
                            </div>
                            <div class="col text-right">
                                <p>8.40 PLN</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>Re-transfer fee</p>
                    </div>
                    <div class="col-sm-5">
                        <div class="row border-left">
                            <div class="col">
                                <p>2.00 PLN</p>
                            </div>
                            <div class="col text-right">
                                <p>2.46 PLN</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>Verification transfer fee</p>
                    </div>
                    <div class="col-sm-5">
                        <div class="row border-left">
                            <div class="col">
                                <p>5.00 PLN</p>
                            </div>
                            <div class="col text-right">
                                <p>6.15 PLN</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>A fee for paying out the funds from a prepaid account <sup>(4)</sup></p>
                    </div>
                    <div class="col-sm-5">
                        <div class="row border-left">
                            <div class="col">
                                <p>10.00 PLN</p>
                            </div>
                            <div class="col text-right">
                                <p>12.30 PLN</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pricelist-notes pt-4">
                <p><span class="text-primary">(1)</span> For collection packages, the fee is charged from 0.00 PLN.</p>
                <p><span class="text-primary">(2)</span> The fee charged if, as a result of the verification, the carrier finds that the longest side of the package was longer than 120 cm (max 200 cm) or, one of the other sides, exceeded 60 cm. It can also be charged to all packages that required manual sorting e.g. delicate, irregularly shaped packages, wrapped only in foil, etc.</p>
                <p><span class="text-primary">(3)</span> The picking amount is sent to the shipper up to 7 business days after delivery. Maximum download £1,500.00.</p>
                <p><span class="text-primary">(4)</span> The fee is charged when you place an order to withdraw funds that were not used to order services.</p>
            </div>
            <div class="pricelist-service-info pt-5">
                <div class="row">
                    <div class="col-sm-7">
                        <div class="pricelist-left-box">
                            <div class="pricelist-box-head pb-3">
                                <h2>Low prices are not everything. In addition, we offer:</h2>
                            </div>
                            <p>Prepaid account and full control over expenses.</p>
                            <p>One blanket invoice at the end of the month.</p>
                            <p>Fast download returns on the next business day after delivery.</p>
                            <p>Fuel and road toll included.</p>
                            <p>Business price list from 40 packages per month.</p>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="pricelist-right-box text-center pt-5">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/support-team.png" alt="" class="img-fluid">
                            <h4 class="pt-2">Do you have any questions?</h4>
                            <a href="<?php echo home_url('/contact/'); ?>" target="_blank" class="text-underline">Contact</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="four" role="tabpanel" aria-labelledby="four-tab">
        <div class="pricelist-box-wrapper">
                
                <!-- DOMESTIC SERVICE -->
                <div class="row pricelist-box-header border">
                    <div class="col text-center">
                        <h2>DOMESTIC SERVICE</h2>
                    </div>
                </div>
                <div class="pricelist-box-container">
                    <div class="row border bgpricetable">
                        <div class="col-sm-5">
                            <p></p>
                        </div>
                        <div class="col-sm-7 border-left">
                            <div class="row">
                                <div class="col">
                                    <p>Weight of 1 parcel</p>
                                </div>
                                <div class="col text-center">
                                    <p>Net price</p>
                                </div>
                                <div class="col text-right">
                                    <p>Gross price</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="dox-price-list-box">
                        <div class="row border">
                            <div class="col-sm-5 dox-price-secenitem pt-2">
                                <div class="row">
                                    <div class="col text-center">
                                        <p>DOX</p>
                                    </div>
                                    <div class="col text-center">
                                        <i class="fas fa-envelope text-body"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-7 border-left">
                                <div class="row">
                                    <div class="col">
                                        <p>DOX</p>
                                    </div>
                                    <div class="col text-center">
                                        <p>13.69 PLN</p>
                                    </div>
                                    <div class="col text-right">
                                        <p>16.84 PLN</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="parcel-price-list-box">
                        <div class="row border">
                            <div class="col-sm-5 dox-price-secenitem pt-2">
                                <div class="row">
                                    <div class="col text-center">
                                        <p>Parcel</p>
                                    </div>
                                    <div class="col text-center">
                                        <i class="fas fa-box text-body"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-7 border-left">
                                <div class="row border-bottom">
                                    <div class="col">
                                        <p>to 5 kg</p>
                                    </div>
                                    <div class="col text-center">
                                        <p>13.69 PLN</p>
                                    </div>
                                    <div class="col text-right">
                                        <p>16.84 PLN</p>
                                    </div>
                                </div>
                                <div class="row border-bottom">
                                    <div class="col">
                                        <p>from 5 to 10 kg</p>
                                    </div>
                                    <div class="col text-center">
                                        <p>14.39 PLN</p>
                                    </div>
                                    <div class="col text-right">
                                        <p>17.70 PLN</p>
                                    </div>
                                </div>
                                <div class="row border-bottom">
                                    <div class="col">
                                        <p>from 10 to 20 kg</p>
                                    </div>
                                    <div class="col text-center">
                                        <p>15.79 PLN</p>
                                    </div>
                                    <div class="col text-right">
                                        <p>19.42 PLN</p>
                                    </div>
                                </div>
                                <div class="row border-bottom">
                                    <div class="col">
                                        <p>from 20 to 31.5 kg</p>
                                    </div>
                                    <div class="col text-center">
                                        <p>17.19 PLN</p>
                                    </div>
                                    <div class="col text-right">
                                        <p>21.14 PLN</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <p>from 31.5 to 50 kg</p>
                                    </div>
                                    <div class="col text-center">
                                        <p>78.00 PLN</p>
                                    </div>
                                    <div class="col text-right">
                                        <p>95.94 PLN</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pallet-price-list-box">
                        <div class="row border">
                            <div class="col-sm-5 dox-price-secenitem pt-2">
                                <div class="row">
                                    <div class="col text-center">
                                        <p>Parcel</p>
                                    </div>
                                    <div class="col text-center">
                                        <i class="fas fa-wallet text-body"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-7 border-left">
                                <div class="row border-bottom">
                                    <div class="col">
                                        <p>to 5 kg</p>
                                    </div>
                                    <div class="col text-center">
                                        <p>13.69 PLN</p>
                                    </div>
                                    <div class="col text-right">
                                        <p>16.84 PLN</p>
                                    </div>
                                </div>
                                <div class="row border-bottom">
                                    <div class="col">
                                        <p>from 5 to 10 kg</p>
                                    </div>
                                    <div class="col text-center">
                                        <p>14.39 PLN</p>
                                    </div>
                                    <div class="col text-right">
                                        <p>17.70 PLN</p>
                                    </div>
                                </div>
                                <div class="row border-bottom">
                                    <div class="col">
                                        <p>from 10 to 20 kg</p>
                                    </div>
                                    <div class="col text-center">
                                        <p>15.79 PLN</p>
                                    </div>
                                    <div class="col text-right">
                                        <p>19.42 PLN</p>
                                    </div>
                                </div>
                                <div class="row border-bottom">
                                    <div class="col">
                                        <p>from 20 to 31.5 kg</p>
                                    </div>
                                    <div class="col text-center">
                                        <p>17.19 PLN</p>
                                    </div>
                                    <div class="col text-right">
                                        <p>21.14 PLN</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <p>from 31.5 to 50 kg</p>
                                    </div>
                                    <div class="col text-center">
                                        <p>78.00 PLN</p>
                                    </div>
                                    <div class="col text-right">
                                        <p>95.94 PLN</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>

                <!-- ADDITIONAL SERVICES -->

                <div class="row pricelist-box-header border">
                    <div class="col text-center">
                        <h2>ADDITIONAL SERVICES</h2>
                    </div>
                </div>
                <div class="row border bgpricetable">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>Service name</p>
                    </div>
                    <div class="col-sm-5 border-left">
                        <div class="row">
                            <div class="col">
                                <p>Net price</p>
                            </div>
                            <div class="col text-right">
                                <p>Gross price</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>Parcel insurance of a package with value higher that 500 PLN and weight to 31.50 kg <sup class="text-primary">(1)</sup></p>
                    </div>
                    <div class="col-sm-5 border-left">
                        <div class="row">
                            <div class="col">
                                <p>2.16 PLN</p>
                            </div>
                            <div class="col text-right">
                                <p>2.66 PLN</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border-left">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>Parcel insurance of a package with value higher that 500 PLN and weight from 31.51 kg <sup class="text-primary">(1)</sup></p>
                    </div>
                    <div class="col-sm-5 border-left border-right">
                        <div class="row">
                            <div class="col">
                                <p>6.00 PLN</p>
                            </div>
                            <div class="col text-right">
                                <p>7.38 PLN</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border-top border-left">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>Non-standard element to 31.50 kg <sup class="text-primary">(2)</sup></p>
                    </div>
                    <div class="col-sm-5 border-left border-right">
                        <div class="row">
                            <div class="col">
                                <p>36.90 PLN</p>
                            </div>
                            <div class="col text-right">
                                <p>45.39 PLN</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border-top border-left border-right">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>Non-standard element from 31.51 kg <sup class="text-primary">(2)</sup></p>
                    </div>
                    <div class="col-sm-5 border-left">
                        <div class="row">
                            <div class="col">
                                <p>120.00 PLN</p>
                            </div>
                            <div class="col text-right">
                                <p>147.60 PLN</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border-top border-left border-right">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>Cash on delivery Standard from 0.01 PLN <sup class="text-primary">(3)</sup></p>
                    </div>
                    <div class="col-sm-5 border-left">
                        <div class="row">
                            <div class="col">
                                <p>3.99 PLN</p>
                            </div>
                            <div class="col text-right">
                                <p>4.91 PLN</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>Return of documents</p>
                    </div>
                    <div class="col-sm-5">
                        <div class="row border-left">
                            <div class="col">
                                <p>16.17 PLN</p>
                            </div>
                            <div class="col text-right">
                                <p>19.89 PLN</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- NON-STANDARD SERVICES -->
                
                <div class="row pricelist-box-header border">
                    <div class="col text-center">
                        <h2>NON-STANDARD SERVICES</h2>
                    </div>
                </div>
                <div class="row border bgpricetable">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>Service name</p>
                    </div>
                    <div class="col-sm-5 border-left">
                        <div class="row">
                            <div class="col">
                                <p>Net price</p>
                            </div>
                            <div class="col text-right">
                                <p>Gross price</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>Address correction</p>
                    </div>
                    <div class="col-sm-5 border-left">
                        <div class="row">
                            <div class="col">
                                <p>100.00% package price</p>
                            </div>
                            <div class="col text-right">
                                <p>100.00% package price</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border-left">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>The same branch address correction</p>
                    </div>
                    <div class="col-sm-5 border-left border-right">
                        <div class="row">
                            <div class="col">
                                <p>10.00 PLN</p>
                            </div>
                            <div class="col text-right">
                                <p>12.30 PLN</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border-top border-left">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>Manual letter</p>
                    </div>
                    <div class="col-sm-5 border-left border-right">
                        <div class="row">
                            <div class="col">
                                <p>5.00 PLN</p>
                            </div>
                            <div class="col text-right">
                                <p>6.15 PLN</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border-top border-left border-right">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>Return to sender</p>
                    </div>
                    <div class="col-sm-5 border-left">
                        <div class="row">
                            <div class="col">
                                <p>Basic fee</p>
                            </div>
                            <div class="col text-right">
                                <p>Basic fee</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border-top border-left border-right">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>SMS notification</p>
                    </div>
                    <div class="col-sm-5 border-left">
                        <div class="row">
                            <div class="col">
                                <p>0.08 PLN</p>
                            </div>
                            <div class="col text-right">
                                <p>0.10 PLN</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>Return of undeliverable shipment</p>
                    </div>
                    <div class="col-sm-5">
                        <div class="row border-left">
                            <div class="col">
                                <p>100% charge for the parcel</p>
                            </div>
                            <div class="col text-right">
                                <p>100% charge for the parcel</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>Package exceeding an acceptable weight/dimensional limit</p>
                    </div>
                    <div class="col-sm-5">
                        <div class="row border-left">
                            <div class="col">
                                <p>According to the Partner's price list</p>
                            </div>
                            <div class="col text-right">
                                <p>According to the Partner's price list</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>Dispatch of a package inconsistent with an order (within an acceptable weight limit)</p>
                    </div>
                    <div class="col-sm-5">
                        <div class="row border-left">
                            <div class="col">
                                <p>According to the price list</p>
                            </div>
                            <div class="col text-right">
                                <p>According to the price list</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>Sending or attempting to send dangerous goods (especially pyrotechnics)</p>
                    </div>
                    <div class="col-sm-5">
                        <div class="row border-left">
                            <div class="col">
                                <p>2,000.00 PLN</p>
                            </div>
                            <div class="col text-right">
                                <p>2,460.00 PLN</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>Payment fee (PayPal)</p>
                    </div>
                    <div class="col-sm-5">
                        <div class="row border-left">
                            <div class="col">
                                <p>0.80 PLN + 0.81% from the paid amount</p>
                            </div>
                            <div class="col text-right">
                                <p>0.98 PLN + 1.00% from the paid amount</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>Sending a vindicatory reminder (cost of a priority registered letter)</p>
                    </div>
                    <div class="col-sm-5">
                        <div class="row border-left">
                            <div class="col">
                                <p>8.40 PLN</p>
                            </div>
                            <div class="col text-right">
                                <p>8.40 PLN</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>Wysłanie faktury w wersji papierowej (koszt listu poleconego priorytetowego)</p>
                    </div>
                    <div class="col-sm-5">
                        <div class="row border-left">
                            <div class="col">
                                <p>8.40 PLN</p>
                            </div>
                            <div class="col text-right">
                                <p>8.40 PLN</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>Re-transfer fee</p>
                    </div>
                    <div class="col-sm-5">
                        <div class="row border-left">
                            <div class="col">
                                <p>2.00 PLN</p>
                            </div>
                            <div class="col text-right">
                                <p>2.46 PLN</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>Verification transfer fee</p>
                    </div>
                    <div class="col-sm-5">
                        <div class="row border-left">
                            <div class="col">
                                <p>5.00 PLN</p>
                            </div>
                            <div class="col text-right">
                                <p>6.15 PLN</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>A fee for paying out the funds from a prepaid account <sup>(4)</sup></p>
                    </div>
                    <div class="col-sm-5">
                        <div class="row border-left">
                            <div class="col">
                                <p>10.00 PLN</p>
                            </div>
                            <div class="col text-right">
                                <p>12.30 PLN</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pricelist-notes pt-4">
                <p><span class="text-primary">(1)</span> For collection packages, the fee is charged from 0.00 PLN.</p>
                <p><span class="text-primary">(2)</span> The fee charged if, as a result of the verification, the carrier finds that the longest side of the package was longer than 120 cm (max 200 cm) or, one of the other sides, exceeded 60 cm. It can also be charged to all packages that required manual sorting e.g. delicate, irregularly shaped packages, wrapped only in foil, etc.</p>
                <p><span class="text-primary">(3)</span> The picking amount is sent to the shipper up to 7 business days after delivery. Maximum download £1,500.00.</p>
                <p><span class="text-primary">(4)</span> The fee is charged when you place an order to withdraw funds that were not used to order services.</p>
            </div>
            <div class="pricelist-service-info pt-5">
                <div class="row">
                    <div class="col-sm-7">
                        <div class="pricelist-left-box">
                            <div class="pricelist-box-head pb-3">
                                <h2>Low prices are not everything. In addition, we offer:</h2>
                            </div>
                            <p>Prepaid account and full control over expenses.</p>
                            <p>One blanket invoice at the end of the month.</p>
                            <p>Fast download returns on the next business day after delivery.</p>
                            <p>Fuel and road toll included.</p>
                            <p>Business price list from 40 packages per month.</p>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="pricelist-right-box text-center pt-5">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/support-team.png" alt="" class="img-fluid">
                            <h4 class="pt-2">Do you have any questions?</h4>
                            <a href="<?php echo home_url('/contact/'); ?>" target="_blank" class="text-underline">Contact</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="five" role="tabpanel" aria-labelledby="five-tab">
        <div class="pricelist-box-wrapper">
                
                <!-- DOMESTIC SERVICE -->
                <div class="row pricelist-box-header border">
                    <div class="col text-center">
                        <h2>DOMESTIC SERVICE</h2>
                    </div>
                </div>
                <div class="pricelist-box-container">
                    <div class="row border bgpricetable">
                        <div class="col-sm-5">
                            <p></p>
                        </div>
                        <div class="col-sm-7 border-left">
                            <div class="row">
                                <div class="col">
                                    <p>Weight of 1 parcel</p>
                                </div>
                                <div class="col text-center">
                                    <p>Net price</p>
                                </div>
                                <div class="col text-right">
                                    <p>Gross price</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="dox-price-list-box">
                        <div class="row border">
                            <div class="col-sm-5 dox-price-secenitem pt-2">
                                <div class="row">
                                    <div class="col text-center">
                                        <p>DOX</p>
                                    </div>
                                    <div class="col text-center">
                                        <i class="fas fa-envelope text-body"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-7 border-left">
                                <div class="row">
                                    <div class="col">
                                        <p>DOX</p>
                                    </div>
                                    <div class="col text-center">
                                        <p>13.69 PLN</p>
                                    </div>
                                    <div class="col text-right">
                                        <p>16.84 PLN</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="parcel-price-list-box">
                        <div class="row border">
                            <div class="col-sm-5 dox-price-secenitem pt-2">
                                <div class="row">
                                    <div class="col text-center">
                                        <p>Parcel</p>
                                    </div>
                                    <div class="col text-center">
                                        <i class="fas fa-box text-body"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-7 border-left">
                                <div class="row border-bottom">
                                    <div class="col">
                                        <p>to 5 kg</p>
                                    </div>
                                    <div class="col text-center">
                                        <p>13.69 PLN</p>
                                    </div>
                                    <div class="col text-right">
                                        <p>16.84 PLN</p>
                                    </div>
                                </div>
                                <div class="row border-bottom">
                                    <div class="col">
                                        <p>from 5 to 10 kg</p>
                                    </div>
                                    <div class="col text-center">
                                        <p>14.39 PLN</p>
                                    </div>
                                    <div class="col text-right">
                                        <p>17.70 PLN</p>
                                    </div>
                                </div>
                                <div class="row border-bottom">
                                    <div class="col">
                                        <p>from 10 to 20 kg</p>
                                    </div>
                                    <div class="col text-center">
                                        <p>15.79 PLN</p>
                                    </div>
                                    <div class="col text-right">
                                        <p>19.42 PLN</p>
                                    </div>
                                </div>
                                <div class="row border-bottom">
                                    <div class="col">
                                        <p>from 20 to 31.5 kg</p>
                                    </div>
                                    <div class="col text-center">
                                        <p>17.19 PLN</p>
                                    </div>
                                    <div class="col text-right">
                                        <p>21.14 PLN</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <p>from 31.5 to 50 kg</p>
                                    </div>
                                    <div class="col text-center">
                                        <p>78.00 PLN</p>
                                    </div>
                                    <div class="col text-right">
                                        <p>95.94 PLN</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pallet-price-list-box">
                        <div class="row border">
                            <div class="col-sm-5 dox-price-secenitem pt-2">
                                <div class="row">
                                    <div class="col text-center">
                                        <p>Parcel</p>
                                    </div>
                                    <div class="col text-center">
                                        <i class="fas fa-wallet text-body"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-7 border-left">
                                <div class="row border-bottom">
                                    <div class="col">
                                        <p>to 5 kg</p>
                                    </div>
                                    <div class="col text-center">
                                        <p>13.69 PLN</p>
                                    </div>
                                    <div class="col text-right">
                                        <p>16.84 PLN</p>
                                    </div>
                                </div>
                                <div class="row border-bottom">
                                    <div class="col">
                                        <p>from 5 to 10 kg</p>
                                    </div>
                                    <div class="col text-center">
                                        <p>14.39 PLN</p>
                                    </div>
                                    <div class="col text-right">
                                        <p>17.70 PLN</p>
                                    </div>
                                </div>
                                <div class="row border-bottom">
                                    <div class="col">
                                        <p>from 10 to 20 kg</p>
                                    </div>
                                    <div class="col text-center">
                                        <p>15.79 PLN</p>
                                    </div>
                                    <div class="col text-right">
                                        <p>19.42 PLN</p>
                                    </div>
                                </div>
                                <div class="row border-bottom">
                                    <div class="col">
                                        <p>from 20 to 31.5 kg</p>
                                    </div>
                                    <div class="col text-center">
                                        <p>17.19 PLN</p>
                                    </div>
                                    <div class="col text-right">
                                        <p>21.14 PLN</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <p>from 31.5 to 50 kg</p>
                                    </div>
                                    <div class="col text-center">
                                        <p>78.00 PLN</p>
                                    </div>
                                    <div class="col text-right">
                                        <p>95.94 PLN</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>

                <!-- ADDITIONAL SERVICES -->

                <div class="row pricelist-box-header border">
                    <div class="col text-center">
                        <h2>ADDITIONAL SERVICES</h2>
                    </div>
                </div>
                <div class="row border bgpricetable">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>Service name</p>
                    </div>
                    <div class="col-sm-5 border-left">
                        <div class="row">
                            <div class="col">
                                <p>Net price</p>
                            </div>
                            <div class="col text-right">
                                <p>Gross price</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>Parcel insurance of a package with value higher that 500 PLN and weight to 31.50 kg <sup class="text-primary">(1)</sup></p>
                    </div>
                    <div class="col-sm-5 border-left">
                        <div class="row">
                            <div class="col">
                                <p>2.16 PLN</p>
                            </div>
                            <div class="col text-right">
                                <p>2.66 PLN</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border-left">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>Parcel insurance of a package with value higher that 500 PLN and weight from 31.51 kg <sup class="text-primary">(1)</sup></p>
                    </div>
                    <div class="col-sm-5 border-left border-right">
                        <div class="row">
                            <div class="col">
                                <p>6.00 PLN</p>
                            </div>
                            <div class="col text-right">
                                <p>7.38 PLN</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border-top border-left">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>Non-standard element to 31.50 kg <sup class="text-primary">(2)</sup></p>
                    </div>
                    <div class="col-sm-5 border-left border-right">
                        <div class="row">
                            <div class="col">
                                <p>36.90 PLN</p>
                            </div>
                            <div class="col text-right">
                                <p>45.39 PLN</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border-top border-left border-right">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>Non-standard element from 31.51 kg <sup class="text-primary">(2)</sup></p>
                    </div>
                    <div class="col-sm-5 border-left">
                        <div class="row">
                            <div class="col">
                                <p>120.00 PLN</p>
                            </div>
                            <div class="col text-right">
                                <p>147.60 PLN</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border-top border-left border-right">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>Cash on delivery Standard from 0.01 PLN <sup class="text-primary">(3)</sup></p>
                    </div>
                    <div class="col-sm-5 border-left">
                        <div class="row">
                            <div class="col">
                                <p>3.99 PLN</p>
                            </div>
                            <div class="col text-right">
                                <p>4.91 PLN</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>Return of documents</p>
                    </div>
                    <div class="col-sm-5">
                        <div class="row border-left">
                            <div class="col">
                                <p>16.17 PLN</p>
                            </div>
                            <div class="col text-right">
                                <p>19.89 PLN</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- NON-STANDARD SERVICES -->
                
                <div class="row pricelist-box-header border">
                    <div class="col text-center">
                        <h2>NON-STANDARD SERVICES</h2>
                    </div>
                </div>
                <div class="row border bgpricetable">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>Service name</p>
                    </div>
                    <div class="col-sm-5 border-left">
                        <div class="row">
                            <div class="col">
                                <p>Net price</p>
                            </div>
                            <div class="col text-right">
                                <p>Gross price</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>Address correction</p>
                    </div>
                    <div class="col-sm-5 border-left">
                        <div class="row">
                            <div class="col">
                                <p>100.00% package price</p>
                            </div>
                            <div class="col text-right">
                                <p>100.00% package price</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border-left">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>The same branch address correction</p>
                    </div>
                    <div class="col-sm-5 border-left border-right">
                        <div class="row">
                            <div class="col">
                                <p>10.00 PLN</p>
                            </div>
                            <div class="col text-right">
                                <p>12.30 PLN</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border-top border-left">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>Manual letter</p>
                    </div>
                    <div class="col-sm-5 border-left border-right">
                        <div class="row">
                            <div class="col">
                                <p>5.00 PLN</p>
                            </div>
                            <div class="col text-right">
                                <p>6.15 PLN</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border-top border-left border-right">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>Return to sender</p>
                    </div>
                    <div class="col-sm-5 border-left">
                        <div class="row">
                            <div class="col">
                                <p>Basic fee</p>
                            </div>
                            <div class="col text-right">
                                <p>Basic fee</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border-top border-left border-right">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>SMS notification</p>
                    </div>
                    <div class="col-sm-5 border-left">
                        <div class="row">
                            <div class="col">
                                <p>0.08 PLN</p>
                            </div>
                            <div class="col text-right">
                                <p>0.10 PLN</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>Return of undeliverable shipment</p>
                    </div>
                    <div class="col-sm-5">
                        <div class="row border-left">
                            <div class="col">
                                <p>100% charge for the parcel</p>
                            </div>
                            <div class="col text-right">
                                <p>100% charge for the parcel</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>Package exceeding an acceptable weight/dimensional limit</p>
                    </div>
                    <div class="col-sm-5">
                        <div class="row border-left">
                            <div class="col">
                                <p>According to the Partner's price list</p>
                            </div>
                            <div class="col text-right">
                                <p>According to the Partner's price list</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>Dispatch of a package inconsistent with an order (within an acceptable weight limit)</p>
                    </div>
                    <div class="col-sm-5">
                        <div class="row border-left">
                            <div class="col">
                                <p>According to the price list</p>
                            </div>
                            <div class="col text-right">
                                <p>According to the price list</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>Sending or attempting to send dangerous goods (especially pyrotechnics)</p>
                    </div>
                    <div class="col-sm-5">
                        <div class="row border-left">
                            <div class="col">
                                <p>2,000.00 PLN</p>
                            </div>
                            <div class="col text-right">
                                <p>2,460.00 PLN</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>Payment fee (PayPal)</p>
                    </div>
                    <div class="col-sm-5">
                        <div class="row border-left">
                            <div class="col">
                                <p>0.80 PLN + 0.81% from the paid amount</p>
                            </div>
                            <div class="col text-right">
                                <p>0.98 PLN + 1.00% from the paid amount</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>Sending a vindicatory reminder (cost of a priority registered letter)</p>
                    </div>
                    <div class="col-sm-5">
                        <div class="row border-left">
                            <div class="col">
                                <p>8.40 PLN</p>
                            </div>
                            <div class="col text-right">
                                <p>8.40 PLN</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>Wysłanie faktury w wersji papierowej (koszt listu poleconego priorytetowego)</p>
                    </div>
                    <div class="col-sm-5">
                        <div class="row border-left">
                            <div class="col">
                                <p>8.40 PLN</p>
                            </div>
                            <div class="col text-right">
                                <p>8.40 PLN</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>Re-transfer fee</p>
                    </div>
                    <div class="col-sm-5">
                        <div class="row border-left">
                            <div class="col">
                                <p>2.00 PLN</p>
                            </div>
                            <div class="col text-right">
                                <p>2.46 PLN</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>Verification transfer fee</p>
                    </div>
                    <div class="col-sm-5">
                        <div class="row border-left">
                            <div class="col">
                                <p>5.00 PLN</p>
                            </div>
                            <div class="col text-right">
                                <p>6.15 PLN</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border">
                    <div class="col-sm-7 text-center text-lg-left text-md-left">
                        <p>A fee for paying out the funds from a prepaid account <sup>(4)</sup></p>
                    </div>
                    <div class="col-sm-5">
                        <div class="row border-left">
                            <div class="col">
                                <p>10.00 PLN</p>
                            </div>
                            <div class="col text-right">
                                <p>12.30 PLN</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pricelist-notes pt-4">
                <p><span class="text-primary">(1)</span> For collection packages, the fee is charged from 0.00 PLN.</p>
                <p><span class="text-primary">(2)</span> The fee charged if, as a result of the verification, the carrier finds that the longest side of the package was longer than 120 cm (max 200 cm) or, one of the other sides, exceeded 60 cm. It can also be charged to all packages that required manual sorting e.g. delicate, irregularly shaped packages, wrapped only in foil, etc.</p>
                <p><span class="text-primary">(3)</span> The picking amount is sent to the shipper up to 7 business days after delivery. Maximum download £1,500.00.</p>
                <p><span class="text-primary">(4)</span> The fee is charged when you place an order to withdraw funds that were not used to order services.</p>
            </div>
            <div class="pricelist-service-info pt-5">
                <div class="row">
                    <div class="col-sm-7">
                        <div class="pricelist-left-box">
                            <div class="pricelist-box-head pb-3">
                                <h2>Low prices are not everything. In addition, we offer:</h2>
                            </div>
                            <p>Prepaid account and full control over expenses.</p>
                            <p>One blanket invoice at the end of the month.</p>
                            <p>Fast download returns on the next business day after delivery.</p>
                            <p>Fuel and road toll included.</p>
                            <p>Business price list from 40 packages per month.</p>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="pricelist-right-box text-center pt-5">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/support-team.png" alt="" class="img-fluid">
                            <h4 class="pt-2">Do you have any questions?</h4>
                            <a href="<?php echo home_url('/contact/'); ?>" target="_blank" class="text-underline">Contact</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</section>


<?php

get_footer();

?>