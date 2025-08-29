<?php
/**
 * Plugin Name: PP Site Tweaks
 * Description: Site-specific functionality (shortcodes, hooks, REST helpers).
 * Version: 1.0.0
 * Author: The Profit Platform
 */

if (!defined('ABSPATH')) exit;

// Example: enqueue a small tweaks stylesheet
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style(
        'pp-tweaks',
        plugin_dir_url(__FILE__) . 'assets/tweaks.css',
        [],
        '1.0.0'
    );
});