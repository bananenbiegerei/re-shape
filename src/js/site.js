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
		

		// Erstelle ein Array, um die Hashtags und Texte zu speichern
		var glossaryInfo = [];

		// Gehe durch alle <dt>-Elemente
		$('dt').each(function() {
				// Überprüfe, ob das Element ein data-info-text-Attribut hat
				if ($(this).attr('data-info-text')) {
						// Füge den Hashtag und den Text zum Array hinzu
						glossaryInfo.push({
								hashtag: $(this).text(),
								text: $(this).attr('data-info-text')
						});
				}
		});

		console.log(glossaryInfo);

		// Gehe durch alle Anker-Elemente
		// $('a').each(function() {
		// 		var href = $(this).attr('href');
		// 		// Überprüfe, ob das href-Attribut einen Hashtag enthält
		// 		if (href && href.indexOf('#') !== -1) {
		// 				// Erstelle die ID für das Ziel-Div
		// 				var targetId = 'glossary_info-' + href.split('#')[1];
		// 				// Erstelle das Div-Element und füge es als Nachbar-Element hinzu
		// 				$('<div>')
		// 					.attr('id', targetId)
		// 					.attr('data-hashtag', href.split('#')[1])
		// 					.css('display', 'none')
		// 					.addClass('border rounded p-2')
		// 					.insertAfter($(this));
		// 		}
		// });

		// Gehe durch alle Anker-Elemente
		$('a').each(function() {
			var href = $(this).attr('href');
			// Überprüfe, ob das href-Attribut einen Hashtag enthält
			if (href && href.indexOf('#') !== -1) {
					// Erstelle die ID für das Ziel-Span
					var targetId = 'glossary_info-' + href.split('#')[1];
					// Erstelle das Span-Element und füge es als untergeordnetes Element hinzu
					$('<span>')
							.attr('id', targetId)
							.attr('data-hashtag', href.split('#')[1])
							.css('display', 'none')
							.addClass('block absolute border rounded p-2 top-10 left-0 z-20 !text-black w-20 bg-white text-sm')
							.appendTo($(this));
					// Füge die Klasse "relative" zum Anker hinzu
					$(this).addClass('relative');
			}
		});

		// Gehe durch alle Span-Elemente mit einem data-hashtag-Attribut
		$('span[data-hashtag]').each(function() {
				// Hole den Wert des data-hashtag-Attributs
				var hashtag = $(this).attr('data-hashtag');
				console.log(hashtag);
				// Suche im Array nach einem Eintrag mit dem gleichen Hashtag
				var info = glossaryInfo.find(function(item) {
						return item.hashtag.toLowerCase() === hashtag.toLowerCase();
				});
				console.log(info);
				// Wenn ein Eintrag gefunden wurde, kopiere den Text in das Span-Element
				if (info) {
						$(this).text(info.text);
				}
		});



		// show info span on hover
		$('a').hover(function() {
			var href = $(this).attr('href');
			if (href.indexOf('#') !== -1) {
					var targetId = 'glossary_info-' + href.split('#')[1];
					$('#' + targetId).fadeIn();
			}
		}, function() {
			var href = $(this).attr('href');
			if (href.indexOf('#') !== -1) {
					var targetId = 'glossary_info-' + href.split('#')[1];
					$('#' + targetId).fadeOut();
			}
		});
		
	} // end hasClass ..archive-glossary
});