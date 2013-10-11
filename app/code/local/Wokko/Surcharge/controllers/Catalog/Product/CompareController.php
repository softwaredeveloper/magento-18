<?php
require_once ('Mage/Catalog/controllers/Product/CompareController.php');
class Wokko_Surcharge_Catalog_Product_CompareController extends Mage_Catalog_Product_CompareController
{
	public function addAction(){
		if($productId = (int) $this->getRequest()->getParam('product')){
			$product = Mage::getModel('catalog/product')->load($productId);
			if($product->isSuper()){
				Mage::getSingleton('catalog/session')->addError($this->__('%s type can\'t be added to comparison list.', Mage::helper('core')->htmlEscape($product->getTypeId())));
			}else{
				if($product->getId()/*&& !$product->isSuper() */){
					Mage::getSingleton('catalog/product_compare_list')->addProduct($product);
					Mage::getSingleton('catalog/session')->addSuccess($this->__('The product %s has been added to comparison list.', Mage::helper('core')->htmlEscape($product->getName())));
					Mage::dispatchEvent('catalog_product_compare_add_product', array('product'=>$product));
				}
				Mage::helper('catalog/product_compare')->calculate();
				$this->_redirectReferer();
			}
		}
		
	}
}