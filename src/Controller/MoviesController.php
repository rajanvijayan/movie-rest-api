<?php
namespace MovieRestApi\Controller;

use WP_REST_Response;

class MoviesController {
    public function get_movies() {
        $movies = get_posts(['post_type' => 'movies', 'numberposts' => -1]);
        return new WP_REST_Response($movies, 200);
    }

    public function get_movie($request) {
        $movie_id = $request['id'];
        $movie = get_post($movie_id);
        return new WP_REST_Response($movie, 200);
    }
}
