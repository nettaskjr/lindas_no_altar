<?php
/**
* @version 1.3 RC1
* @package DJ Flyer
* @subpackage DJ Flyer Component
* @copyright Copyright (C) 2010 Blue Constant Media LTD, All rights reserved.
* @license http://www.gnu.org/licenses GNU/GPL
* @author url: http://design-joomla.eu
* @author email contact@design-joomla.eu
* @developer Ĺ�ukasz Ciastek - lukasz.ciastek@design-joomla.eu
*
*
* DJ Flyer is free software: you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation, either version 3 of the License, or
* (at your option) any later version.
*
* DJ Flyer is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
* GNU General Public License for more details.
*
* You should have received a copy of the GNU General Public License
* along with DJ Flyer. If not, see <http://www.gnu.org/licenses/>.
*
*/
defined ('_JEXEC') or die('Restricted access');
$editor =JFactory::getEditor();
if(version_compare(JVERSION, '3.0', '>=')) JHtml::_('formbehavior.chosen', 'select');
?>




		<form class="form-horizontal" action="index.php?option=com_djflyer" method="post" name="adminForm" id="adminForm" enctype='multipart/form-data'>
		
		
			<fieldset >
			<legend><?php echo JText::_('COM_DJFLYER_DETAILS'); ?></legend>

			  <div class="control-group">
			    <label class="control-label" for="name"><?php echo JText::_('COM_DJFLYER_NAME');?></label>
			    <div class="controls">
			      <input type="text" name="name" id="name" placeholder="<?php echo JText::_('COM_DJFLYER_NAME');?>" value="<?php echo $this->item->name; ?>" />
			    </div>
			  </div>
			  <div class="control-group">
			    <label class="control-label" for="cat_id"><?php echo JText::_('COM_DJFLYER_CATEGORY');?></label>
			    <div class="controls">
			      	<select name="cat_id" id="cat_id" >
						<option value=""><?php echo JText::_('JOPTION_SELECT_CATEGORY');?></option>
						<?php echo JHtml::_('select.options', $this->cat, 'value', 'text', $this->item->cat_id, true);?>
					</select>
			    </div>
			  </div>
			  <div class="control-group">
			    <label class="control-label" for="tooltip"><?php echo JText::_('COM_DJFLYER_TOOLTIP');?></label>
			    <div class="controls">
			      <textarea name="tooltip" id="tooltip"><?php echo $this->item->tooltip; ?></textarea>
			    </div>
			  </div>
			  <div class="control-group">
			    <label class="control-label" for="details"><?php echo JText::_('COM_DJFLYER_DETAILS');?></label>
			    <div class="controls">
			      <textarea name="details" id="details"><?php echo $this->item->details; ?></textarea>
			    </div>
			  </div>					
				<div class="control-group">
			    <label class="control-label" for="articles_div"><?php echo JText::_('COM_DJFLYER_ARTICLE');?></label>
			    <div class="controls">
			      		<div id="articles_div">	
			      		<?php echo $this->articles;?>
						<?php
						if($this->item->art_id>0){ ?>
						<br><label class="checkbox">
  							<input type="checkbox" name="del_article" id="del_article" value="1">
							<?php echo JText::_('release article'); ?>
						</label>
						<?php } ?>
						</div>
			    </div>
			  	</div>	
			  	  
				<div class="control-group">
			    <label class="control-label" for="published"><?php echo JText::_('COM_DJFLYER_PUBLISHED');?></label>
			    <div class="controls">  
					<label class="radio inline">
					  <input type="radio" name="published" id="published" value="1" <?php  if($this->item->published==1 || $this->item->id==0){echo "checked";}?>>
					  <?php echo JText::_('Yes'); ?>
					</label>
					<label class="radio inline">
					  <input type="radio" name="published" value="0" <?php  if($this->item->published==0 && $this->item->id>0){echo "checked";}?>>
					  <?php echo JText::_('No'); ?>
					</label>
			    </div>
			  	</div>	
			  	
				<div class="control-group">
			    <label class="control-label" for="description_div"><?php echo JText::_('COM_DJFLYER_DESCRIPTION');?></label>
			    <div class="controls">
				<div id="description_div" style="width: 70%;">	
					<?php
					   echo $editor->display( 'description', $this->item->description, '100%', '250', '40', '10',true );
					?>
				</div>
			    </div>
			  	</div>
			  	
			  	<hr>
			  	
			  	<div class="control-group">
			    <label class="control-label" for="icon_div"><?php echo JText::_('COM_DJFLYER_IMAGE');?></label>
			    <div class="controls"> 
			    <div id="icon_div"> 
	                	<input type="hidden" name="icon_url" id="icon_url" value="<?php echo $this->item->icon_url ?>" />
	                    <?php
								if(!$image = $this->item->icon_url){
									echo JText::_('COM_DJFLYER_NO_IMAGE_INCLUDED');
								}else{									
								    $path = str_replace('/administrator','',JURI::base());
									$path .= 'components/com_djflyer/images/';
									$path .= $this->item->icon_url;
									echo '<img src="'.$path.'.ths.jpg" />';?>
						  			<label class="checkbox">
			  							<input type="checkbox" name="del_icon" id="del_icon" value="1">
										<?php echo JText::_('COM_DJFLYER_DETAILS_CHECK_TO_DELETE');?>
									</label>
									<?php } ?>

				</div>
			    </div>
			  	</div>
  	
			  	<div class="control-group">
			    <label style="width:150px;" class="control-label" for="icon"><?php echo JText::_('COM_DJFLYER_UPLOAD_NEW_IMAGE');?>
			    <br /><span class="input-small" style="color:gray;"><?php echo JText::_('COM_DJFLYER_NEW_IMAGES_OVERWRITE_EXISTING_ONE');?></span>
			    </label>
			    <div class="controls">
					<input type="file"  name="icon" id="icon"/>
			    </div>
			  	</div>
			  	
			  				  	
			  	<hr>
			  	
			  	<div class="control-group">
			    <label class="control-label" for="descimg_div"><?php echo JText::_('COM_DJFLYER_DESC_IMAGE');?></label>
			    <div class="controls"> 
			    <div id="descimg"> 
	                	<input type="hidden" name="image_url" id="image_url" value="<?php echo $this->item->image_url ?>" />
	                    <?php
								if(!$image = $this->item->image_url){
									echo JText::_('COM_DJFLYER_NO_IMAGE_INCLUDED');
								}else{									
								    $path = str_replace('/administrator','',JURI::base());
									$path .= 'components/com_djflyer/images/';
									$path .= $this->item->image_url;
									echo '<img src="'.$path.'.thd.jpg" />';?>
						  			<label class="checkbox">
			  							<input type="checkbox" name="del_descimg" id="del_descimg" value="1">
										<?php echo JText::_('COM_DJFLYER_DETAILS_CHECK_TO_DELETE');?>
									</label>
									<?php } ?>
				</div>
			    </div>
			  	</div>
			  	
			  	<div class="control-group">
			    <label style="width:150px;" class="control-label" for="descimg"><?php echo JText::_('COM_DJFLYER_UPLOAD_NEW_DESC_IMAGE');?>
			    <br /><span class="input-small" style="color:gray;"><?php echo JText::_('COM_DJFLYER_NEW_IMAGES_OVERWRITE_EXISTING_ONE');?></span>
			    </label>
			    <div class="controls">
					<input type="file" name="descimg" id="descimg" />
			    </div>
			  	</div>
			  	

			</fieldset>
			
			<input type="hidden" name="id" value="<?php echo $this->item->id; ?>" />
			<input type="hidden" name="ordering" value="<?php echo $this->item->ordering; ?>" />
			<input type="hidden" name="task" value="" />
			<input type="hidden" name="boxchecked" value="0" />
		</form>

		
<script type="text/javascript">

	function submitbutton(pressbutton) {
		var form = document.adminForm;
		if (pressbutton == 'cancelItem') {
			submitform( pressbutton );
			return;
		}
		
        var wal = 0;
		if (form.name.value == ""){
			alert( "<?php echo JText::_( 'Item must have name', true ); ?>" );
			wal=1;
		}		

		if(wal==0){
			submitform( pressbutton );
		}
	}
</script>