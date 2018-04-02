<?php get_header();
$cur_cat_name = 'Школа'; //наименование родительской категории
$cur_subcat_name = 'Полные курсы'; //наименование активной категории

$cur_cat_id = get_cat_ID($cur_cat_name);
$cur_subcat_id = get_cat_ID($cur_subcat_name);
?>

    <div class="school">
        <div class="school__wrap">
            <div class="school__category">
                <ul class="school__cat cat" id="school__cat">
                    <?php wp_list_categories("orderby=name&show_count=0&hide_empty=0&use_desc_for_title=0&child_of=" . $cur_cat_id . "&hierarchical=0&title_li=&current_category=" . $cur_subcat_id); ?>
                </ul>
            </div>
            <div class="school__title"
                 id="school__title"><?php echo get_cat_name($cur_subcat_id); ?></div>
            <div class="school__cards container">
                <div class="school__row row" id="school__row">
                    <?php
                    global $post;
                    $args = array(
                        'post_type' => 'page',
                        'category' => $cur_subcat_id,
                        'numberposts' => '-1',
                        'orderby' => 'title',
                        'order' => 'ASC',
                        'post_status' => 'publish'
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
                                             alt="Card image">
                                    </a>
                                <?php endif; ?>
                                <div class="card__body">
                                    <h3 class="card__title"><?php the_title(); ?></h3>
                                    <?php $desc_service = carbon_get_the_post_meta('desc_service');
                                    if (!empty($desc_service)) { ?>
                                        <div class="card-text"><?php echo wpautop($desc_service); ?></div>
                                        <?php
                                    }
                                    $price_service = carbon_get_the_post_meta('price_service');
                                    if (!empty($price_service)) {
                                        ?>
                                        <div class="card-price">
                                            <span class="card-value"><?php echo number_format($price_service, 0, ',', ' '); ?></span>
                                            <span class="card-currency">р.</span>
                                        </div>
                                    <?php } ?>
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