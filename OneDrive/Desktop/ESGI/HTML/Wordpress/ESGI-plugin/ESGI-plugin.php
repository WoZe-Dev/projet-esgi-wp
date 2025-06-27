<?php
/*
Plugin Name: ESGI
Plugin URI: https://esgi.fr
Description: Ajout d'un lien de duplication aux listes d'articles et de pages
Author: ESGI
Version: 1.0
*/

// Afficher tous les callbacks attachés à un hook
// echo '<pre>';
// var_dump($wp_filter['init']->callbacks);

add_filter('post_row_actions', 'esgi_displayDuplicateLink', 10, 2);
add_filter('page_row_actions', 'esgi_displayDuplicateLink', 10, 2);
function esgi_displayDuplicateLink($actions, $post)
{
    if (!current_user_can('edit_posts')) {
        return $actions;
    }

    $url = wp_nonce_url(
        add_query_arg(
            [
                'action' => 'esgi_duplicate_post',
                'post' => $post->ID,
            ],
            'admin.php'
        )
    );

    $actions['duplicate'] = '<a href="' . $url . '">' . __('Duplicate', 'ESGI') . '</a>';
    return $actions;
}

add_action('admin_action_esgi_duplicate_post', 'esgi_duplicatePost');
function esgi_duplicatePost()
{

    // crée un post à partir de l'id présent dans l'url
    $original_post = get_post(absint($_GET['post']));
    $args = get_object_vars($original_post);
    unset($args['ID']);
    $args['post_title'] .= ' - DUPLICATE';
    $args['post_status'] = 'draft';
    $args['post_date'] = date('Y-m-d H:i:s');

    $id_newPost = wp_insert_post($args);

    $original_thumbnail_id = get_post_thumbnail_id($original_post);
    set_post_thumbnail($id_newPost, $original_thumbnail_id);

    wp_safe_redirect(
        add_query_arg(
            [
                'post_type' => $original_post->post_type,
                'esgi_duplicate' => $id_newPost
            ],
            admin_url('edit.php')
        )
    );
}

add_action('admin_notices', 'esgi_noticePostDuplicate');
function esgi_noticePostDuplicate()
{
    if (isset($_GET['esgi_duplicate'])) {
        echo '<div class="notice notice-success is-dismissible"><p>' . __('Post successfully duplicated !', 'ESGI') . '</p></div>';
    }
}
