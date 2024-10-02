<?php
$hero_background_desktop = get_field('hero_background_desktop');
$hero_background_mobile = get_field('hero_background_mobile');
?>


<div id="hero" class="top-hero position-relative d-flex justify-content-center flex-column">
    <!-- Hero Cnt -->
    <div class="container top-hero__cnt position-relative">
        <!-- Hero slider -->
        <div class="top-hero__slider py-5 py-lg-0">
            <!-- Slider main container -->
            <div class="swiper swiper-container main-swiper">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    <?php if (have_rows('hero_cnt_slider')) : ?>
                        <?php
                        while (have_rows('hero_cnt_slider')) : the_row();
                            $hero_img = get_sub_field('hero_cnt_image');
                            $hero_cnt = get_sub_field('hero_cnt_slider');
                        ?>
                            <div class="swiper-slide">
                                <div class="row justify-content-center align-items-center">
                                    <div class="col-lg-6 mb-3 mb-lg-0">
                                        <?php echo $hero_cnt; ?>
                                    </div>
                                    <div class="col-6 col-lg-4 text-center">
                                        <?php if ($hero_img) : ?>
                                            <img src="<?php echo $hero_img['url']; ?>" alt="<?php echo $hero_img['alt']; ?>" class="img-fluid mx-auto">
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
                <!-- If we need pagination -->
                <div class="swiper-pagination"></div>
                <!-- If we need navigation buttons -->
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>

        </div>
    </div>
    <!-- Scroll Anchor-->
    <a href="#iframe-hauses" class="tst-scroll-hint-frame tst-anchor-scroll">
        <div class="tst-scroll-hint"></div>
    </a>
</div>

<!-- BG Hero -->
<style>
    @media (min-width: 992px) {
        .top-hero {
            background-image: url('<?php echo $hero_background_desktop; ?>') !important;
        }
    }

    .top-hero {
        background-image: url('<?php echo $hero_background_mobile; ?>');
    }
</style>