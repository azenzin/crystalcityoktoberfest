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
	<img src="<?php echo TOTAL_CHILD_THEME_DIR_URL; ?>/assets/pennants-separation.png" alt="">
</div>
<div id="footer-bottom" class="<?php echo esc_attr( $classes ); ?>"<?php wpex_schema_markup( 'footer_bottom' ); ?> style="background: url('<?php echo TOTAL_CHILD_THEME_DIR_URL; ?>/assets/footer_bg.jpg');">
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

<script src="https://www.eventbrite.com/static/widgets/eb_widgets.js"></script>

<script type="text/javascript">
	var exampleCallback = function () {
		console.log('Order complete!');
	};

	window.EBWidgets.createWidget({
		widgetType: 'checkout',
		eventId: '48106704448',
		modal: true,
		modalTriggerElementId: 'eventbrite-widget-modal-trigger-48106704448',
		onOrderComplete: exampleCallback
	});
</script>

<!-- Facebook Pixel Code -->
<script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window,document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '2111003275828971');
    fbq('track', 'PageView');
</script>
<noscript>
    <img height="1" width="1"
         src="https://www.facebook.com/tr?id=2111003275828971&ev=PageView
&noscript=1"/>
</noscript>
<!-- End Facebook Pixel Code -->

<?php wpex_hook_footer_bottom_after(); ?>

<?php wp_footer(); ?>

<?php if ( ! current_user_can( 'administrator' ) ) { ?>

	<script type="text/javascript" src="//downloads.mailchimp.com/js/signup-forms/popup/embed.js"
	        data-dojo-config="usePlainJson: true, isDebug: false"></script>
	<script type="text/javascript">require(["mojo/signup-forms/Loader"], function (L) {
			L.start({"baseUrl": "mc.us8.list-manage.com", "uuid": "9f71368dc454f7ad28ffeb362", "lid": "6e282ce59c"})
		})</script>
<?php } ?>

</body>
</html>
