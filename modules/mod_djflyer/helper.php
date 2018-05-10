<?php
/**
* @version 1.3 RC1
* @package DJ Flyer
* @subpackage DJ Flyer Module
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

// no direct access
defined('_JEXEC') or die('Restricted access');

class modDjFlyer
{
	static function getCategories($ids){
		$db= JFactory::getDBO();
		$query = "SELECT c.* FROM #__djflyer_categories c WHERE c.id IN (".$ids.") ORDER BY c.ordering";
		$db->setQuery($query);
		$cats=$db->loadObjectList();
		return $cats;
	}
	
	static function getItems($ids,$ordering){
		$db= JFactory::getDBO();
		$ordering = $ordering == "random" ? "RAND()" : "i.".$ordering;
		$query = "SELECT i.*, c.name as cat_name, a.alias as a_alias, a.catid as a_catid "
				." FROM #__djflyer_categories c, #__djflyer_items i "
				."LEFT JOIN #__content a ON i.art_id = a.id "
				." WHERE i.published=1 AND i.cat_id = c.id AND i.cat_id IN (".$ids.") ORDER BY ".$ordering;
		$db->setQuery($query);
		$items=$db->loadObjectList();
		return $items;
	}
		
}
