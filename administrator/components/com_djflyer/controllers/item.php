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


class DJFlyerControllerItem extends JControllerLegacy {
	
	public function getModel($name = 'Item', $prefix = 'DJFlyerModel', $config = array('ignore_request' => true))
	{
		$model = parent::getModel($name, $prefix, $config);

		return $model;
	}
	
	public function getTable($type = 'Items', $prefix = 'DJFlyerTable', $config = array())
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
        JRequest::setVar('view', JRequest::getCmd('view', 'item'));
        parent::display($cachable);
        }
	
	public function add(){
		//$data = JFactory::getApplication();		
		JRequest::setVar('view','item');
		parent::display();
	}
	
	public function cancel() {
		$app	= JFactory::getApplication();
		$app->redirect( 'index.php?option=com_djflyer&view=items' );
	}
	
	public function save(){
    	$app = JFactory::getApplication();
		
		$model = $this->getModel('item');
		$row = &JTable::getInstance('Items', 'DJFlyerTable');
		
		$par = &JComponentHelper::getParams( 'com_djflyer' );
				//die(JRequest::get('post'));
    	if (!$row->bind(JRequest::get('post')))
    	{
	        echo "<script> alert('".$row->getError()."');
				window.history.go(-1); </script>\n";
        	exit ();
    	}

		if(JRequest::getVar('del_icon', '0','','int')){
		    $path_to_delete = JPATH_BASE."/../components/com_djflyer/images/".$row->icon_url;
	        //deleting the main image
    	    if (JFile::exists($path_to_delete)){
            	JFile::delete($path_to_delete);
	        }
    	    //deleting icon of image
        	if (JFile::exists($path_to_delete.'.ths.jpg')){
            	JFile::delete($path_to_delete.'.ths.jpg');
	        }
			
			//deleting description icon of image
        	if (JFile::exists($path_to_delete.'.thsd.jpg')){
            	JFile::delete($path_to_delete.'.thsd.jpg');
	        }
			
			$row->icon_url = '';	
		}
	
		//add icon
    	$icon_files= $_FILES['icon'];
    	//print_r($_FILES);
    	//die();

    	if (substr($icon_files['type'], 0, 5) == "image")
        {
		    $path_to_delete = JPATH_BASE."/../components/com_djflyer/images/".$row->icon_url;
	        //deleting the main image
    	    if (JFile::exists($path_to_delete)){
            	JFile::delete($path_to_delete);
	        }
    	    //deleting icon of image
        	if (JFile::exists($path_to_delete.'.ths.jpg')){
            	JFile::delete($path_to_delete.'.ths.jpg');
	        }
			
			//deleting icon of image
        	if (JFile::exists($path_to_delete.'.thsd.jpg')){
            	JFile::delete($path_to_delete.'.thsd.jpg');
	        }
			
			if(count($icon_files['name'])>0 && $row->id==0){			
				$query = "SELECT id FROM #__djflyer_items ORDER BY id DESC LIMIT 1";
				$db =& JFactory::getDBO();		
				$db->setQuery($query);
				$last_id =$db->loadResult();
				$last_id++;
			}else{
				$last_id= $row->id;
			}
			

			$icon_name = $last_id.'_'.$icon_files['name'];
            $path = JPATH_BASE."/../components/com_djflyer/images/".$icon_name;
            move_uploaded_file($icon_files['tmp_name'], $path);
			
			$nw = $par->get('th_width',-1);
        	$nh = $par->get('th_height',-1);
			$dnw = $par->get('descth_width',-1);
        	$dnh = $par->get('descth_height',-1);
		 	DJFlyerImage::makeThumb($path, $nw, $nh, 'ths');
			DJFlyerImage::makeThumb($path, $dnw, $dnh, 'thsd');
			
			$row->icon_url = $icon_name;				
        }

    			
		
		
		if(JRequest::getVar('del_descimg', '0','','int')){
		    $path_to_delete = JPATH_BASE."/../components/com_djflyer/images/".$row->image_url;
	        //deleting the main image
    	    if (JFile::exists($path_to_delete)){
            	JFile::delete($path_to_delete);
	        }    	    
			//deleting description icon of image
        	if (JFile::exists($path_to_delete.'.thd.jpg')){
            	JFile::delete($path_to_delete.'.thd.jpg');
	        }
			$row->image_url ='';
		}
	
		//add icon
    	$img_files = $_FILES['descimg'];
	

    	if (substr($img_files['type'], 0, 5) == "image")
        {
		    $path_to_delete = JPATH_BASE."/../components/com_djflyer/images/".$row->image_url;
	        //deleting the main image
    	    if (JFile::exists($path_to_delete)){
            	JFile::delete($path_to_delete);
	        }
			
			//deleting icon of image
        	if (JFile::exists($path_to_delete.'.thd.jpg')){
            	JFile::delete($path_to_delete.'.thd.jpg');
	        }
			
			if(count($img_files['name'])>0 && $row->id==0){			
				$query = "SELECT id FROM #__djflyer_items ORDER BY id DESC LIMIT 1";
				$db =& JFactory::getDBO();		
				$db->setQuery($query);
				$last_id =$db->loadResult();
				$last_id++;
			}else{
				$last_id= $row->id;
			}
			

			$image_name = $last_id.'_'.$img_files['name'];
            $path = JPATH_BASE."/../components/com_djflyer/images/".$image_name;
            move_uploaded_file($img_files['tmp_name'], $path);
			
			$dnw = $par->get('descth_width',-1);
        	$dnh = $par->get('descth_height',-1);
			DJFlyerImage::makeThumb($path, $dnw, $dnh, 'thd');
			
			$row->image_url = $image_name;	
        }

    	
		
		$row->description = JRequest::getVar('description', '', 'post', 'string', JREQUEST_ALLOWRAW);
		$row->details = JRequest::getVar('details', '', 'post', 'string', JREQUEST_ALLOWRAW);
		
		
		if(!$row->ordering){
			if(!$row->cat_id)
				$row->cat_id=0;
			$query = "SELECT ordering FROM #__djflyer_items WHERE cat_id = ".$row->cat_id." ORDER BY ordering DESC LIMIT 1";
			$db =& JFactory::getDBO();		
			$db->setQuery($query);
			$order =$db->loadObject();
			$row->ordering = $order->ordering + 1;
		}
		
		if(JRequest::getVar('del_article', '0','','int')){
			$row->art_id='0';
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
            	$link = 'index.php?option=com_djflyer&task=item.edit&id='.$row->id;
            	$msg = JText::_('COM_DJFLYER_ITEM_SAVED');
            	break;
			case 'save2new':
            	$link = 'index.php?option=com_djflyer&task=item.add';
            	$msg = JText::_('COM_DJFLYER_ITEM_SAVED');
            	break;				
        	case 'saveItem':
        	default:
	            $link = 'index.php?option=com_djflyer&view=items';
            	$msg = JText::_('COM_DJFLYER_ITEM_SAVED');
            	break;
    	}

    	$app->redirect($link, $msg);
	
	}
	
	
}

?>