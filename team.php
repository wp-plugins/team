<?php
/*
Plugin Name: Team
Plugin URI: 
Description: Fully responsive and mobile ready meet the team showcase plugin for wordpress.
Version: 1.0
Author: paratheme
Author URI: http://paratheme.com
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

define('team_plugin_url', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__) ) . '/' );
define('team_plugin_dir', plugin_dir_path( __FILE__ ) );
define('team_wp_url', 'http://wordpress.org/plugins/team/' );
define('team_pro_url', 'http://paratheme.com/items/team-responsive-meet-the-team-grid-for-wordpress/' );
define('team_demo_url', 'http://paratheme.com/items/team-responsive-meet-the-team-grid-for-wordpress/' );
define('team_conatct_url', 'http://paratheme.com/contact' );
define('team_plugin_name', 'Team' );
define('team_share_url', 'http://paratheme.com/items/team-responsive-meet-the-team-grid-for-wordpress/' );

require_once( plugin_dir_path( __FILE__ ) . 'includes/team-meta.php');
require_once( plugin_dir_path( __FILE__ ) . 'includes/team-functions.php');



//Themes php files
require_once( plugin_dir_path( __FILE__ ) . 'themes/flat/index.php');
require_once( plugin_dir_path( __FILE__ ) . 'themes/flat-bg/index.php');



function team_init_scripts()
	{
		wp_enqueue_script('jquery');
		wp_enqueue_script('team_js', plugins_url( '/js/scripts.js' , __FILE__ ) , array( 'jquery' ));
		
		wp_localize_script('team_js', 'team_ajax', array( 'team_ajaxurl' => admin_url( 'admin-ajax.php')));
		wp_enqueue_style('team_style', team_plugin_url.'css/style.css');

		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script( 'team_color_picker', plugins_url('/js/color-picker.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
		

		
		// Style for themes
		wp_enqueue_style('team-style-flat', team_plugin_url.'themes/flat/style.css');
		wp_enqueue_style('team-style-flat-bg', team_plugin_url.'themes/flat-bg/style.css');		

		
	}
add_action("init","team_init_scripts");







register_activation_hook(__FILE__, 'team_activation');


function team_activation()
	{
		$team_version= "1.0";
		update_option('team_version', $team_version); //update plugin version.
		
		$team_customer_type= "free"; //customer_type "free"
		update_option('team_customer_type', $team_customer_type); //update plugin version.
	}


function team_display($atts, $content = null ) {
		$atts = shortcode_atts(
			array(
				'id' => "",

				), $atts);


			$post_id = $atts['id'];

			$team_themes = get_post_meta( $post_id, 'team_themes', true );

			$team_display ="";

			if($team_themes== "flat")
				{
					$team_display.= team_body_flat($post_id);
				}

			elseif($team_themes== "flat-bg")
				{
					$team_display.= team_body_flat_bg($post_id);
				}				
							

return $team_display;



}

add_shortcode('team', 'team_display');





add_action('admin_menu', 'team_menu_init');


	
function team_menu_help(){
	include('team-help.php');	
}


function team_menu_settings(){
	include('team-settings.php');	
}



function team_menu_init()
	{
		add_submenu_page('edit.php?post_type=team', __('Settings','menu-wpt'), __('Settings','menu-wpt'), 'manage_options', 'team_menu_settings', 'team_menu_settings');	
			
		add_submenu_page('edit.php?post_type=team', __('Help & Upgrade','menu-wpt'), __('Help & Upgrade','menu-wpt'), 'manage_options', 'team_menu_help', 'team_menu_help');

	}





?>