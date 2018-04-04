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
        )); ?>
    </div>
</header>
<div class="info">
    <div class="info__wrap">
        <div class="info__block info__block--one">
            <a href="<?php echo home_url(); ?>" class="info__link">
                <div class="info__pict"><img
                            src="<?php echo get_template_directory_uri(); ?>/assets/img/info/logo1.svg" alt="logo1"
                            class="info__img">
                </div>
            </a>
        </div>
        <div class="info__block info__block--two">
            Время работы: 10:00 - 19:00
        </div>
        <div class="info__block info__block--three">
            <?php get_template_part('inc/phone'); ?>
        </div>
    </div>
</div>

<div class="slider">
    <?php echo do_shortcode('[smartslider3 slider=3]'); ?>
</div>

<div id="page" class="site">
    <div id="content" class="site-content">