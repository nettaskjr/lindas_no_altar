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

defined('_JEXEC') or die('Restricted access');

// Include the syndicate functions only once
require_once (dirname(__FILE__).DIRECTORY_SEPARATOR.'helper.php');
$document=JFactory::getDocument();
$css = JURI::base().'modules/mod_djflyer/css/djflyer.css';
$document->addStyleSheet($css);

$par = JComponentHelper::getParams('com_djflyer');
if($par->get('responsive_css','1')=='1'){
	$css = JURI::base().'modules/mod_djflyer/css/djflyer_responsive.css';
	$document->addStyleSheet($css);
}

//$params->def('greeting', 1);
$cats_list = $params->get('djcats');

if(count($cats_list)>0){
$cat_l = implode(',', $cats_list);	

$ordering = $params->get('djorder','ordering');

$cats 	= modDjFlyer::getCategories($cat_l);
$items 	= modDjFlyer::getItems($cat_l,$ordering);

$user =JFactory::getUser();

require(JModuleHelper::getLayoutPath('mod_djflyer'));
}

?>