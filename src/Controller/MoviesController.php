<?php
namespace MovieRestApi\Controller;

use WP_REST_Response;

/**
 * Class MoviesController
 * Controller for handling movie-related REST API requests.
 */
class MoviesController {
    
    /**
     * Retrieves all movies.
     *
     * @return WP_REST_Response Response containing array of movies.
     */
    public function get_movies() {
        $movies = get_posts(['post_type' => 'movies', 'numberposts' => -1]);
        return new WP_REST_Response($movies, 200);
    }

    /**
     * Retrieves a single movie by ID.
     *
     * @param array $request The REST request object.
     * @return WP_REST_Response Response containing the movie.
     */
    public function get_movie($request) {
        $movie_id = $request['id'];
        $movie = get_post($movie_id);
        return new WP_REST_Response($movie, 200);
    }
}
