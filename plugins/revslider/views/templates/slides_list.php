
	<div class="postbox box-slideslist">
		<h3>
			<span class='slideslist-title'>Slides List</span>
			<span id="saving_indicator" class='slideslist-loading'>Saving Order...</span>
		</h3>
		<div class="inside">
			<?php if(empty($arrSlides)):?>
			No Slides Found
			<?php endif?>
			
			
			<ul id="list_slides" class="list_slides ui-sortable">
			
				<?php foreach($arrSlides as $slide):
					$order = $slide->getOrder();
					
					$imageFilepath = $slide->getImageFilepath();									
					$imageUrl = $slide->getImageUrl();
					
					if(!empty($imageFilepath))	//show php resized image:
						$urlImageForView = self::getImageUrl($imageFilepath,200,100,true);
					else
						$urlImageForView = $imageUrl;
					
					$filename = $slide->getImageFilename();
					$slideid = $slide->getID();
					
					$urlEditSlide = self::getViewUrl(RevSliderAdmin::VIEW_SLIDE,"id=$slideid");
					$linkEdit = UniteFunctionsRev::getHtmlLink($urlEditSlide, $filename);
				?>
					<li id="slidelist_item_<?php echo $slideid?>" class="ui-state-default">
					
						<span class="slide-col col-id">
							<?php echo $slideid?>
						</span>
						
						<span class="slide-col col-name">
							<?php echo $linkEdit?>
							<a class='button_edit_slide greenbutton' href='<?php echo $urlEditSlide?>'>Edit Slide</a>
						</span>
						<span class="slide-col col-image">
							<img id="slide_image_<?php echo $slideid?>" width="200" height="100" src="<?php echo $urlImageForView?>" class="slide_image" title="Slide Image - Click to change" alt="<?php echo $filename?>"></img>
						</span>
						
						<span class="slide-col col-operations">
							<a id="button_delete_slide_<?php echo $slideid?>" class='button-secondary button_delete_slide' href='javascript:void(0)'>Delete</a>
							<a id="button_duplicate_slide_<?php echo $slideid?>" class='button-secondary button_duplicate_slide' href='javascript:void(0)'>Duplicate</a>
						</span>
						
						<span class="slide-col col-handle">
							<div class="col-handle-inside">
								<span class="ui-icon ui-icon-arrowthick-2-n-s"></span>
							</div>
						</span>	
						<div class="clear"></div>
					</li>
				<?php endforeach;?>
			</ul>
			
		</div>
	</div>