<?php
/* mods
	10Oct16 zig - add widget area above bottom-widgets for reach CTA
 */
	if (is_active_sidebar('reach-bottom-cta')) {
		echo '<footer id="reach-bottom-cta">';
			echo '<div id="reach-bottom-cta-wrap" class="be-wrapx be-rowx clearfix">';
			dynamic_sidebar( 'reach-bottom-cta');
			echo '</div>';
		echo '</footer>';
	}
	global $be_themes_data;
	$post_id = be_get_page_id();
	$show_bottom_widgets = get_post_meta($post_id, 'be_themes_bottom_widgets', true);
	$show_footer_area = get_post_meta($post_id, 'be_themes_footer_area', true);
	if($show_bottom_widgets != 'no') {
		$show_widgets = true;
	} else {
		$show_widgets = false;
	}
	if((is_home() || is_search() || is_tag() || is_archive() || is_category())){
		if(isset( $be_themes_data['show_bottom_widgets'] ) && 'yes' == $be_themes_data['show_bottom_widgets']) {
			$show_widgets = true;
		} else {
			$show_widgets = false;
		}
	}
	$col_class = "one-third";
	$i = 3;
	$active_sidebar = false;
	if($be_themes_data['bottom_widgets_layout'] == 'four-col') {
		$col_class = "one-fourth";
		$i = 4;
	}
	for($j = 1; $j <= $i; $j++) {
		if ( is_active_sidebar( 'footer-widget-'.$j ) ) {
			$active_sidebar = true;
			break;
		}
	}
	if( $show_widgets && $active_sidebar ) { ?>
		<footer id="bottom-widgets">
			<div id="bottom-widgets-wrap" class="be-wrap be-row clearfix">
				<?php for($j = 1; $j <= $i; $j++) : ?>
					<div class="<?php echo $col_class; ?> column-block clearfix">
						<?php
							if ( is_active_sidebar( 'footer-widget-'.$j ) ) {
								dynamic_sidebar( 'footer-widget-'.$j );
							}
						?>
					</div>
				<?php endfor; ?>
			</div>
		</footer>
	<?php } ?>
	<?php if(('no' != $show_footer_area) && !(($be_themes_data['footer-content-pos-center'] == 'none' ) && ($be_themes_data['footer-content-pos-left'] == 'none' ) && ($be_themes_data['footer-content-pos-right'] == 'none' ))) { ?>
		<footer id="footer" class="<?php echo esc_attr( $be_themes_data['layout'] );?>">
			<span class="footer-border <?php echo (($be_themes_data['footer-border-wrap']) ? 'be-wrap ' : '' );?>"></span>
			<div id="footer-wrap" class=" <?php echo esc_attr( $be_themes_data['footer-style'] ); if(true == $be_themes_data['opt-footer-wrap']){?> be-wrap<?php } ?> clearfix">
				<div class="footer-left-area"><?php  if($be_themes_data['footer-content-pos-left'] != 'none' ){ ?>
					<div class="footer-content-inner-left"><?php
							be_themes_get_footer_widget($be_themes_data['footer-content-pos-left']);
						?>
					</div><?php
					}?>
				</div>
				<div class="footer-center-area"><?php
					if ($be_themes_data['footer-content-pos-center'] != 'none' ){ ?>
					<div class="footer-content-inner-center"><?php
							be_themes_get_footer_widget($be_themes_data['footer-content-pos-center']);
						?>
					</div><?php
					}?>
				</div>
				<div class="footer-right-area"><?php
					if($be_themes_data['footer-content-pos-right'] != 'none' ){ ?>
					<div class="footer-content-inner-right"><?php
							be_themes_get_footer_widget($be_themes_data['footer-content-pos-right']);
						?>
					</div>	<?php
					}?>
				</div>
			</div>
		</footer> <?php
	}
	?>
	<?php do_action('be_themes_after_footer'); ?>
	</div>
	<?php get_template_part( 'page', 'loader' ); ?>

	<?php
		if(!(isset($be_themes_data['disable_back_top_btn']) && !empty($be_themes_data['disable_back_top_btn']) && $be_themes_data['disable_back_top_btn'] == 1)) {
			echo '<a href="#" id="back-to-top" class="'.$be_themes_data['layout'].'"><i class="font-icon icon-arrow_carrot-up"></i></a>';
		}
	?>
	<?php if('layout-border' == $be_themes_data['layout'] || 'layout-border-header-top' == $be_themes_data['layout']) { ?>
	<div class="layout-box-container">
		<?php if('layout-border' == $be_themes_data['layout'] || 'left' == $be_themes_data['opt-header-type']) { ?>
			<div class="layout-box-top"></div>
		<?php } ?>
		<div class="layout-box-right"></div>
		<div class="layout-box-bottom"></div>
		<div class="layout-box-left"></div>
	</div>
	<?php
	}?>
</div>

<?php if( !empty($be_themes_data['google_analytics_code']) ) : ?>
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', '<?php echo esc_js( $be_themes_data['google_analytics_code'] ); ?>', 'auto');
	  ga('send', 'pageview');
	</script>
<?php endif; ?>

<input type="hidden" id="ajax_url" value="<?php echo admin_url( 'admin-ajax.php' ); ?>" />
<?php if( array_key_exists('all_ajax_exclude_links', $be_themes_data) ) : ?>
	<input type="hidden" id="all_ajax_exclude_links" value="<?php echo esc_attr( $be_themes_data['all_ajax_exclude_links'] ); ?>" />
<?php endif; ?>
<?php wp_footer(); ?>
<!-- Option Panel Custom JavaScript -->
<script>
	//jQuery(document).ready(function(){
		<?php echo stripslashes_deep(htmlspecialchars_decode($be_themes_data['custom_js'],ENT_QUOTES));   ?>
	// });
</script>
</body>
</html>
