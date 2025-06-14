<?php get_header(); ?>

<main>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
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
                

                include('template-parts/identity-card.php');
                ?>
            </div>
        </div>
    </div>
</main>

<?php get_footer() ?>