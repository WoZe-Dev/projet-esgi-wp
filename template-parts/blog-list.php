<?php
/**
 * Template part for displaying blog posts list
 */

// Get latest blog posts
$blog_query = new WP_Query(array(
    'post_type' => 'post',
    'posts_per_page' => 10,
    'post_status' => 'publish'
));

if ($blog_query->have_posts()) : ?>
    <div class="blog-posts-list">
        <?php while ($blog_query->have_posts()) : $blog_query->the_post(); ?>
            <article class="blog-post-preview">
                <?php if (has_post_thumbnail()) : ?>
                    <div class="post-thumbnail">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('medium'); ?>
                        </a>
                    </div>
                <?php endif; ?>
                
                <div class="post-info">
                    <h3 class="post-title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h3>
                    
                    <div class="post-meta">
                        <span class="post-date"><?php echo get_the_date(); ?></span>
                        <span class="post-author">By <?php the_author(); ?></span>
                    </div>
                    
                    <div class="post-excerpt">
                        <?php the_excerpt(); ?>
                    </div>
                    
                    <a href="<?php the_permalink(); ?>" class="read-more-link">
                        Read Full Article →
                    </a>
                </div>
            </article>
        <?php endwhile; ?>
        
        <div class="blog-navigation">
            <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" class="view-all-posts">
                View All Blog Posts →
            </a>
        </div>
    </div>
<?php else : ?>
    <div class="no-blog-posts">
        <p>No blog posts available at the moment.</p>
    </div>
<?php endif; 

wp_reset_postdata();
?>
