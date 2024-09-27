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
        <div class="toolbar-area d-none d-lg-block px-xl-4">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10">
                        <ul class="contact-info d-flex flex-row chakra-petch-font fw-light">
                            <li class="contact-info__email me-4 pe-4 text-white">
                                <i class="fa fa-envelope me-2 text-orange"></i>
                                <a href="mailto: serwis@elektro-serwis.eu" class="text-white">serwis@elektro-serwis.eu</a>
                            </li>
                            <li class="contact-info__phone me-4 pe-4 text-white">
                                <i class="fa fa-phone me-2 text-orange"></i>
                                <a href="tel:+48607140231" class="text-white">+48 735 300 794</a>
                            </li>
                            <li class="contact-info__email text-white">
                                <i class="fa fa-map-marker me-2 text-orange"></i>
                                Elektro-Serwis Gostynin ul. Płocka 7A
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-2 d-flex align-items-center justify-content-end">
                        <a href="#" target="_blank" class="text-orange">
                            <i class="fa fa-facebook"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Top header -->
        <div class="top-header-menu">
            <div class="container px-xl-4">
                <nav class="navbar navbar-expand-xl navbar-theme chakra-petch-font">
                    <?php if (get_theme_mod('elektroserwis_wp_theme_logo')) : ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name')); ?>" class="navbar-brand align-items-center top-logo flex-column">
                            <img src="<?php echo esc_url(get_theme_mod('elektroserwis_wp_theme_logo')); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
                        </a>
                    <?php endif; ?>
                    <button class="navbar-toggler navbar-dark rounded-0" type="button" data-bs-toggle="collapse" data-bs-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
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