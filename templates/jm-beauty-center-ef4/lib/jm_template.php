<?php

/*--------------------------------------------------------------
# Copyright (C) joomla-monster.com
# License: http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
# Website: http://www.joomla-monster.com
# Support: info@joomla-monster.com
---------------------------------------------------------------*/

defined('_JEXEC') or die;

class JMTemplate extends JMFTemplate {
  public function postSetUp() {
	
	// ---------------------------------------------------------
	// LESS MAP
	// ---------------------------------------------------------
		
		// --------------------------------------
		// BOOTSTRAP
		// --------------------------------------
		
		$this->lessMap['bootstrap.less'] = array(
			'bootstrap_variables.less', 
            'template_variables.less',  
			'override/ltr/accordion.less',
			'override/ltr/breadcrumbs.less',
			'override/ltr/button-groups.less',
			'override/ltr/buttons.less',
			'override/ltr/dropdowns.less',
			'override/ltr/forms.less',
			'override/ltr/labels-badges.less',
            'override/ltr/navbar.less',
			'override/ltr/navs.less',
			'override/ltr/pager.less',
			'override/ltr/pagination.less',
            'override/ltr/scaffolding.less',
			'override/ltr/tables.less',
            'override/ltr/type.less',
			'override/ltr/utilities.less',
            'override/ltr/wells.less'
        );
        
        $this->lessMap['bootstrap_rtl.less'] = array(
            'bootstrap_variables.less', 
            'template_variables.less',  
			'override/rtl/accordion.less',
			'override/rtl/breadcrumbs.less',
			'override/rtl/button-groups.less',
			'override/rtl/buttons.less',
			'override/rtl/dropdowns.less',
			'override/rtl/forms.less',
			'override/rtl/labels-badges.less',
            'override/rtl/navbar.less',
			'override/rtl/navs.less',
			'override/rtl/pager.less',
			'override/rtl/pagination.less',
            'override/rtl/scaffolding.less',
			'override/rtl/tables.less',
            'override/rtl/type.less',
			'override/rtl/utilities.less',
            'override/rtl/wells.less'
        );
        
        $this->lessMap['bootstrap_responsive.less'] = array(
            'bootstrap_variables.less', 
            'override/ltr/responsive-767px-max.less'
        );
        
        $this->lessMap['bootstrap_responsive_rtl.less'] = array(
            'bootstrap_variables.less', 
            'override/rtl/responsive-767px-max.less'
        );
        
		// --------------------------------------
		// TEMPLATE
		// --------------------------------------
		
        $this->lessMap['template.less'] = array(
            'bootstrap_variables.less', 
            'template_variables.less',
			'override/ltr/buttons.less', 
            'override/ltr/mixins.less', 
            'template_mixins.less',
			//template
			'animated_buttons.less',
			'editor.less',
			'joomla.less',
            'layout.less',
			'menus.less',
            'modules.less',
			//extensions
			'djmediatools.less',
			'djflyer.less'
        );
		
		//RTL
		$this->lessMap['template_rtl.less'] = array(
            'bootstrap_variables.less',
            'template_variables.less',
			'override/rtl/buttons.less',
            'override/rtl/mixins.less', 
            'template_mixins.less',
			//extensions
			'djmediatools_rtl.less',
			'djflyer_rtl.less'
        );
		
		//RESPONSIVE
		$this->lessMap['template_responsive.less'] = array(
            'bootstrap_variables.less', 
            'template_variables.less', 
			'override/ltr/buttons.less',
            'override/ltr/mixins.less', 
            'template_mixins.less',
			//extensions
			'djmediatools_responsive.less'
        );
		
		// other files
		// ---------------------------
		
		$common_ltr = array(
			'bootstrap_variables.less',
			'template_variables.less',
			'override/ltr/buttons.less',
			'override/ltr/mixins.less',
			'template_mixins.less'
		);
		
		$common_rtl = array(
			'bootstrap_variables.less',
			'template_variables.less',
			'override/rtl/buttons.less',
			'override/rtl/mixins.less',
			'template_mixins.less'
		);
		
		$this->lessMap['comingsoon.less'] = $common_ltr;
		$this->lessMap['offcanvas.less'] = $common_ltr;
		$this->lessMap['offline.less'] = $common_ltr;
		$this->lessMap['custom.less'] = $common_ltr;
		
		//extensions
		$this->lessMap['djmegamenu.less'] = $common_ltr;
		$this->lessMap['djmegamenu_rtl.less'] = $common_rtl;
		
		// ---------------------------------------------------------
		// LESS VARIABLES
		// ---------------------------------------------------------
		
  	$bootstrap_vars = array();
  	
  	/* Template Layout */
  	//$parametr = $this->params->get('parametr', $this->defaults->get('parametr'));
  	
  	$templatefluidwidth = $this->params->get('JMfluidGridContainerLg', $this->defaults->get('JMfluidGridContainerLg'));
  	$bootstrap_vars['JMfluidGridContainerLg'] = $templatefluidwidth;
  	
  	//check type
  	$checkwidthtype = strstr($templatefluidwidth, '%');
  	$checkwidthtypevalue = ($checkwidthtype) ? 'fluid' : 'fixed';
  	$bootstrap_vars['JMtemplateWidthType'] = $checkwidthtypevalue;
  	$templatewidthtype = $this->params->set('JMtemplateWidthType', $checkwidthtypevalue);
  	
  	$gutterwidth = $this->params->get('JMbaseSpace', $this->defaults->get('JMbaseSpace'));
  	$bootstrap_vars['JMbaseSpace'] = $gutterwidth;
  	
  	//offcanvas
  	$offcanvaswidth = $this->params->get('JMoffCanvasWidth', $this->defaults->get('JMoffCanvasWidth'));
  	$bootstrap_vars['JMoffCanvasWidth'] = $offcanvaswidth;
  
    /* Font Modifications */
  
    //body
 
    $bodyfontsize = (int)$this->params->get('JMbaseFontSize', $this->defaults->get('JMbaseFontSize'));
  	$bootstrap_vars['JMbaseFontSize'] = $bodyfontsize.'px';
  	
    $bodyfonttype = $this->params->get('bodyFontType', '1');
    $bodyfontfamily = $this->params->get('bodyFontFamily', $this->defaults->get('bodyFontFamily')); 
    $bodygooglewebfontfamily = $this->params->get("bodyGoogleWebFontFamily", $this->defaults->get('bodyGoogleWebFontFamily'));
  	$bodygooglewebfonturl = $this->params->get('bodyGoogleWebFontUrl');
    $generatedwebfontfamily = $this->params->get('bodyGeneratedWebFont');
  
      switch($bodyfonttype) {
        case "0" : {
          $bootstrap_vars['JMbaseFontFamily'] = $bodyfontfamily;
          break;    
        }
      	case "1" :{
          $bootstrap_vars['JMbaseFontFamily'] = $bodygooglewebfontfamily;
          break;
        }
        case "2" :{
        	$bootstrap_vars['JMbaseFontFamily'] = $generatedwebfontfamily;
        	break;
        }
        default: {
          $bootstrap_vars['JMbaseFontFamily'] = $this->defaults->get('bodyGoogleWebFontFamily');
          break;
        }
     	}
     
  	//top menu horizontal
  	
  	$djmenufontsize = (int)$this->params->get('JMtopmenuFontSize', $this->defaults->get('JMtopmenuFontSize'));
  	$bootstrap_vars['JMtopmenuFontSize'] = $djmenufontsize.'px';
  	
  	$djmenufonttype = $this->params->get('djmenuFontType', '1');
  	$djmenufontfamily = $this->params->get('djmenuFontFamily', $this->defaults->get('djmenuFontFamily'));
  	$djmenugooglewebfontfamily = $this->params->get("djmenuGoogleWebFontFamily", $this->defaults->get('djmenuGoogleWebFontFamily'));
  	$djmenugeneratedwebfontfamily = $this->params->get('djmenuGeneratedWebFont');
  	
      switch($djmenufonttype) {
        case "0" : {
          $bootstrap_vars['JMtopmenuFontFamily'] = $djmenufontfamily;
          break;    
        }
        case "1" :{
          $bootstrap_vars['JMtopmenuFontFamily'] = $djmenugooglewebfontfamily;
          break;
        }
        case "2" :{
        	$bootstrap_vars['JMtopmenuFontFamily'] = $djmenugeneratedwebfontfamily;
        	break;
        }
        default: {
          $bootstrap_vars['JMtopmenuFontFamily'] = $this->defaults->get('djmenuGoogleWebFontFamily');
          break;
        }
     	}
       	
   	//module title
     	
   	$headingsfontsize = (int)$this->params->get('JMmoduleTitleFontSize', $this->defaults->get('JMmoduleTitleFontSize'));
  	$bootstrap_vars['JMmoduleTitleFontSize'] = $headingsfontsize.'px';
  	
  	$headingsfonttype = $this->params->get('headingsFontType', '1');
  	$headingsfontfamily = $this->params->get('headingsFontFamily', $this->defaults->get('headingsFontFamily')); 
  	$headingsgooglewebfontfamily = $this->params->get("headingsGoogleWebFontFamily", $this->defaults->get('headingsGoogleWebFontFamily'));
  	$headingsgeneratedwebfontfamily = $this->params->get('headingsGeneratedWebFont');
  	
      switch($headingsfonttype) {
        case "0" : {
          $bootstrap_vars['JMmoduleTitleFontFamily'] = $headingsfontfamily;
          break;    
        }
        case "1" :{
          $bootstrap_vars['JMmoduleTitleFontFamily'] = $headingsgooglewebfontfamily;
          break;
        }
        case "2" :{
        	$bootstrap_vars['JMmoduleTitleFontFamily'] = $headingsgeneratedwebfontfamily;
        	break;
        }
        default: {
          $bootstrap_vars['JMmoduleTitleFontFamily'] = $this->defaults->get('headingsGoogleWebFontFamily');
          break;
        }
     	}
  	
   	//article title
  	
  	$articlesfontsize = (int)$this->params->get('JMarticleTitleFontSize', $this->defaults->get('JMarticleTitleFontSize'));
  	$bootstrap_vars['JMarticleTitleFontSize'] = $articlesfontsize.'px';
  	
  	$articlesfonttype = $this->params->get('articlesFontType', '1');
  	$articlesfontfamily = $this->params->get('articlesFontFamily', $this->defaults->get('articlesFontFamily'));
  	$articlesgooglewebfontfamily = $this->params->get("articlesGoogleWebFontFamily", $this->defaults->get('articlesGoogleWebFontFamily'));
  	$articlesgeneratedfontfamily = $this->params->get('articlesGeneratedWebFont');
  	
      switch($articlesfonttype) {
        case "0" : {
          $bootstrap_vars['JMarticleTitleFontFamily'] = $articlesfontfamily;
          break;    
        }
        case "1" :{
          $bootstrap_vars['JMarticleTitleFontFamily'] = $articlesgooglewebfontfamily;
          break;
        }
        case "2" :{
        	$bootstrap_vars['JMarticleTitleFontFamily'] = $articlesgeneratedfontfamily;
        	break;
        }
        default: {
          $bootstrap_vars['JMarticleTitleFontFamily'] = $this->defaults->get('articlesGoogleWebFontFamily');
          break;
        }
    }

    /* Color Modifications */

    //scheme color
    $colorversion = $this->params->get('JMcolorVersion', $this->defaults->get('JMcolorVersion')); 
  	$bootstrap_vars['JMcolorVersion'] = $colorversion;
  
  	//scheme images directory
  	$imagesdir = $this->params->get('JMimagesDir', 'scheme1');
  	$bootstrap_vars['JMimagesDir'] = $imagesdir;
  
  	//custom variables
  	
  	// -------------------------------------
  	// global
  	// -------------------------------------
  	
  	//page background
  	$JMpageBackground = $this->params->get('JMpageBackground', $this->defaults->get('JMpageBackground')); 
  	$bootstrap_vars['JMpageBackground'] = $JMpageBackground;
    
    $JMmainPageBackground = $this->params->get('JMmainPageBackground', $this->defaults->get('JMmainPageBackground')); 
    $bootstrap_vars['JMmainPageBackground'] = $JMmainPageBackground;
  	
  	//base font color
  	$bodyfontcolor = $this->params->get('JMbaseFontColor', $this->defaults->get('JMbaseFontColor')); 
  	$bootstrap_vars['JMbaseFontColor'] = $bodyfontcolor;
  	
    //article headings color
    $JMarticleTitleFontColor = $this->params->get('JMarticleTitleFontColor', $this->defaults->get('JMarticleTitleFontColor')); 
    $bootstrap_vars['JMarticleTitleFontColor'] = $JMarticleTitleFontColor;
  	
  	// -------------------------------------
  	// topbar
  	// -------------------------------------
  	
  	//background
  	$JMtopbarBackground = $this->params->get('JMtopbarBackground', $this->defaults->get('JMtopbarBackground')); 
  	$bootstrap_vars['JMtopbarBackground'] = $JMtopbarBackground;
  	
  	//font color
  	$JMtopbarFontColor = $this->params->get('JMtopbarFontColor', $this->defaults->get('JMtopbarFontColor')); 
  	$bootstrap_vars['JMtopbarFontColor'] = $JMtopbarFontColor;	

  	// -------------------------------------
  	// dj-menu
  	// -------------------------------------
    
    //background
    $JMmegamenuBackground = $this->params->get('JMmegamenuBackground', $this->defaults->get('JMmegamenuBackground')); 
    $bootstrap_vars['JMmegamenuBackground'] = $JMmegamenuBackground;
		
		//border
    $JMmegamenuBorder = $this->params->get('JMmegamenuBorder', $this->defaults->get('JMmegamenuBorder')); 
    $bootstrap_vars['JMmegamenuBorder'] = $JMmegamenuBorder;
      	
  	//font color
  	$JMmegamenuFontColor = $this->params->get('JMmegamenuFontColor', $this->defaults->get('JMmegamenuFontColor')); 
  	$bootstrap_vars['JMmegamenuFontColor'] = $JMmegamenuFontColor;
  	
  	//SUBMENU    
    //module title color
    $JMmegamenuSubmenuModuleTitle = $this->params->get('JMmegamenuSubmenuModuleTitle', $this->defaults->get('JMmegamenuSubmenuModuleTitle')); 
    $bootstrap_vars['JMmegamenuSubmenuModuleTitle'] = $JMmegamenuSubmenuModuleTitle;  	
  
    // -------------------------------------
    // header
    // -------------------------------------
    
    //header text
    $JMheaderText = $this->params->get('JMheaderText', $this->defaults->get('JMheaderText')); 
    $bootstrap_vars['JMheaderText'] = $JMheaderText;
    
    //module title color
    $JMheaderModuleTitle = $this->params->get('JMheaderModuleTitle', $this->defaults->get('JMheaderModuleTitle')); 
    $bootstrap_vars['JMheaderModuleTitle'] = $JMheaderModuleTitle;
    
  	// -------------------------------------
  	// footer
  	// -------------------------------------
  	
  	//background
  	$JMfooterBackground = $this->params->get('JMfooterBackground', $this->defaults->get('JMfooterBackground')); 
  	$bootstrap_vars['JMfooterBackground'] = $JMfooterBackground;
  	
  	//font color
  	$JMfooterFontColor = $this->params->get('JMfooterFontColor', $this->defaults->get('JMfooterFontColor')); 
  	$bootstrap_vars['JMfooterFontColor'] = $JMfooterFontColor;
    
    //module title color
    $JMfooterModuleTitle = $this->params->get('JMfooterModuleTitle', $this->defaults->get('JMfooterModuleTitle')); 
    $bootstrap_vars['JMfooterModuleTitle'] = $JMfooterModuleTitle;
  	
  	// -------------------------------------
  	// modules
  	// -------------------------------------
  
  	//default module title
  	$JMmoduleTitleFontColor = $this->params->get('JMmoduleTitleFontColor', $this->defaults->get('JMmoduleTitleFontColor')); 
  	$bootstrap_vars['JMmoduleTitleFontColor'] = $JMmoduleTitleFontColor;
    
    //WHITE-MS
    //background
    $JMwhitemsBackground = $this->params->get('JMwhitemsBackground', $this->defaults->get('JMwhitemsBackground')); 
    $bootstrap_vars['JMwhitemsBackground'] = $JMwhitemsBackground;
    
    //border
    $JMwhitemsBorder = $this->params->get('JMwhitemsBorder', $this->defaults->get('JMwhitemsBorder')); 
    $bootstrap_vars['JMwhitemsBorder'] = $JMwhitemsBorder;
    
    //text color
    $JMwhitemsText = $this->params->get('JMwhitemsText', $this->defaults->get('JMwhitemsText')); 
    $bootstrap_vars['JMwhitemsText'] = $JMwhitemsText;
    
    //module title color
    $JMwhitemsModuleTitle = $this->params->get('JMwhitemsModuleTitle', $this->defaults->get('JMwhitemsModuleTitle')); 
    $bootstrap_vars['JMwhitemsModuleTitle'] = $JMwhitemsModuleTitle;
    
    //DARK-MS
    //background
    $JMdarkmsBackground = $this->params->get('JMdarkmsBackground', $this->defaults->get('JMdarkmsBackground')); 
    $bootstrap_vars['JMdarkmsBackground'] = $JMdarkmsBackground;
    
    //text color
    $JMdarkmsText = $this->params->get('JMdarkmsText', $this->defaults->get('JMdarkmsText')); 
    $bootstrap_vars['JMdarkmsText'] = $JMdarkmsText;
    
    //module title color
    $JMdarkmsModuleTitle = $this->params->get('JMdarkmsModuleTitle', $this->defaults->get('JMdarkmsModuleTitle')); 
    $bootstrap_vars['JMdarkmsModuleTitle'] = $JMdarkmsModuleTitle;
  
  	// -------------------------------------
  	// offcanvas
  	// -------------------------------------
  	
  	//background
    $JMoffCanvasBackground = $this->params->get('JMoffCanvasBackground', $this->defaults->get('JMoffCanvasBackground')); 
  	$bootstrap_vars['JMoffCanvasBackground'] = $JMoffCanvasBackground;
  	
  	//font color
    $JMoffCanvasFontColor = $this->params->get('JMoffCanvasFontColor', $this->defaults->get('JMoffCanvasFontColor')); 
  	$bootstrap_vars['JMoffCanvasFontColor'] = $JMoffCanvasFontColor;
  	
  	//module title
  	$JMoffcanvasModuleTitle = $this->params->get('JMoffcanvasModuleTitle', $this->defaults->get('JMoffcanvasModuleTitle')); 
  	$bootstrap_vars['JMoffcanvasModuleTitle'] = $JMoffcanvasModuleTitle;
  	
  	
  	// -------------------------------------
  	// extensions
  	// -------------------------------------
  	
	//background
    $JMmediatoolsDescriptionBackground = $this->params->get('JMmediatoolsDescriptionBackground', $this->defaults->get('JMmediatoolsDescriptionBackground')); 
    $bootstrap_vars['JMmediatoolsDescriptionBackground'] = $JMmediatoolsDescriptionBackground;
    
    //text color
    $JMmediatoolsSlideTitle = $this->params->get('JMmediatoolsSlideTitle', $this->defaults->get('JMmediatoolsSlideTitle')); 
    $bootstrap_vars['JMmediatoolsSlideTitle'] = $JMmediatoolsSlideTitle;
	
  	// -------------------------------------
  	// end 
  	// -------------------------------------
   	$this->params->set('jm_bootstrap_variables', $bootstrap_vars);
  
  	// -------------------------------------
  	// compile LESS
  	// -------------------------------------
  
  	// Offline Page
  	$this->CompileStyleSheet(JPath::clean(JMF_TPL_PATH.'/less/offline.less'), true);
  
  	// DJ-Megamenu
  	$djmegamenu_theme = $this->CompileStyleSheet(JPath::clean(JMF_TPL_PATH.'/less/djmegamenu.less'), true, true);
	$djmegamenu_theme_rtl = $this->CompileStyleSheet(JPath::clean(JMF_TPL_PATH.'/less/djmegamenu_rtl.less'), true, true);
  	
  	// -------------------------------------
  	// extensions themes
  	// -------------------------------------	
  
    $app = JFactory::getApplication();		
    $themer = (int)$this->params->get('themermode', 0) == 1 ? true : false;
    if ($themer) { // add LESS files when Theme Customizer enabled
          
    $urlsToRemove = array(
      'templates/'.$app->getTemplate().'/css/djmegamenu.css' => array('url' => 'templates/'.$app->getTemplate().'/less/djmegamenu.less', 'type' => 'less'),
	  'templates/'.$app->getTemplate().'/css/djmegamenu_rtl.css' => array('url' => 'templates/'.$app->getTemplate().'/less/djmegamenu_rtl.less', 'type' => 'less')
    );
      $app->set('jm_remove_stylesheets', $urlsToRemove);
    } else { // add CSS files when Theme Customizer disabled 
    $urlsToRemove = array(
      'templates/'.$app->getTemplate().'/css/djmegamenu.css' => array('url' => $djmegamenu_theme, 'type' => 'css'),
	  'templates/'.$app->getTemplate().'/css/djmegamenu_rtl.css' => array('url' => $djmegamenu_theme_rtl, 'type' => 'css')
    );
      $app->set('jm_remove_stylesheets', $urlsToRemove);
    }
  }
}

