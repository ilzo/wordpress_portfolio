<?php
/*
Plugin Name: Ilzo's Portfolio Plugin
Plugin URI: http://localhost:8080/wordpress/
Description: My plugin for project post type.
Version: 1.0
Author: Ilari Juvani
Author URI: -
License: -
*/

add_action( 'init', 'create_project' );
add_action( 'admin_init', 'my_admin' );
add_action( 'save_post', 'add_project_fields', 10, 2 );
add_filter( 'template_include', 'include_template_function', 1 );
add_action( 'init', 'create_my_taxonomies', 0 );

/*
add_filter( 'manage_edit-projects_columns', 'my_columns' );
add_action( 'manage_posts_custom_column', 'populate_columns' );
add_filter( 'manage_edit-projects_sortable_columns', 'sort_me' );

add_filter( 'request', 'column_orderby' );

*/

function create_project() {
    register_post_type( 'projects',
        array(
            'labels' => array(
                'name' => 'Projects',
                'singular_name' => 'Project',
                'add_new' => 'Add New',
                'add_new_item' => 'Add New Project',
                'edit' => 'Edit',
                'edit_item' => 'Edit Project',
                'new_item' => 'New Project',
                'view' => 'View',
                'view_item' => 'View Project',
                'search_items' => 'Search Projects',
                'not_found' => 'No Projects found',
                'not_found_in_trash' => 'No Projects found in Trash',
                'parent' => 'Parent Project'
            ),
 
            'public' => true,
            'menu_position' => 15,
            'supports' => array( 'title', 'editor', 'comments', 'thumbnail', 'excerpt' ),
            'taxonomies' => array( '' ),
            'menu_icon' => 'dashicons-index-card',
            'has_archive' => true
        )
    );
}

function create_my_taxonomies() {
    register_taxonomy(
        'projects_skill',
        'projects',
        array(
            'labels' => array(
                'name' => 'Skill',
                'add_new_item' => 'Add New Skill',
                'new_item_name' => "New Project Type Skill"
            ),
            'show_ui' => true,
            'show_admin_column' => true,
            'show_tagcloud' => false,
            'hierarchical' => true,
            'query_var' => true
        )
    );
}

function my_admin() {
    add_meta_box( 'project_meta_box',
        'Project Details',
        'display_project_meta_box',
        'projects', 'normal', 'high'
    );
}



function display_project_meta_box( $project ) {
    // Retrieve the current project details based on project ID
    $project_details = esc_html( get_post_meta( $project->ID, 'project_details', true ) );
    //$movie_rating = intval( get_post_meta( $project->ID, 'movie_rating', true ) );
    ?>
    <table>
        <tr>
            <td style="width: 100%">Project Details</td>
                <td><input type="text" size="80" name="project_project_details" value="<?php echo $project_details; ?>" />
            </td>
        </tr>
    </table>
    <?php
}

function add_project_fields( $project_id, $project ) {
    // Check post type for projects
    if ( $project->post_type == 'projects' ) {
        // Store data in post meta table if present in post data
        if ( isset( $_POST['project_project_details'] ) && $_POST['project_project_details'] != '' ) {
            update_post_meta( $project_id, 'project_details', $_POST['project_project_details'] );
        }
        
    }
}

function include_template_function( $template_path ) {
    if ( get_post_type() == 'projects' ) {
        if ( is_single() ) {
            // checks if the file exists in the theme first,
            // otherwise serve the file from the plugin
            if ( $theme_file = locate_template( array ( 'single-projects.php' ) ) ) {
                $template_path = $theme_file;
            } else {
                $template_path = plugin_dir_path( __FILE__ ) . '/single-projects.php';
            }
        }elseif ( is_archive() ) {
            if ( $theme_file = locate_template( array ( 'archive-projects_skill.php' ) ) ) {
                $template_path = $theme_file;
            }else{ 
                $template_path = plugin_dir_path( __FILE__ ) . '/archive-projects_skill.php';
            }
        }
    }
    return $template_path;
}




/*
function my_columns( $columns ) {
    $columns['projects_skill'] = 'Skills';
    unset( $columns['comments'] );
    return $columns;
}


function populate_columns( $column ) {
    if ( 'projects_skill' == $column ) {
        $project_skill = esc_html( get_post_meta( get_the_ID(), 'projects_skill', true ) );
        echo $project_skill;
    }
   
}

function sort_me( $columns ) {
    $columns['projects_skill'] = 'projects_skill';
    return $columns;
}


function column_orderby ( $vars ) {
    if ( !is_admin() )
        return $vars;
    if ( isset( $vars['orderby'] ) && 'projects_skill' == $vars['orderby'] ) {
        $vars = array_merge( $vars, array( 'meta_key' => 'projects_skill', 'orderby' => 'meta_value' ) );
    }
   
    return $vars;
}
*/

?>