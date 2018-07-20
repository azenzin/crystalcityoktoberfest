(function ($) {
	$(document).ready(function () {
		sticky();
		$(window).on("scroll touchmove", function () {
			sticky();
		});

		$('.cww-header-bottom').on('click', '#primary-menu', function (e) {
			$('#primary-menu').hide();
			$('.wpex-sidr-overlay').addClass('wpex-hidden');
		});

		$('.adaptive-menu').on('click', function (e) {
			$('.wpex-sidr-overlay').removeClass('wpex-hidden');
		});
	});

	function sticky() {
		if ($(document).scrollTop() > 100) {
			$('.cww-sticky-header').addClass('stick');
			$('#site-logo').hide();
			$('.sticky-logo img').addClass('show-small');
			$('.adaptive-menu').addClass('adaptive-sticky');
		} else {
			$('.cww-sticky-header').removeClass('stick');
			$('#site-logo').show();
			$('.sticky-logo img').removeClass('show-small');
			$('.adaptive-menu').removeClass('adaptive-sticky');
		}
	}
})(jQuery);
