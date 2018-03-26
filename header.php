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
            <div class="info__phone info__phone--one">
                <?php $phone1 = carbon_get_theme_option('crb_phone1');
                $phone_href = '+74957773535';
                $phone_text = '+7 (495) 777-35-35';
                if (!empty($phone1)): $phone_href = preg_replace("/[^0-9+]+/i", "", $phone1);
                    $phone_text = $phone1;
                endif; ?>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/info/phone.png" alt="phone"
                     class="info__icon">
                <a href="tel:<?php echo $phone_href ?>" class="info__phone-number"><?php echo $phone_text ?></a>
            </div>
            <div class="info__phone">
                <?php $phone2 = carbon_get_theme_option('crb_phone2');
                $phone_href = '+74957773535';
                $phone_text = '+7 (495) 777-35-35';
                if (!empty($phone2)): $phone_href = preg_replace("/[^0-9+]+/i", "", $phone2);
                    $phone_text = $phone2;
                endif; ?>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/info/phone1.png" alt="phone1"
                     class="info__icon">
                <a href="tel:<?php echo $phone_href ?>" class="info__phone-number"><?php echo $phone_text ?></a>
            </div>
        </div>
    </div>
</div>
<div id="page" class="site">
    <div id="content" class="site-content">