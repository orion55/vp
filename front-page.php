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
                    <div class="col-sm-12 col-md-6 col-xl-4 services__main">
                        <div class="card ">
                            <a class="card__pict" href="<?php the_permalink(); ?>">
                                <img class="card__img"
                                     src="<?php if (has_post_thumbnail()) : the_post_thumbnail_url('post-thumbnail'); endif; ?>"
                                     alt="Card image cap">
                            </a>
                            <div class="card__body">
                                <h3 class="card__title"><?php the_title(); ?></h3>
                                <a href="<?php the_permalink(); ?>"
                                   class="card__link pure-button hvr-shutter-in-horizontal">Подробнее</a>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                wp_reset_postdata();
                ?>
            </div>
        </div>
    </div>
</div>

<div class="articles">
    <div class="articles__wrap">
        <h3 class="articles__title">Последние статьи</h3>
        <div class="articles__cards container">
            <div class="articles__row row">
                <?php
                global $post;
                $args = array(
                    'post_type' => 'post',
                    'category_name' => 'stati',
                    'numberposts' => '9',
                    'orderby' => 'date',
                    'order' => 'DESC'
                );
                $myposts = get_posts($args);
                foreach ($myposts as $post) {
                    setup_postdata($post); ?>
                    <div class="col-sm-12 col-md-6 col-xl-4 articles__main">
                        <div class="card">
                            <a class="card__pict" href="<?php the_permalink(); ?>">
                                <img class="card__img"
                                     src="<?php if (has_post_thumbnail()) : the_post_thumbnail_url('post-thumbnail'); endif; ?>"
                                     alt="Card image cap">
                            </a>
                            <div class="card__body card__body--articles">
                                <h3 class="card__title card__title--articles"><?php the_title(); ?></h3>
                                <div class="card-text"><?php the_excerpt(); ?></div>
                                <a href="<?php the_permalink(); ?>"
                                   class="card__link pure-button hvr-shutter-in-horizontal">Подробнее</a>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                wp_reset_postdata();
                ?>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-12 col-xl-12 articles__arrows arrow">
                    <div id="prevArrow" class="arrow__prev hvr-grow">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/articles/back.png"
                             alt="prevArrow" class="arrow__img">
                    </div>
                    <div id="nextArrow" class="arrow__next hvr-grow">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/articles/forward.png"
                             alt="nextArrow" class="arrow__img">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $page = get_page_by_path('o-salone');
if (!empty($page)) { ?>
    <div class="salon">
        <div class="salon__wrap">
            <h1 class="salon__title"><?php echo $page->post_title ?></h1>
            <div class="salon__text">
                <?php echo $page->post_content ?>
            </div>
            <div class="salon__button">
                <a href="<?php echo $page->guid ?>"
                   class="card__link pure-button hvr-shutter-in-horizontal salon__btn">Подробнее</a>
            </div>

        </div>
    </div>
<?php } ?>

<?php get_footer(); ?>
