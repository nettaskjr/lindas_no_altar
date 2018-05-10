<?php
/*--------------------------------------------------------------
# Copyright (C) joomla-monster.com
# License: http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
# Website: http://www.joomla-monster.com
# Support: info@joomla-monster.com
---------------------------------------------------------------*/

defined('_JEXEC') or die;

if($this->checkModules('header')) : ?>
<div id="jm-header" class="<?php echo $this->getClass('block#header') ?>">
  <jdoc:include type="modules" name="<?php echo $this->getPosition('header') ?>" style="jmmodule" />
</div>
<?php endif; ?>