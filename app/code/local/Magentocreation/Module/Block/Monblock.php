<?php
class Magentocreation_Module_Block_monblock extends Mage_Core_Block_Template 
{
	 public function methodblock() 
	 { 
	 	$message = '<h1>salut le block magento</h1>';
	 	return $message;
	 } 
	 
	 public function getNombreCommandesClient(){
	 	$collection = Mage::getModel('module/module')->getCollection();
	 	return $collection;
	 }
}