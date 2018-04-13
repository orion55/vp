<?php
/**
 * VictoriaPikalova functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package VictoriaPikalova
 */

if (!function_exists('vp_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function vp_setup()
    {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on VictoriaPikalova, use a find and replace
         * to change 'vp' to the name of your theme in all the template files.
         */
        load_theme_textdomain('vp', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'menu-1' => esc_html__('Primary', 'vp'),
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('vp_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support('custom-logo', array(
            'height' => 250,
            'width' => 250,
            'flex-width' => true,
            'flex-height' => true,
        ));
    }
endif;
add_action('after_setup_theme', 'vp_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function vp_content_width()
{
    // This variable is intended to be overruled from themes.
    // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
    // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
    $GLOBALS['content_width'] = apply_filters('vp_content_width', 640);
}

add_action('after_setup_theme', 'vp_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function vp_widgets_init()
{
    register_sidebar(array(
        'name' => esc_html__('Sidebar', 'vp'),
        'id' => 'sidebar-1',
        'description' => esc_html__('Add widgets here.', 'vp'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}

add_action('widgets_init', 'vp_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function vp_scripts()
{
    wp_enqueue_style('vp-style', get_stylesheet_uri());
    wp_enqueue_style('vp-style-main', get_template_directory_uri() . '/assets/css/main.min.css', array(), '', 'all');
    wp_enqueue_style('vp-style-vendor', get_template_directory_uri() . '/assets/css/vendor.min.css');
    wp_enqueue_style('vp-fa', get_template_directory_uri() . '/fa-svg-with-js.css');

    wp_enqueue_script('vp-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true);

    wp_enqueue_script('vp-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
    wp_enqueue_script('vp-fontawesome', get_template_directory_uri() . '/js/fontawesome-all.min.js', [], '', true);
    wp_enqueue_script('truecustoms-map', 'https://api-maps.yandex.ru/2.1/?lang=ru_RU', [], '', true);
    wp_enqueue_script('jquery');
    wp_enqueue_script('vp-vendor', get_template_directory_uri() . '/assets/js/vendor.min.js', array('jquery'), '', true);
    wp_enqueue_script('vp-main', get_template_directory_uri() . '/assets/js/main.min.js', array('jquery'), '', true);
}

add_action('wp_enqueue_scripts', 'vp_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
    require get_template_directory() . '/inc/jetpack.php';
}

if (WP_DEBUG && WP_DEBUG_DISPLAY && (defined('DOING_AJAX') && DOING_AJAX)) {
    @ ini_set('display_errors', 1);
}

require get_template_directory() . '/inc/admin-panel.php';
require get_template_directory() . '/inc/ajax-cat.php';

function agd_menu_classes($classes, $item, $args)
{
    if ($args->theme_location == 'menu-1') {
        $classes[] = 'hvr-fade';
    }
    return $classes;
}

add_filter('nav_menu_css_class', 'agd_menu_classes', 1, 3);

function custom_excerpt_length($length)
{
    return 20;
}

add_filter('excerpt_length', 'custom_excerpt_length', 999);

add_action('login_head', 'my_custom_login_logo');
function my_custom_login_logo()
{
    echo '<style type="text/css">
	h1 a { background-image:url(' . get_bloginfo('template_directory') . '/assets/img/info/logo.svg) !important; }
	</style>';
}

require get_template_directory() . '/inc/dimox_breadcrumbs.php';

const SCHOOL = 'Школа';
function is_school()
{
    $categories = get_the_category();

    $result = FALSE;
    foreach ($categories as &$value) {
        if (SCHOOL == $value->cat_name) {
            $result = TRUE;
        };
    }
    unset($value);
    return $result;
}