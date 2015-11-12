<?php
function theme_enqueue_styles() {

    $parent_style = 'parent-style';
    

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style )
    );
    
    wp_enqueue_style( 'sidebar-style', get_stylesheet_directory_uri() . '/3d-bold-navigation.css' );
}


function load_scripts()
{
    
    wp_register_script( 'gsap', 'http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js', array(), '1.18.0', false );
    
    wp_register_script( 'scroll-magic', 'http://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/ScrollMagic.min.js', array( 'gsap' ), '2.0.5', false);
    
    wp_register_script( 'scroll-magic-gsap-plugin', 'http://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/animation.gsap.js', array( 'gsap', 'scroll-magic' ), '2.0.5', false);
    
  
    // Register the script like this for a theme:
    wp_register_script( 'my-animations', get_stylesheet_directory_uri() . '/js/myAnimations.js', array( 'jquery', 'gsap', 'scroll-magic', 'scroll-magic-gsap-plugin'), '1.0.0', true );
    
     wp_register_script( 'sidebar-navigation', get_stylesheet_directory_uri() . '/js/3d-bold-navigation.js', array( 'jquery'), '1.0.0', false );
    
     wp_register_script( 'modernizr', get_stylesheet_directory_uri() . '/js/modernizr.js', array( 'sidebar-navigation'), '1.0.0', false );
    
    
    
    // Enqueue the registered scripts 
    wp_enqueue_script( 'jquery' );
    
    wp_enqueue_script( 'gsap' );
    
    wp_enqueue_script( 'scroll-magic' );
    
    wp_enqueue_script( 'scroll-magic-gsap-plugin' );
    
    wp_enqueue_script( 'sidebar-navigation' );
    
    wp_enqueue_script( 'modernizr' );
    
    wp_enqueue_script( 'my-animations' );
}

add_theme_support('post-thumbnails');

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

add_action( 'wp_enqueue_scripts', 'load_scripts' );

add_filter( 'pre_get_posts', 'my_get_posts' );

function my_get_posts( $query ) {

	if ( is_home() && $query->is_main_query() )
		$query->set( 'post_type', array( 'post', 'projects' ) );

	return $query;
}

add_filter( 'use_default_gallery_style', '__return_false' );

