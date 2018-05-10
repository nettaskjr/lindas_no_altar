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
defined('_JEXEC') or die('Restricted access');

// Include dependancies
jimport('joomla.application.component.controller');
if(!defined('DS')){
	define('DS',DIRECTORY_SEPARATOR);
}
require_once(JPATH_COMPONENT.DS.'lib'.DS.'djimage.php');
require_once(JPATH_COMPONENT.DS.'lib'.DS.'djlicense.php');

$controller	= JControllerLegacy::getInstance('djflyer');

$document=JFactory::getDocument();
$cs = JURI::base().'components/com_djflyer/assets/style.css';
$document->addStyleSheet($cs);

// Perform the Request task
//$controller->execute( JRequest::getCmd('task'));
$app = JFactory::getApplication();
$controller->execute($app->input->get('task'));
$controller->redirect();
?>