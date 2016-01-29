<?php
namespace Vishv\ElasticSearchCatalogSearch\Model\Indexer;

use Vishv\ElasticSearch\Model\FlatIndexer;

class Price extends FlatIndexer implements \Magento\Framework\Indexer\ActionInterface, \Magento\Framework\Mview\ActionInterface
{
    const INDEX = 'price';

    public function __construct(\Vishv\ElasticSearchCatalogSearch\Model\ResourceModel\Price $resource, \Vishv\ElasticSearch\Model\Index $index)
    {
        parent::__construct($resource, $index);
    }

    //Should take into account all placed orders in the system
    public function executeFull()
    {
        $this->reindexAll();
    }

    //Works with a set of placed orders (mass actions and so on)
    public function executeList(array $ids)
    {
        $this->reindexList($ids);
    }

    //Works in runtime for a single order using plugins
    public function executeRow($id)
    {
        $this->reindexList([$id]);
    }

    //Used by mview, allows you to process multiple placed orders in the "Update on schedule" mode
    public function execute($ids)
    {
        if (!is_array($ids)) {
            $ids = [$ids];
        }
        $this->reindexList($ids);
    }
}