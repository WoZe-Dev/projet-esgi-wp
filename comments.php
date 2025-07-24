<?php
/**
 * Comment template — prints the comment list and the reply form.
 * (Loaded automatically when single.php calls comments_template().)
 *
 * @package projet-esgi-wp
 */

if (post_password_required()) {
    return; // Stop here for password-protected posts.
}

/* ----------------------------------------------------------------------
 * 1.  Customise the reply-form fields so the markup matches the mock-up
 * -------------------------------------------------------------------- */
$custom_fields = [
    'author' => '<p class="comment-form-author">
		<input id="author" name="author" type="text"
		       placeholder="' . esc_attr__('Full name', 'projet-esgi-wp') . '" required>
	</p>',
    // WP handles the e-mail field automatically - we hide it with CSS if you don’t need it.
];

$comment_args = [
    'fields' => $custom_fields,
    'comment_field' => '<p class="comment-form-comment">
		<textarea id="comment" name="comment" rows="5"
		          placeholder="' . esc_attr__('Message', 'projet-esgi-wp') . '" required></textarea>
	</p>',
    /* --- visual tweaks --- */
    'class_form' => 'comment-form-ui',   // wrapper class for our CSS
    'class_submit' => 'button-submit',
    'label_submit' => __('Submit', 'projet-esgi-wp'),
    'title_reply' => __('Leave a reply', 'projet-esgi-wp'),
    'title_reply_before' => '<h2 id="reply-title" class="comment-reply-title">',
    'title_reply_after' => '</h2>',
];
?>

<div id="comments" class="comments-area">

    <?php if (have_comments()): ?>

        <h2 class="comments-title">
            <?php
            printf(
                /* translators: %s = number of comments */
                esc_html__('Comments (%s)', 'projet-esgi-wp'),
                number_format_i18n(get_comments_number())
            );
            ?>
        </h2>

        <ol class="comment-list">
            <?php
            wp_list_comments([
                'style' => 'ol',
                'avatar_size' => 0,               // no avatars in the design
                'short_ping' => true,
                'callback' => 'esgi_comment_markup', // see functions.php
            ]);
            ?>
        </ol>

        <?php the_comments_navigation(); ?>

    <?php endif; ?>

    <?php comment_form($comment_args); ?>
</div>