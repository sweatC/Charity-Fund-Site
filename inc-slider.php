<?php
/**
 * The default template for displaying Flexslider
 *
 * @package WordPress
 * @subpackage Charitas Lite
 * @since Charitas Lite 1.0
 */
?>
<?php 
	$wpl_sliders = ot_get_option( 'wpl_sliders', array() );
	$header_image = get_header_image();
?>

<?php if ( ! empty( $wpl_sliders ) && ot_get_option('charitas_slider_revolution') == '' ){ ?>
	<div class="flexslider loading">
		<ul class="slides">
			<?php $i = 0; ?>
			<?php foreach( $wpl_sliders as $item ) : ?>
			<?php if(++$i > 4) break; ?>
				<li data-thumb="<?php echo $item['charitas_slider_item_thumbnail']; ?>">
					<a href="<?php echo esc_url($item['charitas_slider_item_url']); ?>"><img src="<?php echo esc_url($item['charitas_slider_item_image']); ?>" alt="<?php echo esc_attr($item['charitas_slider_item_title']); ?>"></a>
					<div class="flex-caption ">
						<div class="flex-content container_16">
							<div class="grid_16">
								<?php if ( $item['charitas_slider_item_title'] != "") { ?>
									<h1 <?php if ( $item['charitas_slider_item_title_color'] != "") { ?> style="color: <?php echo esc_html($item['charitas_slider_item_title_color']); ?>;" <?php } ?>><?php echo esc_html($item['charitas_slider_item_title']); ?></h1>
								<?php } ?>
								
								<?php if ( $item['charitas_slider_item_description'] != "") { ?>
									<h2 <?php if ( $item['charitas_slider_item_description_color'] != "") { ?> style="color: <?php echo esc_html($item['charitas_slider_item_description_color']); ?>;" <?php } ?>><?php echo esc_html($item['charitas_slider_item_description']); ?></h2>
								<?php } ?>

								<?php if ( $item['charitas_slider_item_url'] != "") { ?>
									<div class="flex-button"><a <?php if ( $item['charitas_slider_item_button_color'] != "") { ?> style="color: <?php echo esc_html($item['charitas_slider_item_button_color']); ?>; border: 1px solid <?php echo esc_html($item['charitas_slider_item_button_color']); ?>;" <?php } ?> class="radius" href="<?php echo esc_url($item['charitas_slider_item_url']); ?>"><?php echo esc_html($item['charitas_slider_item_button_text']); ?> <i class="icon-angle-right"></i></a></div>
								<?php } ?>
							</div>	
						</div>
					</div>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>

<?php } elseif ( ot_get_option( 'charitas_slider_revolution') != '' ){ ?>
	<div class="revolution-slider">
		<?php putRevSlider( esc_html(ot_get_option( 'charitas_slider_revolution') ) ); ?>
	</div>		
<?php } else {
	if (! empty( $header_image ) ) { ?>
		<img class="header-image" src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
	<?php }
} ?>