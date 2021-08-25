(function($) {
    "use strict";

    $(document).ready(function () {

        $('.owl-carousel').each(function() {
            var _this = $(this);
            var data = {
                navText : ['<i class="fac fa-angle-left"></i></i>','<i class="fac fa-angle-right"></i>'],
                responsive:{
                    0:{
                        items:parseInt($(this).attr('data-item-xs')),
                    },
                    768:{
                        items:parseInt($(this).attr('data-item-sm')),
                    },
                    992:{
                        items:parseInt($(this).attr('data-item-md')),
                    },
                    1200:{
                        items:parseInt($(this).attr('data-item-lg')),
                        stagePadding  :parseInt($(this).attr('data-stagepadding')),
                    }
                }
            };
            if(typeof _this.attr('data-loop') !== 'undefined') {
                data.loop = _this.attr('data-loop') == 'true' ? true : false;
            }
            if(typeof _this.attr('data-autoplay') !== 'undefined') {
                data.autoplay = _this.attr('data-autoplay') == 'true' ? true : false;
            }
            if(typeof _this.attr('data-bullets') !== 'undefined') {
                data.dots = _this.attr('data-bullets') == 'true' ? true : false;
            }
            if(typeof _this.attr('data-mousedrag') !== 'undefined') {
                data.mouseDrag = _this.attr('data-mousedrag') == 'true' ? true : false;
            }
            if(typeof _this.attr('data-dotscontainer') !== 'undefined') {
                data.dotsContainer = _this.attr('data-dotscontainer') == 'true' ? _this.parent().find('.slider-nav .thumbs') : '';
            }
            if(typeof _this.attr('data-center') !== 'undefined') {
                data.center = _this.attr('data-center') == 'true' ? true : false;
            }
            if(typeof _this.attr('data-arrows') !== 'undefined') {
                data.nav = _this.attr('data-arrows') == 'true' ? true : false;
            }
            if(typeof _this.attr('data-rtl') !== 'undefined') {
                data.rtl = _this.attr('data-rtl') == 'true' ? true : false;
            }
            if(typeof _this.attr('data-margin') !== 'undefined') {
                data.margin = parseInt(_this.attr('data-margin'));
            }
            if(typeof _this.attr('data-autoplaytimeout') !== 'undefined') {
                data.autoplayTimeout = parseInt(_this.attr('data-autoplaytimeout'));
            }
            if(typeof _this.attr('data-smartspeed') !== 'undefined') {
                data.smartSpeed = parseInt(_this.attr('data-smartspeed'));
            }
            
            var owl = _this.owlCarousel(data);
            var owlAnimateFilter = function(even) {
                $(this)
                .addClass('item-loading')
                .delay(70 * $(this).parent().index())
                .queue(function() {
                    $(this).dequeue().removeClass('item-loading');
                });
            };

            _this.parent().find('.ct-carousel-filter').on('click', '.ct-filter-item', function(e) {
                var filter_data = $(this).attr('data-filter');
                if($(this).hasClass('ct-filter-active')) return;
                $(this).addClass('ct-filter-active').siblings().removeClass('ct-filter-active');
                owl.owlFilter(filter_data, function(_owl) {
                    $(_owl).find('.ct-item').each(owlAnimateFilter);
                });
            });

            $('.ct-history-wrap .ct-history-more').on('click', function () {
                $(this).parents('.ct-history-wrap').find('.owl-nav .owl-next').trigger('click');
            });

        });

        $('.ct-testimonial-carousel3').each(function () {
            $(this).find('.ct-testimonial-main .owl-prev').on('click', function () {
                $(this).parents('.ct-testimonial-carousel3').find('.ct-testimonial-nav .owl-prev').trigger('click');
            });
            $(this).find('.ct-testimonial-main .owl-next').on('click', function () {
                $(this).parents('.ct-testimonial-carousel3').find('.ct-testimonial-nav .owl-next').trigger('click');
            });
        });
        
    });
}(jQuery));