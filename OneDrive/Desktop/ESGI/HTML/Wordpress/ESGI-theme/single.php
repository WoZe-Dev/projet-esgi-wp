<?php

get_header();
?>

<main class="post">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h1><?php the_title() ?></h1>
                <div class="post-meta">
                    <div class="post-author">
                        <img src="<?= get_avatar_url($post->post_author) ?>" alt="<?= get_the_author_meta('nickname', $post->post_author) ?>">
                        <?php
                        echo get_the_author_meta('nickname', $post->post_author);
                        ?>
                    </div>
                    <time>
                        <?= wp_date('j F Y', strtotime($post->post_date)); 
                        ?>
                    </time>
                </div>
                <div>
                    <?php the_post_thumbnail(); ?>
                </div>
                <div>
                    <?= the_content() ?>
                </div>
                
                <?php
                if (has_nav_menu('post_footer_menu')) {
                    echo '<div class="post-footer-menu-container">';
                    echo '<div class="post-footer-logo">';
                    echo '<img src="' . get_template_directory_uri() . '/assets/images/logo.svg" alt="Logo" class="footer-logo">';
                    echo '</div>';
                    wp_nav_menu([
                        'theme_location' => 'post_footer_menu',
                        'container'      => 'nav',
                        'container_class' => 'post-footer-navigation',
                        'menu_class'     => 'post-footer-menu',
                    ]);
                    echo '</div>';
                }
                ?>
            </div>
        </div>
    </div>
</main>


<?php get_footer() ?>