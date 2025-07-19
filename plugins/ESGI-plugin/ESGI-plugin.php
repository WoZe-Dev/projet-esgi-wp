<?php
/*
Plugin Name: ESGI
Plugin URI: https://esgi.fr
Description: Ajout d'un lien de duplication aux listes d'articles et de pages
Author: ESGI
Version: 1.0
*/

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Define plugin constants
define('ESGI_PLUGIN_VERSION', '1.0');
define('ESGI_PLUGIN_URL', plugin_dir_url(__FILE__));
define('ESGI_PLUGIN_PATH', plugin_dir_path(__FILE__));

/**
 * Main ESGI Plugin Class
 */
class ESGI_Plugin
{
    /**
     * Plugin instance
     */
    private static $instance = null;

    /**
     * Get plugin instance
     */
    public static function get_instance()
    {
        if (null === self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Constructor
     */
    private function __construct()
    {
        add_action('init', array($this, 'register_post_types_and_taxonomies'));
        add_action('init', array($this, 'register_shortcodes'));
        add_action('wp_head', array($this, 'add_frontend_styles'));

        // Post duplication hooks
        add_filter('post_row_actions', array($this, 'add_duplicate_link'), 10, 2);
        add_filter('page_row_actions', array($this, 'add_duplicate_link'), 10, 2);
        add_action('admin_action_esgi_duplicate_post', array($this, 'duplicate_post'));
        add_action('admin_notices', array($this, 'show_duplicate_notice'));

        // Template hooks
        add_filter('template_include', array($this, 'load_custom_template'));

        // Navigation menu hooks
        add_filter('nav_menu_css_class', array($this, 'remove_posts_highlight_on_project_pages'), 10, 2);
        add_filter('nav_menu_css_class', array($this, 'highlight_project_archive_on_single'), 10, 2);
    }

    /**
     * Register custom post types and taxonomies
     */
    public function register_post_types_and_taxonomies()
    {
        $this->register_project_post_type();
        $this->register_skill_taxonomy();
    }

    /**
     * Register project custom post type
     */
    private function register_project_post_type()
    {
        $labels = array(
            'name'                  => 'Projets',
            'singular_name'         => 'Projet',
            'menu_name'             => 'Projets',
            'name_admin_bar'        => 'Projet',
            'add_new'               => 'Ajouter un nouveau',
            'add_new_item'          => 'Nouveau projet',
            'new_item'              => 'Nouveau projet',
            'edit_item'             => 'Modifier le projet',
            'view_item'             => 'Voir le projet',
            'all_items'             => 'Tous les projets',
            'search_items'          => 'Rechercher des projets',
            'parent_item_colon'     => 'Projets parents :',
            'not_found'             => 'Aucun projet trouvé.',
            'not_found_in_trash'    => 'Aucun projet trouvé dans la corbeille.',
            'featured_image'        => 'Image du projet',
            'set_featured_image'    => 'Définir l\'image du projet',
            'remove_featured_image' => 'Supprimer l\'image du projet',
            'use_featured_image'    => 'Utiliser comme image du projet',
            'archives'              => 'Archives des projets',
            'insert_into_item'      => 'Insérer dans le projet',
            'uploaded_to_this_item' => 'Téléchargé vers ce projet',
            'filter_items_list'     => 'Filtrer la liste des projets',
            'items_list_navigation' => 'Navigation de la liste des projets',
            'items_list'            => 'Liste des projets',
        );

        $args = array(
            'labels'             => $labels,
            'description'        => 'Custom post type pour les projets',
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => array('slug' => 'project'),
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => 1,
            'menu_icon'          => 'dashicons-media-code',
            'supports'           => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'custom-fields'),
            'show_in_rest'       => true,
        );

        register_post_type('project', $args);
    }

    /**
     * Register skill taxonomy
     */
    private function register_skill_taxonomy()
    {
        $labels = array(
            'name'                       => 'Skills',
            'singular_name'              => 'Skill',
            'menu_name'                  => 'Skills',
            'all_items'                  => 'Tous les skills',
            'parent_item'                => 'Skill parent',
            'parent_item_colon'          => 'Skill parent :',
            'new_item_name'              => 'Nom du nouveau skill',
            'add_new_item'               => 'Ajouter un nouveau skill',
            'edit_item'                  => 'Modifier le skill',
            'update_item'                => 'Mettre à jour le skill',
            'view_item'                  => 'Voir le skill',
            'separate_items_with_commas' => 'Séparer les skills avec des virgules',
            'add_or_remove_items'        => 'Ajouter ou supprimer des skills',
            'choose_from_most_used'      => 'Choisir parmi les plus utilisés',
            'popular_items'              => 'Skills populaires',
            'search_items'               => 'Rechercher des skills',
            'not_found'                  => 'Aucun skill trouvé',
            'no_terms'                   => 'Aucun skill',
            'items_list'                 => 'Liste des skills',
            'items_list_navigation'      => 'Navigation de la liste des skills',
        );

        $args = array(
            'labels'                     => $labels,
            'hierarchical'               => false,
            'public'                     => true,
            'show_ui'                    => true,
            'show_admin_column'          => true,
            'show_in_nav_menus'          => true,
            'show_tagcloud'              => true,
            'show_in_rest'               => true,
            'rewrite'                    => array('slug' => 'skill'),
        );

        register_taxonomy('skill', array('project'), $args);
    }

    /**
     * Add duplicate link to post/page actions
     */
    public function add_duplicate_link($actions, $post)
    {
        if (!current_user_can('edit_posts')) {
            return $actions;
        }

        $url = wp_nonce_url(
            add_query_arg(
                array(
                    'action' => 'esgi_duplicate_post',
                    'post' => $post->ID,
                ),
                'admin.php'
            )
        );

        $actions['duplicate'] = '<a href="' . esc_url($url) . '">' . __('Duplicate', 'ESGI') . '</a>';
        return $actions;
    }

    /**
     * Handle post duplication
     */
    public function duplicate_post()
    {
        // Security checks
        if (!current_user_can('edit_posts')) {
            wp_die(__('You do not have permission to duplicate posts.', 'ESGI'));
        }

        if (!isset($_GET['post']) || !is_numeric($_GET['post'])) {
            wp_die(__('Invalid post ID.', 'ESGI'));
        }

        $original_post = get_post(absint($_GET['post']));
        if (!$original_post) {
            wp_die(__('Post not found.', 'ESGI'));
        }

        // Prepare post data
        $args = get_object_vars($original_post);
        unset($args['ID']);
        $args['post_title'] .= ' - DUPLICATE';
        $args['post_status'] = 'draft';
        $args['post_date'] = current_time('mysql');

        // Create new post
        $new_post_id = wp_insert_post($args);

        if ($new_post_id) {
            // Copy thumbnail
            $original_thumbnail_id = get_post_thumbnail_id($original_post->ID);
            if ($original_thumbnail_id) {
                set_post_thumbnail($new_post_id, $original_thumbnail_id);
            }

            // Redirect to posts list
            wp_safe_redirect(
                add_query_arg(
                    array(
                        'post_type' => $original_post->post_type,
                        'esgi_duplicate' => $new_post_id
                    ),
                    admin_url('edit.php')
                )
            );
            exit;
        }
    }

    /**
     * Show duplication notice
     */
    public function show_duplicate_notice()
    {
        if (isset($_GET['esgi_duplicate'])) {
            echo '<div class="notice notice-success is-dismissible"><p>' . __('Post successfully duplicated!', 'ESGI') . '</p></div>';
        }
    }

    /**
     * Load custom template for projects
     */
    public function load_custom_template($template)
    {
        // Only affect front-end
        if (is_admin() || (defined('REST_REQUEST') && REST_REQUEST)) {
            return $template;
        }

        // Check for single project
        if (is_single() && get_query_var('post_type') == 'project') {
            // Look for theme template first
            $theme_template = locate_template('single-project.php');
            if ($theme_template) {
                return $theme_template;
            }

            // Use plugin template as fallback
            $plugin_template = ESGI_PLUGIN_PATH . 'templates/single-project.php';
            if (file_exists($plugin_template) && is_readable($plugin_template)) {
                return $plugin_template;
            }
        }

        return $template;
    }

    /**
     * Remove posts highlight on project pages
     */
    public function remove_posts_highlight_on_project_pages($classes, $item)
    {
        if ((is_singular('project') || is_post_type_archive('project') || is_tax('skill')) &&
            ($item->object == 'category' || $item->object == 'post' ||
                $item->url == get_permalink(get_option('page_for_posts')) ||
                ($item->type == 'post_type_archive' && $item->object == 'post'))
        ) {
            $classes = array_diff($classes, array(
                'current-menu-item',
                'current_page_item',
                'current-menu-ancestor',
                'current_page_ancestor',
                'current-menu-parent',
                'current_page_parent'
            ));
        }

        return $classes;
    }

    /**
     * Highlight project archive on single project
     */
    public function highlight_project_archive_on_single($classes, $item)
    {
        if (is_singular('project')) {
            if (($item->type == 'post_type_archive' && $item->object == 'project') ||
                ($item->url == get_post_type_archive_link('project'))
            ) {
                $classes[] = 'current-menu-item';
                $classes[] = 'current_page_item';
            }
        }

        return $classes;
    }

    /**
     * Register shortcodes
     */
    public function register_shortcodes()
    {
        add_shortcode('skills-list', array($this, 'skills_list_shortcode'));
    }

    /**
     * Skills list shortcode
     */
    public function skills_list_shortcode($atts)
    {
        $attributes = shortcode_atts(array(
            'title' => 'Skills',
            'show_count' => 'false',
            'orderby' => 'name',
            'order' => 'ASC',
            'hide_empty' => 'true'
        ), $atts);

        $skills = get_terms(array(
            'taxonomy' => 'skill',
            'orderby' => $attributes['orderby'],
            'order' => $attributes['order'],
            'hide_empty' => $attributes['hide_empty'] === 'true'
        ));

        if (empty($skills) || is_wp_error($skills)) {
            return '<p>Aucun skill trouvé.</p>';
        }

        $output = '<div class="skills-list-container">';

        if (!empty($attributes['title'])) {
            $output .= '<h3 class="skills-list-title">' . esc_html($attributes['title']) . '</h3>';
        }

        $output .= '<ul class="skills-list">';

        foreach ($skills as $skill) {
            $skill_link = get_term_link($skill);
            $output .= '<li class="skill-item">';
            $output .= '<a href="' . esc_url($skill_link) . '" class="skill-link">';
            $output .= esc_html($skill->name);

            if ($attributes['show_count'] === 'true') {
                $output .= ' <span class="skill-count">(' . $skill->count . ')</span>';
            }

            $output .= '</a></li>';
        }

        $output .= '</ul></div>';

        return $output;
    }
}

// Initialize the plugin
function esgi_plugin_init()
{
    return ESGI_Plugin::get_instance();
}

// Start the plugin
add_action('plugins_loaded', 'esgi_plugin_init');
