<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package VictoriaPikalova
 */

get_header();
?>
<p align="center">
<img border="0" src="http://cw17203-wordpress.tw1.ru/wp-content/uploads/2018/04/error2.jpg" width="382" height="346"></p>
    <div id="primary" class="content-404">
        <main id="main" class="site-main">
            <section class="error-404 not-found">
                <header class="page-header">
                    <h1 class="page-title">Опс! Страница не найдена!</h1>
					 <p>Такой страницы не существует или она была удалена.</p>
                </header><!-- .page-header -->
             
				<p>Можете перейти на <a href="<?php echo home_url(); ?>">главную страницу</a> или воспользоваться поиском.</p>
            </section><!-- .error-404 -->
<?php get_search_form(); ?>
        </main><!-- #main -->
    </div><!-- #primary -->
<?php
get_footer();
