<?php
// Template pour afficher les pages seules
// Par défaut WP crée une variable $post qui corresond au post courant : utilisons la...
get_header();
?>

<main>
    <h1><?php the_title(); ?></h1>
</main>


<?php get_footer() ?>