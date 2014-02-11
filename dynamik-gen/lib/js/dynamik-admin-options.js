jQuery.fn.center = function () {
	this.css("position","absolute");
	this.css("top", ( jQuery(window).height() - this.height() - 200 ) / 2+jQuery(window).scrollTop() + "px");
	this.css("left", 450);
	return this;
}
jQuery(document).ready(function($) {

	if($.browser.msie) {
		$('select').one('mousedown',function(){
			$(this).data('origWidth', $(this).css('width'));
		}).mousedown(function(){
			$(this).css('width','auto');
		}).change(function(){
			$(this).css('width',$(this).data('origWidth'));
		}).blur(function(){
			$(this).css('width',$(this).data('origWidth'));
		});
	}

	$('.tooltip-mark').hover(function() {
		var tooltip_id = $(this).attr('id'), tooltip_class = $(this).attr('class');
		if (tooltip_class == 'tooltip-mark tooltip-top-left') {
			$('#'+tooltip_id).tooltip({ effect: 'slide', position: 'top left', offset: [-5, 0], events: { def: 'click, hover', tooltip: 'mouseenter, mouseleave' }});
		} else if (tooltip_class == 'tooltip-mark tooltip-center-left') {
			$('#'+tooltip_id).tooltip({ effect: 'slide', position: 'center left', offset: [-23, 0], events: { def: 'click, hover', tooltip: 'mouseenter, mouseleave' }});
		} else if (tooltip_class == 'tooltip-mark tooltip-bottom-left') {
			$('#'+tooltip_id).tooltip({ effect: 'slide', position: 'bottom left', offset: [-35, 0], events: { def: 'click, hover', tooltip: 'mouseenter, mouseleave' }});
		} else if (tooltip_class == 'tooltip-mark tooltip-top-right') {
			$('#'+tooltip_id).tooltip({ effect: 'slide', position: 'top right', offset: [-5, 0], events: { def: 'click, hover', tooltip: 'mouseenter, mouseleave' }});
		} else if (tooltip_class == 'tooltip-mark tooltip-center-right') {
			$('#'+tooltip_id).tooltip({ effect: 'slide', position: 'center right', offset: [-23, 0], events: { def: 'click, hover', tooltip: 'mouseenter, mouseleave' }});
		} else if (tooltip_class == 'tooltip-mark tooltip-bottom-right') {
			$('#'+tooltip_id).tooltip({ effect: 'slide', position: 'bottom right', offset: [-23, -18], events: { def: 'click, hover', tooltip: 'mouseenter, mouseleave' }});
		} else if (tooltip_class == 'tooltip-mark tooltip-top-center') {
			$('#'+tooltip_id).tooltip({ effect: 'slide', position: 'top center', offset: [-23, 0], events: { def: 'click, hover', tooltip: 'mouseenter, mouseleave' }});
		} else if (tooltip_class == 'tooltip-mark tooltip-bottom-center') {
			$('#'+tooltip_id).tooltip({ effect: 'slide', position: 'bottom center', offset: [-23, 0], events: { def: 'click, hover', tooltip: 'mouseenter, mouseleave' }});
		}
	});
	
});