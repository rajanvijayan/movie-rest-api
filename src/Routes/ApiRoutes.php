<?php
namespace MovieRestApi\Routes;

use MovieRestApi\Controller\MoviesController;

class ApiRoutes {
    public static function register_routes() {
        $movies_controller = new MoviesController();

        // Register REST API routes
        add_action('rest_api_init', function () use ($movies_controller) {
            // Register endpoint to get all movies
            register_rest_route('herothemes/v1', '/movies', [
                'methods' => 'GET',
                'callback' => [$movies_controller, 'get_movies'],
                'permission_callback' => 'is_user_logged_in',
            ]);

            // Register endpoint to get a single movie
            register_rest_route('herothemes/v1', '/movies/(?P<id>\d+)', [
                'methods' => 'GET',
                'callback' => [$movies_controller, 'get_movie'],
                'permission_callback' => 'is_user_logged_in',
            ]);
        });
    }
}
