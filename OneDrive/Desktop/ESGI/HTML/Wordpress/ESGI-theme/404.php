<?php get_header(); ?>

<main class="error-404 page">
    <div class="container">
    
                <h1>404</h1>
                <p>Page introuvable</p>
                <p>Essayez de faire une recherche</p>
                
                <div class="search-form">
                    <form role="search" method="get" class="search-form" action="<?php echo home_url('/'); ?>">
                        <label>
                            <span class="screen-reader-text">Search for:</span>
                            <input type="search" class="search-field" placeholder="Search..." value="<?php echo get_search_query(); ?>" name="s" />
                        </label>
                        <input type="submit" class="search-submit" value="Search" />
                    </form>
                </div>
            </div>

</main>

<?php get_footer(); ?>