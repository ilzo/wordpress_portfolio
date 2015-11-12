<?php
/*
Plugin Name: Ilzo's Portfolio Plugin 2
Plugin URI: http://localhost:8080/wordpress/
Description: My plugin for project post type.
Version: 1.0
Author: Ilari Juvani
Author URI: -
License: -
*/

add_action('init', 'my_projects');

function my_projects() {

     register_taxonomy(
        'skills',
        'my_project',
        array(
            'label' => 'Skills',
            'singular_label' => 'Skill',
            'hierarchical' => true,
            'show_admin_column' => true,
            'query_var' => true,
            'rewrite' => array('slug' => 'projects'),
        )
    );

    $labels = array(
        'name' => _x('Projects', 'post type general name'),
        'singular_name' => _x('Project', 'post type singular name')
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => null,
        'menu_icon' => 'dashicons-index-card',
        'supports' => array('title','editor','thumbnail', 'excerpt'),
        'rewrite' => array(
            //'slug' => 'event',
            'slug' => 'projects/%skills%',
            'with_front' => false
        ),
        'has_archive' => 'projects'
    ); 

    register_post_type( 'my_project' , $args );
    flush_rewrite_rules();
}



add_filter('post_type_link', 'events_permalink_structure', 10, 4);
function events_permalink_structure($post_link, $post, $leavename, $sample)
{
    if ( false !== strpos( $post_link, '%skills%' ) ) {
        $event_type_term = get_the_terms( $post->ID, 'skills' );
        if($event_type_term !== false){
            $post_link = str_replace( '%skills%', array_pop( $event_type_term )->slug, $post_link );
        }
        
    }
    return $post_link;
}


?>