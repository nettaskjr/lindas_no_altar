<?php
/**
* @version 1.3 RC1
* @package DJ Flyer
* @subpackage DJ Flyer Component
* @copyright Copyright (C) 2010 Blue Constant Media LTD, All rights reserved.
* @license http://www.gnu.org/licenses GNU/GPL
* @author url: http://design-joomla.eu
* @author email contact@design-joomla.eu
* @developer Łukasz Ciastek - lukasz.ciastek@design-joomla.eu
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

// No direct access.
defined ('_JEXEC') or die('Restricted access');
JTable::addIncludePath(JPATH_ADMINISTRATOR.DS.'components'.DS.'com_djflyer'.DS.'tables');
jimport('joomla.application.component.controlleradmin');

class DJFlyerControllerCategories extends JControllerAdmin
{
	public function getModel($name = 'Category', $prefix = 'DJFlyerModel', $config = array('ignore_request' => true))
	{
		$model = parent::getModel($name, $prefix, $config);

		return $model;
	}
	
	
	function delete()
	{
	    $app = JFactory::getApplication();
	    $cid = JRequest::getVar('cid', array (), '', 'array');
	    $db = & JFactory::getDBO();
	    if (count($cid))
	    {	    	
	        $cids = implode(',', $cid);
	        $query = "DELETE FROM #__djflyer_categories WHERE ID IN ( ".$cids." )";
	        $db->setQuery($query);
	        if (!$db->query())
	        {
	            echo "script alert('".$db->getErrorMsg()."');
					window.history.go(-1); </script>\n";
	        }
	    }
	    $app->redirect('index.php?option=com_djflyer&view=categories', JText::_('COM_DJFLYER_CATEGORIES_DELETED'));
	}

}