<?php
/**
 * Universal WordPress Functions Loader
 * Učitava sve prilagođene WordPress funkcije
 */

// Path to the folder with functions
// Putanja do foldera sa funkcijama
$functions_dir = __DIR__ . '/functions';

// Load all PHP files from the 'functions' folder
// Učitaj sve PHP fajlove iz foldera 'functions'
foreach (glob($functions_dir . '/*.php') as $file) {
    require_once $file;
}
