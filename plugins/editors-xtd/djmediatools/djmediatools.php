<?php
/**
 * @version $Id: djmediatools.php 73 2016-05-11 16:10:04Z szymon $
 * @package DJ-MediaTools
 * @copyright Copyright (C) 2012 DJ-Extensions.com LTD, All rights reserved.
 * @license http://www.gnu.org/licenses GNU/GPL
 * @author url: http://dj-extensions.com
 * @author email contact@dj-extensions.com
 * @developer Szymon Woronowski - szymon.woronowski@design-joomla.eu
 *
 * DJ-MediaTools is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * DJ-MediaTools is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with DJ-MediaTools. If not, see <http://www.gnu.org/licenses/>.
 *
 */

// no direct access
defined('_JEXEC') or die;

class plgButtonDJMediatools extends JPlugin
{
	
	public function __construct(& $subject, $config)
	{
		parent::__construct($subject, $config);
		$this->loadLanguage();
	}

	/**
	 * Display the button
	 *
	 * @return array A two element array of (imageName, textToInsert)
	 */
	public function onDisplay($name)
	{
		$app = JFactory::getApplication();
		if($app->isSite()) return;
		
		$doc = JFactory::getDocument();
		$template = $app->getTemplate();
		
		$js = "
		function jInsertDJMedia_".md5($name)."(catid, img, title, cover) {
			if(cover) {
				var tag = '<img class=\"djalbum_link\" src=\"' + img + '\" style=\"display: block; margin: 10px auto; \" alt=\"djalbum_link:' + catid + '\" title=\"' + title + '\" width=\"290\" />';
			} else {
				var tag = '<div><img src=\"' + img + '\" style=\"background: #f5f5f5 url(".JURI::base(true)."/components/com_djmediatools/assets/icon.png) 10px center no-repeat; display: block; max-width: 100%; max-height: 300px; margin: 10px auto; padding: 10px 10px 10px 110px; border: 1px solid #ddd; -moz-box-sizing: border-box; box-sizing: border-box;\" alt=\"djmedia:' + catid + '\" title=\"' + title + '\" /></div>';
			}
			//console.log(tag);
			jInsertEditorText(tag, '".$name."');
			SqueezeBox.close();
		}";
		$doc->addScriptDeclaration($js);
		$doc->addStyleDeclaration('
			.button2-left .djmedia a {background: url("'.JURI::base(true).'/components/com_djmediatools/assets/icon-16-djmediatools.png") 100% 50% no-repeat; margin: 0 4px 0 0; padding: 0 22px 0 6px;}
			.icon-djmedia { height: 16px; width: 16px; background: url("'.JURI::base(true).'/components/com_djmediatools/assets/icon-16-djmediatools.png") 0 0 no-repeat !important; margin: 0 0 -3px; }
		');
		
		$link = 'index.php?option=com_djmediatools&amp;view=categories&amp;layout=modal&amp;tmpl=component&amp;f_name=jInsertDJMedia_'.md5($name);
		
		JHtml::_('behavior.modal');
		
		$button = new JObject;
		$button->modal = true;
		$button->class = 'btn';
		$button->link = $link;
		$button->text = JText::_('PLG_EDITORSXTD_DJMEDIATOOLS_BUTTON');
		$button->name = 'djmedia blank';
		$button->options = "{handler: 'iframe', size: {x: 900, y: 500}}";

		return $button;
	}
}