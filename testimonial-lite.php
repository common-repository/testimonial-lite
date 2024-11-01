<?php
/*
Plugin Name: Testimonial Lite
Description: This plugin will enable Testimonial in your WordPress site.
Plugin URI: https://wplimb.com/plugins/testimonial-lite
Author: WPLimb
Author URI: https://wplimb.com
Version: 1.1
*/


/* Define */
define( 'WPL_TL_URL', plugins_url('/') . plugin_basename( dirname( __FILE__ ) ) . '/' );
define( 'WPL_TL_PATH', plugin_dir_path( __FILE__ ) );


/* Including files */
if(file_exists( WPL_TL_PATH . 'inc/scripts.php')){
	require_once(WPL_TL_PATH . "inc/scripts.php");
}
if(file_exists( WPL_TL_PATH . 'inc/functions.php')){
	require_once(WPL_TL_PATH . "inc/functions.php");
}

/* Plugin Action Links */
function wpl_testimonial_lite_action_links( $links ) {
	$links[] = '<a href="https://wplimb.com/plugins/testimonial-pro/" target="_blank" style="color: red; font-weight: 600;">Go
Pro!</a>';

	return $links;
}
add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'wpl_testimonial_lite_action_links' );


// Redirect after active
function wpl_testimonial_lite_active_redirect( $plugin ) {
	if ( $plugin == plugin_basename( __FILE__ ) ) {
		exit( wp_redirect( admin_url( 'options-general.php' ) ) );
	}
}
add_action( 'activated_plugin', 'wpl_testimonial_lite_active_redirect',  10, 2);


// admin menu
function wpl_testimonial_lite_options_framwrork() {
	add_options_page( 'Testimonial PRO Info', '', 'manage_options', 'wpl-testimonial-pro-info', 'wpl_testimonial_options_framwrork' );
}
add_action( 'admin_menu', 'wpl_testimonial_lite_options_framwrork' );


if ( is_admin() ) : // Load only if we are viewing an admin page

	function wpl_testimonial_lite_register_settings() {
		// Register settings and call sanitation functions
		register_setting( 'wpl_testimonial_lite_p_options', 'wpl_testimonial_lite_options', 'wpl_testimonial_lite_validate_options' );
	}
	add_action( 'admin_init', 'wpl_testimonial_lite_register_settings' );


// Function to generate options page
	function wpl_testimonial_options_framwrork() {

		if ( ! isset( $_REQUEST['updated'] ) ) {
			$_REQUEST['updated'] = false;
		} // This checks whether the form has just been submitted. ?>


		<div class="wrap wpl-testimonial-pro-info">
			<div class="wpl-col-lg-1 wpl-header-text">
				<h1>Welcome To Testimonial Lite</h1> <a href="https://wplimb.com/plugins/testimonial-pro/" target="_blank" class="wpl-upgrade-button">Upgrade Pro!</a>
			</div>


			<div class="wpl-all-features">
				<div class="wpl-product-features">
					<div class="wpl-col-lg-1">
						<h3>Thank you for installing Testimonial Lite!</h3>
					</div>


					<div class="wpl-col-lg-3 wpl-col-md-2 wpl-col-sm-1 wpl-col-xs-1 wpl-testimonial-free-version">
						<h2 class="text-center">Free Version Features</h2>
						<ul>
							<li><span class="dashicons dashicons-yes"></span>100% Responsive</li>
							<li><span class="dashicons dashicons-yes"></span>Easy Shortcode system</li>
							<li><span class="dashicons dashicons-yes"></span>Minimalist & Lightweight</li>
							<li><span class="dashicons dashicons-yes"></span>Work with all WordPress Themes</li>
							<li><span class="dashicons dashicons-yes"></span>Developer friendly & easy to customize</li>
							<li><span class="dashicons dashicons-yes"></span>Translation Ready</li>
							<li><span class="dashicons dashicons-yes"></span>All browsers compatible</li>
							<li><span class="dashicons dashicons-yes"></span>SEO friendly</li>
							<li><span class="dashicons dashicons-yes"></span>Infinite Loop, order and nav</li>
							<li><span class="dashicons dashicons-yes"></span>Free Basic Support</li>
						</ul>
					</div>

					<div class="wpl-col-lg-3 wpl-col-md-2 wpl-col-sm-1 wpl-col-xs-1 wpl-testimonial-pro-version">
						<h2 class="text-center">PRO Version Features</h2>
						<ul>
							<li><span class="dashicons dashicons-yes"></span>60+ Different Styles</li>
							<li><span class="dashicons dashicons-yes"></span>Slider, Carousel, Grid, Masonry, Filter and List</li>
							<li><span class="dashicons dashicons-yes"></span>Front-End Submission Form available</li>
							<li><span class="dashicons dashicons-yes"></span>Edit and Approve Testimonials from Admin</li>
							<li><span class="dashicons dashicons-yes"></span>Notification of New Testimonial Submission</li>
							<li><span class="dashicons dashicons-yes"></span>Google reCaptcha option</li>
							<li><span class="dashicons dashicons-yes"></span>Unlimited Testimonials Display</li>
							<li><span class="dashicons dashicons-yes"></span>Group Testimonials by Categories</li>
							<li><span class="dashicons dashicons-yes"></span>Create Unlimited Categories</li>
							<li><span class="dashicons dashicons-yes"></span>Show/hide most of Testimonial elements</li>
							<li><span class="dashicons dashicons-yes"></span>4 Different Client image styles</li>
							<li><span class="dashicons dashicons-yes"></span>4 Client image size option</li>
							<li><span class="dashicons dashicons-yes"></span>Set Client Logo image</li>
							<li><span class="dashicons dashicons-yes"></span>Set image custom size</li>
							<li><span class="dashicons dashicons-yes"></span>Unlimited Color for all elements</li>
							<li><span class="dashicons dashicons-yes"></span>Unique settings for each Testimonial</li>
							<li><span class="dashicons dashicons-yes"></span>Star Rating System</li>
							<li><span class="dashicons dashicons-yes"></span>Simple Pagination Style</li>


						</ul>
					</div>

					<div class="wpl-col-lg-3 wpl-col-md-2 wpl-col-sm-1 wpl-col-xs-1 wpl-testimonial-pro-version">
						<h2 class="text-center">PRO Version Features</h2>
						<ul>
                            <li><span class="dashicons dashicons-yes"></span>Four Excellent Navigation Styles</li>
							<li><span class="dashicons dashicons-yes"></span>9 Navigation Position</li>
							<li><span class="dashicons dashicons-yes"></span>Set Bullets to control Testimonials</li>
							<li><span class="dashicons dashicons-yes"></span>Set Testimonial custom slide speed</li>
							<li><span class="dashicons dashicons-yes"></span>Set the number of Testimonials to display</li>
							<li><span class="dashicons dashicons-yes"></span>Testimonial beautiful Column Structure</li>
							<li><span class="dashicons dashicons-yes"></span>Set Items per slide</li>
							<li><span class="dashicons dashicons-yes"></span>Testimonials Sorting Order</li>
							<li><span class="dashicons dashicons-yes"></span>Order (Descending, Ascending)</li>
							<li><span class="dashicons dashicons-yes"></span>Set Testimonial Custom AutoPlay speed</li>
							<li><span class="dashicons dashicons-yes"></span>Testimonial stop on hover</li>
							<li><span class="dashicons dashicons-yes"></span>Settings Section</li>
							<li><span class="dashicons dashicons-yes"></span>RTL Supported</li>
							<li><span class="dashicons dashicons-yes"></span>24/7 Dedicated Support</li>
							<li><span class="dashicons dashicons-yes"></span>Extensive Online docs & Tutorials</li>
							<li><span class="dashicons dashicons-yes"></span>Free Lifetime updates</li>
							<li><span class="dashicons dashicons-yes"></span>100% Money back guarantee</li>
							<li><span class="dashicons dashicons-yes"></span>And many more features…</li>
						</ul>
					</div>
				</div>

				<div class="wpl-col-lg-1 text-center wpl-footer-info">
					<h1>#1 Responsive Testimonial plugin for WordPress</h1>
					<h4>(7 days moneyback gurantee, Lifetime free updates & 24/7 customer support)</h4>
					<a href="https://wplimb.com/plugins/testimonial-pro/" target="_blank" class="wpl-upgrade-button">Buy PRO only for $29</a>
				</div>

			</div>
		</div>

		<?php
	}


endif;  // EndIf is_admin()

register_activation_hook( __FILE__, 'wpl_testimonial_lite_activate' );
add_action( 'admin_init', 'wpl_testimonial_lite_redirect' );

function wpl_testimonial_lite_activate() {
	add_option( 'wpl_testimonial_lite_activation_redirect', true );
}

function wpl_testimonial_lite_redirect() {
	if ( get_option( 'wpl_testimonial_lite_activation_redirect', false ) ) {
		delete_option( 'wpl_testimonial_lite_activation_redirect' );
		if ( ! isset( $_GET['activate-multi'] ) ) {
			wp_redirect( "options-general.php?page=wpl-testimonial-pro-info" );
		}
	}
}