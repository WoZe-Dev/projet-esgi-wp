<?php
// Template pour afficher les pages seules
// Par défaut WP crée une variable $post qui corresond au post courant : utilisons la...
get_header();
?>

<main>
    <div class="container">
        <h1><?php the_title(); ?>.</h1>
        <? if (is_page('partners')): ?>
            <?php get_template_part('template-parts/partners'); ?>
        <? endif; ?>
    </div>
</main>


<?php get_footer() ?>