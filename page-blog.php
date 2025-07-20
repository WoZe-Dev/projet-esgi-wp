<?php
/*
Template Name: Blog Page
*/

get_header(); ?>

<main class="blog-page container">
    <h1><?php the_title() ?>.</h1>
    <div class="grid">
        <?php get_template_part('template-parts/post-list'); ?>
        <div class="blog-content">
            <?php
            // Custom query to get blog posts
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

            $blog_posts = new WP_Query(array(
                'post_type' => 'post',
                'posts_per_page' => 6, // Number of posts per page
                'paged' => $paged,
                'post_status' => 'publish'
            ));

            if ($blog_posts->have_posts()) : ?>
                <div class="posts-grid">
                    <?php while ($blog_posts->have_posts()) : $blog_posts->the_post(); ?>
                        <article class="blog-post-card">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="post-thumbnail">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('medium'); ?>
                                    </a>
                                </div>
                            <?php endif; ?>

                            <div class="post-content">
                                <header class="post-header">
                                    <h4 class="post-title">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h4>
                                </header>

                                <div class="post-excerpt">
                                    <?php the_excerpt(); ?>
                                </div>

                            </div>
                        </article>
                    <?php endwhile; ?>
                </div>

                <?php
                // Pagination
                echo paginate_links(array(
                    'total' => $blog_posts->max_num_pages,
                    'current' => $paged,
                    'format' => '?paged=%#%',
                    'prev_text' => '&laquo; Previous',
                    'next_text' => 'Next &raquo;'
                ));
                ?>

            <?php else : ?>
                <div class="no-posts">
                    <h3>No blog posts found</h3>
                    <p>There are no blog posts to display at the moment.</p>
                </div>
            <?php endif;

            wp_reset_postdata();
            ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>