<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('carbon_fields_register_fields', 'crb_attach_theme_options');
function crb_attach_theme_options()
{
    Container::make('theme_options', __('Опции темы', 'crb'))
        ->set_icon('dashicons-admin-comments')
        ->set_page_menu_title('VictoriaPikalova')
        ->add_tab('Опции', array(
            Field::make('text', 'crb_phone1', 'Телефон1')
                ->set_attribute('placeholder', '+7 (***) ***-**-**'),
            Field::make('text', 'crb_phone2', 'Телефон2')
                ->set_attribute('placeholder', '+7 (***) ***-**-**')
        ))
        ->add_tab('Социальные кнопки', array(
                Field::make('text', 'crb_social_url_twitter', 'Twitter URL')
                    ->set_help_text('Ссылка на страницу Twitter'),
                Field::make('text', 'crb_social_url_vk', 'Вконтакте URL')
                    ->set_help_text('Ссылка на страницу Вконтакте'),
                Field::make('text', 'crb_social_url_facebook', 'Facebook URL')
                    ->set_help_text('Ссылка на страницу Facebook'),
                Field::make('text', 'crb_social_url_instagram', 'Instagram URL')
                    ->set_help_text('Ссылка на страницу Instagram'),
                Field::make('text', 'crb_social_url_ok', 'Одноклассники URL')
                    ->set_help_text('Ссылка на страницу Одноклассники'),
            )
        );

    Container::make('post_meta', __('Опции курса', 'crb'))
        ->where('post_type', '=', 'page')
        ->where('post_term', '=', array(
            'value' => 'shkola',
            'field' => 'slug',
            'taxonomy' => 'category',
        ))
        ->add_fields(array(
            Field::make('textarea', 'desc_service', 'Краткое описание курса'),
            Field::make('text', 'price_service', 'Цена курса')
                ->set_attribute('type', 'number')
                ->set_attribute('min', '0')
        ));
}