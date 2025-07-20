<?php
// Envoi d'une requete wp grâce à la fonction get_posts($args)
$args = [
    'post_type' => 'post', // valeur par défaut
];
$recent_posts = get_posts($args); // Récupération de tous les résultats
// echo '<pre>';
// var_dump($recent_posts);
?>
<div class="post-list">
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