<?php

	//get input
	$slideID = UniteFunctionsRev::getGetVar("id");
	
	//init slide object
	$slide = new RevSlide();
	$slide->initByID($slideID);
	$slideParams = $slide->getParams();
	
	$operations = new RevOperations();
	
	//init slider object
	$sliderID = $slide->getSliderID();
	$slider = new RevSlider();
	$slider->initByID($sliderID);
	$sliderParams = $slider->getParams();
	
	//set slide delay
	$sliderDelay = $slider->getParam("delay","9000");
	$slideDelay = $slide->getParam("delay","");
	if(empty($slideDelay))
		$slideDelay = $sliderDelay;
	
	require self::getSettingsFilePath("slide_settings");
	require self::getSettingsFilePath("layer_settings");
	
	$settingsLayerOutput = new UniteSettingsProductSidebarRev();
	$settingsSlideOutput = new UniteSettingsRevProductRev();
		
	$arrLayers = $slide->getLayers();
	
	//get settings objects
	$settingsLayer = self::getSettings("layer_settings");	
	$settingsSlide = self::getSettings("slide_settings");
	
	$cssContent = self::getSettings("css_captions_content");
	$arrCaptionClasses = $operations->getArrCaptionClasses($cssContent);
	
	$arrButtonClasses = $operations->getButtonClasses();
	
	//set layer caption as first caption class
	$firstCaption = !empty($arrCaptionClasses)?$arrCaptionClasses[0]:"";
	$settingsLayer->updateSettingValue("layer_caption",$firstCaption);
	
	//set stored values from "slide params"
	$settingsSlide->setStoredValues($slideParams);
		
	//init the settings output object
	$settingsLayerOutput->init($settingsLayer);
	$settingsSlideOutput->init($settingsSlide);
	
	//set various parameters needed for the page
	$width = $sliderParams["width"];
	$height = $sliderParams["height"];
	$imageUrl = $slide->getImageUrl();
	
	$imageFilename = $slide->getImageFilename();
	$urlCaptionsCSS = GlobalsRevSlider::$urlCaptionsCSS;
	
	$style = "width:{$width}px;height:{$height}px;background-image:url('$imageUrl')";
	
	//set iframe parameters
	$iframeWidth = $width+60;
	$iframeHeight = $height+50;
	
	$iframeStyle = "width:{$iframeWidth}px;height:{$iframeHeight}px;";
	
	$closeUrl = self::getViewUrl(RevSliderAdmin::VIEW_SLIDES,"id=".$sliderID);
	
	$jsonLayers = UniteFunctionsRev::jsonEncodeForClientSide($arrLayers);
	$jsonCaptions = UniteFunctionsRev::jsonEncodeForClientSide($arrCaptionClasses);
	
	$loadGoogleFont = $slider->getParam("load_googlefont","false");
	
	require self::getPathTemplate("slide");
?>
	
