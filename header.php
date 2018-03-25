<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon.png">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<header class="header">
    <div class="header__wrap">
        <?php
        wp_nav_menu(array(
            'menu_class' => 'menu',
            'theme_location' => 'menu-1',
            'container' => 'nav'
        ));
        ?>
    </div>
</header>
<div id="page" class="site">
    <div id="content" class="site-content">