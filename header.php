<?php

global $user_ID;

$args = pb_child_pages_id('dashboard');

$page_id = get_queried_object_id();

$balance = get_user_meta($user_ID, '_pb_user_balance', true);

$balance = pb_price($balance);

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <title><?php wp_title('', true, 'right');
            if (!is_home() && !is_front_page()) echo ' | ';
            bloginfo('name');
            $site_description = get_bloginfo('description', 'display');
            if ($site_description && (is_home() || is_front_page())) echo ' | ' . $site_description; ?></title>

    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/favicon/favicon-16x16.png">

    <!-- Loads the internal WP jQuery -->

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;0,600;0,700;0,900;1,400;1,500;1,600;1,700;1,900&display=swap" rel="stylesheet">


    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <header id="masthead" class="site-header border-bottom">

        <nav id="nav-main" class="navbar navbar-expand-lg bg-white navbar-light">

            <div class="container-fluid">

                <a class="navbar-brand" href="<?php echo esc_url(home_url()); ?>">
                    <image src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/images/logo/logo.png?v1.2" alt="logo" class="logo">
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-info" aria-controls="navbar-info" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbar-info">


                    <ul class=" navbar-nav align-items-lg-center d-lg-flex ml-lg-auto text-sm">
                        <li class="nav-item"><a class="nav-link " href="<?php echo esc_url(home_url('/packbox/')); ?>">Packbox</a></li>
                        <li class="nav-item"><a class="nav-link " href="<?php echo esc_url(home_url('/packbook-exchange/')); ?>">Exchange</a></li>
                        <li class="nav-item"><a class="nav-link " href="<?php echo esc_url(home_url('/packbook-pro/')); ?>">Pro</a></li>
                        <li class="nav-item"><a class="nav-link " href="<?php echo esc_url(home_url('/packbook-expedited/')); ?>">Expedited</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo esc_url(home_url('/tracking/')); ?>">Śledzenie przesyłek</a></li>
                        <li class="nav-item"><a class="nav-link " href="<?php echo esc_url(home_url('/pricing-list/')); ?>">Cennik</a></li>
                        <li class="nav-item"><a class="nav-link " href="<?php echo esc_url(home_url('/contact/')); ?>">Kontakt</a></li>

                        <?php if ($user_ID) { ?>

                            <li class="nav-item d-lg-inline ml-lg-3">
                                <?php


                                if (is_page('dashboard') || in_array($page_id, $args) || is_page('settings') || is_page('add-package')) { ?>

                                    <a class="btn btn-sm btn-outline-success btn-block" href="<?php echo esc_url(home_url('/dashboard/balance/')); ?>">Saldo: <?php echo $balance; ?> PLN</a>

                                <?php } else { ?>
                                    <a class="btn btn-sm btn-primary btn-block" href="<?php echo esc_url(home_url('/dashboard/')); ?>">Wyślij przesyłkę</a>
                                <?php } ?>
                            </li>

                            <li class="nav-item dropdown dropdown-animate ml-3 d-none d-lg-block">
                                <a class="nav-link nav-link-icon px-2" href="/" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?php echo get_avatar($user_ID, '32'); ?>
                                </a>
                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right font-weight-bold text-sm mr-lg-3 px-4 py-3">


                                    <?php if (current_user_can('administrator') || current_user_can('editor')) { ?>

                                        <a href="<?php echo esc_url(home_url('/wp-admin/')); ?>" class="dropdown-item">
                                            <i class="fab fa-wordpress"></i><span><?php _e('WP Admin', 'lekhook'); ?></span>
                                        </a>
                                        <div class="dropdown-divider"></div>

                                    <?php } ?>


                                    <a href="<?php echo esc_url(home_url('/dashboard/')); ?>" class="dropdown-item">
                                        <i class="fas fa-tachometer-alt"></i><span>Panel</span>
                                    </a>


                                    <a href="<?php echo esc_url(home_url('/dashboard/balance/')); ?>" class="dropdown-item">
                                        <i class="fas fa-wallet"></i><span>Saldo</span>
                                    </a>

                                    <a href="<?php echo esc_url(home_url('/dashboard/settings/')); ?>" class="dropdown-item">
                                        <i class="fas fa-cog"></i> <span>Ustawienia</span>
                                    </a>

                                    <div class="dropdown-divider"></div>

                                    <a href="<?php echo home_url('/login/?action=logout&amp;nonce=' . wp_create_nonce('logout')); ?>" class="dropdown-item">
                                        <i class="fas fa-sign-out-alt"></i><span>wyloguj się</span>
                                    </a>
                                </div>
                            </li>
                        <?php } else { ?>

                            <li class="nav-item d-lg-inline ml-lg-3 mb-3 mb-lg-0">
                                <a class="btn btn-sm btn-outline-dark btn-block" href="<?php echo wp_login_url($_SERVER['REQUEST_URI']); ?>">Zaloguj się</a>
                            </li>
                            <li class="nav-item d-lg-inline ml-lg-3 mr-lg-3">
                                <a href="<?php echo esc_url(home_url('/signup/')); ?>" class="btn btn-sm btn-primary btn-block">Utwórz konto</a>
                            </li>
                        <?php } ?>
                        <li class="nav-item dropdown dropdown-animate d-none">
                            <a class="nav-link nav-link-icon px-1" href="/" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/images/svg/en.svg" width="26" height="26">
                            </a>
                            <ul class="dropdown-menu dropdown-menu-sm text-sm dropdown-menu-right">
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/images/svg/pl.svg"> Polish
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/images/svg/en.svg"> English
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>

                </div>
        </nav>


        <?php


        if (is_page('dashboard') || in_array($page_id, $args) || is_page('settings') || is_page('add-package')) { ?>

            <div class="container-fluid   border-top px-3 d-none d-md-block">
                <ul class="sub-navs nav nav-tabs justify-content-center  border-bottom-0">


                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo esc_url(home_url('/dashboard/')); ?>">Panel</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo esc_url(home_url('/dashboard/saved/')); ?>">Zachowane</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo esc_url(home_url('/dashboard/orders/')); ?>">Zamówione</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo esc_url(home_url('/dashboard/address-book/')); ?>">Książka adresowa</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo esc_url(home_url('/dashboard/import/')); ?>">Import Przesyłek</a>
                    </li>



                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo esc_url(home_url('/dashboard/settings/')); ?>">Ustawienia</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo home_url('/login/?action=logout&amp;nonce=' . wp_create_nonce('logout')); ?>">wyloguj się</a>
                    </li>


                </ul>
            </div>
        <?php } ?>
    </header>


    <?php
