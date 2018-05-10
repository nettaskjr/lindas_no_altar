<?php
/**
 * @version $Id: skitterSlideshow.php 66 2015-09-22 11:22:00Z szymon $
 * @package DJ-MediaTools
 * @copyright Copyright (C) 2012 DJ-Extensions.com LTD, All rights reserved.
 * @license http://www.gnu.org/licenses GNU/GPL
 * @author url: http://dj-extensions.com
 * @author email contact@dj-extensions.com
 * @developer Szymon Woronowski - szymon.woronowski@design-joomla.eu
 *
 * DJ-MediaTools is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * DJ-MediaTools is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with DJ-MediaTools. If not, see <http://www.gnu.org/licenses/>.
 *
 */
 
// no direct access
defined('_JEXEC') or die ('Restricted access'); ?>
<script type="text/javascript">
	jQuery(document).ready(function() { jQuery('#box_skitter<?php echo $mid; ?>').skitter({animation: 'random', theme: 'square'}); });
</script>
<div id="box_skitter<?php echo $mid; ?>" class="box_skitter dj-slides">
	
		<ul>        	
          	<?php foreach ($slides as $slide) { ?>			
				<li>
					<?php $image = '<img src="'.$slide->resized_image.'" alt="'.$slide->alt.'" class="dj-image" />'; ?>
            		
					<?php require JModuleHelper::getLayoutPath('mod_djmediatools', 'slideshow_imagelink'); ?>
						
					<div class="label_text">
						<?php require JModuleHelper::getLayoutPath('mod_djmediatools', 'slideshow_description'); ?>
					</div> 
				</li>				
            <?php } ?>        	
        </ul>
</div>

<div style="clear: both"></div>