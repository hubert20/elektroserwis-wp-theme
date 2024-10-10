<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package elektroserwis-wp-theme
 */

get_header(); ?>

<main id="main" class="page-404 pt-5" role="main" style="background: #131313;">
    <div class="container py-5">
        <p class="mb-3 text-center chakra-petch-font fw-bold text-orange" style="font-size: 120px;letter-spacing: 5px;">
            404
        </p>
        <div class="row justify-content-center">
            <div class="col-8 col-lg-5 text-center">
                <img src="/wp-content/uploads/2024/10/serwis.png" alt="Nie ma takiej strony" class="img-fluid mb-4 mb-lg-5">
            </div>
        </div>
    </div>
</main><!-- #main -->

<?php
get_footer();
