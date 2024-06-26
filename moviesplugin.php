<?php
/*
*
*Plugin Name: Movie Plugin
*Description: A plugin that shows latest movies from boxoffice
*Version: 1.0
*Author: Huda
*
*/
echo "Plugin Works!";
function movie_api_enqueue_scripts() {
    wp_enqueue_style('movie-api-style', plugins_url('css/style.css', __FILE__));
    wp_enqueue_script('movie-api-script', plugins_url('js/script.js', __FILE__), array('jquery'), '1.0', true);
}

add_action('wp_enqueue_scripts', 'movie_api_enqueue_scripts');

// Shortcode to display movie information
function movie_api_shortcode($atts) {
  //  API Endpoint URL
    $api_url = 'https://sampleapis.com/movies/';

    // Fetch data from the API
    $response = wp_remote_get($api_url);
    return $response;
    echo $response;
    
    // Check for errors
    if (is_wp_error($response)) {
        return 'Error fetching movie data';
    }

    // Parse the JSON response
    $data = json_decode(wp_remote_retrieve_body($response));

    // Display movie information and button
    $output = '<div class="movie-info">';
    $output .= '<h2>' . $data->Title . '</h2>';
    $output .= '<p><strong>Year:</strong> ' . $data->Year . '</p>';
    $output .= '<p><strong>Genre:</strong> ' . $data->Genre . '</p>';
    // Add more information as needed
    $output .= '</div>';
    $output .= '<button class="toggle-movie-info">Toggle Movie Info</button>';
    return $output;
    echo ($output);
}