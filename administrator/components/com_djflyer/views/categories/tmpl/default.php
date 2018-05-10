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

?>
<form id="adminForm" action="index.php?option=com_djflyer&task=categories" method="post" name="adminForm">
    <table class="adminlist table table-condensed table-hover table-bordered">
        <thead>
            <tr>
                <th width="5%">
                    <input type="checkbox" name="checkall-toggle" value="" onclick="Joomla.checkAll(this)" />
                </th>
                <th width="5%">
					<?php echo JText::_('COM_DJFLYER_ID'); ?>
                </th>
                <th width="75%">
					<?php echo JText::_('COM_DJFLYER_NAME'); ?>
                </th>
                <th width="15%">
					<?php echo JText::_('COM_DJFLYER_ORDERING'); 					
						 echo JHtml::_('grid.order',  $this->categories, 'filesave.png', 'categories.saveorder'); 
					 ?>
                </th>
                </tr>
        </thead>
        <tbody>
        <?php $i=0; 
	foreach($this->categories as $i =>$c){
		$canCreate	= true; //$user->authorise('core.create',		'com_contact.category.'.$item->catid);
		$canEdit	= true; //$user->authorise('core.edit',			'com_contact.category.'.$item->catid);
		$canCheckin	= true; //$user->authorise('core.manage',		'com_checkin') || $item->checked_out == $userId || $item->checked_out == 0;
		$canEditOwn	= true; //$user->authorise('core.edit.own',		'com_contact.category.'.$item->catid) && $item->created_by == $userId;
		$canChange	= true; //$user->authorise('core.edit.state',	'com_contact.category.'.$item->catid) && $canCheckin;
	?>
        <tr>
            <td>
               <?php echo JHtml::_('grid.id', $i, $c->id); ?>
            </td>
            <td>
                <?php echo $c->id; ?>
            </td>
            <td>
            	<?php if ($canEdit || $canEditOwn) : ?>
					<a href="<?php echo JRoute::_('index.php?option=com_djflyer&task=category.edit&id='.(int) $c->id); ?>">
						<?php echo $this->escape($c->name); ?></a>
				<?php else : ?>
					<?php echo $this->escape($c->name); ?>
				<?php endif; ?>
            </td>
			<td class="order">
					<?php 
					$ordering = 'true';				
					?>
								<span><?php //echo $this->pagination->orderUpIcon($i, ($c->parent_id == @$this->categories[$i-1]->parent_id),'categories.orderup', 'JLIB_HTML_MOVE_UP', 'true'); ?></span>
								<span><?php //echo $this->pagination->orderDownIcon($i, $this->countCategories, ($c->parent_id == @$this->categories[$i+1]->parent_id), 'categories.orderdown', 'JLIB_HTML_MOVE_DOWN', 'true'); ?></span>
						
						<input type="text" name="order[]" size="5" value="<?php echo $c->ordering;?>" class="text-area-order input-mini" />

				</td>           
        </tr>
        <?php  
		} ?>
    </tbody>
    <?php 
    if ($this->pagination->total > $this->pagination->limit)
    	echo "
    <tfoot>
    <tr>
        <td colspan='4'>".
            $this->pagination->getListFooter().
        "</td>
    </tr>
    </tfoot>";
    ?>
	</table>
    <input type="hidden" name="option" value="com_djflyer" />
	<input type="hidden" name="task" value="categories" />
	<input type="hidden" name="boxchecked" value="0" />
	<input type="hidden" name="t" value="categories" />
	<?php echo JHtml::_('form.token'); ?>	
</form>