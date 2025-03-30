<?php
/**
 * Shortcode for filtering products by brand and model
 * Kratki kod za filtriranje proizvoda po marki i modelu
 *
 * Usage / Upotreba: [brand_model_filter]
 */

if ( ! function_exists('brand_model_filter_shortcode') ) {
    function brand_model_filter_shortcode() {
        // Start output buffering
        // Pokrećemo izlazni bafer
        ob_start(); ?>
        
        <div class="brand-model-filter-container">
            <!-- Dropdown for selecting brand -->
            <!-- Padajući meni za izbor marke -->
            <select id="brand">
                <option value=""><?php esc_html_e('Marka', 'textdomain'); // Brand ?></option>
                <?php
                // Fetch all brands from product_brand taxonomy
                // Uzimamo sve brendove iz 'product_brand' taksonomije
                $brands = get_terms(array(
                    'taxonomy'   => 'product_brand',
                    'hide_empty' => false,
                ));

                if ( ! empty($brands) && ! is_wp_error($brands) ) {
                    foreach ( $brands as $brand ) {
                        echo '<option value="' . esc_attr($brand->name) . '">' . esc_html($brand->name) . '</option>';
                    }
                }
                ?>
            </select>

            <!-- Dropdown for selecting model -->
            <!-- Padajući meni za izbor modela -->
            <select id="model">
                <option value=""><?php esc_html_e('Model', 'textdomain'); ?></option>
            </select>

            <!-- Buttons for search and reset -->
            <!-- Dugmad za pretragu i resetovanje -->
            <button id="search-btn"><?php esc_html_e('PRONAĐI', 'textdomain'); // FIND ?></button>
            <button id="reset-btn"><?php esc_html_e('RESETUJ', 'textdomain'); // RESET ?></button>
        </div>

        <?php
        // Return output
        // Vraćamo HTML kao rezultat shortcode-a
        return ob_get_clean();
    }

    // Register the shortcode
    // Registrujemo shortcode
    add_shortcode('brand_model_filter', 'brand_model_filter_shortcode');
}
