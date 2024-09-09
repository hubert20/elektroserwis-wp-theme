<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package elektroserwis-wp-theme
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header id="top-header" class="fixed-lg-top" role="banner">
        <!-- Top Toolbar -->
        <div class="toolbar-area d-none d-lg-block bg-blue-medium">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 offset-lg-3 py-2">
                        <ul class="contact-info d-flex flex-row teko-font fw-light">
                            <li class="contact-info__email me-4 pe-4 text-white">
                                <i class="fa fa-envelope me-2 text-blue-dark"></i>
                                <a href="mailto: biuro@elektroserwis.pl" class="text-white">biuro@elektroserwis.pl</a>
                            </li>
                            <li class="contact-info__phone me-4 pe-4 text-white">
                                <i class="fa fa-phone me-2 text-blue-dark"></i>
                                <a href="tel:+48667002627" class="text-white">+48 667 00 26 27</a>
                            </li>
                            <li class="contact-info__email text-white">
                                <i class="fa fa-map-marker me-2 text-blue-dark"></i>
                                Stalowe Domy Sp. z o.o. Skawina, ul.Korabnicka 1
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-2 d-flex align-items-center justify-content-end">
                        <div class="social-box-links d-flex align-items-center h-100 py-2">
                            <a href="https://www.facebook.com/elektroserwis/" target="_blank" class="px-3 text-blue-dark">
                                <i class="fa fa-facebook"></i>
                            </a>
                            <a href="https://www.instagram.com/stalowe_domy/" target="_blank" class="px-3 text-blue-dark">
                                <i class="fa fa-instagram"></i>
                            </a>
                            <a href="https://www.instagram.com/stalowe_domy/" target="_blank" class="px-3 text-blue-dark">
                                <i class="fa fa-twitter"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="top-header-menu">
            <div class="container px-xl-4">
                <nav class="navbar navbar-expand-xl navbar-theme teko-font">
                    <?php if (get_theme_mod('elektroserwis_wp_theme_logo')) : ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name')); ?>" class="navbar-brand align-items-center top-logo flex-column">
                            <img src="<?php echo esc_url(get_theme_mod('elektroserwis_wp_theme_logo')); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
                            <span class="d-inline-block text-blue-dark pt-1 text-uppercase slogan"><?php echo esc_attr(get_bloginfo('name')); ?></span>
                        </a>
                    <?php endif; ?>
                    <button class="navbar-toggler navbar-light rounded-0" type="button" data-bs-toggle="collapse" data-bs-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-md-end" id="main-menu">
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'main-menu',
                            'container' => false,
                            'menu_class' => '',
                            'fallback_cb' => '__return_false',
                            'items_wrap' => '<ul id="%1$s" class="navbar-nav mb-2 mb-md-0 %2$s">%3$s</ul>',
                            'depth' => 3,
                            'walker' => new bs5_Walker()
                        ));
                        ?>
                    </div>
                </nav>
            </div>
        </div>
    </header>