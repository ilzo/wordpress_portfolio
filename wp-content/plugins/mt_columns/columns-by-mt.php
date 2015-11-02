<?php
/*
Plugin Name: Columns by ModernThemes
Plugin URI: http://modernthemes.net/plugins/columns
Description: This is a plugin by ModernThemes that adds a four columns widget.
Version: 1.1.0
Author: ModernThemes
Author URI: http://modernthemes.net/
License: GPL2
Text Domain: mtcolumns 
Domain Path: /languages/
*/

add_action('admin_init', 'mt_columnssettings_flush' ); 

function mt_columnssettings_flush(){ 

		if ( isset( $_POST['mt_columnssettings_options'] ) ) {


			flush_rewrite_rules(); 
		
		}

}

/* Paths for Files */
$mt_columns_main_file = dirname(__FILE__).'/columns-by-mt.php';
$mt_columns_directory = plugin_dir_url($mt_columns_main_file); 
$mt_columns_path = dirname(__FILE__);

/* CSS and Scripts */
function mt_columns_add_scripts() {
	global $mt_columns_directory, $mt_columns_path; 
	
		wp_enqueue_style('mt-columns-grid', $mt_columns_directory. 'css/grid.css'); 
		
}
		
add_action('wp_enqueue_scripts', 'mt_columns_add_scripts');  


class MT_Columns_Widgets {
	public function __construct() {
		add_action( 'widgets_init', array( $this, 'load' ), 9 );
		add_action( 'widgets_init', array( $this, 'init' ), 10 );
		register_uninstall_hook( __FILE__, array( __CLASS__, 'uninstall' ) );
	}

	public function load() {
		$dir = plugin_dir_path( __FILE__ );

		include_once( $dir . 'inc/widget-mt-columns.php' ); 
		
	}

	public function init() {
		if ( ! is_blog_installed() ) {
			return;
		}

		load_plugin_textdomain( 'mtcolumns', false, 'mt_columns/languages' );
		
		register_widget( 'mt_columns' ); 
		
	}

	public function uninstall() {}
}

$mt_columns_widgets = new MT_Columns_Widgets(); 