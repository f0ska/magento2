<?php
namespace Vishv\ElasticSearch\Api\Data;
interface IndexInterface
{
    public function putIndexData(array $data);

    public function putIndex($fields);

    public function putMapping($fields);

    public function deleteIndex();

    public function deleteMapping();

}