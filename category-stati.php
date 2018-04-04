<?php get_header(); ?>

    <div class="blog blog-main">
        <h1 class="blog__title">Блог</h1>
        <div class="blog__wrap">
            <div class="container">
                <div class="row">
                    <div class="blog__main col-sm-12 col-md-12 col-xl-9">
                        <?php if (have_posts()) :
                            while (have_posts()) :
                                the_post(); ?>
                                <div class="item">
                                    <h2 class="item__title">
                                        <?php $title = get_the_title();
                                        echo $title; ?>
                                    </h2>
                                    <div class="item__body">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <a class="item__pict" href="<?php the_permalink(); ?>">
                                                <img class="item__img"
                                                     src="<?php the_post_thumbnail_url('post-thumbnail'); ?>"
                                                     alt="<?php echo $title; ?>">
                                            </a>
                                        <?php endif; ?>
                                        <div class="item__box">
                                            <div class="item__text">
                                                <?php the_excerpt(); ?>
                                            </div>
                                            <a href="<?php the_permalink(); ?>"
                                               class="item__link pure-button hvr-shutter-in-horizontal hvr-inverse">Подробнее</a>
                                        </div>
                                    </div>
                                    <div class="item__meta">
                                        <div class="item__date">
                                            <i class="far fa-calendar-alt item__icon"></i>
                                            <span class="item__word"><?php the_time('d.m.Y'); ?></span>
                                        </div>
                                        <div class="item__cat">
                                            <i class="fas fa-tasks item__icon"></i>
                                            <span class="item__word"><?php the_category(' > ', 'multiple'); ?></span>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>

                            <?php if (function_exists('wp_pagenavi')) { ?>
                            <div class="blog__pagenavi">
                                <?php wp_pagenavi(); ?>
                            </div>
                        <?php } ?>

                        <?php endif; ?>
                    </div>
                    <div class="col-sm-12 col-md-12 col-xl-3">
                        <?php get_sidebar(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
get_footer();
