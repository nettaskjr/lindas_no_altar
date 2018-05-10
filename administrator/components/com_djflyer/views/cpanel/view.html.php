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

defined('_JEXEC') or die( 'Restricted access' );

jimport( 'joomla.application.component.view');
jimport('joomla.html.pane');

class DjflyerViewCpanel extends JViewLegacy
{
	function display($tpl = null)
	{		
		JSubMenuHelper::addEntry(JText::_('COM_DJFLYER_CPANEL'), 'index.php?option=com_djflyer&view=cpanel', true);
    	JSubMenuHelper::addEntry(JText::_('COM_DJFLYER_CATEGORIES'), 'index.php?option=com_djflyer&view=categories', false);
		JSubMenuHelper::addEntry(JText::_('COM_DJFLYER_ITEMS'), 'index.php?option=com_djflyer&view=items', false);


		JToolBarHelper::title('DJ-Flyer');
		JToolBarHelper::preferences('com_djflyer', 450, 800);
		
		$version = new JVersion;
		if (version_compare($version->getShortVersion(), '3.0.0', '<')) {
			$tpl = 'legacy';
		}
		
		parent::display($tpl);
	}

}