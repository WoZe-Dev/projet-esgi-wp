<?php get_header(); ?>

<main class="contact-page">
    <div class="container">
        <h1><?php the_title(); ?>.</h1>
        <?php the_content(); ?>
        <div class="contacts">
            <div class="contact-info">
                <h5>Location</h5>
                <p>242 Rue du Faubourg Saint-Antoine
                    <br>75020 Paris FRANCE
                </p>
            </div>

            <div class="contact-info">
                <h5>Manager</h5>
                <p>+33 1 53 31 25 23<br>
                    info@esgi.com</p>
            </div>

            <div class="contact-info">
                <h5>CEO</h5>
                <p>+33 1 53 31 25 15
                    <br>ceo@company.com
                </p>
            </div>
        </div>
    </div>
    <?php if (has_post_thumbnail()) : ?>
        <div class="contact-thumbnail">
            <?php the_post_thumbnail('large'); ?>
        </div>
    <?php endif; ?>

    <!-- contact Form -->
    <div class="container">
        <?php get_template_part('template-parts/contact-form'); ?>
    </div>
</main>

<?php get_footer(); ?>