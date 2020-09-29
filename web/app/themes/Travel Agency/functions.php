<?php
//Create the function to enqueue all scripts to WP
function travelAgency_scripts()
{
    //Styles
    wp_enqueue_style('style', get_stylesheet_uri(), array(), '1.0.0');
    //Google fonts
    wp_enqueue_style("googlefonts", "//fonts.googleapis.com/css?family=Open+Sans:wght@400;700;800&display=swap", array(), "1.0.0");
    //Google fonts again because of bug
    wp_enqueue_style("googlefonts2", "//fonts.googleapis.com/css?family=Raleway:wght@400;700;900&display=swap", array(), "1.0.0");
    //FluidboxCSS
    wp_enqueue_style("fluidboxcss", get_template_directory_uri() . "/css/fluidbox.min.css", array(), "2.0.5");
    //Font Awesome
    wp_enqueue_style("fontawesome", get_template_directory_uri() . "/css/all.css", array(), "5.14.0");

    //BX Slider CSS
    wp_enqueue_style("bxslidercss", "//cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css", array(), "4.2.12");


    //Scripts
    //FluidboxJS
    wp_enqueue_script("fluidboxjs", get_template_directory_uri() . "/js/jquery.fluidbox.min.js", array("jquery"), "2.0.5", true);
    // BX Slider JS
    wp_enqueue_script("bxsliderjs", "//cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js", array("jquery"), "4.2.12");
    //JS Script
    wp_enqueue_script('scripts', get_template_directory_uri() . '/js/scripts.js', array("jquery"), '1.0.0', true);

}

add_action('wp_enqueue_scripts', 'travelAgency_scripts');

//Create function to create the menu for the navbar
function travelAgency_menu()
{
    register_nav_menus(array(
        'main-menu' => 'Main Menu'
    ));
}

;
add_action('init', 'travelAgency_menu');

//Create function for all of the theme support
function travelAgency_setup()
{

    //Add image sizes
    add_image_size('card', 700, 400, true);
    add_image_size('square', 350, 350, true);
    add_image_size('side-square', 350, 210, true);

    //Add featured images to every post/page
    add_theme_support('post-thumbnails');

    //SEO
    add_theme_support('title-tag');
}

add_action('after_setup_theme', 'travelAgency_setup');

//Create function to add widgets- for sidebar

function travelAgency_widgets()
{
    register_sidebar(array(
        'name' => 'Sidebar',
        'id' => 'sidebar',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="text-center title">',
        'after_title' => '</h3>'
    ));
}

;

add_action('widgets_init', 'travelAgency_widgets');


//Link SQL DB to wp
require get_template_directory() . "/inc/database.php";
//Link the script with the function for saving reservation to db
require get_template_directory() . "/inc/contacts.php";
//Create and options page in the wp admin
//require get_template_directory() . "/inc/options.php";

