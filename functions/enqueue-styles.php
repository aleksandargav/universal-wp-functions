<?php
/**
 * Enqueue child theme CSS styles
 * Učitava CSS stilove iz child teme
 */

if ( ! function_exists('enqueue_child_theme_styles') ) {
    // Hook into wp_enqueue_scripts to load CSS
    // Kacimo se na wp_enqueue_scripts kako bismo učitali CSS
    add_action('wp_enqueue_scripts', 'enqueue_child_theme_styles', 1001);

    function enqueue_child_theme_styles() {
        // Remove previously registered child styles (if any)
        // Uklanjamo prethodno registrovane stilove (ako postoje)
        wp_deregister_style('styles-child');

        // Register child theme stylesheet
        // Registrujemo stylesheet iz child teme
        wp_register_style('styles-child', get_stylesheet_directory_uri() . '/style.css');

        // Enqueue the registered stylesheet
        // Učitavamo registrovani stylesheet
        wp_enqueue_style('styles-child');
    }
}
