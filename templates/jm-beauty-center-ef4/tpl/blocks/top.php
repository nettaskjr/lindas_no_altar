<?php
/*--------------------------------------------------------------
# Copyright (C) joomla-monster.com
# License: http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
# Website: http://www.joomla-monster.com
# Support: info@joomla-monster.com
---------------------------------------------------------------*/

defined('_JEXEC') or die;
 
if($this->countFlexiblock('top')) : ?>
<div id="jm-top" class="<?php echo $this->getClass('block#top'); ?>">
  <div id="jm-top-in" class="container-fluid">
    <?php echo $this->renderFlexiblock('top','jmmodule'); ?>
  </div>
</div>
<?php endif; ?>