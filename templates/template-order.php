<?php
if (!defined('ABSPATH')) exit;

/* Template Name: Template Order */

get_header();

// get_template_part('template-parts/header-image');

?>


<div class="container py-4 py-lg-5">
    <?php
    while (have_posts()) : the_post();
        the_content(__('Continue reading <span class="meta-nav">&rarr;</span>', 'elektroserwis-wp-theme'));
    endwhile;
    ?>
</div>

<?php get_footer(); ?>