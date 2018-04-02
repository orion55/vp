<?php

add_action('wp_ajax_get_cat', 'ajax_show_posts_in_cat');
add_action('wp_ajax_nopriv_get_cat', 'ajax_show_posts_in_cat');
function ajax_show_posts_in_cat()
{
    $link = !empty($_POST['link']) ? esc_attr($_POST['link']) : false;
    $slug = $link ? wp_basename($link) : false;
    $cat = get_category_by_slug($slug);

    if (!$cat) {
        wp_send_json_error('Рубрика не найдена');
    }

    $args = array(
        'post_type' => 'page',
        'category_name' => $cat->slug,
        'numberposts' => '-1',
        'orderby' => 'title',
        'order' => 'ASC',
        'post_status' => 'publish'
    );
    $myposts = get_posts($args);
    $shkola_posts = array();

    foreach ($myposts as $post) {
        setup_postdata($post);

        $id = $post->ID;
        $post_data = array();
        $post_data['title'] = $post->post_title;
        $post_data['permalink'] = get_permalink($id);
        if (has_post_thumbnail($id)) {
            $post_data['thumbnail'] = get_the_post_thumbnail_url($id, 'post-thumbnail');
        }

        $metas = get_post_meta($id);
        if (isset($metas['_desc_service'])) {
            $post_data['desc_service'] = $metas['_desc_service'];
        }
        if (isset($metas['_price_service'])) {
            $post_data['price_service'] = $metas['_price_service'];
        }
        $shkola_posts[] = $post_data;
    }
    wp_reset_postdata();

    wp_send_json_success($shkola_posts);
}

function js_variables()
{
    $variables = array(
        'ajax_url' => admin_url('admin-ajax.php')
    );
    echo('<script type="text/javascript">window.wp_data=' . json_encode($variables) . ';</script>');
}

add_action('wp_head', 'js_variables');