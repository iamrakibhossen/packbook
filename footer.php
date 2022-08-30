<div class="clearfix"></div>
<footer class="position-relative pt-5" id="footer-main">


    <div class="footer footer-dark bg-black">

        <div class="container pt-2">

            <div class="row">
                <div class="col-lg-4 mb-5 mb-lg-0"><a href="/"><img alt="Image placeholder" src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/images/logo/footer-logo.png?v1.2" id="footer-logo"></a>
                    <p class="mt-4 text-sm opacity-8 pr-lg-4">Dzięki Packbookowi możesz łatwo importować zamówienia z największych i najpopularniejszych platform handlowych w jedno miejsce. Nasze rozwiązania pozwolą Ci automatycznie kontrolować status zamówień, generować i drukować dokumenty przewozowe oraz zlecić odbiór przesyłek i ładunków.

                    </p>
                    <ul class="nav mt-4">

                        <li class="nav-item"><a class="nav-link" href="https://www.facebook.com/Packbook/" target="_blank"><i class="fab fa-facebook"></i></a></li>
                        <li class="nav-item"><a class="nav-link" href="" target="_blank"><i class="fab fa-twitter"></i></a></li>
                        <li class="nav-item"><a class="nav-link" href="https://www.instagram.com/packbook.pl/" target="_blank"><i class="fab fa-instagram"></i></a></li>
                        <li class="nav-item"><a class="nav-link" href="" target="_blank"><i class="fab fa-pinterest"></i></a></li>
                        <li class="nav-item"><a class="nav-link" href="" target="_blank"><i class="fab fa-linkedin"></i></a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-6 col-sm-4 ml-lg-auto mb-5 mb-lg-0">
                    <h6 class="heading mb-3 mt-4">Produkt</h6>
                    <ul class="list-unstyled">
                        <li><a href="<?php echo home_url('/tracking/'); ?>">Śledzenie paczek</a></li>
                        <li><a href="<?php echo home_url('/pricing-list/'); ?>">Cennik</a></li>
                        <li><a href="<?php echo home_url('/tools/'); ?>">Narzędzia</a></li>

                    </ul>
                </div>
                <div class="col-lg-2 col-6 col-sm-4 mb-5 mb-lg-0">
                    <h6 class="heading mb-3 mt-4">Firma</h6>
                    <ul class="list-unstyled">
                        <li><a href="<?php echo home_url('/about/'); ?>">O nas</a></li>
                        <li><a href="<?php echo home_url('/business/'); ?>">Rozwiązania dla firm</a></li>
                        <li><a href="<?php echo home_url('/store/'); ?>">Packstore</a></li>
                    </ul>

                    <a href=""><img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/images/app-store.png" class="img-fluid rounded mt-3"></a>

                </div>
                <div class="col-lg-2 col-6 col-sm-4 mb-5 mb-lg-0">
                    <h6 class="heading mb-3 mt-4">Usługi</h6>
                    <ul class="list-unstyled">
                        <li><a href="<?php echo home_url('/contact/'); ?>">Centrum pomocy</a></li>
                        <li><a href="<?php echo home_url('/blog/'); ?>">Blog</a></li>
                        <li><a href="<?php echo home_url('/faq/'); ?>">FAQ</a></li>
                    </ul>

                    <a href=""><img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/images/google-play.png" class="img-fluid rounded mt-3"></a>

                </div>
            </div>
            
        <hr class="divider divider-fade divider-dark my-4">
        
            <div class="row align-items-center justify-content-md-between pb-4">
                <div class="col-md-6">
                    <div class="copyright text-sm font-weight-bold text-center text-md-left">© 2021 <a href="<?php echo home_url('/'); ?>" class="font-weight-bold" target="_blank"><?php echo get_bloginfo('name'); ?></a>. wszystkie prawa zastrzeżone</div>
                </div>
                <div class="col-md-6">
                    <ul class="nav justify-content-center justify-content-md-end mt-3 mt-md-0">
                        <li class="nav-item"><a class="nav-link" href="<?php echo home_url('/terms/'); ?>">Warunki</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo home_url('/privacy/'); ?>">Prywatność</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo home_url('/cookies/'); ?>">Ciasteczka</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>

</body>

</html>