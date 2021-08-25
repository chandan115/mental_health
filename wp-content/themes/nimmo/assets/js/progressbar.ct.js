jQuery(function($) {
	"use strict";
	setTimeout(function(){
		$(".progress-bar").each(function(){
			$(this).waypoint(function() {
				$(this).progressbar();
			},{
				offset: '95%',
				triggerOnce: true
			});
		});
	}, 300);
});