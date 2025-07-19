<?php
/*
Template Name: About Us Custom Template
*/

get_header(); ?>

<main>
    <div class="container">
        <h1><?php the_title(); ?>.</h1>
    </div>
    <img id="first-picture" src="<?php echo get_template_directory_uri(); ?>/img/4.png"
        alt="Professional event structure" />

    <div class="grid container">
        <div class="paragraph">
            <h2>Sky's the limit</h2>
            <p>
                Specializing in the creation of exceptional events for private and corporate clients, we design, plan and manage every project from conception to execution.
            </p>
        </div>
    </div>

    <?php get_template_part('template-parts/about-us'); ?>

    <div class="container">
        <h2 id="our-team-title">Our Team</h2>
        <div class="team-grid">
            <div class="team-card">
                <img src="<?php echo get_template_directory_uri(); ?>/img/8.png" alt="Sales Manager">
                <h4>Sales Manager</h4>
                <p>+33 1 53 31 25 23<br>sales@company.com</p>
            </div>
            <div class="team-card">
                <img src="<?php echo get_template_directory_uri(); ?>/img/11.png" alt="Event planner">
                <h4>Event planner</h4>
                <p>+33 1 53 31 25 24<br>plan@company.com</p>
            </div>
            <div class="team-card">
                <img src="<?php echo get_template_directory_uri(); ?>/img/7.png" alt="Designer">
                <h4>Designer</h4>
                <p>+33 1 53 31 25 20<br>design@company.com</p>
            </div>
            <div class="team-card">
                <img src="<?php echo get_template_directory_uri(); ?>/img/6.png" alt="CEO">
                <h4>CEO</h4>
                <p>+33 1 53 31 25 25<br>ceo@company.com</p>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>
