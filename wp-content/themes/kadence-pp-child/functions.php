<?php
/**
 * Theme setup and asset loading for Kadence PP Child
 */

// Add theme support features and register menus
add_action('after_setup_theme', function () {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo', [
        'height' => 64, 
        'width' => 200, 
        'flex-height' => true, 
        'flex-width' => true,
    ]);
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
    
    // Register navigation menus
    register_nav_menus([
        'primary' => __('Primary Menu', 'pp'),
    ]);
});

// Load parent and child styles, and custom assets
add_action('wp_enqueue_scripts', function () {
    // Parent (Kadence) stylesheet
    wp_enqueue_style(
        'kadence-parent',
        get_template_directory_uri() . '/style.css',
        [],
        wp_get_theme('kadence')->get('Version')
    );

    // Child theme stylesheet
    wp_enqueue_style(
        'kadence-pp-child',
        get_stylesheet_uri(),
        ['kadence-parent'],
        wp_get_theme()->get('Version')
    );

    // Custom CSS/JS with file modification time for cache busting
    $base = get_stylesheet_directory();
    $uri  = get_stylesheet_directory_uri();
    
    // Header-specific assets
    if (file_exists($base . '/assets/css/header.css')) {
        wp_enqueue_style(
            'pp-header', 
            $uri . '/assets/css/header.css', 
            ['kadence-parent'], 
            filemtime($base . '/assets/css/header.css')
        );
    }
    
    if (file_exists($base . '/assets/js/header.js')) {
        wp_enqueue_script(
            'pp-header', 
            $uri . '/assets/js/header.js', 
            [], 
            filemtime($base . '/assets/js/header.js'), 
            true
        );
    }
    
    // General custom assets
    if (file_exists($base . '/assets/css/custom.css')) {
        wp_enqueue_style(
            'pp-custom',
            $uri . '/assets/css/custom.css',
            ['kadence-pp-child'],
            filemtime($base . '/assets/css/custom.css')
        );
    }
    
    if (file_exists($base . '/assets/js/custom.js')) {
        wp_enqueue_script(
            'pp-custom',
            $uri . '/assets/js/custom.js',
            [],
            filemtime($base . '/assets/js/custom.js'),
            true
        );
    }
});