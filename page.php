<?php get_header(); ?>

<?php
if (is_school()) {

    if (function_exists('dimox_breadcrumbs')) {
        echo '<div class="wrap">';
        dimox_breadcrumbs();
        echo '</div>';
    } ?>

    <div class="academy__category">
        <ul class="school__cat cat">
            <?php
            $cur_cat_name = 'Школа'; //наименование родительской категории
            $cur_cat_id = get_cat_ID($cur_cat_name);

            $categories = get_the_category();
            $cur_subcat_id = $categories[0]->cat_ID;
            wp_list_categories("orderby=name&show_count=0&hide_empty=0&use_desc_for_title=0&child_of=" . $cur_cat_id . "&hierarchical=0&title_li=&current_category=" . $cur_subcat_id); ?>
        </ul>
    </div>

    <?php
    while (have_posts()) {
        the_post(); ?>

        <article class="academy">

            <header class="academy__header">
                <?php the_title('<h1 class="academy__title">', '</h1>'); ?>
            </header>

            <?php
            $content = get_the_content();
            $szSearchPattern = '~<img [^>]* />~';
            preg_match_all($szSearchPattern, $content, $pics);
            $content = preg_replace($szSearchPattern, '', $content, 1); ?>

            <div class="academy__picture">
                <?php echo $pics[0][0]; ?>
            </div>

            <div class="academy__section">
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
            </div>

            <div class="academy__box">
                <?php $content = apply_filters('the_content', $content);
                echo $content; ?>
            </div>

            <div class="school">
                <div class="school__wrap">
                    <?php get_template_part('inc/cards'); ?>
                </div>
            </div>

        </article>
        <?php
    }
} else { ?>
    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <?php
            while (have_posts()) :
                the_post();

                get_template_part('template-parts/content', 'page');

                if (comments_open() || get_comments_number()) :
                    comments_template();
                endif;

            endwhile; ?>
        </main>
    </div>
<?php } ?>


<?php
if (!is_school()) {
    get_template_part('inc/contact');
}
get_footer();
