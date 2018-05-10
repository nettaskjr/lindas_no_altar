<?php
/*--------------------------------------------------------------
# Copyright (C) joomla-monster.com
# License: http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
# Website: http://www.joomla-monster.com
# Support: info@joomla-monster.com
---------------------------------------------------------------*/

defined('_JEXEC') or die;

if($this->checkModules('breadcrumbs')) : ?>
<div id="jm-breadcrumbs" class="<?php echo $this->getClass('block#breadcrumb') ?>">
  <div id="jm-breadcrumbs-in" class="container-fluid">
    <jdoc:include type="modules" name="<?php echo $this->getPosition('breadcrumbs'); ?>" style="jmmodule" />
  </div>
</div>
<?php endif;?>