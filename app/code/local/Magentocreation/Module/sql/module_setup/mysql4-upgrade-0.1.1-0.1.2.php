<?php
$installer = $this;
$installer->startSetup();
$installer->run("CREATE TABLE IF NOT EXISTS `{$installer->getTable('module/module1')}` (`point_de_vente_id` int(11) NOT NULL AUTO_INCREMENT,`nom` varchar(100) NOT NULL,`telephone` varchar(20) NOT NULL,`adresse` text NOT NULL, PRIMARY KEY (`point_de_vente_id`))");
$installer->endSetup();