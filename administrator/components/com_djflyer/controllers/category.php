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

// No direct access
defined ('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.controller');
jimport( 'joomla.database.table' );


class DJFlyerControllerCategory extends JControllerLegacy {
	
	public function getModel($name = 'Category', $prefix = 'DJFlyerModel', $config = array('ignore_request' => true))
	{
		$model = parent::getModel($name, $prefix, $config);

		return $model;
	}
	
	public function getTable($type = 'Category', $prefix = 'DJFlyerTable', $config = array())
	{
		return JTable::getInstance($type, $prefix, $config);
	}
	
	function __construct($default = array ())
    {
        parent::__construct($default);
        $this->registerTask('apply', 'save');
		$this->registerTask('save2new', 'save');
		$this->registerTask('edit', 'add');
    }
	
	function display($cachable = false, $urlparams = false){
        JRequest::setVar('view', JRequest::getCmd('view', 'category'));
        parent::display($cachable);
        }
	
	public function add(){
		//$data = JFactory::getApplication();
		JRequest::setVar('view','category');
		parent::display();
	}
	
	public function cancel() {
		$app	= JFactory::getApplication();
		$app->redirect( 'index.php?option=com_djflyer&view=categories' );
	}
	
	public function save(){
    	$app = JFactory::getApplication();
		
		$model = $this->getModel('category');
		$row = &JTable::getInstance('Categories', 'DJFlyerTable');
		
		$par = &JComponentHelper::getParams( 'com_djflyer' );
				
    	if (!$row->bind(JRequest::get('post')))
    	{
	        echo "<script> alert('".$row->getError()."');
				window.history.go(-1); </script>\n";
        	exit ();
    	}
		
		if (!$row->store())
    	{
        	echo "<script> alert('".$row->getError()."');
				window.history.go(-1); </script>\n";
        	exit ();	
    	}
				
    	switch(JRequest::getVar('task'))
    	{
	        case 'apply':
            	$link = 'index.php?option=com_djflyer&task=category.edit&id='.$row->id;
            	$msg = JText::_('COM_DJFLYER_CATEGORY_SAVED');
            	break;
			case 'save2new':
            	$link = 'index.php?option=com_djflyer&task=category.add';
            	$msg = JText::_('COM_DJFLYER_CATEGORY_SAVED');
            	break;				
        	case 'saveItem':
        	default:
	            $link = 'index.php?option=com_djflyer&view=categories';
            	$msg = JText::_('COM_DJFLYER_CATEGORY_SAVED');
            	break;
    	}

    	$app->redirect($link, $msg);
	
	}
	
	
}

?>