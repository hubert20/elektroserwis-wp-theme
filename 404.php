<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package elektroserwis-wp-theme
 */

get_header(); ?>

<main id="main" class="page-404 pt-5" role="main">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-8 col-lg-5 mt-lg-5 text-center pt-lg-4">
                <img src="/wp-content/uploads/2023/07/404.png" alt="Error" class="img-fluid mb-4 mb-lg-5">
            </div>
        </div>
        <p class="mb-3 mb-lg-5 text-center teko-font standard-title-5 text-green">
            Przepraszamy za kłopot. <br> A korzystając z okazji chcemy Ci podziękować, że jesteś z nami.
        </p>
        <div class="row justify-content-center pt-3">
            <div class="col-md-4 d-grid">
                <a href="/" title="Przejdź na www.alumi.com.pl" class="btn btn-lg btn-green-swipe title-slide-left-anim fw-bold">Przejdź na www.alumi.com.pl <i class="fa fa-angle-right"></i></a>
            </div>
        </div>

    </div>
</main><!-- #main -->

<?php
get_footer();
