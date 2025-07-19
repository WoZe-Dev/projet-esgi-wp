<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?= get_bloginfo('name') ?></title>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <header class="site-header">
        <div class="container">
            <div class="header-content">
                <div class="site-logo">
                    <a href="<?php echo home_url(); ?>">
                        <?php if (is_404()): ?>
                            <!--  WHITE LOGO -->
                            <img src="<?php echo get_template_directory_uri(); ?>/img/logo_white.svg?v=<?php echo filemtime(get_template_directory() . '/img/logo_white.svg'); ?>" alt="<?php bloginfo('name'); ?>" class="logo">
                        <?php else: ?>
                            <!-- NORMAL LOGO -->
                            <img src="<?php echo get_template_directory_uri(); ?>/img/logo.svg?v=<?php echo filemtime(get_template_directory() . '/img/logo.svg'); ?>" alt="<?php bloginfo('name'); ?>" class="logo">
                        <?php endif; ?>
                    </a>
                </div>

                <!-- Checkbox caché pour contrôler le menu -->
                <input type="checkbox" id="burger-toggle">

                <!-- Bouton burger (label pour le checkbox) -->
                <label for="burger-toggle" class="burger-menu" aria-label="Menu">
                    <?php if (is_404()): ?>
                        <!-- WHITE MENU ICON -->
                        <img src="<?php echo get_template_directory_uri(); ?>/img/menu_white.svg?v=<?php echo filemtime(get_template_directory() . '/img/menu_-white.svg'); ?>" alt="Menu" class="burger-icon">
                    <?php else: ?>
                        <!-- BLACK MENU ICON -->
                        <img src="<?php echo get_template_directory_uri(); ?>/img/menu.svg?v=<?php echo filemtime(get_template_directory() . '/img/menu.svg'); ?>" alt="Menu" class="burger-icon">
                    <?php endif; ?>
                </label>

                <!-- Menu fullscreen overlay -->
                <div class="dropdown-menu-overlay">
                    <div class="dropdown-menu-content">
                        <div class="menu-header">
                            <div class="menu-logo">
                                <a href="<?php echo home_url(); ?>">
                                    <a>ESGI.</a>
                                </a>
                                <div class="menu-subtitle">
                                    Or try Search
                                </div>
                            </div>
                            <label for="burger-toggle" class="close-menu" aria-label="Fermer le menu">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M18 6L6 18M6 6L18 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </label>
                        </div>

                        <div class="menu-main-content">
                            <div class="menu-left-content">
                                <!-- Espace pour contenu additionnel si nécessaire -->
                            </div>

                            <?php
                            if (has_nav_menu('primary_menu')) {
                                wp_nav_menu([
                                    'theme_location' => 'primary_menu',
                                    'container'          => "nav",
                                    'container_class'    => "dropdown-navigation",
                                    'menu_class'         => "dropdown-nav-menu",
                                ]);
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>