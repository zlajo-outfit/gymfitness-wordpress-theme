<?php 

// Link to the queries file
require get_template_directory() . '/inc/queries.php';

//creates the Menus
function gymfitness_menus() {

    register_nav_menus( array(
        'main-menu' => 'Main Menu',
        'secondary-menu' => 'Secondary Menu'
    ) 
    );
}

//Hook for the menus
add_action('init', 'gymfitness_menus');


//Adds Stylesheets and JS files
function gymfitness_scripts() {
    // normalize CSS
    wp_enqueue_style( 'normalize', get_template_directory_uri() . '/css/normalize.css', array(), '8.0.1');
    
    //Google Fonts
    wp_enqueue_style( 'fonts', 'https://fonts.googleapis.com/css2?family=Open+Sans&family=Raleway:wght@400;700;900&family=Staatliches&display=swap', array(), 1.0 );

    //bx slider

        wp_enqueue_style('bxslidercss', 'https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css', array(), '4.2.12' );


    //Main Style.css
    wp_enqueue_style( 'style', get_stylesheet_uri(), array('normalize', 'fonts'), '1.0.0' );

    if(basename(get_page_template()) === 'gallery.php'):
    //LightBox CSS
    wp_enqueue_style( 'lightboxcss', get_template_directory_uri() . '/css/lightbox.min.css', array(), '2.1.11' );
    endif;

    

    if(basename(get_page_template()) === 'gallery.php'):
    //LightBox JS
    wp_enqueue_script( 'lightboxjs', get_template_directory_uri() . '/js/lightbox.min.js', array(), '2.1.11' );
    endif;

    if(basename(get_page_template()) === 'gallery.php'):
        //LightBox JS
        wp_enqueue_script( 'lightboxplus', get_template_directory_uri() . '/js/lightbox-plus-jquery.js', array(), '2.1.11' );
        endif;


        wp_enqueue_script('bxsliderjquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js', array(), '3.1.1' );



        wp_enqueue_script('bxsliderjs', 'https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js', array(), '4.2.12');

        wp_enqueue_script('scriptsjs', get_template_directory_uri() . '/js/scripts.js', array(), '1.0.0' );

}

// Hook for enquee scripts - this is hoook that WP has integrated
add_action('wp_enqueue_scripts', 'gymfitness_scripts'); 

function gymfitness_setup() {
    // Register new image size
    add_image_size('square', 350, 350, true);
    add_image_size( 'portrait', 350, 725, true);
    add_image_size( 'box', 400, 375, true);
    add_image_size( 'mediumSize', 700, 400, true);
    add_image_size( 'blog', 966, 644, true);

    // Add featured image support
    add_theme_support( 'post-thumbnails' );

    // SEO Titles
    add_theme_support('title-tag');
}

add_action('after_setup_theme', 'gymfitness_setup');


//Creates a Widget Zone
function gymfitness_widgets() {
    register_sidebar(array(
        'name' => 'Main Sidebar',
        'id' => 'sidebar',     
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="text-primary">',
        'after_title' => '</h3>'
    ) );
}

add_action('widgets_init', 'gymfitness_widgets'); // widgets_ini the place where widgets will be initialized

/**Displays the Hero image on background of the front-page**/

function gymfitness_hero_image() {
    $front_page_id = get_option('page_on_front');
    $image_id = get_field('hero_image', $front_page_id);
    $image = $image_id['url'];

    //Create a "FALSE" stylesheet
    wp_register_style('custom', false);
    wp_enqueue_style('custom');

    $featured_image_css = "
        body.home .site-header {
            background-image:  
              linear-gradient(180deg, rgba( 
                0, 0, 0, 0.62), rgba( 
                  0, 0, 0, 0.58)), url( 
                    $image);
            
            background-repeat: no-repeat;
            background-size: cover;
            
        }
        ";
        wp_add_inline_style('custom', $featured_image_css);
}

add_action('init', 'gymfitness_hero_image');

function remove_admin_login_header() {
    remove_action('wp_head', '_admin_bar_bump_cb');
}

add_action('get_header', 'remove_admin_login_header');

?>