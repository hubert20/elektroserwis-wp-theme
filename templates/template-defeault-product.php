<?php
if (!defined('ABSPATH')) exit;

/* Template Name: Template defeault product */

get_header();

get_template_part('template-parts/header-image');

$opis_usterek = get_field('alternatory_opis_usterek_cnt');

//Banner shop
$banner_img_desktop = get_field('banner_shop_desktop', 16);
$banner_img_mobile = get_field('banner_shop_mobile', 16);
?>


<?php
while (have_posts()) : the_post();
    the_content(__('Continue reading <span class="meta-nav">&rarr;</span>', 'elektroserwis-wp-theme'));
endwhile;
?>

<section class="mb-4">
    <div class="container text-center">
        <!-- Banner desktop -->
        <?php if ($banner_img_desktop) : ?>
            <a href="/sklep/" title="Przechodzę do sklepu elektro-serwis" class="d-none d-lg-block">
                <img src="<?php echo $banner_img_desktop['url']; ?>" alt="<?php echo $banner_img_desktop['alt']; ?>" class="img-fluid mx-auto d-none d-lg-block">
            </a>
        <?php endif; ?>

        <!-- Banner mobile -->
        <?php if ($banner_img_mobile) : ?>
            <a href="/sklep/" title="Przechodzę do sklepu elektro-serwis" class="d-block d-lg-none">
                <img src="<?php echo $banner_img_mobile['url']; ?>" alt="<?php echo $banner_img_mobile['alt']; ?>" class="img-fluid mx-auto d-block d-lg-none">
            </a>
        <?php endif; ?>
    </div>
</section>

<?php echo $opis_usterek; ?>


<!-- Modal Film -->
<div class="modal modal-video fade" id="ModalVideo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered align-items-center modal-lg" role="document">
        <div class="modal-content border-0">
            <div class="modal-body">
                <button type="button" class="btn-close btn-close-white close-video" data-bs-dismiss="modal" aria-label="Close" title="Zamknij film"></button>
                <!-- 16:9 aspect ratio -->
                <div class="ratio ratio-16x9">
                    <iframe class="embed-responsive-item" src="" id="video" allowscriptaccess="always" allow="autoplay"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>