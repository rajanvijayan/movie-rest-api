<?php
/*
Plugin Name: Movie REST API
Description: Custom WordPress plugin to create a Movies custom post type and expose it through a REST API.
Version: 1.0
Author: Rajan Vijayan
*/

/**
 * Bootstrap the plugin.
 */
require_once __DIR__ . '/vendor/autoload.php';

// Initialize the Movie custom post type
require_once plugin_dir_path(__FILE__) . 'src/Model/Movie.php';

// Register the API routes
require_once plugin_dir_path(__FILE__) . 'src/Routes/ApiRoutes.php';

// Bootstrap the plugin
MovieRestApi\Model\Movie::init();

// Include the API routes
MovieRestApi\Routes\ApiRoutes::register_routes();
