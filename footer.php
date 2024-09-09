<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package elektroserwis-wp-theme
 */
?>

<footer class="site-footer" role="contentinfo">
    <?php get_template_part('footer-widget'); ?>
</footer>

<!-- Offer form Modal -->
<div class="modal fade" id="offerformModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header d-flex py-1 justify-content-between border-0">
                <img src="<?php echo esc_url(get_theme_mod('elektroserwis_wp_theme_logo')); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" class="img-fluid p-1" style="height: 35px;">
                <button type="button" class="btn-close btn-close-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <div class="modal-body" id="modal-form">
                <div class="modal-form-cnt" data-category-type="pomoc-organizacji">
                    <?php echo apply_shortcodes('[contact-form-7 id="7c3e932" title="Zapytanie ze strony elektroserwis.pl"]'); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="cookie-warn" class="cookie-warn">
    <div class="cookie-warn__box">
        <span class="cookie-warn__left-side">
            Użytkowanie oznacza akceptację regulaminu oraz Polityki prywatności, w tym zapisywania plików cookie.
        </span>
        <span class="cookie-warn__right-side">
            <a href="javascript:void(0);" id="close-cookie-warn" class="cookie-warn__close-cookie-info">OK</a>
        </span>
    </div>
</div>
<?php wp_footer(); ?>
</body>

</html>