jQuery(function($) {
	"use strict";
	$(".ct-piechart .percentage").each(
		function() {
			"use strict";
			var track_color = $(this).data('track-color');
            var bar_color = $(this).data('bar-color');
            var line_width = $(this).data('line-width');
            var chart_size = $(this).data('size');

            var options = {
                animate: 2000,
                lineWidth: line_width,
                barColor: bar_color,
                trackColor: track_color,
                scaleColor: false,
                lineCap: 'round',
                size: chart_size
            };
			$(this).waypoint(
				function() {
					$(this).easyPieChart(options);
				}, {
					offset: '95%',
            		triggerOnce: true
				});
		});
});
