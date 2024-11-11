<!-- Footer -->
<section class="footer-widgets">
    <div class="container py-4 py-lg-5  footer-widgets__space-border">
        <div class="row">
            <div class="col-lg-3">
                <div class="row justify-content-center justify-content-lg-start">
                    <div class="col-8 col-lg-10">
                        <img src="https://www.elektro-serwis.eu/wp-content/uploads/2024/09/Logo-Gotowe-male-white.png" class="img-fluid mb-3 mb-lg-0 mx-auto">
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <p class="text-white standard-title-7 fw-bold">Twój alternator szwankuje? Zgłoś usterkę już teraz - szybka diagnoza i naprawa na wyciągnięcie ręki! Kliknij i wypełnij formularz.</p>
            </div>
            <div class="col-lg-3 d-grid">
                <a href="#form-box" class="btn btn--style-3" title="Wyślij zapytanie">Wyślij zapytanie</a>
            </div>
        </div>
    </div>
    <div class="container py-4 py-lg-5">
        <div class="row justify-content-center">
            <div class="col-lg-4 footer-widgets__bottom-desc mb-4 mb-lg-0">
                <?php if (is_active_sidebar('menu-about')) : ?>
                    <?php dynamic_sidebar('menu-about'); ?>
                <?php endif; ?>
                <a href="#" target="_blank" rel="nofollow noopener noreferrer" class="text-center d-inline-block text-orange bottom-fb-link">
                    <i class="fa fa-facebook text-orange"></i>
                </a>
            </div>
            <div class="col-lg-4 footer-widgets__bottom-desc mb-4 mb-lg-0">
                <?php if (is_active_sidebar('footer-start')) : ?>
                    <?php dynamic_sidebar('footer-start'); ?>
                <?php endif; ?>
            </div>
            <div class="col-lg-4">
                <h5 class="text-orange standard-title-7 chakra-petch-font mb-2 mb-lg-4 fw-bold text-uppercase">Oferta</h5>
                <?php if (is_active_sidebar('menu-services')) : ?>
                    <?php dynamic_sidebar('menu-services'); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <img src="/wp-content/uploads/2024/09/cropped-elektroserwis-favicon-gotowe.png" class="footer-widgets__background">
</section>
<div class="copyright-box">
    <div class="container py-4">
        <p class="text-center text-gray-light mb-0"><small>elektro-serwis Copyright 2009-2024</small></p>
    </div>
</div>