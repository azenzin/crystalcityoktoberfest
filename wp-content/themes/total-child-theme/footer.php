<?php
/**
 * Footer bottom content
 *
 * @package Total WordPress Theme
 * @subpackage Partials
 * @version 4.1
 */

$classes = 'clr';
if ( $align = wpex_get_mod( 'bottom_footer_text_align' ) ) {
	$classes .= ' text' . $align;
} ?>

<?php wpex_hook_footer_bottom_before(); ?>
<script type="text/javascript">
	(function ($) {
		$(document).ready(function () {
			$('.adaptive-menu').on('click', function () {
				$('.header-menu-mobile').toggle();
			});
		});
	})(jQuery);
</script>
<div id="before-footer">
	<img src="<?php echo TOTAL_CHILD_THEME_DIR_URL; ?>/assets/top-melted-chocolate.png" alt="">
</div>
<div id="footer-bottom" class="<?php echo esc_attr( $classes ); ?>"<?php wpex_schema_markup( 'footer_bottom' ); ?>>
	<div id="footer-bottom-inner" class="container-fluid clr">
		<div class="vc_row wpb_row vc_row-fluid row-o-equal-height vc_row-flex">
			<div class="wpb_column vc_column_container vc_col-lg-3 vc_col-sm-6 vc_col-xs-12 footer-col">
				<div class="vc_column-inner">
					<?php dynamic_sidebar( 'footer_one' ); ?>
				</div>
			</div>
			<div class="wpb_column vc_column_container vc_col-lg-3 vc_col-sm-6 vc_col-xs-12 blue-footer-column footer-col">
				<div class="vc_column-inner">
					<?php dynamic_sidebar( 'footer_two' ); ?>
				</div>
			</div>
			<div class="wpb_column vc_column_container vc_col-lg-3 vc_col-sm-6 vc_col-xs-12 footer-col">
				<div class="vc_column-inner">
					<?php dynamic_sidebar( 'footer_three' ); ?>
				</div>
			</div>
			<div class="wpb_column vc_column_container vc_col-lg-3 vc_col-sm-6 vc_col-xs-12 white-footer-column footer-col">
				<div class="vc_column-inner">
					<?php dynamic_sidebar( 'footer_four' ); ?>
				</div>
			</div>
		</div>
	</div><!-- #footer-bottom-inner -->
</div><!-- #footer-bottom -->
<div id="after-footer">
	<img src="<?php echo TOTAL_CHILD_THEME_DIR_URL; ?>/assets/bottom-melted-chocolate.png" alt="">
</div>

<script src="https://www.eventbrite.com/static/widgets/eb_widgets.js"></script>

<script type="text/javascript">
	var exampleCallback = function () {
		console.log('Order complete!');
	};

	window.EBWidgets.createWidget({
		widgetType: 'checkout',
		eventId: '46666066461',
		modal: true,
		modalTriggerElementId: 'eventbrite-widget-modal-trigger-46666066461',
		onOrderComplete: exampleCallback
	});
</script>

<!-- Facebook Pixel Code -->
<script>
	var options = {},
		isFBPixelEnabled = false,
		isFBADSPixelEnabled = true;

	function _buildTrackPixel(eventName, pixelId, options) {
		var img = document.createElement('img'),
			pixelId = pixelId,
			baseUrl = 'https://www.facebook.com/tr',
			imageUrl = baseUrl + '?id=' + pixelId + '&ev=' + eventName + '&noscript=1&eventref=fb_oea';
		for (var key in options) {
			if (options.hasOwnProperty(key)) {
				imageUrl += '&cd[' + key + ']=' + options[key];
			}
		}
		img.src = imageUrl;
		img.height = '1';
		img.width = '1';
		img.style.display = 'none';
		document.body.appendChild(img);
	}

	function facebookTrackPixel(eventName, options) {
		if (!isFBPixelEnabled) {
			return
		}
		_buildTrackPixel(
			eventName,
			'1070931846288596',
			options
		);
	}

	function facebookADSTrackPixel(eventName, options) {
		if (!isFBADSPixelEnabled) {
			return
		}
		_buildTrackPixel(
			eventName,
			'1595986097313505',
			options
		);
	}

	window.facebookTrackPixel = window.facebookTrackPixel || facebookTrackPixel;
	window.facebookADSTrackPixel = window.facebookADSTrackPixel || facebookADSTrackPixel;
	options['content_type'] = 'product';
	options['content_ids'] = ['46666066461'];
	facebookADSTrackPixel('ViewContent', options);
</script>
<!-- End Facebook Pixel Code -->

<?php wpex_hook_footer_bottom_after(); ?>

<?php wp_footer(); ?>

<?php if ( ! current_user_can( 'administrator' ) ) { ?>

	<script type="text/javascript" src="//downloads.mailchimp.com/js/signup-forms/popup/embed.js"
	        data-dojo-config="usePlainJson: true, isDebug: false"></script>
	<script type="text/javascript">require(["mojo/signup-forms/Loader"], function (L) {
			L.start({"baseUrl": "mc.us8.list-manage.com", "uuid": "9f71368dc454f7ad28ffeb362", "lid": "3c046899a7"})
		})</script>
<?php } ?>

</body>
</html>
