<?php
// Template pour afficher les pages seules
// Par défaut WP crée une variable $post qui corresond au post courant : utilisons la...
get_header();
?>

<main class="page">
    <div class="container">

                <div>
                    <?= the_content() ?>
                </div>
                <?php if (is_page('about-us')) include('template-parts/about-us.php'); ?>

    </div>
</main>


<?php get_footer() ?>

