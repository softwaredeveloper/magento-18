<?php
$installer = $this;
$installer->startSetup();
$installer->run("ALTER TABLE `{$installer->getTable('module/module')}` ADD `nombre_paniers_abandonnes` INT(11) NULL DEFAULT '0'");
$installer->endSetup();