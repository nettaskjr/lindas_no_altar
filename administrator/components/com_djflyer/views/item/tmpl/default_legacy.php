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
?>
		<form action="index.php?option=com_djflyer" method="post" name="adminForm" id="adminForm" enctype='multipart/form-data'>
			<div class="width-100">
			<fieldset class="adminform">
			<legend><?php echo JText::_('COM_DJFLYER_DETAILS'); ?></legend>
				<table class="admintable">
				<tr>
					<td width="100" align="right" class="key">
						<?php echo JText::_('COM_DJFLYER_NAME');?>
					</td>
					<td>
						<input class="text_area" type="text" name="name" id="name" size="50" maxlength="250" value="<?php echo $this->item->name; ?>" />
					</td>
				</tr>
				<tr>
					<td width="100" align="right" class="key">
						<?php echo JText::_('COM_DJFLYER_CATEGORY');?>
					</td>
					<td>
					<select name="cat_id" class="inputbox" >
						<option value=""><?php echo JText::_('JOPTION_SELECT_CATEGORY');?></option>
						<?php echo JHtml::_('select.options', $this->cat, 'value', 'text', $this->item->cat_id, true);?>
					</select>
					</td>
				</tr>
				<tr>
					<td width="100" align="right" class="key">
						<?php echo JText::_('COM_DJFLYER_TOOLTIP');?>
					</td>
					<td>
						<input class="text_area" type="text" name="tooltip" id="tooltip" size="100" maxlength="250" value="<?php echo $this->item->tooltip; ?>" />
					</td>
				</tr>
				<tr>
					<td width="100" align="right" class="key">
						<?php echo JText::_('COM_DJFLYER_DETAILS');?>
					</td>
					<td>
						<input class="text_area" type="text" name="details" id="details" size="100" maxlength="250" value="<?php echo $this->item->details; ?>" />
					</td>
				</tr>
				<tr>
					<td width="100" align="right" class="key">
						<?php echo JText::_('COM_DJFLYER_ARTICLE');?>
					</td>
					<td>
						<?php echo $this->articles; 
						if($this->item->art_id>0){ ?>
							<br /><div style="padding-top:20px;"><input style="margin:0px 5px;" type="checkbox" name="del_article" id="del_article" value="1"/>
							<?php echo JText::_('release article'); ?>
							</div> 
						 <?php };
						?>
					</td>
				</tr>
				<tr>
					<td width="100" align="right" class="key">
						<?php echo JText::_('COM_DJFLYER_PUBLISHED');?>
					</td>
					<td>
						<input type="radio" name="published" value="1" <?php  if($this->item->published==1 || $this->item->id==0){echo "checked";}?> /><span style="float:left; margin:5px 15px 0 0;"><?php echo JText::_('Yes'); ?></span>				
						<input type="radio" name="published" value="0" <?php  if($this->item->published==0 && $this->item->id>0){echo "checked";}?> /><span style="float:left; margin:5px 15px 0 0;"><?php echo JText::_('No'); ?></span> 
					</td>
				</tr>
				<tr>
					<td width="100" align="right" class="key">
						<?php echo JText::_('COM_DJFLYER_DESCRIPTION');?>
					</td>
					<td>
					<?php
					   echo $editor->display( 'description', $this->item->description, '100%', '250', '40', '10',true );
					?>
					</td>
				</tr>
	            <tr>
	                <td width="100" align="right" class="key">
	                    <?php echo JText::_('COM_DJFLYER_IMAGE');?>
	                </td>
	                <td valign="bottom">
	                	<input type="hidden" name="icon_url" id="icon_url" value="<?php echo $this->item->icon_url ?>" />
	                    <?php
								if(!$image = $this->item->icon_url){
									echo JText::_('COM_DJFLYER_NO_IMAGE_INCLUDED');
								}else{									
								    $path = str_replace('/administrator','',JURI::base());
									$path .= 'components/com_djflyer/images/';
									$path .= $this->item->icon_url;
									echo '<img src="'.$path.'.ths.jpg" />';?>
									<span style="display:inline-block; margin-top:20px;"><input type="checkbox" name="del_icon" id="del_icon" value="1"/>
									<?php echo JText::_('COM_DJFLYER_DETAILS_CHECK_TO_DELETE');
									?></span><?php 
								}
							?>
	                </td>
	            </tr>
				<tr>
	                <td width="100" align="right" class="key">
	                    <?php echo JText::_('COM_DJFLYER_UPLOAD_NEW_IMAGE');?><br />
	                    <span style="color:gray;"><?php echo JText::_('COM_DJFLYER_NEW_IMAGES_OVERWRITE_EXISTING_ONE');?></span>					
	                </td>
	                <td>
						<input type="file"  name="icon" />
	                </td>
	            </tr>
				<tr>
	                <td width="100" align="right" class="key">
	                    <?php echo JText::_('COM_DJFLYER_DESC_IMAGE');?>
	                </td>
	                <td valign="bottom">
	                	<input type="hidden" name="image_url" id="image_url" value="<?php echo $this->item->image_url ?>" />
	                    <?php
								if(!$image = $this->item->image_url){
									echo JText::_('COM_DJFLYER_NO_IMAGE_INCLUDED');
								}else{									
								    $path = str_replace('/administrator','',JURI::base());
									$path .= 'components/com_djflyer/images/';
									$path .= $this->item->image_url;
									echo '<img src="'.$path.'.thd.jpg" />';?>
									<span style="display:inline-block; margin-top:20px;"><input type="checkbox" name="del_descimg" id="del_descimg" value="1"/>
									<?php echo JText::_('COM_DJFLYER_DETAILS_CHECK_TO_DELETE');
									?></span><?php 
								}
							?>
	                </td>
	            </tr>
				<tr>
	                <td width="100" align="right" class="key">
	                    <?php echo JText::_('COM_DJFLYER_UPLOAD_NEW_DESC_IMAGE');?><br />
	                    <span style="color:gray;"><?php echo JText::_('COM_DJFLYER_NEW_IMAGES_OVERWRITE_EXISTING_ONE');?></span>					
	                </td>
	                <td>
						<input type="file"  name="descimg" />
	                </td>
	            </tr>									
			</table>
			</fieldset>
			</div>
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