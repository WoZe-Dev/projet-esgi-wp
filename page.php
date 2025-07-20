<?php
// Template pour afficher les pages seules
// Par défaut WP crée une variable $post qui corresond au post courant : utilisons la...
get_header();
?>

<main>
    <div class="container">
        <h1><?php the_title(); ?>.</h1>
        
        <?php if (is_page('partners')): ?>
            <?php get_template_part('template-parts/partners'); ?>
        <?php endif; ?>
        
        <?php if (is_page('blog')): ?>
            <?php get_template_part('template-parts/blog-list'); ?>
        <?php endif; ?>
        
        <?php if (!is_page(array('partners', 'blog', 'services'))): ?>
            <div class="page-content">
                <?php 
                if (have_posts()) : 
                    while (have_posts()) : the_post();
                        the_content();
                    endwhile;
                endif;
                ?>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php get_footer() ?>