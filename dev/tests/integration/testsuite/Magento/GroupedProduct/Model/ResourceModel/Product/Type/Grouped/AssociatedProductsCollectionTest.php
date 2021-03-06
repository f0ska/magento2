<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\GroupedProduct\Model\ResourceModel\Product\Type\Grouped;

class AssociatedProductsCollectionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @magentoDataFixture Magento/GroupedProduct/_files/product_grouped.php
     * @magentoAppIsolation enabled
     * @magentoDbIsolation disabled
     */
    public function testGetColumnValues()
    {
        $productRepository = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()
            ->get('\Magento\Catalog\Api\ProductRepositoryInterface');
        /** @var $product \Magento\Catalog\Model\Product */
        $product = $productRepository->get('grouped-product');

        /** @var $objectManager \Magento\TestFramework\ObjectManager */
        $objectManager = \Magento\TestFramework\Helper\Bootstrap::getObjectManager();
        $objectManager->get('Magento\Framework\Registry')->register('current_product', $product);

        $collection = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(
            'Magento\GroupedProduct\Model\ResourceModel\Product\Type\Grouped\AssociatedProductsCollection'
        );

        $resultData = $collection->getColumnValues('sku');
        $this->assertNotEmpty($resultData);

        foreach (['simple-1', 'virtual-product'] as $skuExpected) {
            $this->assertTrue(in_array($skuExpected, $resultData));
        }
    }
}
