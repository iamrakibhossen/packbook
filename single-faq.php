<?php

global $post;

$args = [
    'taxonomy' => 'faq_cat',
    'hide_empty' => false,
    'orderby' => 'term_id',
    'order' => 'ASC'
];
$cats = get_terms($args);

$terms = wp_get_post_terms( $post->ID, 'faq_cat',array('fields' => 'ids') );

get_header();
?>

<section class="faq-bg-banner py-5">
    <div class="container">
        <div class="row justify-content-center align-items-center py-5">
            <div class="col-12 text-center">
                <h1 class=" text-white">FAQ</h1>
            </div>
        </div>
    </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-3 font-weight-bold mb-3">

                <div class="nav flex-column nav-pills">
                    <h5 class="font-weight-normal">FAQ Category</h5>

                    <?php foreach ($cats as $cat) { ?>
                        <a class="nav-link py-2 <?php if ( in_array($cat->term_id, $terms) ) echo 'active'; ?>" href="<?php echo get_term_link($cat); ?>"><?php echo $cat->name; ?></a>
                    <?php } ?>

                </div>
            </div>
            <div class="col-md-9 mb-3">
                <div class="tab-content">
                    <div class="text-lg">



                        <?php if (have_posts()) :
                            while (have_posts()) :
                                the_post();
                        ?>
                                <div class="py-2">
                                    <h1 class="h2"><?php the_title(); ?></h1>
                                </div>
                                <div class="py-2">
                                    <?php the_content(); ?>
                                </div>
                        <?php
                            endwhile;
                        endif
                        ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<section class="border-top">
    <div class="container">
        <div class="row align-items-center py-5">
            <div class="col-sm-7 mb-5">
                <h3>Zaoszczędzimy Twój czas, pieniądze i wysiłek</h3>
                <p>Sprawdź nasze cenniki i przekonaj się sam. </p>
                <a href="<?php echo home_url('/pricing-list/'); ?>" class="btn btn-warning">Sprawdź cennik</a>
            </div>
            <div class="col-sm-5">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/zaoszczędzimy-icon-12.png" alt="" class="img-fluid">
            </div>
        </div>
    </div>
</section>


<section class="slice slice-lg delimiter-top " id="sct-form-contact">
    <div class="container position-relative zindex-100">
        <div class="row justify-content-center mb-5">
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

                <form id="form-contact" method="POST" action="<?php echo home_url('/contact/'); ?>">

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

                    <input type="hidden" name="nonce" id="nonce" value="<?php echo wp_create_nonce('contact'); ?>" />

                </form>
            </div>
        </div>
    </div>
</section>


<?php

get_footer();

?>