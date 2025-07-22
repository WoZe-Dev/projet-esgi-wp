<?php

add_action('after_setup_theme', 'esgi_register_nav_menu', 0);
function esgi_register_nav_menu()
{
    register_nav_menus(array(
        'primary_menu' => __('Primary Menu', 'ESGI'),
        'footer_menu'  => __('Footer Menu', 'ESGI'),
    ));
}

add_action('after_setup_theme', 'esgi_add_theme_support', 0);
function esgi_add_theme_support()
{
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
}

function esgi_theme_styles()
{
    // Style principal du thème
    wp_enqueue_style('esgi-main-style', get_stylesheet_uri());

    // Fichier CSS nav-bar
    wp_enqueue_style(
        'esgi-navbar-style',
        get_template_directory_uri() . '/css/navbar.css',
        array('esgi-main-style'), // Dépendance du style principal
        filemtime(get_template_directory() . '/css/navbar.css') // Version basée sur la date de modification
    );

    // Fichier CSS footer
    wp_enqueue_style(
        'esgi-footer-style',
        get_template_directory_uri() . '/css/footer.css',
        array('esgi-main-style'), // Dépendance du style principal
        filemtime(get_template_directory() . '/css/footer.css') // Version basée sur la date de modification
    );

    wp_enqueue_style(
        'esgi-logo-style',
        get_template_directory_uri() . '/css/logo.css',
        array('esgi-main-style'), // Dépendance du style principal
        filemtime(get_template_directory() . '/css/logo.css') // Version basée sur la date de modification
    );

    // Fichier CSS home
    wp_enqueue_style(
        'esgi-fornt-page-style',
        get_template_directory_uri() . '/css/front-page.css',
        array('esgi-main-style'), // Dépendance du style principal
        filemtime(get_template_directory() . '/css/front-page.css') // Version basée sur la date de modification
    );

    wp_enqueue_style(
        'esgi-services-style',
        get_template_directory_uri() . '/css/services.css',
        array('esgi-main-style'), // Dépendance du style principal
        filemtime(get_template_directory() . '/css/services.css') // Version basée sur la date de modification
    );

    wp_enqueue_style(
        'esgi-404-style',
        get_template_directory_uri() . '/css/404.css',
        array('esgi-main-style'), // Dépendance du style principal
        filemtime(get_template_directory() . '/css/services.css') // Version basée sur la date de modification
    );

    wp_enqueue_style(
        'esgi-search-style',
        get_template_directory_uri() . '/css/search.css',
        array('esgi-main-style'), // Dépendance du style principal
        filemtime(get_template_directory() . '/css/search.css') // Version basée sur la date de modification
    );

    wp_enqueue_style(
        'esgi-aboutus-style',
        get_template_directory_uri() . '/css/aboutus.css',
        array('esgi-main-style'), // Dépendance du style principal
        filemtime(get_template_directory() . '/css/aboutus.css') // Version basée sur la date de modification
    );

    wp_enqueue_style(
        'esgi-page-aboutus-style',
        get_template_directory_uri() . '/css/page-aboutus.css',
        array('esgi-main-style'), // Dépendance du style principal
        filemtime(get_template_directory() . '/css/page-aboutus.css') // Version basée sur la date de modification
    );

    wp_enqueue_style(
        'esgi-partners-part-style',
        get_template_directory_uri() . '/css/partners-part.css',
        array('esgi-main-style'), // Dépendance du style principal
        filemtime(get_template_directory() . '/css/partners-part.css') // Version basée sur la date de modification
    );

    wp_enqueue_style(
        'esgi-page-services-style',
        get_template_directory_uri() . '/css/page-services.css',
        array('esgi-main-style'), // Dépendance du style principal
        filemtime(get_template_directory() . '/css/page-services.css') // Version basée sur la date de modification
    );

    // Blog CSS
    wp_enqueue_style(
        'esgi-blog-style',
        get_template_directory_uri() . '/css/blog.css',
        array('esgi-main-style'), // Dépendance du style principal
        filemtime(get_template_directory() . '/css/blog.css') // Version basée sur la date de modification
    );

    // Post list CSS
    wp_enqueue_style(
        'esgi-post-list-style',
        get_template_directory_uri() . '/css/post-list.css',
        array('esgi-main-style'), // Dépendance du style principal
        filemtime(get_template_directory() . '/css/post-list.css') // Version basée sur la date de modification
    );

    // Page Contact CSS
    wp_enqueue_style(
        'esgi-page-contact-style',
        get_template_directory_uri() . '/css/page-contact.css',
        array('esgi-main-style'), // Dépendance du style principal
        filemtime(get_template_directory() . '/css/page-contact.css') // Version basée sur la date de modification
    );

    // Contact Form
    wp_enqueue_style(
        'esgi-contact-form-style',
        get_template_directory_uri() . '/css/contact-form.css',
        array('esgi-main-style'), // Dépendance du style principal
        filemtime(get_template_directory() . '/css/contact-form.css') // Version basée sur la date de modification
    );

    // Comment Form
    wp_enqueue_style(
        'esgi-comment-form-style',
        get_template_directory_uri() . '/css/comment-form.css',
        array('esgi-main-style'), // Dépendance du style principal
        filemtime(get_template_directory() . '/css/comment-form.css') // Version basée sur la date de modification
    );
}


add_action('wp_enqueue_scripts', 'esgi_theme_styles');

function esgi_enqueue_assets()
{
    $cache_version = get_option('esgi_cache_version', time());
    wp_enqueue_style('main', get_stylesheet_uri(), [], $cache_version);
}

function esgi_customTitle($title)
{
    return strtoupper($title);
}

function esgi_getIcon($name)
{
    $markups = [
        'twitter' => '<svg width="18" height="15" viewBox="0 0 18 15" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M18 1.6875C17.325 2.025 16.65 2.1375 15.8625 2.25C16.65 1.8 17.2125 1.125 17.4375 0.225C16.7625 0.675 15.975 0.9 15.075 1.125C14.4 0.45 13.3875 0 12.375 0C10.4625 0 8.775 1.6875 8.775 3.7125C8.775 4.05 8.775 4.275 8.8875 4.5C5.85 4.3875 3.0375 2.925 1.2375 0.675C0.9 1.2375 0.7875 1.8 0.7875 2.5875C0.7875 3.825 1.4625 4.95 2.475 5.625C1.9125 5.625 1.35 5.4 0.7875 5.175C0.7875 6.975 2.025 8.4375 3.7125 8.775C3.375 8.8875 3.0375 8.8875 2.7 8.8875C2.475 8.8875 2.25 8.8875 2.025 8.775C2.475 10.2375 3.825 11.3625 5.5125 11.3625C4.275 12.375 2.7 12.9375 0.9 12.9375C0.5625 12.9375 0.3375 12.9375 0 12.9375C1.6875 13.95 3.6 14.625 5.625 14.625C12.375 14.625 16.0875 9 16.0875 4.1625C16.0875 4.05 16.0875 3.825 16.0875 3.7125C16.875 3.15 17.55 2.475 18 1.6875Z" fill="#1A1A1A"/>
</svg>',
        'facebook' => '<svg width="12" height="18" viewBox="0 0 12 18" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M3.4008 18L3.375 10.125H0V6.75H3.375V4.5C3.375 1.4634 5.25545 0 7.9643 0C9.26187 0 10.3771 0.0966038 10.7021 0.139781V3.3132L8.82333 3.31406C7.35011 3.31406 7.06485 4.01411 7.06485 5.04139V6.75H11.25L10.125 10.125H7.06484V18H3.4008Z" fill="#1A1A1A"/>
</svg>',
        'google' => '<svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
<path id="Vector" d="M9.12143 7.71429V10.8H14.3929C14.1357 12.0857 12.85 14.6571 9.25 14.6571C6.16429 14.6571 3.72143 12.0857 3.72143 9C3.72143 5.91429 6.29286 3.34286 9.25 3.34286C11.05 3.34286 12.2071 4.11429 12.85 4.75714L15.2929 2.44286C13.75 0.9 11.6929 0 9.25 0C4.23572 0 0.25 3.98571 0.25 9C0.25 14.0143 4.23572 18 9.25 18C14.3929 18 17.8643 14.4 17.8643 9.25714C17.8643 8.61428 17.8643 8.22857 17.7357 7.71429H9.12143Z" fill="#1A1A1A"/>
</svg>',
        'linkedin' => '<svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M17.9698 0H1.64687C1.19966 0 0.864258 0.335404 0.864258 0.782609V17.2174C0.864258 17.5528 1.19966 17.8882 1.64687 17.8882H18.0816C18.5289 17.8882 18.8643 17.5528 18.8643 17.1056V0.782609C18.7525 0.335404 18.4171 0 17.9698 0ZM3.54749 15.205V6.70807H6.23072V15.205H3.54749ZM4.8891 5.59006C3.99469 5.59006 3.32389 4.80745 3.32389 4.02484C3.32389 3.13043 3.99469 2.45963 4.8891 2.45963C5.78351 2.45963 6.45432 3.13043 6.45432 4.02484C6.34252 4.80745 5.67171 5.59006 4.8891 5.59006ZM16.0692 15.205H13.386V11.0683C13.386 10.0621 13.386 8.8323 12.0444 8.8323C10.7028 8.8323 10.4792 9.95031 10.4792 11.0683V15.3168H7.79593V6.70807H10.3674V7.82609C10.7028 7.15528 11.5972 6.48447 12.827 6.48447C15.5102 6.48447 15.9574 8.27329 15.9574 10.5093V15.205H16.0692Z" fill="#1A1A1A"/>
</svg>'
    ];

    return $markups[$name] ?? '';
}

add_action('customize_register', 'esgi_customize_register');
function esgi_customize_register($wp_customize)
{
    // Section principale
    $wp_customize->add_section('esgi_params', [
        'title' => __('Réglages ESGI', 'ESGI'),
        'description' => __('Faites-vous plaisir :)', 'ESGI'),
        'priority' => 1,
        'capability' => 'edit_theme_options',
    ]);

    // Section Home
    $wp_customize->add_section('esgi_home', [
        'title' => __('Page d\'accueil', 'ESGI'),
        'description' => __('Paramètres de la page d\'accueil', 'ESGI'),
        'priority' => 2,
        'capability' => 'edit_theme_options',
    ]);

    $wp_customize->add_setting('main_color', [
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'default' => '#3f51b5',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color'
    ]);

    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize, 'main_color', [
            'label' => __('Couleur principale', 'ESGI'),
            'section' => 'esgi_params',
            'priority' => 1,
        ])
    );

    $wp_customize->add_setting('dark_mode', [
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'default' => false,
        'transport' => 'refresh',
        'sanitize_callback' => 'esgi_sanitize_bool'
    ]);

    $wp_customize->add_control('dark_mode', [
        'type' => 'checkbox',
        'priority' => 2,
        'section' => 'esgi_params',
        'label' => __('Dark mode', 'ESGI'),
        'description' => __('Black is beautiful :)', 'ESGI'),
    ]);

    $wp_customize->add_setting('has_footer_search', [
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'default' => false,
        'transport' => 'refresh',
        'sanitize_callback' => 'esgi_sanitize_bool'
    ]);

    $wp_customize->add_control('has_footer_search', [
        'type' => 'checkbox',
        'priority' => 3,
        'section' => 'esgi_params',
        'label' => __('Afficher la recherche dans le footer', 'ESGI'),
    ]);

    $social_platforms = [
        'twitter' => 'URL Twitter',
        'facebook' => 'URL Facebook',
        'google' => 'URL Google',
        'linkedin' => 'URL LinkedIn'
    ];

    $priority = 4;
    foreach ($social_platforms as $platform => $label) {
        $wp_customize->add_setting('url_' . $platform, [
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'default' => '',
            'transport' => 'refresh',
            'sanitize_callback' => 'esc_url_raw'
        ]);

        $wp_customize->add_control('url_' . $platform, [
            'type' => 'url',
            'priority' => $priority++,
            'section' => 'esgi_params',
            'label' => __($label, 'ESGI'),
        ]);
    }

    $wp_customize->add_setting('uppercase_title', [
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'default' => false,
        'transport' => 'refresh',
        'sanitize_callback' => 'esgi_sanitize_bool'
    ]);

    $wp_customize->add_control('uppercase_title', [
        'type' => 'checkbox',
        'priority' => $priority++,
        'section' => 'esgi_params',
        'label' => __('Afficher tous les titres en majuscules', 'ESGI'),
    ]);

    // Paramètres de la page d'accueil
    $wp_customize->add_setting('home_hero_title', [
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'default' => 'Welcome to our agency',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field'
    ]);

    $wp_customize->add_control('home_hero_title', [
        'type' => 'text',
        'priority' => 1,
        'section' => 'esgi_home',
        'label' => __('Titre principal', 'ESGI'),
    ]);

    $wp_customize->add_setting('home_hero_subtitle', [
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'default' => 'We craft beautiful digital experiences',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field'
    ]);

    $wp_customize->add_control('home_hero_subtitle', [
        'type' => 'text',
        'priority' => 2,
        'section' => 'esgi_home',
        'label' => __('Sous-titre', 'ESGI'),
    ]);

    $wp_customize->add_setting('home_hero_description', [
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_textarea_field'
    ]);

    $wp_customize->add_control('home_hero_description', [
        'type' => 'textarea',
        'priority' => 3,
        'section' => 'esgi_home',
        'label' => __('Description', 'ESGI'),
    ]);

    $wp_customize->add_setting('home_hero_button_text', [
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'default' => 'Get Started',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field'
    ]);

    $wp_customize->add_control('home_hero_button_text', [
        'type' => 'text',
        'priority' => 4,
        'section' => 'esgi_home',
        'label' => __('Texte du bouton', 'ESGI'),
    ]);

    $wp_customize->add_setting('home_hero_button_url', [
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'default' => '#',
        'transport' => 'refresh',
        'sanitize_callback' => 'esc_url_raw'
    ]);

    $wp_customize->add_control('home_hero_button_url', [
        'type' => 'url',
        'priority' => 5,
        'section' => 'esgi_home',
        'label' => __('URL du bouton', 'ESGI'),
    ]);

    // Services section
    $wp_customize->add_setting('home_services_title', [
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'default' => 'Our Services',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field'
    ]);

    $wp_customize->add_control('home_services_title', [
        'type' => 'text',
        'priority' => 6,
        'section' => 'esgi_home',
        'label' => __('Titre des services', 'ESGI'),
    ]);

    // 3 services
    for ($i = 1; $i <= 3; $i++) {
        $wp_customize->add_setting('home_service_' . $i . '_title', [
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'default' => 'Service ' . $i,
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_text_field'
        ]);

        $wp_customize->add_control('home_service_' . $i . '_title', [
            'type' => 'text',
            'priority' => 6 + $i,
            'section' => 'esgi_home',
            'label' => __('Service ' . $i . ' - Titre', 'ESGI'),
        ]);

        $wp_customize->add_setting('home_service_' . $i . '_description', [
            'type' => 'theme_mod',
            'capability' => 'edit_theme_options',
            'default' => 'Description du service ' . $i,
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_textarea_field'
        ]);

        $wp_customize->add_control('home_service_' . $i . '_description', [
            'type' => 'textarea',
            'priority' => 6 + $i + 3,
            'section' => 'esgi_home',
            'label' => __('Service ' . $i . ' - Description', 'ESGI'),
        ]);
    }
}

function esgi_sanitize_bool($value)
{
    return is_bool($value) ? $value : false;
}

add_action('wp_head', 'esgi_wp_head', 99);
function esgi_wp_head()
{
    $main_color = get_theme_mod('main_color', '#3f51b5');
    echo '<style>:root{ --main-color: ' . $main_color . '}</style>';

    if (get_theme_mod('uppercase_title', false)) {
        echo '<style>
            h1, h2, h3, h4, h5, h6 {
                text-transform: uppercase;
            }
        </style>';
    }
}

add_filter('body_class', 'esgi_body_class');
function esgi_body_class($classes)
{
    if (get_theme_mod('dark_mode', false)) {
        $classes[] = 'dark';
    }
    return $classes;
}

// Appliquer le cache busting aux styles et scripts
add_filter('style_loader_src', 'add_cache_busting_version');
add_filter('script_loader_src', 'add_cache_busting_version');

// Ajouter des headers pour empêcher le cache du navigateur
add_action('wp_head', 'add_no_cache_headers');
function add_no_cache_headers()
{
    if (!is_user_logged_in()) return;

    echo '<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">';
    echo '<meta http-equiv="Pragma" content="no-cache">';
    echo '<meta http-equiv="Expires" content="0">';
}

// Fonction pour vider le cache améliorée
function clear_site_cache()
{
    // Vider le cache WordPress
    if (function_exists('wp_cache_flush')) {
        wp_cache_flush();
    }

    // Vider le cache des plugins de cache populaires
    if (function_exists('w3tc_flush_all')) {
        w3tc_flush_all();
    }

    if (function_exists('wp_cache_clear_cache')) {
        wp_cache_clear_cache();
    }

    // Forcer la régénération des assets avec une nouvelle version
    update_option('esgi_cache_version', time());

    // Vider le cache des objets WordPress
    wp_cache_flush();

    // Vider les transients
    global $wpdb;
    $wpdb->query("DELETE FROM {$wpdb->options} WHERE option_name LIKE '_transient_%'");
    $wpdb->query("DELETE FROM {$wpdb->options} WHERE option_name LIKE '_site_transient_%'");
}

// Modifier la fonction add_cache_busting_version pour être plus agressive
function add_cache_busting_version($src)
{
    if (strpos($src, get_template_directory_uri()) !== false) {
        $cache_version = get_option('esgi_cache_version', time());
        $src = add_query_arg('v', $cache_version, $src);
    }
    return $src;
}

// Ajouter un message de confirmation après vidage du cache
add_action('admin_post_clear_cache', 'handle_clear_cache');
function handle_clear_cache()
{
    if (!wp_verify_nonce($_GET['_wpnonce'], 'clear_cache_nonce') || !current_user_can('manage_options')) {
        wp_die('Accès non autorisé');
    }

    clear_site_cache();

    // Rediriger avec un message de succès
    $redirect_url = add_query_arg('cache_cleared', '1', wp_get_referer());
    wp_redirect($redirect_url);
    exit;
}

// Afficher un message de confirmation
add_action('admin_notices', 'show_cache_cleared_notice');
function show_cache_cleared_notice()
{
    if (isset($_GET['cache_cleared']) && $_GET['cache_cleared'] == '1') {
        echo '<div class="notice notice-success is-dismissible"><p>Cache vidé avec succès!</p></div>';
    }
}

// Créer les pages par défaut si elles n'existent pas
function esgi_create_default_pages() {
    $pages = array(
        array(
            'title' => 'About Us',
            'slug' => 'about-us',
            'content' => '<h1>About Us</h1><p>Learn more about our company and team.</p>[about_us_section]',
            'template' => 'page-about-us.php'
        ),
        array(
            'title' => 'Services',
            'slug' => 'services',
            'content' => '<h1>Our Services</h1><p>Discover the services we offer.</p>[services_section]',
            'template' => 'page-services.php'
        ),
        array(
            'title' => 'Partners',
            'slug' => 'partners',
            'content' => '<h1>Our Partners</h1><p>Meet our trusted partners.</p>[partners_section]',
            'template' => 'page.php'
        ),
        array(
            'title' => 'Blog',
            'slug' => 'blog',
            'content' => '<h1>Blog</h1><p>Welcome to our blog section.</p>',
            'template' => 'page-blog.php'
        ),
        array(
            'title' => 'Contact',
            'slug' => 'contact',
            'content' => '<h1>Contact Us</h1><p>Get in touch with us.</p>[contact_form]',
            'template' => 'page-contact.php'
        )
    );
    
    $created_pages = array();
    
    foreach ($pages as $page_data) {
        // Vérifier si la page existe déjà
        $page = get_page_by_path($page_data['slug']);
        
        if (!$page) {
            // Créer la page
            $page_id = wp_insert_post(array(
                'post_title' => $page_data['title'],
                'post_name' => $page_data['slug'],
                'post_content' => $page_data['content'],
                'post_status' => 'publish',
                'post_type' => 'page',
                'post_author' => 1
            ));
            
            if ($page_id && !is_wp_error($page_id)) {
                // Assigner le template si spécifié
                if (isset($page_data['template'])) {
                    update_post_meta($page_id, '_wp_page_template', $page_data['template']);
                }
                
                $created_pages[$page_data['slug']] = $page_id;
            }
        } else {
            $created_pages[$page_data['slug']] = $page->ID;
        }
    }
    
    return $created_pages;
}

// Fonction améliorée pour créer le menu par défaut avec liens vers les vraies pages
function esgi_create_default_menu() {
    // D'abord créer les pages
    $pages = esgi_create_default_pages();
    
    // Vérifier si le menu principal existe déjà
    $menu_name = 'Menu Principal';
    $menu_exists = wp_get_nav_menu_object($menu_name);
    
    if (!$menu_exists) {
        // Créer le menu
        $menu_id = wp_create_nav_menu($menu_name);
        
        // Définir les éléments du menu en liant aux vraies pages
        $menu_items = array(
            array(
                'title' => 'HOME',
                'type' => 'custom',
                'url' => home_url('/'),
                'menu_order' => 1
            ),
            array(
                'title' => 'About Us',
                'type' => 'post_type',
                'object' => 'page',
                'object_id' => isset($pages['about-us']) ? $pages['about-us'] : null,
                'url' => home_url('/about-us/'),
                'menu_order' => 2
            ),
            array(
                'title' => 'Services',
                'type' => 'post_type',
                'object' => 'page',
                'object_id' => isset($pages['services']) ? $pages['services'] : null,
                'url' => home_url('/services/'),
                'menu_order' => 3
            ),
            array(
                'title' => 'Partners',
                'type' => 'post_type',
                'object' => 'page',
                'object_id' => isset($pages['partners']) ? $pages['partners'] : null,
                'url' => home_url('/partners/'),
                'menu_order' => 4
            ),
            array(
                'title' => 'Blog',
                'type' => 'post_type',
                'object' => 'page',
                'object_id' => isset($pages['blog']) ? $pages['blog'] : null,
                'url' => home_url('/blog/'),
                'menu_order' => 5
            ),
            array(
                'title' => 'Contact',
                'type' => 'post_type',
                'object' => 'page',
                'object_id' => isset($pages['contact']) ? $pages['contact'] : null,
                'url' => home_url('/contact/'),
                'menu_order' => 6
            )
        );
        
        // Ajouter chaque élément au menu
        foreach ($menu_items as $item) {
            $menu_item_args = array(
                'menu-item-title' => $item['title'],
                'menu-item-status' => 'publish',
                'menu-item-type' => $item['type'],
                'menu-item-position' => $item['menu_order']
            );
            
            // Si c'est une page, ajouter l'ID de la page
            if ($item['type'] === 'post_type' && $item['object_id']) {
                $menu_item_args['menu-item-object'] = $item['object'];
                $menu_item_args['menu-item-object-id'] = $item['object_id'];
            } else {
                // Pour les liens personnalisés
                $menu_item_args['menu-item-url'] = $item['url'];
            }
            
            wp_update_nav_menu_item($menu_id, 0, $menu_item_args);
        }
        
        // Assigner le menu à l'emplacement 'primary_menu'
        $locations = get_theme_mod('nav_menu_locations');
        if (!is_array($locations)) {
            $locations = array();
        }
        $locations['primary_menu'] = $menu_id;
        set_theme_mod('nav_menu_locations', $locations);
        
        return $menu_id;
    }
    
    return $menu_exists->term_id;
}

// Hook pour l'activation du thème
function esgi_theme_activation() {
    // Créer les pages par défaut
    $pages = esgi_create_default_pages();
    
    // Créer et assigner le menu par défaut
    $menu_id = esgi_create_default_menu();
    
    // Vider le cache
    if (function_exists('wp_cache_flush')) {
        wp_cache_flush();
    }
    
    // Enregistrer un flag pour indiquer que l'initialisation est terminée
    update_option('esgi_theme_initialized', true);
    
    // Message de confirmation (sera affiché dans l'admin)
    add_action('admin_notices', function() {
        echo '<div class="notice notice-success is-dismissible">';
        echo '<p><strong>Thème ESGI activé avec succès!</strong></p>';
        echo '<p>✅ Pages créées automatiquement<br>';
        echo '✅ Menu principal créé et assigné<br>';
        echo '✅ Emplacement "Primary Menu" activé</p>';
        echo '<p>Vous pouvez maintenant personnaliser votre menu dans <a href="' . admin_url('nav-menus.php') . '">Apparence → Menus</a></p>';
        echo '</div>';
    });
}

// Exécuter lors du changement de thème
add_action('after_switch_theme', 'esgi_theme_activation');

// Fonction pour restaurer le menu par défaut (version améliorée)
function esgi_restore_menu_page() {
    if (isset($_POST['restore_menu']) && wp_verify_nonce($_POST['_wpnonce'], 'esgi_restore_menu')) {
        // Supprimer l'ancien menu s'il existe
        $old_menu = wp_get_nav_menu_object('Menu Principal');
        if ($old_menu) {
            wp_delete_nav_menu($old_menu->term_id);
        }
        
        // Créer un nouveau menu par défaut
        esgi_create_default_menu();
        
        echo '<div class="notice notice-success"><p><strong>Menu par défaut restauré avec succès!</strong><br>Pages et liens recréés automatiquement.</p></div>';
    }
    
    ?>
    <div class="wrap">
        <h1>Restaurer le Menu ESGI par défaut</h1>
        <p>Cette action va supprimer le menu actuel et recréer le menu par défaut avec tous les éléments liés aux bonnes pages.</p>
        
        <div class="card">
            <h2>Menu par défaut inclut :</h2>
            <ul>
                <li>🏠 <strong>HOME</strong> - Lien vers l'accueil</li>
                <li>📄 <strong>About Us</strong> - Page "About Us" (slug: about-us)</li>
                <li>🔧 <strong>Services</strong> - Page "Services" (slug: services)</li>
                <li>🤝 <strong>Partners</strong> - Page "Partners" (slug: partners)</li>
                <li>📝 <strong>Blog</strong> - Page "Blog" (slug: blog)</li>
                <li>📞 <strong>Contact</strong> - Page "Contact" (slug: contact)</li>
            </ul>
        </div>
        
        <form method="post">
            <?php wp_nonce_field('esgi_restore_menu'); ?>
            <p>
                <input type="submit" name="restore_menu" class="button button-primary" 
                       value="Restaurer le Menu par défaut" 
                       onclick="return confirm('Êtes-vous sûr de vouloir restaurer le menu par défaut ? Cette action supprimera le menu actuel et recréera les pages si nécessaire.');">
            </p>
        </form>
        
        <h2>Instructions d'utilisation :</h2>
        <ul>
            <li><strong>Activation automatique :</strong> Le menu se crée automatiquement lors de l'activation du thème</li>
            <li><strong>Personnalisation :</strong> Vous pouvez modifier, ajouter ou supprimer des éléments dans <a href="<?php echo admin_url('nav-menus.php'); ?>">Apparence → Menus</a></li>
            <li><strong>Emplacement :</strong> Le menu est automatiquement assigné à "Primary Menu"</li>
            <li><strong>Pages :</strong> Les pages sont créées automatiquement avec les bons templates</li>
        </ul>
    </div>
    <?php
}

// Fonction pour forcer le vidage du cache après modification du menu
function esgi_clear_menu_cache() {
    // Vider tous les caches
    wp_cache_flush();
    
    // Vider le cache des menus spécifiquement
    wp_cache_delete('menu_items', 'nav_menu');
    
    // Forcer une nouvelle version des assets
    update_option('esgi_cache_version', time());
    
    // Vider les transients de menu
    global $wpdb;
    $wpdb->query("DELETE FROM {$wpdb->options} WHERE option_name LIKE '_transient_menu_%'");
}

// Hook pour vider le cache après modification de menu
add_action('wp_update_nav_menu', 'esgi_clear_menu_cache');
add_action('wp_delete_nav_menu', 'esgi_clear_menu_cache');

// Ajouter les options de menu dans l'admin
add_action('admin_menu', 'esgi_add_menu_restore_option');
function esgi_add_menu_restore_option() {
    add_submenu_page(
        'themes.php',
        'Restaurer Menu ESGI',
        'Restaurer Menu ESGI',
        'manage_options',
        'esgi-restore-menu',
        'esgi_restore_menu_page'
    );
}

add_action('admin_menu', 'esgi_add_clear_menu_cache_option');
function esgi_add_clear_menu_cache_option() {
    add_submenu_page(
        'nav-menus.php',
        'Vider Cache Menu',
        'Vider Cache Menu',
        'manage_options',
        'esgi-clear-menu-cache',
        'esgi_clear_menu_cache_page'
    );
}

function esgi_clear_menu_cache_page() {
    if (isset($_POST['clear_cache']) && wp_verify_nonce($_POST['_wpnonce'], 'esgi_clear_cache')) {
        esgi_clear_menu_cache();
        echo '<div class="notice notice-success"><p>Cache des menus vidé avec succès!</p></div>';
    }
    
    ?>
    <div class="wrap">
        <h1>Vider le Cache des Menus</h1>
        <p>Si vos modifications de menu n'apparaissent pas sur le site, videz le cache.</p>
        
        <form method="post">
            <?php wp_nonce_field('esgi_clear_cache'); ?>
            <p>
                <input type="submit" name="clear_cache" class="button button-primary" 
                       value="Vider le Cache des Menus">
            </p>
        </form>
        
        <h2>Causes possibles :</h2>
        <ul>
            <li><strong>Cache WordPress :</strong> Les menus sont mis en cache pour améliorer les performances</li>
            <li><strong>Cache navigateur :</strong> Votre navigateur peut afficher une version en cache</li>
            <li><strong>Plugin de cache :</strong> Si vous utilisez un plugin de cache, videz-le aussi</li>
        </ul>
        
        <p><strong>Astuce :</strong> Après avoir modifié un menu, faites Ctrl+F5 dans votre navigateur pour forcer le rechargement.</p>
    </div>
    <?php
}
