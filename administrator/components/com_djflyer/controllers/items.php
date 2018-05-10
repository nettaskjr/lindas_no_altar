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
JTable::addIncludePath(JPATH_ADMINISTRATOR.DS.'components'.DS.'com_djflyer'.DS.'tables');
jimport('joomla.application.component.controlleradmin');

class DJFlyerControllerItems extends JControllerAdmin
{
	public function getModel($name = 'Item', $prefix = 'DJFlyerModel', $config = array('ignore_request' => true))
	{
		$model = parent::getModel($name, $prefix, $config);

		return $model;
	}
	
	function recreateThumbnails(){	
		$app = JFactory::getApplication();
		$par = &JComponentHelper::getParams( 'com_djflyer' );
	    $cid = JRequest::getVar('cid', array (), '', 'array');
		
	    $db = & JFactory::getDBO();
	    if (count($cid))
	    {
	        $cids = implode(',', $cid);
	        $query = "SELECT id,icon_url, image_url FROM #__djflyer_items WHERE id IN ( ".$cids." )";
			$db->setQuery($query);
			$items = $db->loadObjectList();
			$path = JPATH_BASE."/../components/com_djflyer/images/";
				$nw = (int)$par->get('th_width',-1);
	    		$nh = (int)$par->get('th_height',-1);	
				$dnw = $par->get('descth_width',-1);
        		$dnh = $par->get('descth_height',-1);							
		
			foreach($items as $i){
				
				if($i->icon_url){														
	        		if (JFile::exists($path.$i->icon_url.'.ths.jpg')){
	            		JFile::delete($path.$i->icon_url.'.ths.jpg');
	        		}
					if (JFile::exists($path.$i->icon_url.'.thsd.jpg')){
	            		JFile::delete($path.$i->icon_url.'.thsd.jpg');
	        		}
							
			 		DJFlyerImage::makeThumb($path.$i->icon_url, $nw, $nh, 'ths');
					DJFlyerImage::makeThumb($path.$i->icon_url, $dnw, $dnh, 'thsd');
				}
				
				if($i->image_url){														
	        		if (JFile::exists($path.$i->image_url.'.thd.jpg')){
	            		JFile::delete($path.$i->image_url.'.thd.jpg');
	        		}
							
			 		DJFlyerImage::makeThumb($path.$i->image_url, $dnw, $dnh, 'thd');
				}
				
				
			}
	
	        
	    }
	    $redirect = 'index.php?option=com_djflyer&view=items';
	    $app->redirect($redirect, JText::_('COM_DJFLYER_THUMBNAILS_RECREATED'));
	}
	
	function delete()
	{
	    $app = JFactory::getApplication();
	    $cid = JRequest::getVar('cid', array (), '', 'array');
	    $db = & JFactory::getDBO();
	    if (count($cid))
	    {
	    	$cids = implode(',', $cid);
	    	$query = "SELECT id,icon_url FROM #__djflyer_items WHERE id IN ( ".$cids." )";
			$db->setQuery($query);
			$items = $db->loadObjectList();
			foreach($items as $i){
				if($i->icon_url){														
	        		if (JFile::exists($path.$i->icon_url.'.ths.jpg')){
	            		JFile::delete($path.$i->icon_url.'.ths.jpg');
	        		}
					if (JFile::exists($path.$i->icon_url)){
	            		JFile::delete($path.$i->icon_url);
	        		}
					if (JFile::exists($path.$i->icon_url.'.thsd.jpg')){
	            		JFile::delete($path.$i->icon_url.'.thsd.jpg');
	        		}
				}
				
				if($i->image_url){														
	        		if (JFile::exists($path.$i->image_url.'.thd.jpg')){
	            		JFile::delete($path.$i->image_url.'.thd.jpg');
	        		}
					if (JFile::exists($path.$i->image_url)){
	            		JFile::delete($path.$i->image_url);
	        		}
				}
			}
			
	        $cids = implode(',', $cid);
	        $query = "DELETE FROM #__djflyer_items WHERE ID IN ( ".$cids." )";
	        $db->setQuery($query);
	        if (!$db->query())
	        {
	            echo "script alert('".$db->getErrorMsg()."');
					window.history.go(-1); </script>\n";
	        }
	    }
	    $app->redirect('index.php?option=com_djflyer&view=items', JText::_('COM_DJFLYER_ITEMS_DELETED'));
	}

}