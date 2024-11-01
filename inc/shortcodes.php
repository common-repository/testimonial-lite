<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

// Testimonial Lite shortcode
function wpl_testimonial_lite_shortcode( $atts ) {
	extract( shortcode_atts( array(
		'items'                  => '1',
		'items_desktop'          => '1',
		'items_tablet'           => '1',
		'items_mobile'           => '1',
		'total_items'            => '20',
		'order_by'               => 'date',
		'order'                  => 'DESC',
		'nav'                    => 'true',
	), $atts, 'testimonial-lite' ) );

	$args = array(
		'post_type'      => 'testimonial_lite',
		'orderby'        => $order_by,
		'order'          => $order,
		'posts_per_page' => $total_items,
	);

	$que = new WP_Query( $args );

	$custom_id   = uniqid();

	$outline = '';

	$outline .= '
    <script type="text/javascript">
    jQuery(document).ready(function() {
		jQuery("#wpl-testimonial-lite' . $custom_id . '").slick({
	        dots: false,
	        infinite: true,
	        slidesToShow: ' . $items . ',
	        slidesToScroll: 1,
	        autoplay: true,
            arrows: ' . $nav . ',
            prevArrow: "<div class=\'slick-prev\'><i class=\'fa fa-angle-left\'></i></div>",
            nextArrow: "<div class=\'slick-next\'><i class=\'fa fa-angle-right\'></i></div>",
            responsive: [
				    {
				      breakpoint: 1000,
				      settings: {
				        slidesToShow: ' . $items_desktop . '
				      }
				    },
				    {
				      breakpoint: 700,
				      settings: {
				        slidesToShow: ' . $items_tablet . '
				      }
				    },
				    {
				      breakpoint: 460,
				      settings: {
				        slidesToShow: ' . $items_mobile . '
				      }
				    }
				  ]
        });

    });
    </script>';

	if($nav == 'true'){
		$outline .= '<style>
			#wpl-testimonial-lite' . $custom_id . '.wpl-testimonial-section.wpl-testimonial-carousel {
			    padding-left: 50px;
			    padding-right: 50px;
			}
		</style>';
	}

		$outline .= '<div id="wpl-testimonial-lite' . $custom_id . '" class="wpl-testimonial-section wpl-testimonial-carousel ">';

		if ( $que->have_posts() ) {
			while ( $que->have_posts() ) : $que->the_post();

				$wpl_designation = esc_html( get_post_meta( get_the_ID(), 'tl_designation', true ) );

				$outline .= '<div class="testimonial-lite text-center">';
					if ( has_post_thumbnail( $que->post->ID ) ) {
						$outline .= '<div class="tl-client-image">';
							$outline .= get_the_post_thumbnail( $que->post->ID, 'tl-client-image-size', array( 'class' => "tl-client-img" ) );
						$outline .= '</div>';
					}

					$outline .= '<div class="tl-client-testimonial">' . get_the_content() . '</div>';
					$outline .= '<h2 class="tl-client-name">' . get_the_title() . '</h2>';
					$outline .= '<h6 class="tl-client-designation">' . $wpl_designation . '</h6>';
				$outline .= '</div>'; //testimonial lite

			endwhile;
		} else {
			$outline .= '<h2 class="wpl-not-found-any-testimonial">' . esc_html__( 'No testimonials found', 'testimonial-lite' ) . '</h2>';
		}
		$outline .= '</div>';

		wp_reset_query();


	return $outline;

}

add_shortcode( 'testimonial-lite', 'wpl_testimonial_lite_shortcode' );