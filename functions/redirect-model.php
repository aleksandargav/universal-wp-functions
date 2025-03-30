<?php
/**
 * Redirect to shop page if the selected model has no submodels
 * Preusmeri na prodavnicu ako izabrani model nema podmodele
 */

if ( ! function_exists('redirect_modeli_without_submodels') ) {
    function redirect_modeli_without_submodels() {
        // Check if we are on "modeli" page with brand and model in URL
        // Proveravamo da li smo na stranici "modeli" sa brendom i modelom u URL-u
        if ( is_page('modeli') && isset($_GET['brand']) && isset($_GET['model']) ) {

            // Sanitize input values
            // Sanitizujemo ulazne vrednosti
            $brand = sanitize_text_field($_GET['brand']);
            $model_slug = sanitize_text_field($_GET['model']);

            // Get term by slug in product_cat taxonomy
            // Dohvatamo pojam (term) preko slug-a u 'product_cat' taksonomiji
            $model_term = get_term_by('slug', $model_slug, 'product_cat');

            if ($model_term) {
                // Get subcategories (submodels) of the current model
                // Dohvatamo podkategorije (podmodele) za dati model
                $submodels = get_terms(array(
                    'taxonomy'   => 'product_cat',
                    'parent'     => $model_term->term_id,
                    'hide_empty' => false,
                ));

                // If there are no submodels, redirect to shop URL
                // Ako nema podmodela, preusmeravamo na stranicu sa proizvodima
                if ( empty($submodels) || is_wp_error($submodels) ) {
                    $shop_url = site_url('/proizvodi/' . urlencode($brand) . '/' . urlencode($model_slug) . '/');
                    wp_redirect($shop_url);
                    exit;
                }
            }
        }
    }

    // Hook function to template_redirect
    // Kačimo funkciju na WordPress hook template_redirect
    add_action('template_redirect', 'redirect_modeli_without_submodels');
}
