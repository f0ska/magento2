<?php
namespace Vishv\ElasticSearch\Api\Data;

interface QueryInterface
{
    public function send();

    public function setIndex($index);

    public function setType($type);

    public function setPort($port);

    public function setUrl($url);

    public function setMethod($method);

    public function setAction($action);

    public function setBody(array $body);

    public function clear();

    public function getBody();
}