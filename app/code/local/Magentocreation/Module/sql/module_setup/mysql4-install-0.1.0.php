<?php
$installer = $this;
$installer->startSetup();
$installer->run("
CREATE TABLE IF NOT EXISTS `{$installer->getTable('module/module')}`(
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`nom` varchar(50) NOT NULL,
	`nombre_commandes` int(11) NOT NULL DEFAULT '0',
	 PRIMARY KEY(`id`)
	)
");
$installer->endSetup();