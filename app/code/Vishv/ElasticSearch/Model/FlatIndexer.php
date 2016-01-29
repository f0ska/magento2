<?php
namespace Vishv\ElasticSearch\Model;
class FlatIndexer {

    protected $_db;
    protected $_index;

    public function __construct(\Magento\Framework\Model\ResourceModel\Db\AbstractDb $db,
    \Vishv\ElasticSearch\Model\Index $index)
    {
        $this->_db = $db;
        $this->_index = $index;
    }

    public function reindexAll(){
        $this->reindexList([]);
    }

    public function reindexList(array $ids){
        $mapping = $this->_db->getMappingData();
        while($data = $this->_db->getDataForReindex($ids)){
            $this->_index->putIndexData($data);
        }
    }




}