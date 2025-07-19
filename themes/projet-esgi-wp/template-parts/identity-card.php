<section class="identity-card">
    <?= get_custom_logo() ?>
    <h1><?= get_bloginfo('name'); ?></h1>
    <h2><?= get_bloginfo('description'); ?></h2>
    <footer>
        <?php
        if (isset($GLOBALS['show_social_links']) && $GLOBALS['show_social_links']) :
        ?>
        <ul>
            <?php 
            $social_platforms = ['twitter', 'facebook', 'google', 'linkedin'];
            foreach ($social_platforms as $platform) {
                $url = get_theme_mod('url_' . $platform, '');
                if (!empty($url)) {
                    echo '<li><a href="' . esc_url($url) . '" target="_blank">' . esgi_getIcon($platform) . '</a></li>';
                }
            }
            ?>
        </ul>

        
        <?php endif; ?>
    </footer>
</section>