<?php get_header(); ?>

<main>
    <?php
    $has_social_links = false;
    $social_platforms = ['twitter', 'facebook', 'google', 'linkedin'];
    foreach ($social_platforms as $platform) {
        $url = get_theme_mod('url_' . $platform, '');
        if (!empty($url)) {
            $has_social_links = true;
            break;
        }
    }

    $GLOBALS['show_social_links'] = $has_social_links;
    ?>

    <div class="container">
        <h1>A really professional structure for all your events!</h1>
    </div>

    <img id="first-picture" src="<?php echo get_template_directory_uri(); ?>/img/1.png"
        alt="Professional event structure" />

    <!-- ABOUT US PARAGRAPH -->
    <div class="grid container">
        <div class="paragraph">
            <h2>About Us</h2>
            <p>
                Specializing in the creation of exceptional events for private and corporate clients, we design, plan and manage every project from conception to execution.
            </p>
        </div>
    </div>

    <?php
    get_template_part('template-parts/about-us');
    get_template_part('template-parts/services');
    get_template_part('template-parts/partners');
    ?>
</main>

<?php get_footer(); ?>