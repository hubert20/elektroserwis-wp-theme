<?php
if (!defined('ABSPATH')) exit;

/* Template Name: Template defeault */

get_header();

get_template_part('template-parts/header-image');

?>

<?php
while (have_posts()) : the_post();
    the_content(__('Continue reading <span class="meta-nav">&rarr;</span>', 'elektroserwis-wp-theme'));
endwhile;
?>

<?php get_footer(); ?>