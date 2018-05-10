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

// No direct access.
defined ('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.modeladmin');

class DJFlyerModelCategory extends JModelAdmin
{

	public function getTable($type = 'Categories', $prefix = 'DJFlyerTable', $config = array())
	{
		return JTable::getInstance($type, $prefix, $config);
	}
	public function getForm($data = array(), $loadData = true)
	{
		
		// Initialise variables.
		/*$app	= JFactory::getApplication();

		// Get the form.
		$form = $this->loadForm('com_djcatalog2.item', 'item', array('control' => 'jform', 'load_data' => $loadData));
		if (empty($form)) {
			return false;
		}*/

		return $form;
	}
    function getCategory() {
        global $option;
        $row = JTable::getInstance('Categories', 'DJFlyerTable');
		//print_r($row);die();
        $id = JRequest::getVar('id', '', '0', 'int');
		if($id==0){
			$cid = JRequest::getVar('cid', array(0), '', 'array' );
  			$id = $cid[0];       	
		} 		
        $row->load($id);
        return $row;
    }

   
	


}