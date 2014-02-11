<?php
/**
 * Builds the font option lists as well as handels the
 * enqueueing of Google fonts.
 *
 * @package Dynamik
 */
 
/**
 * Import Google fonts.
 *
 * @since 1.0
 * @return an import URL of Google fonts, if any are currently selected.
 */
function dynamik_import_google_fonts()
{
	$dynamik_google_font_array = dynamik_google_font_array();
	$google_fonts = '';
	
	if( is_array( dynamik_get_design( 'font_type' ) ) )
	{
		foreach( $dynamik_google_font_array as $google_font => $google_font_data )
		{
			if( in_array( $google_font_data['value'], dynamik_get_design( 'font_type' ) ) )
			{
				$google_fonts .= $google_font_data['url_string'];
			}
		}
	}
	
	$google_fonts_import = '';
	
	if( !empty( $google_fonts ) )
	{
		$google_fonts_import .= '

/* Import Google Fonts
------------------------------------------------------------ */
		';

		$google_fonts_import .= '
@import url(//fonts.googleapis.com/css?family=' . $google_fonts . ');
		';
	}
	
	return $google_fonts_import;
}

/**
 * Build the Dynamik font menu HTML.
 *
 * @since 1.0
 */
function dynamik_build_font_menu( $selected = '' )
{
	$dynamik_font_array = dynamik_font_array();
	
	foreach( $dynamik_font_array as $font_type => $fonts )
	{
		echo '<optgroup label="' . $font_type . ' -------">';
		foreach( $fonts as $font_slug => $font_data )
		{
			$option = '<option value="' . $font_data . '"';
				
			if( $font_data == $selected )
			{
				$option .= ' selected="selected"';
			}
			
			if( $font_type == 'Google Fonts' )
			{
				$gee = ' [G]';
			}
			
			if( !empty( $gee ) )
			{
				$option .= '>' . $font_slug . $gee . '</option>';
			}
			else
			{
				$option .= '>' . $font_slug . '</option>';
			}
			
			echo $option;
		}
		echo '</optgroup>';
	}
}

/**
 * Create an array of Dynamik fonts.
 *
 * @since 1.0
 * @return an array of Dynamik fonts.
 */
function dynamik_font_array()
{
	$dynamik_font_array = array(
		"Standard Fonts" => array(
			"Arial" => "Arial, sans-serif",
			"Arial Black" => "'Arial Black', sans-serif",
			"Courier New" => "'Courier New', sans-serif",
			"Georgia" => "Georgia, serif",
			"Helvetica" => "Helvetica, sans-serif",
			"Impact" => "Impact, sans-serif",
			"Lucida Console" => "'Lucida Console', sans-serif",
			"Lucida Sans Unicode" => "'Lucida Sans Unicode', sans-serif",
			"Tahoma" => "Tahoma, sans-serif",
			"Times New Roman" => "'Times New Roman', serif",
			"Trebuchet MS" => "'Trebuchet MS', sans-serif",
			"Verdana" => "Verdana, sans-serif"
		),
		"Google Fonts" => array(
			"Aclonica" => "Aclonica, sans-serif",
			"Allan" => "Allan, sans-serif",
			"Allerta" => "Allerta, sans-serif",
			"Allerta Stencil" => "'Allerta Stencil', sans-serif",
			"Amaranth" => "Amaranth, sans-serif",
			"Annie Use Your Telescope" => "'Annie Use Your Telescope', serif",
			"Anonymous Pro" => "'Anonymous Pro', sans-serif",
			"Anton" => "Anton, sans-serif",
			"Architects Daughter" => "'Architects Daughter', sans-serif",
			"Arimo" => "Arimo, sans-serif",
			"Arvo" => "Arvo, sans-serif",
			"Astloch" => "Astloch, serif",
			"Bangers" => "Bangers, serif",
			"Bentham" => "Bentham, serif",
			"Bevan" => "Bevan, sans-serif",
			"Bigshot One" => "'Bigshot One', serif",
			"Buda" => "Buda, serif",
			"Cabin" => "Cabin, sans-serif",
			"Cabin Sketch" => "'Cabin Sketch', sans-serif",
			"Calligraffiti" => "Calligraffiti, cursive, serif",
			"Candal" => "Candal, sans-serif",
			"Cantarell" => "Cantarell, sans-serif",
			"Cardo" => "Cardo, sans-serif",
			"Carter One" => "'Carter One', serif",
			"Cherry Cream Soda" => "'Cherry Cream Soda', serif",
			"Chewy" => "Chewy, curive, serif",
			"Coda" => "Coda, sans-serif",
			"Coda Caption" => "'Coda Caption', sans-serif",
			"Coming Soon" => "'Coming Soon', cursive, serif",
			"Copse" => "Copse, serif",
			"Corben" => "Corben, serif",
			"Cousine" => "Cousine, sans-serif",
			"Covered By Your Grace" => "'Covered By Your Grace', cursive, serif",
			"Crafty Girls" => "'Crafty Girls', cursive, serif",
			"Crimson Text" => "'Crimson Text', serif",
			"Crushed" => "Crushed, sans-serif",
			"Cuprum" => "Cuprum, sans-serif",
			"Damion" => "Damion, serif",
			"Dancing Script" => "'Dancing Script', cursive, serif",
			"Dawning of a New Day" => "'Dawning of a New Day', serif",
			"Didact Gothic" => "'Didact Gothic', sans-serif",
			"Droid Sans" => "'Droid Sans', sans-serif",
			"Droid Sans Mono" => "'Droid Sans Mono', sans-serif",
			"Droid Serif" => "'Droid Serif', serif",
			"EB Garamond" => "'EB Garamond', serif",
			"Expletus Sans" => "'Expletus Sans', sans-serif",
			"Fontdiner Swanky" => "'Fontdiner Swanky', cursive, serif",
			"Francois One" => "'Francois One', sans-serif",
			"Geo" => "'Geo', sans-serif",
			"Goudy Bookletter 1911" => "'Goudy Bookletter 1911', serif",
			"Gruppo" => "Gruppo, sans-serif",
			"Holtwood One SC" => "'Holtwood One SC', sans-serif",
			"Homemade Apple" => "'Homemade Apple', cursive, serif",
			"IM Fell DW Pica" => "'IM Fell DW Pica', serif",
			"IM Fell DW Pica SC" => "'IM Fell DW Pica SC', serif",
			"IM Fell Double Pica" => "'IM Fell Double Pica', serif",
			"IM Fell Double Pica SC" => "'IM Fell Double Pica SC', serif",
			"IM Fell English" => "'IM Fell English', serif",
			"IM Fell English SC" => "'IM Fell English SC', serif",
			"IM Fell French Canon" => "'IM Fell French Canon', serif",
			"IM Fell French Canon SC" => "'IM Fell French Canon SC', serif",
			"IM Fell Great Primer" => "'IM Fell Great Primer', serif",
			"IM Fell Great Primer" => "'IM Fell Great Primer SC', serif",
			"Inconsolata" => "Inconsolata, sans-serif",
			"Indie Flower" => "'Indie Flower', cursive, sans-serif",
			"Irish Grover" => "'Irish Grover', cursive, serif",
			"Josefin Sans" => "'Josefin Sans', sans-serif",
			"Josefin Slab" => "'Josefin Slab', sans-serif",
			"Judson" => "Judson, serif",
			"Just Another Hand" => "'Just Another Hand', cursive, serif",
			"Just Me Again Down Here" => "'Just Me Again Down Here', cursive, serif",
			"Kenia" => "Kenia, sans-serif",
			"Kranky" => "Kranky, cursive, serif",
			"Kreon" => "Kreon, serif",
			"Kristi" => "Kristi, cursive, serif",
			"Lato" => "Lato, sans-serif",
			"League Script" => "'League Script', cursive, serif",
			"Lekton" => "Lekton, sans-serif",
			"Lobster" => "Lobster, cursive, serif",
			"Luckiest Guy" => "'Luckiest Guy', cursive, serif",
			"Maiden Orange" => "'Maiden Orange', serif",
			"Mako" => "Mako, sans-serif",
			"Meddon" => "Meddon, cursive, serif",
			"MedievalSharp" => "'MedievalSharp', cursive, serif",
			"Megrim" => "Megrim, serif",
			"Merriweather" => "Merriweather, serif",
			"Molengo" => "Molengo, sans-serif",
			"Monofett" => "Monofett, sans-serif",
			"Mountains of Christmas" => "'Mountains of Christmas', cursive, sans-serif",
			"Neucha" => "Neucha, sans-serif",
			"Neuton" => "Neuton, serif",
			"News Cycle" => "'News Cycle', sans-serif",
			"Nova Script" => "'Nova Script', serif",
			"Nova Oval" => "'Nova Oval', serif",
			"Nova Oval" => "'Nova Oval', serif",
			"Nova Slim" => "'Nova Slim', serif",
			"Nova Flat" => "'Nova Flat', serif",
			"Nova Cut" => "'Nova Cut', serif",
			"Nova Square" => "'Nova Square', serif",
			"Nova Mono" => "'Nova Mono', serif",
			"Nobile" => "Nobile, sans-serif",
			"OFL Sorts Mill Goudy TT" => "'OFL Sorts Mill Goudy TT', serif",
			"Old Standard TT" => "'Old Standard TT', serif",
			"Open Sans Condensed" => "'Open Sans Condensed', sans-serif",
			"Open Sans" => "'Open Sans', sans-serif",
			"Orbitron" => "Orbitron, sans-serif",
			"Oswald" => "Oswald, sans-serif",
			"Over the Rainbow" => "'Over the Rainbow', serif",
			"Pacifico" => "Pacifico, cursive, serif",
			"Paytone One" => "'Paytone One', sans-serif",
			"Permanent Marker" => "'Permanent Marker', cursive, serif",
			"Philosopher" => "Philosopher, serif",
			"Play" => "Play, sans-serif",
			"PT Sans" => "'PT Sans', sans-serif",
			"PT Sans Caption" => "'PT Sans Caption', sans-serif",
			"PT Sans Narrow" => "'PT Sans Narrow', sans-serif",
			"PT Serif" => "'PT Serif', serif",
			"PT Serif Caption" => "'PT Serif Caption', serif",
			"Puritan" => "Puritan, sans-serif",
			"Quattrocento" => "Quattrocento, serif",
			"Quattrocento Sans" => "'Quattrocento Sans', sans-serif",
			"Radley" => "Radley, serif",
			"Raleway" => "Raleway, sans-serif",
			"Reenie Beanie" => "'Reenie Beanie', cursive, serif",
			"Rock Salt" => "'Rock Salt', cursive, serif",
			"Rokkitt" => "Rokkitt, serif",
			"Schoolbell" => "Schoolbell, cursive, serif",
			"Shanti" => "Shanti, sans-serif",
			"Sigmar One" => "'Sigmar One', sans-serif",
			"Six Caps" => "'Six Caps', sans-serif",
			"Slackey" => "Slackey, cursive, serif",
			"Smythe" => "Smythe, serif",
			"Sniglet" => "Sniglet, cursive, serif",
			"Special Elite" => "'Special Elite', serif",
			"Sue Ellen Francisco" => "'Sue Ellen Francisco', serif",
			"Sunshiney" => "Sunshiney, cursive, serif",
			"Swanky and Moo Moo" => "'Swanky and Moo Moo', serif",
			"Syncopate" => "Syncopate, sans-serif",
			"Tangerine" => "Tangerine, cursive, serif",
			"Terminal Dosis Light" => "'Terminal Dosis Light', sans-serif",
			"The Girl Next Door" => "'The Girl Next Door', serif",
			"Tinos" => "Tinos, serif",
			"Ubuntu" => "Ubuntu, sans-serif",
			"Ultra" => "Ultra, serif",
			"UnifrakturCook" => "UnifrakturCook, serif",
			"UnifrakturMaguntia" => "UnifrakturMaguntia, serif",
			"Unkempt" => "Unkempt, cursive, serif",
			"VT323" => "VT323, sans-serif",
			"Vibur" => "Vibur, cursive, serif",
			"Volkorn" => "Vollkorn, serif",
			"Waiting for the Sunrise" => "'Waiting for the Sunrise', serif",
			"Wallpoet" => "Wallpoet, sans-serif",
			"Walter Turncoat" => "'Walter Turncoat', cursive, serif",
			"Yanone Kaffeesatz" => "'Yanone Kaffeesatz', sans-serif"
		)
	);
	
	return $dynamik_font_array;
}

/**
 * Create an array of Google fonts.
 *
 * @since 1.0
 * @return an array of Google fonts.
 */
function dynamik_google_font_array()
{
	$dynamik_google_font_array = array(
		"Aclonica" => array(
			"value"	=> "Aclonica, sans-serif",
			"url_string"=> "Aclonica|"
		),
		"Allan" => array(
			"value"	=> "Allan, sans-serif",
			"url_string"=> "Allan:bold|"
		),
		"Allerta" => array(
			"value"	=> "Allerta, sans-serif",
			"url_string"=> "Allerta|"
		),
		"Allerta Stencil" => array(
			"value"	=> "'Allerta Stencil', sans-serif",
			"url_string"=> "Allerta+Stencil|"
		),
		"Amaranth" => array(
			"value"	=> "Amaranth, sans-serif",
			"url_string"=> "Amaranth:regular,regularitalic,bold,bolditalic|"
		),
		"Annie Use Your Telescope" => array(
			"value"	=> "'Annie Use Your Telescope', serif",
			"url_string"=> "Annie+Use+Your+Telescope|"
		),
		"Anonymous Pro" => array(
			"value"	=> "'Anonymous Pro', sans-serif",
			"url_string"=> "Anonymous+Pro:regular,italic,bold,bolditalic|"
		),
		"Anton" => array(
			"value"	=> "Anton, sans-serif",
			"url_string"=> "Anton|"
		),
		"Architects Daughter" => array(
			"value"	=> "'Architects Daughter', sans-serif",
			"url_string"=> "Architects+Daughter|"
		),
		"Arimo" => array(
			"value"	=> "Arimo, sans-serif",
			"url_string"=> "Arimo:regular,italic,bold,bolditalic|"
		),
		"Arvo" => array(
			"value"	=> "Arvo, sans-serif",
			"url_string"=> "Arvo:regular,italic,bold,bolditalic|"
		),
		"Astloch" => array(
			"value"	=> "Astloch, serif",
			"url_string"=> "Astloch:regular,bold|"
		),
		"Bangers" => array(
			"value"	=> "Bangers, serif",
			"url_string"=> "Bangers|"
		),
		"Bentham" => array(
			"value"	=> "Bentham, serif",
			"url_string"=> "Bentham|"
		),
		"Bevan" => array(
			"value"	=> "Bevan, sans-serif",
			"url_string"=> "Bevan|"
		),
		"Bigshot One" => array(
			"value"	=> "'Bigshot One', serif",
			"url_string"=> "Bigshot+One|"
		),
		"Buda" => array(
			"value"	=> "Buda, serif",
			"url_string"=> "Buda:light|"
		),
		"Cabin" => array(
			"value"	=> "Cabin, sans-serif",
			"url_string"=> "Cabin:regular,500,600,bold|"
		),
		"Cabin Sketch" => array(
			"value"	=> "'Cabin Sketch', sans-serif",
			"url_string"=> "Cabin+Sketch:bold|"
		),
		"Calligraffiti" => array(
			"value"	=> "Calligraffiti, cursive, serif",
			"url_string"=> "Calligraffiti|"
		),
		"Candal" => array(
			"value"	=> "Candal, sans-serif",
			"url_string"=> "Candal|"
		),
		"Cantarell" => array(
			"value"	=> "Cantarell, sans-serif",
			"url_string"=> "Cantarell:regular,italic,bold,bolditalic|"
		),
		"Cardo" => array(
			"value"	=> "Cardo, sans-serif",
			"url_string"=> "Cardo|"
		),
		"Carter One" => array(
			"value"	=> "'Carter One', serif",
			"url_string"=> "Carter+One|"
		),
		"Cherry Cream Soda" => array(
			"value"	=> "'Cherry Cream Soda', serif",
			"url_string"=> "Cherry+Cream+Soda|"
		),
		"Chewy" => array(
			"value"	=> "Chewy, curisve, serif",
			"url_string"=> "Chewy|"
		),
		"Coda" => array(
			"value"	=> "Coda, sans-serif",
			"url_string"=> "Coda:800|"
		),
		"Coda Caption" => array(
			"value"	=> "'Coda Caption', sans-serif",
			"url_string"=> "Coda+Caption:800|"
		),
		"Comong Soon" => array(
			"value"	=> "'Coming Soon', cursive, serif",
			"url_string"=> "Coming+Soon|"
		),
		"Copse" => array(
			"value"	=> "Copse, serif",
			"url_string"=> "Copse|"
		),
		"Corben" => array(
			"value"	=> "Corben, serif",
			"url_string"=> "Corben:b|"
		),
		"Cousine" => array(
			"value"	=> "Cousine, sans-serif",
			"url_string"=> "Cousine:regular,italic,bold,bolditalic|"
		),
		"Covered By Your Grace" => array(
			"value"	=> "'Covered By Your Grace', cursive, serif",
			"url_string"=> "Covered+By+Your+Grace|"
		),
		"Crafty Girls" => array(
			"value"	=> "'Crafty Girls', cursive, serif",
			"url_string"=> "Crafty+Girls|"
		),
		"Crimson Text" => array(
			"value"	=> "'Crimson Text', serif",
			"url_string"=> "Crimson+Text:regular,regularitalic,600,600italic,bold,bolditalic|"
		),
		"Crushed" => array(
			"value"	=> "Crushed, sans-serif",
			"url_string"=> "Crushed|"
		),
		"Cuprum" => array(
			"value"	=> "Cuprum, sans-serif",
			"url_string"=> "Cuprum|"
		),
		"Damion" => array(
			"value"	=> "Damion, serif",
			"url_string"=> "Damion|"
		),
		"Dancing Script" => array(
			"value"	=> "'Dancing Script', cursive, serif",
			"url_string"=> "Dancing+Script:400,700&v2|"
		),
		"Dawning of a New Day" => array(
			"value"	=> "'Dawning of a New Day', serif",
			"url_string"=> "Dawning+of+a+New+Day|"
		),
		"Didact Gothic" => array(
			"value"	=> "'Didact Gothic', sans-serif",
			"url_string"=> "Didact+Gothic|"
		),
		"Droid Sans" => array(
			"value"	=> "'Droid Sans', sans-serif",
			"url_string"=> "Droid+Sans:regular,bold|"
		),
		"Droid Sans Mono" => array(
			"value"	=> "'Droid Sans Mono', sans-serif",
			"url_string"=> "Droid+Sans+Mono|"
		),
		"Droid Serif" => array(
			"value"	=> "'Droid Serif', serif",
			"url_string"=> "Droid+Serif:regular,italic,bold,bolditalic|"
		),
		"EB Garamond" => array(
			"value"	=> "'EB Garamond', serif",
			"url_string"=> "EB+Garamond|"
		),
		"Expletus Sans" => array(
			"value"	=> "'Expletus Sans', sans-serif",
			"url_string"=> "Expletus+Sans:regular,regularitalic,500,500italic,600,600italic,bold,bolditalic|"
		),
		"Fontdiner Swanky" => array(
			"value"	=> "'Fontdiner Swanky', cursive, serif",
			"url_string"=> "Fontdiner+Swanky|"
		),
		"Francois One" => array(
			"value"	=> "'Francois One', sans-serif",
			"url_string"=> "Francois+One|"
		),
		"Geo" => array(
			"value"	=> "'Geo', sans-serif",
			"url_string"=> "Geo|"
		),
		"Goudy Bookletter 1911" => array(
			"value"	=> "'Goudy Bookletter 1911', serif",
			"url_string"=> "Goudy+Bookletter+1911|"
		),
		"Gruppo" => array(
			"value"	=> "Gruppo, sans-serif",
			"url_string"=> "Gruppo|"
		),
		"Holtwood One SC" => array(
			"value"	=> "'Holtwood One SC', sans-serif",
			"url_string"=> "Holtwood+One+SC|"
		),
		"Homemade Apple" => array(
			"value"	=> "'Homemade Apple', cursive, serif",
			"url_string"=> "Homemade+Apple|"
		),
		"IM Fell DW Pica" => array(
			"value"	=> "'IM Fell DW Pica', serif",
			"url_string"=> "IM+Fell+DW+Pica:regular,italic|"
		),
		"IM Fell DW Pica SC" => array(
			"value"	=> "'IM Fell DW Pica SC', serif",
			"url_string"=> "IM+Fell+DW+Pica+SC|"
		),
		"IM Fell Double Pica" => array(
			"value"	=> "'IM Fell Double Pica', serif",
			"url_string"=> "IM+Fell+Double+Pica:regular,italic|"
		),
		"IM Fell Double Pica SC" => array(
			"value"	=> "'IM Fell Double Pica SC', serif",
			"url_string"=> "IM+Fell+Double+Pica+SC|"
		),
		"IM Fell English" => array(
			"value"	=> "'IM Fell English', serif",
			"url_string"=> "IM+Fell+English:regular,italic|"
		),
		"IM Fell English SC" => array(
			"value"	=> "'IM Fell English SC', serif",
			"url_string"=> "IM+Fell+English+SC|"
		),
		"IM Fell French Canon" => array(
			"value"	=> "'IM Fell French Canon', serif",
			"url_string"=> "IM+Fell+French+Canon:regular,italic|"
		),
		"IM Fell French Canon SC" => array(
			"value"	=> "'IM Fell French Canon SC', serif",
			"url_string"=> "IM+Fell+French+Canon+SC|"
		),
		"IM Fell Great Primer" => array(
			"value"	=> "'IM Fell Great Primer', serif",
			"url_string"=> "IM+Fell+Great+Primer:regular,italic"
		),
		"IM Fell Great Primer SC" => array(
			"value"	=> "'IM Fell Great Primer SC', serif",
			"url_string"=> "IM+Fell+Great+Primer+SC"
		),
		"Inconsolata" => array(
			"value"	=> "Inconsolata, sans-serif",
			"url_string"=> "Inconsolata|"
		),
		"Indie Flower" => array(
			"value"	=> "'Indie Flower', cursive, sans-serif",
			"url_string"=> "Indie+Flower|"
		),
		"Irish Grover" => array(
			"value"	=> "'Irish Grover', cursive, serif",
			"url_string"=> "Irish+Grover|"
		),
		"Josefin Sans" => array(
			"value"	=> "'Josefin Sans', sans-serif",
			"url_string"=> "Josefin+Sans:100,100italic,light,lightitalic,regular,regularitalic,600,600italic,bold,bolditalic|"
		),
		"Josefin Slab" => array(
			"value" => "'Josefin Slab', sans-serif",
			"url_string"=> "Josefin+Slab:100,100italic,light,lightitalic,regular,regularitalic,600,600italic,bold,bolditalic|"
		),
		"Judson" => array(
			"value" => "Judson, serif",
			"url_string"=> "Judson:regular,regularitalic,bold|"
		),
		"Just Another Hand" => array(
			"value" => "'Just Another Hand', cursive, serif",
			"url_string"=> "Just+Another+Hand|"
		),
		"Just Me Again Down Here" => array(
			"value" => "'Just Me Again Down Here', cursive, serif",
			"url_string"=> "Just+Me+Again+Down+Here|"
		),
		"Kenia" => array(
			"value"	=> "Kenia, sans-serif",
			"url_string"=> "Kenia|"
		),
		"Kranky" => array(
			"value"	=> "Kranky, cursive, serif",
			"url_string"=> "Kranky|"
		),
		"Kreon" => array(
			"value"	=> "Kreon, serif",
			"url_string"=> "Kreon:light,regular,bold|"
		),
		"Kristi" => array(
			"value"	=> "Kristi, cursive, serif",
			"url_string"=> "Kristi|"
		),
		"Lato" => array(
			"value"	=> "Lato, sans-serif",
			"url_string"=> "Lato:100,100italic,light,lightitalic,regular,regularitalic,bold,bolditalic,900,900italic|"
		),
		"League Script" => array(
			"value"	=> "'League Script', cursive, serif",
			"url_string"=> "League+Script|"
		),
		"Lekton" => array(
			"value"	=> "Lekton, sans-serif",
			"url_string"=> "Lekton:regular,italic,bold|"
		),
		"Lobster" => array(
			"value"	=> "Lobster, cursive, serif",
			"url_string"=> "Lobster|"
		),
		"Luckiest Guy" => array(
			"value"	=> "'Luckiest Guy', cursive, serif",
			"url_string"=> "Luckiest+Guy|"
		),
		"Maiden Orange" => array(
			"value"	=> "'Maiden Orange', serif",
			"url_string"=> "Maiden+Orange|"
		),
		"Mako" => array(
			"value"	=> "Mako, sans-serif",
			"url_string"=> "Mako|"
		),
		"Meddon" => array(
			"value"	=> "Meddon, cursive, serif",
			"url_string"=> "Meddon|"
		),
		"MedievalSharp" => array(
			"value"	=> "'MedievalSharp', cursive, serif",
			"url_string"=> "MedievalSharp|"
		),
		"Megrim" => array(
			"value"	=> "Megrim, serif",
			"url_string"=> "Megrim|"
		),
		"Merriweather" => array(
			"value"	=> "Merriweather, serif",
			"url_string"=> "Merriweather:light,regular,bold,900|"
		),
		"Molengo" => array(
			"value"	=> "Molengo, sans-serif",
			"url_string"=> "Molengo|"
		),
		"Monofett" => array(
			"value"	=> "Monofett, sans-serif",
			"url_string"=> "Monofett|"
		),
		"Mountains of Christmas" => array(
			"value"	=> "'Mountains of Christmas', cursive, sans-serif",
			"url_string"=> "Mountains+of+Christmas|"
		),
		"Neucha" => array(
			"value"	=> "Neucha, sans-serif",
			"url_string"=> "Neucha|"
		),
		"Neuton" => array(
			"value"	=> "Neuton, serif",
			"url_string"=> "Neuton:regular,italic|"
		),
		"News Cycle" => array(
			"value"	=> "'News Cycle', sans-serif",
			"url_string"=> "News+Cycle|"
		),
		"Nova Script" => array(
			"value"	=> "'Nova Script', serif",
			"url_string"=> "Nova+Script|"
		),
		"Nova Oval" => array(
			"value"	=> "'Nova Oval', serif",
			"url_string"=> "Nova+Oval|"
		),
		"Nova Round" => array(
			"value"	=> "'Nova Round', serif",
			"url_string"=> "Nova+Round|"
		),
		"Nova Slim" => array(
			"value"	=> "'Nova Slim', serif",
			"url_string"=> "Nova+Slim|"
		),
		"Nova Flat" => array(
			"value"	=> "'Nova Flat', serif",
			"url_string"=> "Nova+Flat|"
		),
		"Nova Cut" => array(
			"value"	=> "'Nova Cut', serif",
			"url_string"=> "Nova+Cut|"
		),
		"Nova Square" => array(
			"value"	=> "'Nova Square', serif",
			"url_string"=> "Nova+Square|"
		),
		"Nova Mono" => array(
			"value"	=> "'Nova Mono', serif",
			"url_string"=> "Nova+Mono|"
		),
		"Nobile" => array(
			"value"	=> "Nobile, sans-serif",
			"url_string"=> "Nobile:regular,italic,bold,bolditalic|"
		),
		"OFL Sorts Mill Goudy TT" => array(
			"value"	=> "'OFL Sorts Mill Goudy TT', serif",
			"url_string"=> "OFL+Sorts+Mill+Goudy+TT:regular,italic|"
		),
		"Old Standard TT" => array(
			"value"	=> "'Old Standard TT', serif",
			"url_string"=> "Old+Standard+TT:regular,italic,bold|"
		),
		"Open Sans Condensed" => array(
			"value"	=> "'Open Sans Condensed', sans-serif",
			"url_string"=> "Open+Sans+Condensed:light,lightitalic|"
		),
		"Open Sans" => array(
			"value"	=> "'Open Sans', sans-serif",
			"url_string"=> "Open+Sans:light,lightitalic,regular,regularitalic,600,600italic,bold,bolditalic,800,800italic|"
		),
		"Orbitron" => array(
			"value"	=> "Orbitron, sans-serif",
			"url_string"=> "Orbitron:regular,500,bold,900|"
		),
		"Oswald" => array(
			"value"	=> "Oswald, sans-serif",
			"url_string"=> "Oswald|"
		),
		"Over the Rainbow" => array(
			"value"	=> "'Over the Rainbow', serif",
			"url_string"=> "Over+the+Rainbow|"
		),
		"Pacifico" => array(
			"value"	=> "Pacifico, cursive, serif",
			"url_string"=> "Pacifico|"
		),
		"Paytone One" => array(
			"value"	=> "'Paytone One', sans-serif",
			"url_string"=> "Paytone+One|"
		),
		"Permanent Marker" => array(
			"value"	=> "'Permanent Marker', cursive, serif",
			"url_string"=> "Permanent+Marker|"
		),
		"Philosopher" => array(
			"value"	=> "Philosopher, serif",
			"url_string"=> "Philosopher|"
		),
		"Play" => array(
			"value"	=> "Play, sans-serif",
			"url_string"=> "Play:regular,bold|"
		),
		"PT Sans" => array(
			"value"	=> "'PT Sans', sans-serif",
			"url_string"=> "PT+Sans:regular,italic,bold,bolditalic|"
		),
		"PT Sans Caption" => array(
			"value"	=> "'PT Sans Caption', sans-serif",
			"url_string"=> "PT+Sans+Caption:regular,bold|"
		),
		"PT Sans Narrow" => array(
			"value"	=> "'PT Sans Narrow', sans-serif",
			"url_string"=> "PT+Sans+Narrow:regular,bold|"
		),
		"PT Serif" => array(
			"value"	=> "'PT Serif', serif",
			"url_string"=> "PT+Serif:regular,italic,bold,bolditalic|"
		),
		"PT Serif Caption" => array(
			"value"	=> "'PT Serif Caption', serif",
			"url_string"=> "PT+Serif+Caption:regular,italic|"
		),
		"Puritan" => array(
			"value"	=> "'Puritan', sans-serif",
			"url_string"=> "Puritan:regular,italic,bold,bolditalic|"
		),
		"Quattrocento" => array(
			"value"	=> "Quattrocento, serif",
			"url_string"=> "Quattrocento|"
		),
		"Quattrocento Sans" => array(
			"value"	=> "'Quattrocento Sans', sans-serif",
			"url_string"=> "Quattrocento+Sans|"
		),
		"Radley" => array(
			"value"	=> "Radley, serif",
			"url_string"=> "Radley|"
		),
		"Raleway" => array(
			"value"	=> "Raleway, sans-serif",
			"url_string"=> "Raleway:100|"
		),
		"Reenie Beanie" => array(
			"value"	=> "'Reenie Beanie', cursive, serif",
			"url_string"=> "Reenie+Beanie|"
		),
		"Rock Salt" => array(
			"value"	=> "'Rock Salt', cursive, serif",
			"url_string"=> "Rock+Salt|"
		),
		"Rokkitt" => array(
			"value"	=> "Rokkitt, serif",
			"url_string"=> "Rokkitt|"
		),
		"Schoolbell" => array(
			"value"	=> "Schoolbell, cursive, serif",
			"url_string"=> "Schoolbell|"
		),
		"Shanti" => array(
			"value"	=> "Shanti, sans-serif",
			"url_string"=> "Shanti|"
		),
		"Sigmar One" => array(
			"value"	=> "'Sigmar One', sans-serif",
			"url_string"=> "Sigmar+One|"
		),
		"Six Caps" => array(
			"value"	=> "'Six Caps', sans-serif",
			"url_string"=> "Six+Caps|"
		),
		"Slackey" => array(
			"value"	=> "Slackey, cursive, serif",
			"url_string"=> "Slackey|"
		),
		"Smythe" => array(
			"value"	=> "Smythe, serif",
			"url_string"=> "Smythe|"
		),
		"Sniglet" => array(
			"value"	=> "Sniglet, cursive, serif",
			"url_string"=> "Sniglet:800|"
		),
		"Special Elite" => array(
			"value"	=> "'Special Elite', serif",
			"url_string"=> "Special+Elite|"
		),
		"Sue Ellen Francisco" => array(
			"value"	=> "'Sue Ellen Francisco', serif",
			"url_string"=> "Sue+Ellen+Francisco|"
		),
		"Sunshiney" => array(
			"value"	=> "Sunshiney, cursive, serif",
			"url_string"=> "Sunshiney|"
		),
		"Swanky and Moo Moo" => array(
			"value"	=> "'Swanky and Moo Moo', serif",
			"url_string"=> "Swanky+and+Moo+Moo|"
		),
		"Syncopate" => array(
			"value"	=> "Syncopate, sans-serif",
			"url_string"=> "Syncopate:regular,bold|"
		),
		"Tangerine" => array(
			"value"	=> "Tangerine, cursive, serif",
			"url_string"=> "Tangerine:regular,bold|"
		),
		"Terminal Dosis Light" => array(
			"value"	=> "'Terminal Dosis Light', sans-serif",
			"url_string"=> "Terminal+Dosis+Light|"
		),
		"The Girl Next Door" => array(
			"value"	=> "'The Girl Next Door', serif",
			"url_string"=> "The+Girl+Next+Door|"
		),
		"Tinos" => array(
			"value"	=> "Tinos, serif",
			"url_string"=> "Tinos:regular,italic,bold,bolditalic|"
		),
		"Ubuntu" => array(
			"value"	=> "Ubuntu, sans-serif",
			"url_string"=> "Ubuntu:light,lightitalic,regular,italic,500,500italic,bold,bolditalic|"
		),
		"Ultra" => array(
			"value"	=> "Ultra, serif",
			"url_string"=> "Ultra|"
		),
		"UnifrakturCook" => array(
			"value"	=> "UnifrakturCook, serif",
			"url_string"=> "UnifrakturCook:b|"
		),
		"UnifrakturMaguntia" => array(
			"value"	=> "UnifrakturMaguntia, serif",
			"url_string"=> "UnifrakturMaguntia|"
		),
		"Unkempt" => array(
			"value"	=> "Unkempt, cursive, serif",
			"url_string"=> "Unkempt|"
		),
		"VT323" => array(
			"value"	=> "VT323, sans-serif",
			"url_string"=> "VT323|"
		),
		"Vibur" => array(
			"value"	=> "Vibur, cursive, serif",
			"url_string"=> "Vibur|"
		),
		"Volkorn" => array(
			"value"	=> "Vollkorn, serif",
			"url_string"=> "Vollkorn:regular,italic,bold,bolditalic|"
		),
		"Waiting for the Sunrise" => array(
			"value"	=> "'Waiting for the Sunrise', serif",
			"url_string"=> "Waiting+for+the+Sunrise|"
		),
		"Wallpoet" => array(
			"value"	=> "Wallpoet, sans-serif",
			"url_string"=> "Wallpoet|"
		),
		"Walter Turncoat" => array(
			"value"	=> "'Walter Turncoat', cursive, serif",
			"url_string"=> "Walter+Turncoat|"
		),
		"Yanone Kaffeesatz" => array(
			"value"	=> "'Yanone Kaffeesatz', sans-serif",
			"url_string"=> "Yanone+Kaffeesatz:extralight,light,regular,bold|"
		),
	);
	
	return $dynamik_google_font_array;
}

//end lib/functions/dynamik-fonts.php