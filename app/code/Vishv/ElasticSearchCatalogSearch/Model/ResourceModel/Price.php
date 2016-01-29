<?php
namespace Vishv\ElasticSearchCatalogSearch\Model\ResourceModel;

class Price extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected $batchSize = 500;
    protected $skip = 0;

    protected function _construct()
    {
        $this->_init('catalog_product_index_price_idx', 'entity_id');
    }

    public function getDataForReindex(array $ids = [])
    {
        $select = $this->getConnection()->select()->from($this->getMainTable());
        if (!empty($ids)) {
            $select->where($this->getIdFieldName() . ' IN(?)', $ids);
        }
        $select->limit($this->batchSize, $this->skip);
        $this->skip += $this->batchSize;
        return $this->getConnection()->fetchAll($select);
    }

    public function resetLoop()
    {
        $this->skip = 0;
        return $this;
    }

    /**
     * Must return array of mapped fields:
     * [
     *    '{field_name}' => ['type' => '{some_type}']
     * ]
     * and also can contains additional parameters of field
     *
     * @return array
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getMappingData(){
        $data = [];
        $describe =  $this->getConnection()->describeTable($this->getMainTable());
        foreach($describe as $item){
            $data[$item['COLUMN_NAME']] = ['type' => $item['DATA_TYPE']];
        }
        return $data;
    }
}
