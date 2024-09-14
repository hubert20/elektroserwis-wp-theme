<?php
$hero_background_desktop = get_field('hero_background_desktop');
$hero_background_mobile = get_field('hero_background_mobile');
?>


<div id="hero" class="top-hero position-relative d-flex justify-content-center flex-column">
    <div class="hro-background-overlay">

        <!-- Hero Cnt -->
        <div class="container top-hero-cnt position-relative">


        </div>
        <!-- Scroll Anchor-->
        <a href="#iframe-hauses" class="tst-scroll-hint-frame tst-anchor-scroll">
            <div class="tst-scroll-hint"></div>
        </a>
    </div>
</div>

<!-- BG Hero -->
<style>
    @media (min-width: 992px) {
        .top-hero {
            background-image: url('<?= $hero_background_desktop; ?>') !important;
        }
    }

    .top-hero {
        background-image: url('<?= $hero_background_mobile; ?>');
    }
</style>