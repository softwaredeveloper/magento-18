<?php
class Magentocreation_Module_Model_Mysql4_Module extends Mage_Core_Model_Mysql4_Abstract
{
	public function _construct()
	{
		$this->_init('module/module','point_de_vente_id');
	}
}