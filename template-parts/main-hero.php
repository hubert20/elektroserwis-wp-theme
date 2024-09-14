<?php
$hero_cnt = get_field('hero_cnt');
$hero_background_desktop = get_field('hero_background_desktop');
$hero_background_mobile = get_field('hero_background_mobile');
$hero_widget = get_field('hero_widget');
$oferta_title = get_field('oferta_title');
?>


<div id="hero" class="top-hero position-relative d-flex justify-content-center flex-column mx-lg-4">
    <!-- Hero Cnt -->
    <div class="container top-hero-cnt position-relative">
        <?php echo $hero_cnt; ?>
    </div>
    <!-- Scroll Anchor-->
    <a href="#iframe-hauses" class="tst-scroll-hint-frame tst-anchor-scroll">
        <div class="tst-scroll-hint"></div>
    </a>
    <div class="row gx-0 w-100 anim-engineer-hero position-absolute">
        <div class="col-lg-3">
            <img src="/wp-content/uploads/2023/05/content-image-1.png" class="d-none d-lg-block img-fluid anim-engineer-hero__img position-relative title-slide-left-anim">
        </div>
    </div>
</div>

<!-- BG Hero -->
<!-- <style>
    @media (min-width: 992px) {
        .top-hero {
            background-image: url('<?= $hero_background_desktop; ?>') !important;
        }
    }

    .top-hero {
        background-image: url('<?= $hero_background_mobile; ?>');
    }
</style> -->