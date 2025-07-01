<?php get_header(); ?>

<main>
    <div class="container">

        <?php 
        if (is_page('about-us')) {
            include('template-parts/about-us.php');
        }
        ?>

        <?php if (!is_front_page()) { 
            include('template-parts/identity-card.php');
        } ?>

        <?php if (!is_front_page()) {
            include('template-parts/post-list.php');
        }
        ?>

    <!-- </div> -->
</main>

<?php get_footer() ?>