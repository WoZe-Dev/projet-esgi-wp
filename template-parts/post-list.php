<?php
// Envoi d'une requete wp grâce à la fonction get_posts($args)
$args = [
    'post_type' => 'post', // valeur par défaut
];
$recent_posts = get_posts($args); // Récupération de tous les résultats
if (empty($recent_posts)) {
    echo '<p>' . esc_html__('No recent posts found.', 'projet-esgi-wp') . '</p>';
    return; // Stop if no posts found
}
?>
<div class="post-list">
    <!-- ▸ sidebar-search.html  (or wherever you output the widget) -->
    <h2 class="sidebar-heading">Search</h2>

    <div class="search-box">
        <!-- outer wrapper for spacing if you need it -->
        <form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">

            <input type="search" class="search-field" name="s" placeholder="Type to search"
                value="<?php echo esc_attr(get_search_query()); ?>" />

            <button type="submit" class="search-submit" aria-label="Search">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/img/search-icon.svg'); ?>" alt=""
                    width="24" height="24" loading="lazy" />
            </button>
        </form>
    </div>

    <h6>Recent Posts</h6>
    <ul>
        <?php foreach ($recent_posts as $recent_post) { ?>
            <li>
                <a href="<?= get_permalink($recent_post) ?>">
                    <img src="<?= get_the_post_thumbnail_url($recent_post, 'thumbnail'); ?>" alt="">
                </a>
                <div>
                    <a href="<?= get_permalink($recent_post) ?>"><?= $recent_post->post_title ?></a><br>
                    <time><?= wp_date('j F Y', strtotime($recent_post->post_date)) ?></time>
                </div>
            </li>
        <?php } ?>
    </ul>
</div>
<?php
// Reset global $post object to ensure other template functions work correctly
wp_reset_postdata();
?>