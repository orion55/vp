<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package VictoriaPikalova
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comments__area">
    <?php

    if (have_comments()) :
        ?>
        <div class="comments__title">
            <span class="comments__name">Комментарии</span>
            <?php
            $vp_comment_count = get_comments_number();
            if ('1' === $vp_comment_count) {
                echo '<span class="comments__count">1 комментарий</span>';
            } else {
                echo '<span class="comments__count">' . $vp_comment_count . ' комментария(ев)</span>';
            }
            ?>
        </div>

        <?php the_comments_navigation(); ?>

        <ol class="comment__list">
            <?php
            wp_list_comments(array(
                'style' => 'ol',
                'per_page' => 10,
                'reverse_top_level' => false,
                'avatar_size'       => 95
            ));
            ?>
        </ol>

        <?php
        the_comments_navigation();

        if (!comments_open()) :
            ?>
            <p class="no-comments"><?php echo 'Комментарии закрыты'; ?></p>
            <?php
        endif;

    endif;

    $comments_args = array(
        'label_submit' => 'Отправить',
        'title_reply' => '',
        'comment_notes_before' => '',
        'comment_notes_after' => '',
        'comment_field' => '<div class="comment-form-comment"><textarea id="comment" name="comment" aria-required="true" placeholder="Ваш комментарий"></textarea></div>',
        'fields' => array(
            'author' => '<div class="comment-form-author"><input id="author" name="author" type="text" placeholder="Ваше имя" value="' . esc_attr($commenter['comment_author']) . '" /></div>',
            'email' => '<div class="comment-form-email"><input id="email" name="email" type="text" placeholder="Ваша почта" value="' . esc_attr($commenter['comment_author_email']) . '" /></div>'

        ),
    );

    comment_form($comments_args);
    ?>

</div>
