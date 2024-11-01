<?php

if ( ! defined('ABSPATH')) exit;  // if direct access

class TestimonialLiteScriptsStyle{

	public function __construct(){

		require_once(WPL_TL_PATH . "admin/meta-box/meta-box.php");

		add_action( 'wp_enqueue_scripts', array( $this, 'testimonial_lite_front_scripts' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'testimonial_lite_admin_scripts' ) );
		add_action( 'plugins_loaded', array( $this, 'testimonial_lite_load_text_domain' ));
	}

	/*** Load Text Domain ***/
	public function testimonial_lite_load_text_domain() {
		load_plugin_textdomain( 'testimonial-lite', false, plugin_basename( dirname( __FILE__ ) ) . '/languages/' );
	}

	/*** Front Scripts ***/
	public function testimonial_lite_front_scripts(){
		// CSS Files
		wp_enqueue_style( 'slick', WPL_TL_URL . 'assets/css/slick.css', array(), null );
		wp_enqueue_style( 'font-awesome', WPL_TL_URL . 'assets/css/font-awesome.min.css', array(), null );
		wp_enqueue_style( 'testimonial-lite-style', WPL_TL_URL . 'assets/css/style.css' );

		//JS Files
		wp_enqueue_script( 'slick-min-js', WPL_TL_URL . 'assets/js/slick.min.js', array( 'jquery' ), null, true );
	}

	/*** Admin Scripts ***/
	public function testimonial_lite_admin_scripts(){
		wp_enqueue_style( 'tl-admin-style', WPL_TL_URL . 'admin/assets/css/admin-style.css', array(), null );
	}

}

new TestimonialLiteScriptsStyle();