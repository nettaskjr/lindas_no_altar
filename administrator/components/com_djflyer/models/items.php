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

/*Items Model*/

//jimport('joomla.application.component.model');
jimport('joomla.application.component.modellist');

class DjFlyerModelItems extends JModelList{
	
	public function __construct($config = array())
	{
		if (empty($config['filter_fields'])) {
			$config['filter_fields'] = array(
				'name', 'i.name',
				'id', 'i.id',				
				'cat_id', 'a.cat_id', 'category_name',
				'description', 'i.description',
				'tooltip', 'i.tooltip',
				'art_id', 'i.art_id',
				'details', 'i.details',
				'ordering', 'i.ordering',
				'published', 'i.published'
			);
		}

		parent::__construct($config);
	}
	
	protected function populateState($ordering = null, $direction = null)
	{
		// Initialise variables.
		$app = JFactory::getApplication();

		$search = $this->getUserStateFromRequest($this->context.'.filter.search', 'filter_search');
		$this->setState('filter.search', $search);

		$published = $this->getUserStateFromRequest($this->context.'.filter.published', 'filter_published', '');
		$this->setState('filter.published', $published);

		$category = $this->getUserStateFromRequest($this->context.'.filter.category', 'filter_category', '');
		$this->setState('filter.category', $category);
		
		// List state information.
		parent::populateState('i.name', 'asc');
	}

	protected function getStoreId($id = '')
	{
		// Compile the store id.
		$id	.= ':'.$this->getState('filter.search');
		$id	.= ':'.$this->getState('filter.published');
		$id	.= ':'.$this->getState('filter.category');
		
		return parent::getStoreId($id);
	}
	
	public function _buildWhere(){		
		$app = JFactory::getApplication();
		$where= '';
		
		$category = $this->getState('filter.category');		
		if (is_numeric($category) && $category != 0) {
			$where = ' AND i.cat_id = ' . (int) $category;
		}

		$search = $this->getState('filter.search');	
		//print_r($search); echo "aha";	
		if (!empty($search)) {
			//print_r($search);
			$db= JFactory::getDBO();
			$search = $db->Quote('%'.$db->escape($search, true).'%');
			$where .= " AND i.name LIKE ".$search." ";
		}
		
		$published = $this->getState('filter.published');
		if (is_numeric($published)) {
			$where = ' AND i.published = ' . (int) $published;
		}

//print_r($where); //die();
		return $where;
	}
	
	function getItems(){
		if(empty($this->_items)) {
			$limit = JRequest::getVar('limit', '25', '', 'int');
			$limitstart = JRequest::getVar('limitstart', '0', '', 'int');
			
			$orderCol	= $this->state->get('list.ordering');
			
			if($orderCol=='i.ordering'){
				$orderCol = 'i.cat_id asc,i.ordering';	
			}elseif($orderCol=='category_name'){
				$orderCol = 'c.name';
			}
			$orderDirn	= $this->state->get('list.direction');
			
			
		
			$db= JFactory::getDBO();	
			$query = "SELECT i.*, c.name as cat_name FROM #__djflyer_items i "
			 		."LEFT JOIN #__djflyer_categories c ON i.cat_id=c.id "
					."  WHERE 1  ".$this->_buildWhere()." order by ".$orderCol." ".$orderDirn." ";
			$this->_items = $this->_getList($query, $limitstart, $limit);
			
			//$db->setQuery($query);$items=$db->loadObjectList();echo '<pre>';print_r($db);print_r($items);die();
		}
		return $this->_items;
	}
	
	protected function getReorderConditions($table)
	{
		$condition = array();
		$condition[] = 'cat_id = '.(int) $table->cat_id;
		return $condition;
	}
	
/*	function getCountItems(){
		$db= &JFactory::getDBO();
		$query = "SELECT count(i.id) FROM #__djflyer_items i WHERE 1 ";
		$db->setQuery($query);
		$allelems=$db->loadResult();
		return $allelems;
	}*/
	
	public function getCategories(){
		if(empty($this->_categories)) {
			$query = "SELECT * FROM #__djflyer_categories ORDER BY name";
			$this->_categories = $this->_getList($query,0,0);
		}
		return $this->_categories;
	}
	
	public function getCountItems(){
		if(empty($this->_countItems)) {
			$db= JFactory::getDBO();
			$query = "SELECT count(i.id) FROM #__djflyer_items i WHERE 1 ".$this->_buildWhere();
			$db->setQuery($query);
			$this->_countItems=$db->loadResult();
		}
		return $this->_countItems;
	}
	
	/*function getCat(){
		$db= &JFactory::getDBO();
		$query = "SELECT id, name FROM #__djflyer_categories ORDER BY name";

		$db->setQuery($query);
		
		$cats[] = JHTML::_('select.option', '0', '- '.JText::_('Select Parent Category').' -', 'id', 'name');
		$db->setQuery($query);
		return array_merge($cats, $db->loadObjectList());
	}
	*/


}
?>