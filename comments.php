<?php
if (post_password_required()) {
    return;
}
$fields = array(
    'full name' => '<p class="comment-form-author">
        <input id="fullname" name="fullname" type="text" placeholder="Full name" required />
    </p>',
    'message' => '<p class="comment-form-email">
        <input id="email" name="text" type="text" required placeholder="message" />
    </p>',
);

$comments_args = array(
    'fields' => apply_filters('comment_form_default_fields', $fields),
    'submit_button' => '<button name="%1$s" type="submit" id="%2$s" class="%3$s">%4$s</button>',
);

?>

<div id="comments" class="comments-area">
    <?php if (have_comments()) : ?>
        <h4 class="comments-title">
            <?php
            $count = get_comments_number();
            echo $count . ' Comments' . ($count > 1 ? 's' : '');
            ?>
        </h4>

        <ol class="comment-list">
            <?php
            wp_list_comments(array(
                'style'      => 'ol',
                'short_ping' => true,
            ));
            ?>
        </ol>

        <?php the_comments_navigation(); ?>
    <?php endif; ?>

    <?php comment_form($comments_args); ?>
</div>