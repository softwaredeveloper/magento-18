<?php
class Wokko_Advancedproductgrid_Block_Adminhtml_Catalog_Product_Grid extends Mage_Adminhtml_Block_Catalog_Product_Grid
{
	
	protected function _prepareCollection(){
		$store = $this->_getStore();
        $collection = Mage::getModel('catalog/product')->getCollection()
            ->addAttributeToSelect('sku')
            ->addAttributeToSelect('name')
            ->addAttributeToSelect('attribute_set_id')
            ->addAttributeToSelect('type_id')
            ->addAttributeToSelect('weight');
            
		
        if (Mage::helper('catalog')->isModuleEnabled('Mage_CatalogInventory')) {
            $collection->joinField('qty',
                'cataloginventory/stock_item',
                'qty',
                'product_id=entity_id',
                '{{table}}.stock_id=1',
                'left');
            
            /* $collection->joinField('qty_invoiced',
                'sales/order_item',
                'qty_invoiced',
                'product_id=entity_id',
        		null,
                'left');
                
            **TRY TO ADD SELLS**    
            */
        }
        
       
        
        if ($store->getId()) {
            //$collection->setStoreId($store->getId());
            $adminStore = Mage_Core_Model_App::ADMIN_STORE_ID;
            $collection->addStoreFilter($store);
            $collection->joinAttribute(
                'name',
                'catalog_product/name',
                'entity_id',
                null,
                'inner',
                $adminStore
            );
            $collection->joinAttribute(
                'custom_name',
                'catalog_product/name',
                'entity_id',
                null,
                'inner',
                $store->getId()
            );
            $collection->joinAttribute(
                'status',
                'catalog_product/status',
                'entity_id',
                null,
                'inner',
                $store->getId()
            );
            $collection->joinAttribute(
                'visibility',
                'catalog_product/visibility',
                'entity_id',
                null,
                'inner',
                $store->getId()
            );
            $collection->joinAttribute(
                'price',
                'catalog_product/price',
                'entity_id',
                null,
                'left',
                $store->getId()
            );
            $collection->joinAttribute(
                'weight',
                'catalog_product/weight',
                'entity_id',
                null,
                'inner',
                $store->getId()
            );
        }
        else {
            $collection->addAttributeToSelect('price');
            $collection->joinAttribute('status', 'catalog_product/status', 'entity_id', null, 'inner');
            $collection->joinAttribute('visibility', 'catalog_product/visibility', 'entity_id', null, 'inner');
        }
        
        Mage_Adminhtml_Block_Widget_Grid::_prepareCollection();
        parent::_prepareCollection();
        $this->getCollection()->addWebsiteNamesToResult();
        
		
        $this->setCollection($collection);
        return $this;
        
		
	}
	protected function _prepareColumns(){
		$this->addColumnAfter('weight', array('header'=>Mage::helper('catalog')->__('Weight'), 'index'=>'weight'),'status');
		/*$this->addColumnAfter('qty_invoiced', array('header'=>Mage::helper('catalog')->__('Qty_invoiced'), 'index'=>'qty_invoiced'),'weight');
		 *TRY TO ADD QTY_INVOICED 
		 */
		parent::_prepareColumns();
	}
}