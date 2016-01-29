<?php
namespace Vishv\ElasticSearch\Model;
use Vishv\ElasticSearch\Api\Data\IndexInterface;
class Index implements IndexInterface{

    public function putIndexData(array $data)
    {
        //$
    }

    public function createMapping($describe)
    {

    }

    public function putIndex($fields)
    {
        // TODO: Implement createIndex() method.
    }

    public function putMapping($fields)
    {
        // TODO: Implement createMapping() method.
    }

    public function deleteIndex()
    {
        // TODO: Implement deleteIndex() method.
    }

    public function deleteMapping()
    {
        // TODO: Implement deleteMapping() method.
    }


}