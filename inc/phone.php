<div class="info__phone info__phone--one">
    <?php $phone1 = carbon_get_theme_option('crb_phone1');
    $phone_href = '+74957773535';
    $phone_text = '+7 (495) 777-35-35';
    if (!empty($phone1)): $phone_href = preg_replace("/[^0-9+]+/i", "", $phone1);
        $phone_text = $phone1;
    endif; ?>
    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/info/phone.png" alt="phone"
         class="info__icon info__icon--phone">
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
         class="info__icon info__icon--phone1">
    <a href="tel:<?php echo $phone_href ?>" class="info__phone-number"><?php echo $phone_text ?></a>
</div>