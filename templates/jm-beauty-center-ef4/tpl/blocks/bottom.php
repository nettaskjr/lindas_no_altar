<?php
/*--------------------------------------------------------------
# Copyright (C) joomla-monster.com
# License: http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
# Website: http://www.joomla-monster.com
# Support: info@joomla-monster.com
---------------------------------------------------------------*/

defined('_JEXEC') or die;

if($this->countFlexiblock('bottom')) : ?>
<div id="jm-bottom" class="<?php echo $this->getClass('block#bottom') ?>">
  <div id="jm-bottom-in" class="container-fluid">
    <?php echo $this->renderFlexiblock('bottom','jmmodule'); ?>
  </div>
</div>
<?php endif; ?>