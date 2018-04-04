<?php get_header(); ?>

    <div class="business">
        <div class="business__wrap">
            <h1 class="business__title">Контакты</h1>
            <div class="business__map" id="map"></div>
            <div class="business__container container no-gutters">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-xl-4">
                        <div class="business__text">
                            Адрес: г. Москва, Тетеринский пер. 12с5
                        </div>
                        <div class="business__phone">
                            <?php get_template_part('inc/phone'); ?>
                        </div>
                        <div class="business__text">
                            Время работы: 10:00 - 19:00
                        </div>
                    </div>
                    <div class="business__col col-sm-12 col-md-12 col-xl-8">
                        <?php echo do_shortcode('[contact-form-7 id="78" title="Контактная форма"]'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
get_footer();
