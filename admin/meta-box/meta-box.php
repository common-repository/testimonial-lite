<?php

function wpl_testimonial_lite_meta_box() {
	add_meta_box( 'wpl_testimonial_lite_meta_box_section',
		__( 'Testimonial Options', 'testimonial-lite' ),
		'display_wpl_testimonial_lite_meta_box',
		'testimonial_lite', 'normal', 'high'
	);
}

add_action( 'admin_init', 'wpl_testimonial_lite_meta_box' );


function display_wpl_testimonial_lite_meta_box( $client_designation ) {
	//
	$tl_designation = esc_html( get_post_meta( $client_designation->ID, 'tl_designation', true ) );
	?>
	<div class="wpl-meta-box-framework">

		<div class="wpl-mb-element wpl-mb-field-text">
			<div class="wpl-mb-title">
				<label for="tl_client_designation"><?php _e( 'Designation:', 'testimonial-lite' ) ?></label>

				<p class="wpl-mb-desc"><?php _e( 'Type client designation here.', 'testimonial-lite' ) ?></p>
			</div>
			<div class="wpl-mb-field-set">
				<input type="text" id="tl_client_designation" name="tl_client_designation" value="<?php echo esc_html( $tl_designation ); ?>"/>
			</div>
			<div class="clear"></div>
		</div>

	</div>

	<?php
}


function add_wpl_testimonial_lite_fields( $client_designation_id, $client_designation ) {

	if ( $client_designation->post_type == 'testimonial_lite' ) {
		// Store data in post meta table if present in post data
		if ( isset( $_POST['tl_client_designation'] ) ) {
			$tl_client_designation = sanitize_text_field($_POST['tl_client_designation']);
			update_post_meta( $client_designation_id, 'tl_designation', $tl_client_designation );
		}
	}

}

add_action( 'save_post', 'add_wpl_testimonial_lite_fields', 10, 2 );