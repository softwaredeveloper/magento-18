<?php
$installer = $this;
/*@var $installer Wokko_Typeproduct_Model_Resource_Mysql4_Setup */
$installer->startSetup();
$fieldList = array('price','special_price','special_from_date','special_to_date','minimal_price','cost','tier_price','weight','tax_class_id');
foreach($fieldList as $field){
$applyTo = explode(',',$installer->getAttribute('catalog_product',$field,'apply_to'));
	if(!in_array('typeproduct',$applyTo)){
		$applyTo[] = 'typeproduct';
		$installer->updateAttribute('catalog_product',$field,'apply_to',join(',',$applyTo));	
	}
}
$installer->endSetup();