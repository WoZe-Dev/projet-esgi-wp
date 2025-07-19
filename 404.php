<?php get_header(); ?>

<main class="page-404">
    <div class="container">
        <div class="content">
            <h1>404 Error.</h1>
            <p>The page you were looking for couldn't be found. <br> Maybe try a search?</p>
            <div class="search-form">
                <form role="search" method="get" class="search-form" action="<?php echo home_url('/'); ?>">
                    <input type="search" class="search-field" placeholder="Type something to search ..." value="<?php echo get_search_query(); ?>" name="s" />
                    <button type="submit" class="search-submit" value="Search">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/search-icon.svg" alt="search icon">
                    </button>
                </form>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>