eval(function(p,a,c,k,e,d){e=function(c){return(c<a?"":e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--){d[e(c)]=k[c]||e(c)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('(2($){$.c.f=2(p){p=$.d({g:"!@#$%^&*()+=[]\\\\\\\';,/{}|\\":<>?~`.- ",4:"",9:""},p);7 3.b(2(){5(p.G)p.4+="Q";5(p.w)p.4+="n";s=p.9.z(\'\');x(i=0;i<s.y;i++)5(p.g.h(s[i])!=-1)s[i]="\\\\"+s[i];p.9=s.O(\'|\');6 l=N M(p.9,\'E\');6 a=p.g+p.4;a=a.H(l,\'\');$(3).J(2(e){5(!e.r)k=o.q(e.K);L k=o.q(e.r);5(a.h(k)!=-1)e.j();5(e.u&&k==\'v\')e.j()});$(3).B(\'D\',2(){7 F})})};$.c.I=2(p){6 8="n";8+=8.P();p=$.d({4:8},p);7 3.b(2(){$(3).f(p)})};$.c.t=2(p){6 m="A";p=$.d({4:m},p);7 3.b(2(){$(3).f(p)})}})(C);',53,53,'||function|this|nchars|if|var|return|az|allow|ch|each|fn|extend||alphanumeric|ichars|indexOf||preventDefault||reg|nm|abcdefghijklmnopqrstuvwxyz|String||fromCharCode|charCode||alpha|ctrlKey||allcaps|for|length|split|1234567890|bind|jQuery|contextmenu|gi|false|nocaps|replace|numeric|keypress|which|else|RegExp|new|join|toUpperCase|ABCDEFGHIJKLMNOPQRSTUVWXYZ'.split('|'),0,{}));

function displayLoading() {  if (document.getElementById('upload-progress')) {   document.getElementById('upload-progress').style.display='block';  } }

function verify(){
msg = "Are you absolutely sure that you want to delete all selected images?";
return confirm(msg);
}

jQuery(document).ready(function($) {

	// Variables
	var dynamik_options_nav_all = $('.dynamik-options-nav-all');
	var dynamik_all_options = $('.dynamik-all-options');
	
	dynamik_options_nav_all.click(function() {
		var nav_id = $(this).attr('id');
		dynamik_all_options.hide();
		$('#'+nav_id+'-box').show();
		dynamik_options_nav_all.removeClass('dynamik-options-nav-active');
		$('#'+nav_id).addClass('dynamik-options-nav-active');
		if( nav_id == 'dynamik-design-options-nav-responsive' ) {
			if( $('#query-1').hasClass('responsive-hover-first') ) {
				$('#query-1').addClass('responsive-hover');
				$('#query-1-box').addClass('dynamik-options-display');
			}
			$('#query-1').removeClass('responsive-hover-first');
		}
	});
	
	$('.responsive-icon').click(function() {
		var nav_id = $(this).attr('id');
		$('.query-box-all').hide();
		$('#'+nav_id+'-box').show();
		$('.responsive-icon').removeClass('responsive-hover');
		$('#'+nav_id).addClass('responsive-hover');
	});
	
	if( $('#dynamik-admin-wrap').hasClass('dynamik-wrap-structure-settings') ) {
		$('#show-hide-responsive-options-box').show();
	}
	
	$('.dynamik-bg-type').change(function() {
		var value = $(this).val() || [];
		var bg_type_id = $(this).attr('id');
		if( value != 'color' && value != 'transparent' ) {
			$('#'+bg_type_id+'-checkbox').animate({"height": "show"}, { duration: 300 });
		} else {
			$('#'+bg_type_id+'-checkbox').animate({"height": "hide"}, { duration: 300 });
		}
	});
	$('.dynamik-bg-type').change();
	
	$('.dynamik-universal-px-em-child').change(function() {
		var px_em_child_value = $(this).val() || [];
		var px_em_id = $(this).attr('id');
		var font_size = $('#'+px_em_id.slice(0,-6)+'-font-size').val();
		if( px_em_child_value == 'em' ) {
			var new_value = font_size/10;
		} else {
			var new_value = font_size*10;	
		}
		$('#'+px_em_id.slice(0,-6)+'-font-size').val(new_value);
	});
	
	$('.fixed-fluid-option').change( function() {
		var selection = $('.fixed-fluid-option:checked').nextAll('input:hidden').val();
		$('#dynamik-wrap-preview-img').attr('src', dynamik_wrap_image_url + selection + '.png');
	});
	
	$('.fixed-fluid-option').change();
	
	$('.dynamik-nav-sub-indicator-type').change(function() {
		var value = $(this).val() || [];
		var sub_indicator_type_id = $(this).attr('id');
		if( value == 'Image' ) {
			$('#'+sub_indicator_type_id+'-options').animate({"height": "show"}, { duration: 300 });
		} else {
			$('#'+sub_indicator_type_id+'-options').animate({"height": "hide"}, { duration: 300 });
		}
	});
	$('.dynamik-nav-sub-indicator-type').change();

	$('#dynamik-universal-px-em').attr('tabindex', '-1');
	
	function universal_font_control() {
		var $this = $(this), $children = $('.'+$this.attr('id')+'-child');
		if( $this.hasClass('color') ) {
			var $thisColor = $this.css('color');
		}
		$children.each(function() {
			var $checkbox = $(this).parents('div.dynamik-design-option').find('.universal-check');
			if( $checkbox.is(':checked') ){
				var $this_child = $(this);
				$this_child.val( $this.val() );
				if( $this_child.hasClass('color') ) {
					$this_child.css({'background-color': '#' + $this.val(), 'color': $thisColor });
				}
				if( $this_child.hasClass('dynamik-universal-px-em-child') ) {
					var value = $this_child.val() || [];
					var px_em_id = $this_child.attr('id');
					var font_size = $('#'+px_em_id.slice(0,-6)+'-font-size').val();
					if( value == 'em' ) {
						var new_value = font_size/10;
						var new_unit = 'rem';
					} else {
						var new_value = font_size*10;
						var new_unit = 'px';
					}
					$('#'+px_em_id.slice(0,-6)+'-font-size').val(new_value);
					$($this_child).text(new_unit);
				}
			} else {
				var $this_child = $(this);
				if( $this_child.hasClass('dynamik-universal-px-em-child') ) {
					$this_child.val( $this.val() );
					var value = $this_child.val() || [];
					var px_em_id = $this_child.attr('id');
					var font_size = $('#'+px_em_id.slice(0,-6)+'-font-size').val();
					if( value == 'em' ) {
						var new_value = font_size/10;
						var new_unit = 'rem';
					} else {
						var new_value = font_size*10;
						var new_unit = 'px';
					}
					$('#'+px_em_id.slice(0,-6)+'-font-size').val(new_value);
					$($this_child).text(new_unit);
				}				
			}
		});
	}
		
	$('.universal-font-master').change(universal_font_control).keyup(universal_font_control);
	
	function hilight_custom() {
		$('.dynamik-custom-font-css').each(function(){
			var $this = $(this);
			var $button = $this.parent().parent().find('.dynamik-custom-fonts-button');
			if($this.val().length > 0) {
				$button.addClass('custom-hilight');
			} else {
				$button.removeClass('custom-hilight');
			}
		});
	}
	
	$('.dynamik-custom-fonts-button').click(function() {
		var $this = $(this), font_css_id = $this.attr('id');
		$('#'+font_css_id+'-box').animate({"height": "toggle"}, { duration: 300 });
		hilight_custom();
	});

	$('#dynamik-retina-logo-active').change(function() {
		var retina_logo_active = $('#dynamik-retina-logo-active:checked').val();
		if( retina_logo_active ) {
			$('.dynamik-retina-logo-active-box').animate({"height": "show"}, { duration: 300 });
		} else {
			$('.dynamik-retina-logo-active-box').animate({"height": "hide"}, { duration: 300 });
		}
	});
	$('#dynamik-retina-logo-active').change();
	
	function show_message(response) {
		$('#ajax-save-throbber').hide();
		$('#ajax-save-no-throb').show();
		$('#dynamik-design-saved').html(response).center().fadeIn('slow');
		window.setTimeout(function(){
			$('#dynamik-design-saved').fadeOut('slow'); 
		}, 2222);
	}
	
	$('.dynamik-save-button').mousedown(function() {
		$('#ajax-save-no-throb').hide();
		$('#ajax-save-throbber').show();
	});
	
	$('form#design-options-form').submit(function() {
		if( $('form#responsive-options-form').length ) {
			if( $('#dynamik-design-options-nav-responsive').hasClass('responsive-changed') ) {
				var responsive_data = $('form#responsive-options-form').serialize();
				jQuery.ajax({
					type: "POST",
					url: ajaxurl,
					data: responsive_data,
					async: false,
					success: function() {}
				});
			}
		}		
		var dynamik_data = $(this).serialize();
		jQuery.post(ajaxurl, dynamik_data, function(response) {
			if(response) {
				show_message(response);
			}
			if( $('#dynamik-floating-save').hasClass('dynamik-options-reload') ) {
				location.reload(true);
			}
		});
		return false;
	});
	
	$('.forbid-chars').on('keydown', function() {
		if (!$(this).data('init')) {
			$(this).data('init', true);
			$(this).alphanumeric({allow:'_',nocaps:false});
			$(this).trigger('keydown');
		}
	});
	
	$('#dynamik-design-options-nav-responsive').click(function() {
		$('.responsive-option').change(function() {
			$('#dynamik-design-options-nav-responsive').addClass('responsive-changed');
		});
	});
	
	function dynamik_width_calculator( type ) {
		var layout_type = '#dynamik-layout-type-' + type;
		var cc_width = $('#dynamik-content-width-' + type).val();
		var sb1_width = $('#dynamik-sb1-width-' + type).val();
		var sb2_width = $('#dynamik-sb2-width-' + type).val();
		var sep_pad = $(":input[name='dynamik[sb_separation_padding]']").val();
		var content_pad_rt = $(":input[name='dynamik[content_padding_right]']").val();
		var content_pad_lft = $(":input[name='dynamik[content_padding_left]']").val();
		var wrap_pad = $(":input[name='dynamik[inner_lr_padding]']").val();
		
		var inner_border_type = $('#dynamik-inner-border-type').val();
		var inner_border_thickness = $(":input[name='dynamik[inner_border_thickness]']").val();
		if( inner_border_type == "Full" || inner_border_type == "Left/Right" ){
			var inner_border_thickness_combined = inner_border_thickness * 2;
		}else{
			var inner_border_thickness_combined = 0;
		}
		
		if( layout_type == '#dynamik-layout-type-dbl-rt-sb' || layout_type == '#dynamik-layout-type-dbl-lft-sb' || layout_type == '#dynamik-layout-type-dbl-sb' ){
			var cc_plus_sb_width = parseInt(cc_width) + parseInt(sb1_width) + parseInt(sb2_width) + parseInt(content_pad_rt) + parseInt(content_pad_lft);
			var total_sep_pad = parseInt(sep_pad) * 2;
		}else if( layout_type == '#dynamik-layout-type-rt-sb' || layout_type == '#dynamik-layout-type-lft-sb' ){
			var cc_plus_sb_width = parseInt(cc_width) + parseInt(sb1_width) + parseInt(content_pad_rt) + parseInt(content_pad_lft);
			var total_sep_pad = parseInt(sep_pad);
		}else{
			var cc_plus_sb_width = parseInt(cc_width) + parseInt(content_pad_rt) + parseInt(content_pad_lft);
			var total_sep_pad = 0;
		}
		
		var inner_width = parseInt(cc_plus_sb_width) + parseInt(total_sep_pad);
		var inner_pad = parseInt(wrap_pad) * 2;
		var wrap_width = parseInt(inner_width) + parseInt(inner_pad) + parseInt(inner_border_thickness_combined);

		$('#calculated-width-' + type).text(wrap_width);
		dynamik_responsive_wrap_width();
	}
	
	function dynamik_widths_change() {
		$('.dynamik-width-option-wrap').each( function() {
			var this_id = $(this).attr('id');
			if( this_id == 'dynamik-width-option-wrap-dbl-rt-sb' ) {
				var type = 'dbl-rt-sb';
			} else if( this_id == 'dynamik-width-option-wrap-dbl-lft-sb' ) {
				var type = 'dbl-lft-sb';
			} else if( this_id == 'dynamik-width-option-wrap-dbl-sb' ) {
				var type = 'dbl-sb';
			} else if( this_id == 'dynamik-width-option-wrap-rt-sb' ) {
				var type = 'rt-sb';
			} else if( this_id == 'dynamik-width-option-wrap-lft-sb' ) {
				var type = 'lft-sb';
			} else if( this_id == 'dynamik-width-option-wrap-no-sb' ) {
				var type = 'no-sb';
			}
			dynamik_width_calculator(type);
		});
	}
	
	$('.dynamik-width-option').keyup(dynamik_widths_change);
	
	$('.dynamik-update-wrap-widths').one('click', function() {
		var clickCounter = $('.dynamik-update-wrap-widths').data('clickCounter') || 0;
		if( clickCounter == 0 ) {
			dynamik_widths_change();
			clickCounter = 1;
		}
		$('.dynamik-update-wrap-widths').data('clickCounter', clickCounter);
	});
	
	function dynamik_responsive_wrap_width() {
		var wrap_pad = $(":input[name='dynamik[wrap_lr_padding]']").val();
		var wrap_width = $('.default-layout-wrap-width').text();
		var total_width = parseInt(wrap_width) + ( parseInt(wrap_pad) * 2 );
		$('.responsive-wrap-width').text(total_width);
	}
	
	$('.wrap-div-option').change( function() {
		var opener = $('.wrap-opener:checked').nextAll('input:hidden').val();
		var closer = $('.wrap-closer:checked').nextAll('input:hidden').val();
		$('#dynamik-wrap-preview-img').attr('src', dynamik_wrap_image_url + opener + '-' + closer + '.png');
	});
	
	$('.wrap-div-option').change();
	hilight_custom();

	$('.dynamik-homepage-type').change(function() {
		var dynamik_homepage_type = $('.dynamik-homepage-type:checked').val();
		if( dynamik_homepage_type == 'static_home' ) {
			$('.dynamik-homepage-type-box').animate({"height": "show"}, { duration: 300 });
		} else {
			$('.dynamik-homepage-type-box').animate({"height": "hide"}, { duration: 300 });
		}
	});
	$('.dynamik-homepage-type').change();
	
	$('#ez-feature-check-all').click( function() {
		$('.ez-feature-check').attr('checked', true);
	});
	
	$('#ez-feature-uncheck-all').click( function() {
		$('.ez-feature-check').attr('checked', false);
	});
	
	$('#ez-footer-check-all').click( function() {
		$('.ez-footer-check').attr('checked', true);
	});
	
	$('#ez-footer-uncheck-all').click( function() {
		$('.ez-footer-check').attr('checked', false);
	});

	$('#dynamik-design-widget-column-class-compatible').change(function() {
		var column_class_compatible = $('#dynamik-design-widget-column-class-compatible:checked').val();
		if( column_class_compatible ) {
			$('.column-class-compatible-toggle').addClass('column-class-compatible');
		} else {
			$('.column-class-compatible-toggle').removeClass('column-class-compatible');
		}
	});
	$('#dynamik-design-widget-column-class-compatible').change();

	$('#dynamik-header-media-query-default').change(function() {
		var header_media_query_default = $('#dynamik-header-media-query-default').val();
		if( header_media_query_default == 'delayed' ) {
			$('#dynamik-display-delayed-header-title-area-width-box').animate({"height": "show"}, { duration: 300 });
		} else {
			$('#dynamik-display-delayed-header-title-area-width-box').animate({"height": "hide"}, { duration: 300 });
		}
	});
	$('#dynamik-header-media-query-default').change();

	$('#dynamik-content-media-query-default').change(function() {
		var content_media_query_default = $('#dynamik-content-media-query-default').val();
		if( content_media_query_default == 'delayed' ) {
			$('#dynamik-display-delayed-sidebar-width-box').animate({"height": "show"}, { duration: 300 });
		} else {
			$('#dynamik-display-delayed-sidebar-width-box').animate({"height": "hide"}, { duration: 300 });
		}
	});
	$('#dynamik-content-media-query-default').change();
	
	$('#dynamik-navbar-media-query-default').change(function() {
		var navbar_media_query_default = $('#dynamik-navbar-media-query-default').val();
		if( navbar_media_query_default == 'vertical_toggle' || navbar_media_query_default == 'tablet_dropdown' || navbar_media_query_default == 'mobile_dropdown' ) {
			$('#dynamik-display-dropdown-menu-text-box').animate({"height": "show"}, { duration: 300 });
			if( navbar_media_query_default == 'vertical_toggle' ) {
				$('#dynamik-display-vertical-toggle-menu-styles-box').animate({"height": "show"}, { duration: 300 });
				$('.dynamik-display-hamburger-icon-margin-box').animate({"height": "hide"}, { duration: 300 });
			} else {
				$('.dynamik-display-hamburger-icon-margin-box').animate({"height": "show"}, { duration: 300 });
				$('#dynamik-display-vertical-toggle-menu-styles-box').animate({"height": "hide"}, { duration: 300 });
			}
		} else {
			$('#dynamik-display-dropdown-menu-text-box').animate({"height": "hide"}, { duration: 300 });
			$('#dynamik-display-vertical-toggle-menu-styles-box').hide();
		}

		if( navbar_media_query_default == 'vertical' || navbar_media_query_default == 'vertical_toggle' ) {
			$('.dynamik-display-vertical-menu-options-box').animate({"height": "show"}, { duration: 300 });
		} else {
			$('.dynamik-display-vertical-menu-options-box').animate({"height": "hide"}, { duration: 300 });
		}
	});
	$('#dynamik-navbar-media-query-default').change();
	
	$('.dynamik-tabby-textarea').tabby();

});