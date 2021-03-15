<?php

/*
Plugin Name: Gym Fitness - Location with Leaflet
Plugin URI: 
Description: Creates a shortcode to display the location
Version: 1.0
Author: Zlatimir Ramac
Author URI:
Text Domain: gymfitness
*/

if (!defined('ABSPATH')) die(); //security measurements - if someone want to access this directly it will stop execution of the plugin


// Shortcode API
function gymfitness_location_shortcode() { 
    $location = get_field('location');
    ?>
    <div class="location">
        <input type="hidden" id="lat" value="<?php echo $location['lat'] ?>" />
        <input type="hidden" id="lng" value="<?php echo $location['lng'] ?>" />
        <input type="hidden" id="address" value="<?php echo $location['address'] ?>" />

        <div id="map"></div>
    </div>
<?php 
}
add_shortcode('gymfitness_location', 'gymfitness_location_shortcode'); // [gymfitness_location]

// Enqueues the CSS and JS Files for Leaflet
function gymfitness_location_scripts() {

    if(is_page('contact-us')):
    //leaflet css
    wp_enqueue_style( 'leafletcss', 'https://unpkg.com/leaflet@1.7.1/dist/leaflet.css', array(), '1.5.1' );

    //leaflet js
    wp_enqueue_script( 'leafletjs', 'https://unpkg.com/leaflet@1.7.1/dist/leaflet.js', array(), '1.5.1' );

    wp_enqueue_script( 'gymfitnessleafletjs', get_template_directory_uri() . '/js/gymfitness-leaflet.js', array(), '1.0.0' );

    endif;
}
add_action('wp_enqueue_scripts', 'gymfitness_location_scripts');


?>