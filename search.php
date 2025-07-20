<?php get_header(); ?>

<main class="search-results container">


    <h1>Search results for: <span class="search-query"><?php echo get_search_query(); ?></span></h1>

    <?php

    $search_query = get_search_query();


    $pages_query = new WP_Query([
        'post_type' => 'page',
        's' => $search_query,
        'posts_per_page' => -1,
    ]);
    $posts_query = new WP_Query([
        'post_type' => 'post',
        's' => $search_query,
        'posts_per_page' => -1,
    ]);

    if ($pages_query->have_posts()) :
        $count = $pages_query->found_posts;
    ?>
        <h2><?php echo $count; ?> page<?php echo $count > 1 ? 's' : ''; ?> trouvée<?php echo $count > 1 ? 's' : ''; ?></h2>
        <ul class="search-results-list">
            <?php while ($pages_query->have_posts()) : $pages_query->the_post(); ?>
                <li>
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </li>
            <?php endwhile; ?>
        </ul>
    <?php
        wp_reset_postdata();
    endif;


    if ($posts_query->have_posts()) :
        $count = $posts_query->found_posts;
    ?>
        <div class="search-results-list grid">
            <?php while ($posts_query->have_posts()) : $posts_query->the_post(); ?>
                <div class="post-content">
                    <header class="post-header">
                        <h4 class="post-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h4>
                    </header>
                    <div class="post-meta">
                        <?php the_category(); ?>-
                        <span class="post-date">
                            <?php echo get_the_date(); ?>
                        </span>
                    </div>
                    <div class="post-excerpt">
                        <?php the_excerpt(); ?>
                    </div>

                </div>
            <?php endwhile; ?>
    </div>
    <?php
        wp_reset_postdata();
    endif;


    if (!$pages_query->have_posts() && !$posts_query->have_posts()) :
    ?>
        <p>Aucun résultat trouvé.</p>
    <?php endif; ?>



</main>

<?php get_footer(); ?>