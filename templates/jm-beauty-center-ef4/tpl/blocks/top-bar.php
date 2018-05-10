<?php
/*--------------------------------------------------------------
# Copyright (C) joomla-monster.com
# License: http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
# Website: http://www.joomla-monster.com
# Support: info@joomla-monster.com
---------------------------------------------------------------*/

defined('_JEXEC') or die;

//get logo and site description
$logo = htmlspecialchars($this->params->get('logo'));
$logotext = htmlspecialchars($this->params->get('logoText'));
$sitedescription = htmlspecialchars($this->params->get('siteDescription'));
$app = JFactory::getApplication();
$sitename = $app->getCfg('sitename');

if ($this->checkModules('topbar') or $this->checkModules('top-menu-nav') or ($logo != '') or ($logotext != '') or ($sitedescription != '')) : ?>
<header id="jm-bar-wrapp" class="<?php echo $this->getClass('block#top-bar') ?>">
  <?php if ($this->checkModules('topbar')) : ?>
  <div id="jm-top-bar" class="<?php echo $this->getClass('topbar') ?>">
    <div id="jm-top-bar-in" class="container-fluid">
      <jdoc:include type="modules" name="<?php echo $this->getPosition('topbar'); ?>" style="jmmoduleraw"/>  
    </div>
  </div>
  <?php endif; ?> 
  <?php if ($this->checkModules('top-menu-nav') or ($logo != '') or ($logotext != '') or ($sitedescription != '')) : ?>
  <div id="jm-bar">  
    <div id="jm-bar-in" class="container-fluid">
      <div class="row-fluid">
        <?php if (($logo != '') or ($logotext != '') or ($sitedescription != '')) : ?>
        <div id="jm-bar-left" class="pull-left">
          <div id="jm-logo-sitedesc">
            <div id="jm-logo-sitedesc-in">
              <?php if (($logo != '') or ($logotext != '')) : ?>
              <div id="jm-logo">
                <a href="<?php echo JURI::base(); ?>">
                  <?php if ($logo != '') : ?>
                    <img src="<?php echo JURI::base(), $logo; ?>" alt="<?php if(!$logotext) { echo $sitename; } else { echo $logotext; }; ?>" />
                  <?php else : ?>
                    <?php echo '<span>'.$logotext.'</span>';?>
                  <?php endif; ?>
                </a>
              </div>
              <?php endif; ?>
              <?php if ($sitedescription != '') : ?>
              <div id="jm-sitedesc">
                <?php echo $sitedescription; ?>
              </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <?php endif; ?>
        <?php if($this->checkModules('top-menu-nav')) : ?>
        <nav id="jm-bar-right" class="pull-right <?php echo $this->getClass('top-menu-nav') ?>">
          <div id="jm-djmenu" class="clearfix">
            <jdoc:include type="modules" name="<?php echo $this->getPosition('top-menu-nav'); ?>" style="jmmoduleraw"/>
          </div>
        </nav> 
        <?php endif; ?>
      </div>
    </div>
  </div>
  <?php endif; ?>
</header>
<?php endif; ?>