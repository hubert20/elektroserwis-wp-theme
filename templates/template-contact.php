<?php
if (!defined('ABSPATH')) exit;

/* Template Name: Template contact */

get_header();

get_template_part('template-parts/header-image');

?>

<?php
while (have_posts()) : the_post();
    the_content(__('Continue reading <span class="meta-nav">&rarr;</span>', 'elektroserwis-wp-theme'));
endwhile;
?>

<section class="google-map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3218.5115651356923!2d19.69102467717479!3d52.556443933530105!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x471c7bac1434a565%3A0xcc4af18c06f2d582!2sElektro%20-%20Serwis%20Piotr%20Lewandowski!5e1!3m2!1spl!2spl!4v1729980188998!5m2!1spl!2spl" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</section>

<?php get_footer(); ?>