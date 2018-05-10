<?php
/**
* @version 1.3 RC1
* @package DJ Flyer
* @subpackage DJ Flyer Component
* @copyright Copyright (C) 2010 Blue Constant Media LTD, All rights reserved.
* @license http://www.gnu.org/licenses GNU/GPL
* @author url: http://design-joomla.eu
* @author email contact@design-joomla.eu
* @developer Äąďż˝ukasz Ciastek - lukasz.ciastek@design-joomla.eu
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
JHTML::_('behavior.tooltip');
if(version_compare(JVERSION, '3.0', '>=')) JHtml::_('formbehavior.chosen', 'select');
//$limit = JRequest::getVar('limit', 25, '', 'int');
//$limitstart = JRequest::getVar('limitstart', 0, '', 'int');

$listOrder	= $this->state->get('list.ordering');
$listDirn	= $this->state->get('list.direction');

$canOrder	= true; //$user->authorise('core.edit.state', 'com_contact.category');
/*
if($listOrder == 'i.ordering' && $this->state->get('filter.category')>0){
	$saveOrder	= true;	
}else{
	$saveOrder	= false;
}*/
$saveOrder	= $listOrder == 'i.ordering'; 

?>

<form id='adminForm' action="index.php?option=com_djflyer&view=items" method="post" name="adminForm">
		<fieldset id="filter-bar" class="btn-toolbar">
		<div class="filter-search fltlft btn-group pull-left">
			<label class="filter-search-lbl help-inline" for="filter_search"><?php echo JText::_('JSEARCH_FILTER_LABEL'); ?></label>
			<input type="text" name="filter_search" id="filter_search" value="<?php echo $this->escape($this->state->get('filter.search')); ?>" placeholder="<?php echo JText::_('COM_DJFLYER_SEARCH_IN_NAME'); ?>"/>
		</div>		
		<div class="filter-search fltlft btn-group pull-left">
			<button type="submit" class="btn"><?php echo JText::_('JSEARCH_FILTER_SUBMIT'); ?></button>
			<button type="button" class="btn" onclick="document.id('filter_search').value='';this.form.submit();"><?php echo JText::_('JSEARCH_FILTER_CLEAR'); ?></button>
		</div>
		<div class="filter-select fltrt  btn-group pull-right">
			<select name="filter_category" class="inputbox input-medium" onchange="this.form.submit()">
				<option value=""><?php echo JText::_('JOPTION_SELECT_CATEGORY');?></option>				
				<?php echo JHtml::_('select.options', $this->categories, 'id', 'name', $this->state->get('filter.category'));?>
			</select>
			<select name="filter_published" class="inputbox input-medium" onchange="this.form.submit()">
				<option value=""><?php echo JText::_('JOPTION_SELECT_PUBLISHED');?></option>
				<?php echo JHtml::_('select.options', array(JHtml::_('select.option', '1', 'JPUBLISHED'),JHtml::_('select.option', '0', 'JUNPUBLISHED')), 'value', 'text', $this->state->get('filter.published'), true);?>
			</select>
		</div>
	</fieldset>
	<div class="clr"> </div>

    <table class="adminlist table table-condensed table-hover table-bordered">
        <thead>
            <tr>
                <th width="5%">
                    <input type="checkbox" name="checkall-toggle" value="" onclick="Joomla.checkAll(this)" />
                </th>
                <th width="5%">
					<?php echo JHtml::_('grid.sort', JText::_('COM_DJFLYER_ID'), 'i.id', $listDirn, $listOrder); ?>
                </th>
                <th width="15%">
					<?php echo JHtml::_('grid.sort', JText::_('COM_DJFLYER_NAME'), 'i.name', $listDirn, $listOrder); ?>
                </th>
				 <th width="18%">
					<?php echo JHtml::_('grid.sort', 'COM_DJFLYER_CATEGORY', 'category_name', $listDirn, $listOrder); ?>
                </th>
				 <th width="35%">
					<?php echo JText::_( 'Description' ); ?>					
                </th>
                <th width="10%">
					<?php echo JHtml::_('grid.sort', 'JPUBLISHED', 'i.published', $listDirn, $listOrder); ?>
                </th>
                <th width="12%" align="center">
					<?php echo JHtml::_('grid.sort',  'JGRID_HEADING_ORDERING', 'i.ordering', $listDirn, $listOrder); ?>
					<?php if ($canOrder && $saveOrder) :?>
						<?php echo JHtml::_('grid.order',  $this->items, 'filesave.png', 'items.saveorder'); ?>
					<?php endif; ?>
                </th>
            </tr>
        </thead>
        <?php 
		$n = count($this->items);
	foreach($this->items as $i => $item){
		
		$ordering	= ($listOrder == 'i.ordering');
		$canCreate	= true; //$user->authorise('core.create',		'com_contact.category.'.$item->catid);
		$canEdit	= true; //$user->authorise('core.edit',			'com_contact.category.'.$item->catid);
		$canCheckin	= true; //$user->authorise('core.manage',		'com_checkin') || $item->checked_out == $userId || $item->checked_out == 0;
		$canEditOwn	= true; //$user->authorise('core.edit.own',		'com_contact.category.'.$item->catid) && $item->created_by == $userId;
		$canChange	= true; //$user->authorise('core.edit.state',	'com_contact.category.'.$item->catid) && $canCheckin;
		
	
	//$item->name = JHTML::link('index.php?option=com_djflyer&task=editItem&cid[]='.$item->id, $item->name);

	//$checked = JHTML::_('grid.id', $i, $item->id );
	
	//$published=JHTML::_('grid.published', $item, $i);

	?>
        <tr>
            <td>
               <?php echo JHtml::_('grid.id', $i, $item->id); ?>
            </td>
            <td>
                <?php echo $item->id; ?>
            </td>
            <td valign="middle">
<?php
				if($item->icon_url){									
				    $sciezka = str_replace('/administrator','',JURI::base());
					$sciezka .= 'components/com_djflyer/images/';
					$sciezka .= $item->icon_url;
					echo '<img src="'.$sciezka.'.ths.jpg" /> ';					 
				}
					 if ($canEdit || $canEditOwn) : ?>
						<a href="<?php echo JRoute::_('index.php?option=com_djflyer&task=item.edit&id='.(int) $item->id); ?>">
							<?php echo $this->escape($item->name); ?></a>
					<?php else : ?>
						<?php echo $this->escape($item->name); ?>
					<?php endif; ?>
            </td>
			<td>
                <?php echo $item->cat_name.' (id '.$item->cat_id.')'; ?>
            </td>
			<td>
                <?php
				 $desc = strip_tags($item->description);
				
				if(strlen($desc)<150){
					echo $desc;
				}else{
					echo mb_substr($desc, '0', '150','UTF-8').'...';	
				}
				 
				 
				 ?>
            </td>
            <td align="center">
                <?php echo JHtml::_('jgrid.published', $item->published, $i, 'items.', true, 'cb'	); ?>
            </td>
            <td class="order">
					<?php if ($canChange) : ?>
						<?php if ($saveOrder) :?>
							<?php if ($listDirn == 'asc') : ?>
								<span><?php echo $this->pagination->orderUpIcon($i, ($item->cat_id == @$this->items[$i-1]->cat_id),'items.orderup', 'JLIB_HTML_MOVE_UP', $ordering); ?></span>
								<span><?php echo $this->pagination->orderDownIcon($i, $n, ($item->cat_id == @$this->items[$i+1]->cat_id), 'items.orderdown', 'JLIB_HTML_MOVE_DOWN', $ordering); ?></span>
							<?php elseif ($listDirn == 'desc') : ?>
								<span><?php echo $this->pagination->orderUpIcon($i, ($item->cat_id == @$this->items[$i-1]->cat_id),'items.orderdown', 'JLIB_HTML_MOVE_UP', $ordering); ?></span>
								<span><?php echo $this->pagination->orderDownIcon($i, $n, ($item->cat_id == @$this->items[$i+1]->cat_id), 'items.orderup', 'JLIB_HTML_MOVE_DOWN', $ordering); ?></span>
							<?php endif; ?>
						<?php endif; ?>
						<?php $disabled = $saveOrder ?  '' : 'disabled="disabled"'; ?>
						<input type="text" name="order[]" size="5" value="<?php echo $item->ordering;?>" <?php echo $disabled ?> class="text-area-order input-mini" />
					<?php else : ?>
						<?php echo $item->ordering; ?>
					<?php endif; ?>
			</td>
        </tr>
        <?php 
		} ?>
    <?php 
    //print_r($this->pagination);
    if ($this->pagination->total > $this->pagination->limit)
    	echo "
    <tfoot>
    <tr>
        <td colspan='7'>".
            $this->pagination->getListFooter().
        "</td>
    </tr>
    </tfoot>";
    ?>
    
	</table>
	<input type="hidden" name="task" value="items" />
	<input type="hidden" name="option" value="com_djflyer" />
	<input type="hidden" name="boxchecked" value="0" />
	<input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>" />
	<input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>" />
	<?php echo JHtml::_('form.token'); ?>
</form>