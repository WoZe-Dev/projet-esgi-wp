<?php
// Template générique pour afficher les projets seuls
get_header();
?>

<main>
    <h1><?php the_title() ?></h1>
    <?= the_content() ?>

</main>

<?php get_footer() ?>