<?php

add_theme_support( 'post-thumbnails' );
add_image_size( 'home-project', 400 ); 

include_once( $dir . 'inc/meta_box.php' ); 

function mt_projectssettngs_admin_menu_setup(){
add_submenu_page(
 'edit.php?post_type=project',
 __('Project Slug Option', 'mtprojects'),
 __('Project Slug Option', 'mtprojects'),
 'manage_options',
 'mt_projectssettngs',
 'mt_projectssettngs_admin_page_screen'
 );
}
add_action('admin_menu', 'mt_projectssettngs_admin_menu_setup'); //menu setup

/* display page content */
function mt_projectssettngs_admin_page_screen() {
 global $submenu;
// access page settings 
 $page_data = array();
 foreach($submenu['options-general.php'] as $i => $menu_item) {
 if($submenu['options-general.php'][$i][2] == 'mt_projectssettngs')
 $page_data = $submenu['options-general.php'][$i];
 }

// output 
?>
<div class="wrap">
<style>
#mt_projectssettngs_options .form-table th {
display: none;
}
#mt_projectssettngs_options label {
    cursor: pointer;
    display: block;
    float: left;
    width: 25%;
}
</style>


<?php screen_icon();?>
<h2><?php _e('Projects Settings', 'mtprojects');?></h2>
<form id="mt_projectssettngs_options" action="options.php" method="post">
<?php
settings_fields('mt_projectssettngs_options');
do_settings_sections('mt_projectssettngs'); 
submit_button('Save options', 'primary', 'mt_projectssettngs_options_submit');
?>
 </form>
</div>
<?php
}


function mt_projectssettngs_settings_init(){

register_setting(
 'mt_projectssettngs_options',
 'mt_projectssettngs_options',
 'mt_projectssettngs_options_validate'
 );

add_settings_section(
 'mt_projectssettngs_mtprojectsslugbox',
 '', 
 'mt_projectssettngs_mtprojectsslugbox_desc',
 'mt_projectssettngs'
 );

add_settings_field(
 'mt_projectssettngs_mtprojectsslugbox_template',
 '', 
 'mt_projectssettngs_mtprojectsslugbox_field',
 'mt_projectssettngs',
 'mt_projectssettngs_mtprojectsslugbox'
 );
    
add_settings_field(
 'mt_projectssettngs_mtprojectsslugbox_template2',
 '', 
 'mt_projectssettngs_mtprojectsslugbox_field2',
 'mt_projectssettngs',
 'mt_projectssettngs_mtprojectsslugbox2'
 );
    
}

add_action('admin_init', 'mt_projectssettngs_settings_init');

/* validate input */
function mt_projectssettngs_options_validate($input){
 global $allowedposttags, $allowedrichhtml;
if(isset($input['mtprojectsslugbox_template']))
 $input['mtprojectsslugbox_template'] = wp_kses_post($input['mtprojectsslugbox_template']);
 $input['mtprojectsslugbox_template2'] = wp_kses_post($input['mtprojectsslugbox_template2']);
return $input;
}

/* description text */
function mt_projectssettngs_mtprojectsslugbox_desc(){
_e('The default slug name is project. You can enter in any name for project slug in the field below.', 'mtprojects');
}

/* filed output */
function mt_projectssettngs_mtprojectsslugbox_field() { 
 $options = get_option('mt_projectssettngs_options');
 $mtprojectsslugbox = (isset($options['mtprojectsslugbox_template'])) ? $options['mtprojectsslugbox_template'] : '';
 $mtprojectsslugbox = strip_tags($mtprojectsslugbox); //sanitise output
 $mtprojectsslugbox2 = (isset($options['mtprojectsslugbox_template2'])) ? $options['mtprojectsslugbox_template2'] : '';
 $mtprojectsslugbox2 = strip_tags($mtprojectsslugbox2); //sanitise output
?>
<p>
    <label><?php _e('Project Single Slug Name', 'mtprojects');?></label>
 <input type="text" id="mtprojectsslugbox_template" name="mt_projectssettngs_options[mtprojectsslugbox_template]" value="<?php echo $mtprojectsslugbox; ?>" /></p>

<?php
}


add_action('init', 'create_mt_projects_post');

function create_mt_projects_post() {
	
 $options = get_option('mt_projectssettngs_options');
 $mtprojectsslugbox = (isset($options['mtprojectsslugbox_template'])) ? $options['mtprojectsslugbox_template'] : '';
 $mtprojectsslugbox = strip_tags($mtprojectsslugbox); //sanitise output	


	$labels = array(
		'name'                => __( 'Projects', 'Post Type General Name', 'mtprojects' ),
		'singular_name'       => __( 'Project', 'Post Type Singular Name', 'mtprojects' ),
		'menu_name'           => __( 'Projects', 'mtprojects' ),
		'parent_item_colon'   => __( 'Parent Item:', 'mtprojects' ),
		'all_items'           => __( 'All Projects', 'mtprojects' ),
		'view_item'           => __( 'View Project', 'mtprojects' ),
		'add_new_item'        => __( 'Add New Project', 'mtprojects' ),
		'add_new'             => __( 'Add New', 'mtprojects' ),
		'edit_item'           => __( 'Edit Project', 'mtprojects' ),
		'update_item'         => __( 'Update Project', 'mtprojects' ),
		'search_items'        => __( 'Search Projects', 'mtprojects' ),
		'not_found'           => __( 'Not found', 'mtprojects' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'mtprojects' ),
	);
	$args = array(
		'label'               => __( 'projects', 'mtprojects' ),
		'description'         => __( 'Add projects to your website.', 'mtprojects' ), 
		'labels'              => $labels,
		'supports' 			  => array('title','editor','thumbnail','comments'),
		'taxonomies'          => array( 'thumbnail', 'category' ), 
		'hierarchical'        => false,
		'menu_icon' 		  => 'dashicons-hammer',
		'rewrite' => array('slug' => $mtprojectsslugbox),  
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true, 
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 43,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => true,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);
	register_post_type( 'project', $args );

}
 