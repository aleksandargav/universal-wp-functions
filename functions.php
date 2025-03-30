<?php
/**
 * Universal WordPress Functions Loader
 * Učitava sve prilagođene WordPress funkcije
 */

// Putanja do foldera sa funkcijama
$functions_dir = __DIR__ . '/functions';

// Učitaj sve PHP fajlove iz foldera 'functions'
foreach (glob($functions_dir . '/*.php') as $file) {
    require_once $file;
}
