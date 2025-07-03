<?php
// Template pour afficher les pages seules
// Par défaut WP crée une variable $post qui corresond au post courant : utilisons la...
get_header();
?>

<main class="page">
    <div class="container">

            
                <?php if (is_page('about-us')) include('template-parts/about-us.php'); ?>
                <?php if (is_page('services')) include('template-parts/services.php'); ?>
                <?php if (is_page('partners')) include('template-parts/partners.php'); ?>
    </div>
</main>


<?php get_footer() ?>

