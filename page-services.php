<?php get_header(); ?>
<main>
    <div class="container">
        <h1> <?php the_title() ?>.</h1>
    </div>
    <?php get_template_part('template-parts/services'); ?>

    <div class="container">
        <div class="paragraph grid">
            <h2>Corp. Parties</h2>
            <p>Specializing in the creation of exceptional events for private and corporate clients, we design, plan and manage every project from conception to execution. </p>
        </div>
    </div>
    <img id="corp-parties-picture" src="<?php echo get_template_directory_uri(); ?>/img/9.png" />
</main>
<?php get_footer(); ?>