<?php get_header(); ?>

<div class="services">
    <div class="services__wrap">
        <h2 class="services__title">Услуги</h2>
        <div class="services__cards container">
            <div class="services__row row">
                <?php
                global $post; // не обязательно
                $args = array(
                    'post_type' => 'page',
                    'category_name' => 'uslugi',
                    'numberposts' => '-1',
                    'orderby' => 'title',
                    'order' => 'ASC'
                );
                $myposts = get_posts($args);
                foreach ($myposts as $post) {
                    setup_postdata($post); ?>
                    <div class="col-4">
                        <div class="card ">
                            <div class="card__pict">
                                <img class="card__img"
                                     src="<?php if (has_post_thumbnail()) : the_post_thumbnail_url('post-thumbnail'); endif; ?>"
                                     alt="Card image cap">
                            </div>
                            <div class="card__body">
                                <h3 class="card__title"><?php the_title(); ?></h3>
                                <a href="<?php the_permalink(); ?>"
                                   class="card__link pure-button hvr-shutter-in-horizontal">Подробнее</a>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                wp_reset_postdata(); // сбрасываем переменную $post
                ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
