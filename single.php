<?php
get_header();
?>

<main class="single-page">
    <div class="container">
        <?php if (have_posts()): ?>
            <?php while (have_posts()):
                the_post(); ?>
                <h1><?php the_title() ?>.</h1>

                <div class="grid">
                    <div class="post-list">
                        <!-- BLOG LIST -->
                        <?php
                        get_template_part('template-parts/post-list');
                        ?>
                    </div>
                    <div class="the-post">
                        <div class="post-main-image">
                            <?php the_post_thumbnail(); ?>
                        </div>
                        <div class="post-meta">
                            <?php the_category(); ?>-
                            <span class="post-date">
                                <?php echo get_the_date(); ?>
                            </span>
                        </div>
                        <!-- CONTENT -->
                        <div>
                            <?php the_content(); ?>
                            <!-- // COMMENTS -->

                            <?php comments_template(); ?>
                        </div>

                    </div>
                </div>

            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</main>


<?php get_footer() ?>