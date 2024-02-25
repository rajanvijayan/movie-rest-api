<?php
namespace MovieRestApi\Model;

/**
 * Represents a Movie post type.
 */
class Movie {
    /**
     * Post type key.
     *
     * @var string
     */
    const POST_TYPE = 'movies';

    /**
     * Retrieves a movie by ID.
     *
     * @param int $movie_id Movie ID.
     * @return \WP_Post|null WP_Post object if found, otherwise null.
     */
    public static function get_movie($movie_id) {
        return get_post($movie_id);
    }

    /**
     * Retrieves all movies.
     *
     * @return array Array of WP_Post objects representing movies.
     */
    public static function get_movies() {
        $args = array(
            'post_type'      => self::POST_TYPE,
            'posts_per_page' => -1,
        );
        $movies = get_posts($args);
        return $movies;
    }

    /**
     * Initializes the Movie post type.
     *
     * This method registers the 'movies' custom post type with WordPress.
     */
    public static function init() {
        add_action('init', function() {
            register_post_type(self::POST_TYPE, array(
                'labels' => array(
                    'name'          => __('Movies', 'your-text-domain'),
                    'singular_name' => __('Movie', 'your-text-domain'),
                ),
                'public'              => true,
                'has_archive'         => true,
                'rewrite'             => array('slug' => 'movies'),
                'supports'            => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'custom-fields'),
            ));
        });
    }
}
