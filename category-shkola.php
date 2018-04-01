<?php get_header(); ?>

    <div class="school">
        <div class="school__wrap">
            <div class="school__category">
                <ul class="school__cat cat" id="school__cat">
                    <?php wp_list_categories("orderby=name&show_count=0&hide_empty=0&use_desc_for_title=0&child_of=5&hierarchical=0&title_li=&current_category=16"); ?>
                </ul>
            </div>
            <div class="school__title" id="school__title">Полные курсы</div>
            <div class="school__cards container">
                <div class="school__row row" id="school__row">
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
                                <?php if (has_post_thumbnail()) : ?>
                                    <a class="card__pict" href="<?php the_permalink(); ?>">
                                        <img class="card__img"
                                             src="<?php the_post_thumbnail_url('post-thumbnail'); ?>"
                                             alt="Card image cap">
                                    </a>
                                <?php endif; ?>
                                <div class="card__body">
                                    <h3 class="card__title"><?php the_title(); ?></h3>
                                    <div class="card-text"><?php the_excerpt(); ?></div>
                                    <div class="card-price">
                                        <span class="card-value">10 000</span>
                                        <span class="card-currency">р.</span>
                                    </div>
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

<?php get_template_part('inc/contact'); ?>

<?php get_footer(); ?>