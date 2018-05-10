<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );


jimport('joomla.html.html');
jimport('joomla.form.formfield');//import the necessary class definition for formfield


/**
 * Supports an HTML select list of articles
 * @since 1.6
 */
class JFormFieldDjflcats extends JFormField
{
 /**
 * The form field type.
 *
 * @var string
 * @since 1.6
 */
 protected $type = 'djflcats'; //the form field type

 /**
 * Method to get content articles
 *
 * @return array The field option objects.
 * @since 1.6
 */
 protected function getInput()
 {
 // Initialize variables.
 $session = JFactory::getSession();
 $options = array();
 
 $attr = '';

 // Initialize some field attributes.
 $attr .= $this->element['class'] ? ' class="'.(string) $this->element['class'].'"' : '';
 //echo '<pre>';print_r($this->value);die();
 // To avoid user's confusion, readonly="true" should imply disabled="true".
 if ( (string) $this->element['readonly'] == 'true' || (string) $this->element['disabled'] == 'true') {
 $attr .= ' disabled="disabled"';
 }

 $attr .= ' size="10"';
 $attr .= ' multiple="multiple"';

 // Initialize JavaScript field attributes.
// $attr .= $this->element['onchange'] ? ' onchange="'.(string) $this->element['onchange'].'"' : '';
 

 //now get to the business of finding the articles
 
 $db = JFactory::getDBO();
 $query = 'SELECT id, name as title FROM #__djflyer_categories ORDER BY ordering';
 $db->setQuery( $query );
 $categories = $db->loadObjectList();
 //print_r($db);print_r($categories);die();
 

 return JHTML::_('select.genericlist', $categories, $this->name, trim($attr), 'id', 'title', $this->value );
 
 }
}