<?php
class Wokko_Surchargehelper_Helper_Sales_Reorder extends Mage_Sales_Helper_Reorder
{
	public function isAllow(){
		return true;
	}
}