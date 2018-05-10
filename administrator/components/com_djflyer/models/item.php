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

class DJFlyerModelItem extends JModelAdmin
{

	public function getTable($type = 'Items', $prefix = 'DJFlyerTable', $config = array())
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
    function getItem($pk = NULL) {
        global $option;
        $row = JTable::getInstance('Items', 'DJFlyerTable');
		//print_r($row);die();
        $id = JRequest::getVar('id', '', '0', 'int');  
		if($id==0){
			$cid = JRequest::getVar('cid', array(0), '', 'array' );
  			$id = $cid[0];       	
		} 	      
        $row->load($id);
        return $row;
    }

    function getCategories() {
        $db = JFactory::getDBO();
        $query = "SELECT id AS value, name AS text FROM #__djflyer_categories ORDER BY name";
        $db->setQuery($query);
        $allelems = $db->loadObjectList();
        return $allelems;
    }
    
    function getArticles() {
    
        $elem = $this->getElement();
        $doc = JFactory::getDocument();
        $article = JTable::getInstance('content');

        if ($elem) {
        	if ($elem->art_id) {
            	$article->load($elem->art_id);
			}
        } else {
            $article->title = JText::_('Select an Article');
        }
        $js = "
			function jSelectArticle_jform_request_id(id, title, catid, object) {
				document.id(\"jform_request_id_id\").value = id;
				document.id(\"jform_request_id_name\").value = title;
				SqueezeBox.close();		
			}";
		/*function jSelectArticle(id, title, catid, object) {
				
			document.getElementById(object + '_id').value = id;
			document.getElementById(object + '_name').value = title;
			document.getElementById('sbox-window').close();
	}
		*/
        $doc->addScriptDeclaration($js);
        $name = 'id';
        $link = 'index.php?option=com_content&amp;view=articles&amp;layout=modal&amp;tmpl=component&amp;function=jSelectArticle_jform_request_id';
        
        JHTML::_('behavior.modal', 'a.modal');
        $html = '<div style="float: left;"><input style="background: #ffffff;" type="text" id="jform_request_id_name" size="50" value="'.htmlspecialchars($article->title, ENT_QUOTES, 'UTF-8').'" disabled="disabled" /></div>';
        $html .= '<div class="button2-left"><div class="blank">';
		$html .='<a class="modal" title="'.JText::_('Select an Article').'" href="'.$link.'" rel="{handler: \'iframe\', size: {x: 800, y: 450}}">'.JText::_('Select').'</a>';
		//<a rel=" title="Select or Change article" class="modal">Select / Change</a>
		$html .='</div></div>';
        $html .= '<input type="hidden" id="jform_request_id_id" name="art_id" value="'.($elem ? (int)($elem->art_id) : '').'" />';
        $this->_articles = $html;
        
        return $this->_articles;
    }
    
    function getElement() {
            $id = JRequest::getVar('id', '', '', 'int');
            $query = "SELECT * FROM #__djflyer_items WHERE id='$id'";
            $el = $this->_getList($query, 0, 0);
            if ($el)
        		return $el[0];
            else
            	return false;
    }
	

	protected function getReorderConditions($table)
	{
		$condition = array();
		$condition[] = 'cat_id = '.(int) $table->cat_id;
		return $condition;
	}
	
/*
	
	public function delete(&$cid) {
		if (count( $cid ))
		{
			$cids = implode(',', $cid);
			
			$query = "SELECT image_url FROM #__djc2_items WHERE id IN ( ".$cids." )";
			$this->_db->setQuery($query);
			$rows = $this->_db->loadObjectList();
			foreach($rows as $row) {
				$field_controllerImage	= new DJCatalogImage();
				$field_controllerImage->prepareToDelete($row->image_url);
			}
		}	
		return parent::delete($cid);
	}*/
}