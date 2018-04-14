<?php get_header(); ?>
<?php
if (is_article()) {

    if (function_exists('dimox_breadcrumbs')) {
        echo '<div class="wrap wrap--breadcrumbs breadcrumbs--paper">';
        dimox_breadcrumbs();
        echo '</div>';
    } ?>
    <?php
    while (have_posts()) {
        the_post(); ?>

        <article class="paper">

            <header class="paper__header">
                <?php the_title('<h1 class="paper__title">', '</h1>'); ?>
            </header>

            <?php
            $content = get_the_content();
            $szSearchPattern = '~<img [^>]* />~';
            preg_match_all($szSearchPattern, $content, $pics);
            $content = preg_replace($szSearchPattern, '', $content, 1);

            if (!empty($pics[0][0])): ?>
                <div class="paper__picture">
                    <?php echo $pics[0][0]; ?>
                </div>
            <?php endif; ?>

            <div class="item__meta item__meta--paper">
                <div class="item__date">
                    <i class="far fa-calendar-alt item__icon"></i>
                    <span class="item__word"><?php the_time('d.m.Y'); ?></span>
                </div>
                <div class="item__cat">
                    <i class="fas fa-tasks item__icon"></i>
                    <span class="item__word"><?php the_category(' > ', 'multiple'); ?></span>
                </div>
            </div>

            <div class="paper__box">
                <?php $content = apply_filters('the_content', $content);
                echo $content; ?>
            </div>

            <div class="paper_comments">
                <?php if (comments_open() || get_comments_number()) :
                    comments_template();
                endif; ?>
            </div>
        </article>
    <?php }
} else { ?>
    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
            <?php
            while (have_posts()) :
                the_post();

                get_template_part('template-parts/content', get_post_type());

                // If comments are open or we have at least one comment, load up the comment template.
                if (comments_open() || get_comments_number()) :
                    comments_template();
                endif;

            endwhile; // End of the loop.
            ?>

        </main>
    </div>
<?php } ?>

<?php
if (!is_article()) {
    get_template_part('inc/contact');
}
get_footer();
