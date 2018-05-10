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

jimport('joomla.application.component.view');


class DjFlyerViewCategories extends JViewLegacy
{
	protected $pagination;
	
	function display($tpl = null)
	{
		$this->categories	= $this->get('Categories');		
		$this->countCategories	= $this->get('CountCategories');
		
		jimport('joomla.html.pagination');		
		$limit = JRequest::getVar('limit', '25', '', 'int');
		$limitstart = JRequest::getVar('limitstart', '0', '', 'int');		
		$pagination = new JPagination($this->countCategories, $limitstart, $limit);
		$this->pagination  = $pagination;
				


		// Check for errors.
		if (count($errors = $this->get('Errors'))) {
			JError::raiseError(500, implode("\n", $errors));
			return false;
		}
		$this->addToolbar();
		parent::display($tpl);
	}
	
	protected function addToolbar()
	{
		JToolBarHelper::title(JText::_('COM_DJFLYER_CATEGORIES'), 'generic.png');

    	JSubMenuHelper::addEntry(JText::_('COM_DJFLYER_CPANEL'), 'index.php?option=com_djflyer&view=cpanel', false);
		JSubMenuHelper::addEntry(JText::_('COM_DJFLYER_CATEGORIES'), 'index.php?option=com_djflyer&view=categories', true);
		JSubMenuHelper::addEntry(JText::_('COM_DJFLYER_ITEMS'), 'index.php?option=com_djflyer&view=items', false);

		JToolBarHelper::addNew('category.add','JTOOLBAR_NEW');
		JToolBarHelper::editList('category.edit','JTOOLBAR_EDIT');
		JToolBarHelper::deleteList('', 'categories.delete','JTOOLBAR_DELETE');		
		JToolBarHelper::divider();
		JToolBarHelper::preferences('com_djflyer', 450, 800);
		JToolBarHelper::divider();
	}
}
?>