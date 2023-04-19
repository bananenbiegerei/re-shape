import * as TW from './tailwindhelpers';
import Alpine from 'alpinejs';
import Swiper, { Navigation, Autoplay, Pagination, Mousewheel, EffectFade } from 'swiper';

// Init Alpine
window.Alpine = Alpine;
Alpine.start();

// Make Tailwind config available outside of package
window.TW = TW;

// Initialize all swipers
// 'SwipersConfig' is defined in 'head.php', every swiper block adds its config in it.
var Swipers = {};
for (sel in SwipersConfig) {
	Swipers[sel] = new Swiper(`${sel} .swiper-container`, {
		// include modules
		...{ modules: [Navigation, Autoplay, Pagination, Mousewheel, EffectFade] },
		// enable mouse-wheel by default
		...{ mousewheel: { forceToAxis: true } },
		// include swiper-specific config
		...SwipersConfig[sel],
	});
}
window.Swipers = Swipers;

jQuery(document).ready(function($) {	

	// glossary hover / scroll functionality 
	if ($('body').hasClass('post-type-archive-glossary')) {

		// scroll to glossary entry if link to it in copy is clicked
		$('a').on('click', function(event) {
			var href = $(this).attr('href');
			if (href.indexOf('#') !== -1) {
					event.preventDefault();
					var targetId = href.split('#')[1];
					var target = $('#' + targetId);
					$('html, body').animate({
							scrollTop: target.offset().top - 64
					}, 1000);
			}
		});
		
		// Create an array to store the hashtags and texts
		// var glossaryInfo = [];

		// // Go through all <dt> elements
		// $('dt').each(function() {
		// 		// Check if the element has a data-info-text attribute
		// 		if ($(this).attr('data-info-text')) {
		// 				// Add the hashtag and text to the array
		// 				glossaryInfo.push({
		// 						hashtag: $(this).text(),
		// 						text: $(this).attr('data-info-text')
		// 				});
		// 		}
		// });

		// Go through all anchor elements
		// $('a').each(function() {
		// 		var href = $(this).attr('href');
		// 		// Check if the href attribute contains a hashtag
		// 		if (href && href.indexOf('#') !== -1) {
		// 				// Create the ID for the target span
		// 				var targetId = 'glossary_info-' + href.split('#')[1];
		// 				// Create the span element and add it as a child element
		// 				$('<span>')
		// 						.attr('id', targetId)
		// 						.attr('data-hashtag', href.split('#')[1])
		// 						.css('display', 'none')
		// 						.addClass('block absolute border rounded p-2 top-10 left-0 z-20 !text-black w-20 bg-white text-sm')
		// 						.appendTo($(this));
		// 				// Add the "relative" class to the anchor
		// 				$(this).addClass('relative');
		// 		}
		// });

		// Go through all span elements with a data-hashtag attribute
		// $('span[data-hashtag]').each(function() {
		// 		// Get the value of the data-hashtag attribute
		// 		var hashtag = $(this).attr('data-hashtag');
		// 		// Search in the array for an entry with the same hashtag
		// 		var info = glossaryInfo.find(function(item) {
		// 				return item.hashtag.toLowerCase() === hashtag.toLowerCase();
		// 		});
		// 		console.log(info);
		// 		// If an entry was found, copy the text into the span element
		// 		if (info) {
		// 				$(this).text(info.text);
		// 		}
		// });

		// show info span on hover
		// $('a').hover(function() {
		// 	var href = $(this).attr('href');
		// 	if (href.indexOf('#') !== -1) {
		// 			var targetId = 'glossary_info-' + href.split('#')[1];
		// 			$('#' + targetId).fadeIn();
		// 	}
		// }, function() {
		// 	var href = $(this).attr('href');
		// 	if (href.indexOf('#') !== -1) {
		// 			var targetId = 'glossary_info-' + href.split('#')[1];
		// 			$('#' + targetId).fadeOut();
		// 	}
		// });
		
	} // end hasClass .post-type-archive-glossary
});