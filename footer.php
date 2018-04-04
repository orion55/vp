</div><!-- #content -->

<footer class="footer">
    <div class="footer__wrap">
        <div class="footer__container container">
            <div class="footer__row row">
                <div class="col-sm-12 col-md-4 col-xl-4 footer__one">
                    <a href="<?php echo home_url(); ?>" class="footer__link--img hvr-grow">
                        <div class="footer__pict"><img
                                    src="<?php echo get_template_directory_uri(); ?>/assets/img/info/logo.svg"
                                    alt="logo"
                                    class="footer__img">
                        </div>
                    </a>
                    <div class="footer__box">
                        &copy; 2018 | <a href="<?php echo home_url(); ?>" class="footer__link">victoria-pikalova.ru</a>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-xl-5 footer__two">
                    <?php $link = carbon_get_theme_option('crb_social_url_twitter');
                    if (!empty($link))
                        echo '<a href="' . $link . '" class="footer__url"><i class="fab fa-twitter footer__icon"></i></a>';

                    $link = carbon_get_theme_option('crb_social_url_vk');
                    if (!empty($link))
                        echo '<a href="' . $link . '" class="footer__url"><i class="fab fa-vk footer__icon"></i></a>';

                    $link = carbon_get_theme_option('crb_social_url_facebook');
                    if (!empty($link))
                        echo '<a href="' . $link . '" class="footer__url"><i class="fab fa-facebook-f footer__icon"></i></a>';

                    $link = carbon_get_theme_option('crb_social_url_instagram');
                    if (!empty($link))
                        echo '<a href="' . $link . '" class="footer__url"><i class="fab fa-instagram footer__icon"></i></a>';

                    $link = carbon_get_theme_option('crb_social_url_ok');
                    if (!empty($link))
                        echo '<a href="' . $link . '" class="footer__url"><i class="fab fa-odnoklassniki footer__icon"></i></a>';
                    ?>
                </div>
                <div class="col-sm-12 col-md-4 col-xl-3 footer__three">
                    <?php get_template_part('inc/phone'); ?>
                </div>
            </div>
        </div>
    </div>
</footer>
</div>

<?php wp_footer(); ?>

</body>
</html>
