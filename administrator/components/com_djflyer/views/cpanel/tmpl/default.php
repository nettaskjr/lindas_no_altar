<?php 
/**
 * @version 2.12
 * @package DJ-Catalog2
 * @copyright Copyright (C) 2010 Blue Constant Media LTD, All rights reserved.
 * @license http://www.gnu.org/licenses GNU/GPL
 * @author url: http://design-joomla.eu
 * @author email contact@design-joomla.eu
 * @developer Michal Olczyk - michal.olczyk@design-joomla.eu
 *
 *
 * DJ-Catalog2 is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * DJ-Catalog2 is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with DJ-Catalog2. If not, see <http://www.gnu.org/licenses/>.
 *
 */

defined('_JEXEC') or die('Restricted access'); ?>

<form action="index.php" method="post" name="adminForm">

	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span8">
				<div class="row-fluid">
						<a class="span5 cpanel-btn" href="index.php?option=com_djflyer&amp;view=items"> <img
							alt="<?php echo JText::_('COM_DJFLYER_ITEMS'); ?>"
							src="components/com_djflyer/images/icon-48-item.png" />
							<span><?php echo JText::_('COM_DJFLYER_ITEMS'); ?> </span>
						</a>
						<a class="span5 cpanel-btn" href="index.php?option=com_djflyer&amp;view=categories"> <img
							alt="<?php echo JText::_('COM_DJFLYER_CATEGORIES'); ?>"
							src="components/com_djflyer/images/icon-48-category.png" />
							<span><?php echo JText::_('COM_DJFLYER_CATEGORIES'); ?> </span>
						</a>
				</div>

				<div class="row-fluid">
						<a class="span5 cpanel-btn" href="index.php?option=com_djflyer&amp;task=item.add"> <img
							alt="<?php echo JText::_('COM_DJFLYER_NEW_ITEM'); ?>"
							src="components/com_djflyer/images/icon-48-add.png" />
							<span><?php echo JText::_('COM_DJFLYER_NEW_ITEM'); ?> </span>
						</a>
						<a class="span5 cpanel-btn" href="index.php?option=com_djflyer&amp;task=category.add"> <img
							alt="<?php echo JText::_('COM_DJFLYER_NEW_CATEGORY'); ?>"
							src="components/com_djflyer/images/icon-48-add.png" />
							<span><?php echo JText::_('COM_DJFLYER_NEW_CATEGORY'); ?> </span>
						</a>
				</div>
				<div  class="row-fluid">
						<a class="span5 cpanel-btn"
						href="index.php?option=com_config&view=component&component=com_djflyer&return=<?php echo base64_encode(JFactory::getURI()->toString()); ?>"> 
						<img alt="<?php echo JText::_('JOPTIONS'); ?>"
							src="components/com_djflyer/images/icon-48-config.png" />
							<span><?php echo JText::_('JOPTIONS'); ?> </span>
						</a>
						<a class="span5 cpanel-btn" href="http://dj-extensions.com/dj-flyer/"
							target="_blank"> <img
							alt="<?php echo JText::_('COM_DJFLYER_DOCUMENTATION'); ?>"
							src="components/com_djflyer/images/icon-48-documentation.png" />
							<span><?php echo JText::_('COM_DJFLYER_DOCUMENTATION'); ?> </span>
						</a>
				</div>
			</div>

			<div class="span4">
				<div class="cpanel">
						<?php echo DJLicense::getSubscription(); ?>
				</div>
			</div>
		</div>
	</div>

	<input type="hidden" name="option" value="com_djflyer" /> <input
		type="hidden" name="c" value="cpanel" /> <input type="hidden"
		name="task" value="" /> <input type="hidden" name="view"
		value="cpanel" /> <input type="hidden" name="boxchecked" value="0" />
	<?php echo JHTML::_( 'form.token' ); ?>
</form>
