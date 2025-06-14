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

function esgi_theme_styles() {
    // Style principal du thème
    wp_enqueue_style('esgi-main-style', get_stylesheet_uri());
    
    // Fichier CSS nav-bar
    wp_enqueue_style(
        'esgi-navbar-style', 
        get_template_directory_uri() . '/css/navbar.css',
        array('esgi-main-style'), // Dépendance du style principal
        filemtime(get_template_directory() . '/css/navbar.css') // Version basée sur la date de modification
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
    $wp_customize->add_section('esgi_params', [
        'title' => __('Réglages ESGI', 'ESGI'),
        'description' => __('Faites-vous plaisir :)', 'ESGI'),
        'priority' => 1,
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
function add_no_cache_headers() {
    if (!is_user_logged_in()) return;
    
    echo '<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">';
    echo '<meta http-equiv="Pragma" content="no-cache">';
    echo '<meta http-equiv="Expires" content="0">';
}

// Fonction pour vider le cache améliorée
function clear_site_cache() {
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
function add_cache_busting_version($src) {
    if (strpos($src, get_template_directory_uri()) !== false) {
        $cache_version = get_option('esgi_cache_version', time());
        $src = add_query_arg('v', $cache_version, $src);
    }
    return $src;
}

// Ajouter un message de confirmation après vidage du cache
add_action('admin_post_clear_cache', 'handle_clear_cache');
function handle_clear_cache() {
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
function show_cache_cleared_notice() {
    if (isset($_GET['cache_cleared']) && $_GET['cache_cleared'] == '1') {
        echo '<div class="notice notice-success is-dismissible"><p>Cache vidé avec succès!</p></div>';
    }
}
