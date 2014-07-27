
kb:
<?php
	$urlEditSlide = self::getViewUrl(RevSliderAdmin::VIEW_SLIDE,"id=$slideid");
	$linkEdit = UniteFunctionsRev::getHtmlLink($urlEditSlide, $filename);
	
	require self::getPathTemplate("slide");
	
?>


//royal slider:
<?php

	/**
	* RoyalSlider shortcode
	*/
	function shortcode($atts, $content = null) {
		extract(shortcode_atts(array(
				"id" => '-1'
		), $atts));
		return do_shortcode($this->get_slider($id));
	}	
	
	
	
?>