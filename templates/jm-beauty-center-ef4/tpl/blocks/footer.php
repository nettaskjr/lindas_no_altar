<?php
/*--------------------------------------------------------------
# Copyright (C) joomla-monster.com
# License: http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
# Website: http://www.joomla-monster.com
# Support: info@joomla-monster.com
---------------------------------------------------------------*/

defined('_JEXEC') or die;

//get information about 'back to top' button
$backtotop = $this->params->get('backToTop', '1');

//get left and center grid size
$leftspan = ($backtotop != '') ? '4' : '6';
$centerspan = ($this->checkModules('copyrights')) ? '4' : '6';

?>
<footer id="jm-footer" class="<?php echo $this->getClass('block#footer') ?>">
  <div id="jm-footer-in">
    <?php if($this->countFlexiblock('footer')) : ?>
    <div id="jm-footer-mod" class="container-fluid">
    	<?php echo $this->renderFlexiblock('footer','jmmodule'); ?>
    </div>
    <?php endif; ?>
    <div id="jm-footer-wrapper" class="container-fluid">
      <div class="row-fluid">
        <?php if($this->checkModules('copyrights')) : ?>
        <div id="jm-footer-left" class="pull-left <?php echo 'span'.$leftspan; echo $this->getClass('copyrights') ?>">
          <div id="jm-copyrights">
            <jdoc:include type="modules" name="<?php echo $this->getPosition('copyrights') ?>" style="raw"/>
          </div>
        </div>
        <?php endif; ?>
        <?php if(($backtotop == '1') AND JFactory::getApplication()-> isSite()) : ?>
        <div id="jm-footer-center" class="pull-left <?php echo 'span'.$centerspan;?>">
			<div id="jm-back-top"><a id="backtotop" href="javascript:void(0);"><?php echo JText::_( 'TPL_JM-BEAUTY-CENTER_BACKTOTOP_LABEL' );?></a></div>
        </div>
        <?php endif; ?>
        <div id="jm-footer-right" class="pull-right span4">
          <div id="jm-poweredby">
            <a href="http://www.viciolivre.com" target="_blank" title="Viciolivre">powered</a> by viciolivre.com
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>