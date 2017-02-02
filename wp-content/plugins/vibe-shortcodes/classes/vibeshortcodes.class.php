<?php

class VibeShortcodes {

    function __construct() 
    {	
    	
    	define('VIBE_TINYMCE_URI', VIBE_PLUGIN_URL.'/vibe-shortcodes/tinymce');
		
		$enable_shortcodes = apply_filters('wplms_vibe_shortcodes',1);

		if($enable_shortcodes){
			if(function_exists('vibe_get_option')){
				$this->create_course = vibe_get_option('create_course');
				if(!empty($this->create_course)){
					add_action('wp_enqueue_scripts', array($this, 'shortcodes_front_end'));
				}	
			}
			

	        add_action('init', array($this, 'init'));
	        add_action('wp_enqueue_scripts', array($this, 'frontend'));
		}

        add_action('admin_enqueue_scripts', array($this, 'admin_icons'),10,1);
        add_action('admin_enqueue_scripts', array($this, 'admin_init'),10, 1);
        
	}
	
	/**
	 * Registers TinyMCE rich editor buttons
	 *
	 * @return	void
	 */
	function init(){
		if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') )
			return;
	
		if ( get_user_option('rich_editing') == 'true' ){
			add_filter( 'mce_external_plugins', array($this, 'add_rich_plugins') );
			add_filter( 'mce_buttons', array($this, 'register_rich_buttons') );
		}
	}
	
    function frontend(){

       	wp_enqueue_script( 'shortcodes-js', VIBE_PLUGIN_URL . '/vibe-shortcodes/js/shortcodes.js',array('jquery','mediaelement','thickbox'),'2.4',true);
       	$translation_array = array( 
							'sending_mail' => __( 'Sending mail','vibe-shortcodes' ), 
							'error_string' => __( 'Error :','vibe-shortcodes' ),
							'invalid_string' => __( 'Invalid ','vibe-shortcodes' ),
							'captcha_mismatch' => __( 'Captcha Mismatch','vibe-shortcodes' ), 
							);
       	wp_localize_script( 'shortcodes-js', 'vibe_shortcode_strings', $translation_array );
    }
	// --------------------------------------------------------------------------
	
	/**
	 * Defins TinyMCE rich editor js plugin
	 *
	 * @return	void
	 */
	function add_rich_plugins( $plugin_array )
	{
		if ( floatval(get_bloginfo('version')) >= 3.9){
			$plugin_array['vibeShortcodes'] = VIBE_TINYMCE_URI . '/plugin.js';
		}else{
			$plugin_array['vibeShortcodes'] = VIBE_TINYMCE_URI . '/plugin.old.js'; // For old versions of WP
		}

		return $plugin_array;
	}
	
	// --------------------------------------------------------------------------
	
	/**
	 * Adds TinyMCE rich editor buttons
	 *
	 * @return	void
	 */
	function register_rich_buttons( $buttons )
	{
		array_push( $buttons, "|", 'vibe_button' );
		return $buttons;
	}
	
	/**
	 * Enqueue Scripts and Styles
	 *
	 * @return	void
	 */
	function admin_init($hook)
	{      
        if((is_admin() && in_array( $hook, array( 'post-new.php', 'post.php','toplevel_page_wplms_options' ) ) ) ){
			wp_enqueue_script( 'jquery-ui-sortable' );
			wp_enqueue_script( 'jquery-livequery', VIBE_TINYMCE_URI . '/js/jquery.livequery.js', false, '1.1.1', false );
			wp_enqueue_script( 'jquery-appendo', VIBE_TINYMCE_URI . '/js/jquery.appendo.js', false, '1.0', false );
			wp_enqueue_script( 'base64', VIBE_TINYMCE_URI . '/js/base64.js', false, '1.0', false );
	        wp_localize_script( 'jquery', 'VibeShortcodes', array('shortcodes_folder' => VIBE_PLUGIN_URL .'/vibe-shortcodes') );
	        if ( floatval(get_bloginfo('version')) >= 3.9){
			  wp_enqueue_script( 'vibe-popup', VIBE_TINYMCE_URI . '/js/popup.js', array('jquery-ui-core','jquery-ui-widget','jquery-ui-mouse','jquery-ui-draggable','jquery-ui-slider','iris'), '1.0', false );
			}else{
				wp_enqueue_script( 'vibe-popup', VIBE_TINYMCE_URI . '/js/popup.old.js', array('jquery-ui-core','jquery-ui-widget','jquery-ui-mouse','jquery-ui-draggable','jquery-ui-slider','iris'), '1.0', false );
			}
		}
        if(is_admin()){
			wp_enqueue_style( 'vibe-popup-css', VIBE_TINYMCE_URI . '/css/popup.css', false, '1.0', 'all' );
        }   
    }
        
    function admin_icons($hook){
    	if(is_admin() && in_array( $hook, array( 'post-new.php', 'post.php' ) ) ){
            wp_enqueue_style( 'icons-css', VIBE_PLUGIN_URL.'/vibe-shortcodes/css/fonticons.css');
        }
    }

    function shortcodes_front_end(){
    	if ( ! current_user_can('edit_posts') )
			return;

		wp_enqueue_script( 'jquery-ui-draggable' );
		wp_enqueue_script( 'jquery-ui-slider' );
		wp_enqueue_script( 'jquery-ui-sortable' );
		wp_enqueue_script('iris',admin_url( 'js/iris.min.js' ),array( 'jquery-ui-draggable', 'jquery-ui-slider', 'jquery-touch-punch' ),false,1);
		wp_enqueue_script( 'jquery-livequery', VIBE_TINYMCE_URI . '/js/jquery.livequery.js', false, '1.1.1', true );
		wp_enqueue_script( 'jquery-appendo', VIBE_TINYMCE_URI . '/js/jquery.appendo.js', false, '1.0', true );
		wp_enqueue_script( 'base64', VIBE_TINYMCE_URI . '/js/base64.js', false, '1.0', true );
        

        if ( floatval(get_bloginfo('version')) >= 3.9){ 
		  wp_enqueue_script( 'vibe-popup', VIBE_TINYMCE_URI . '/js/popup.js', array(), '1.0', true );
		}else{
			wp_enqueue_script( 'vibe-popup', VIBE_TINYMCE_URI . '/js/popup.old.js', array('jquery-ui-core','jquery-ui-widget','jquery-ui-mouse','jquery-ui-draggable','jquery-ui-slider','iris'), '1.0', true );
		}

		wp_localize_script( 'jquery', 'VibeShortcodes', array('shortcodes_folder' => VIBE_PLUGIN_URL .'/vibe-shortcodes') );
    	wp_enqueue_style( 'vibe-popup-css', VIBE_TINYMCE_URI . '/css/popup.css', false, '1.0', 'all' );
    }    
    
}

$vibe_shortcodes = new VibeShortcodes();
?>