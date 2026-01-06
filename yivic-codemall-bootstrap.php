<?php
$plugin_existed = defined( 'YIVIC_CODEMALL_PLUGIN_SLUG' );

// We set the slug for the plugin here.
// This slug will be used to identify the plugin instance from the WP_Application container
defined( 'YIVIC_CODEMALL_PLUGIN_SLUG' ) || define( 'YIVIC_CODEMALL_PLUGIN_SLUG', 'wp-plugin-yivic-codemall' );

$autoload_file = __DIR__ . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';
if ( file_exists( $autoload_file ) && !$plugin_existed ) {
	require_once $autoload_file;
}