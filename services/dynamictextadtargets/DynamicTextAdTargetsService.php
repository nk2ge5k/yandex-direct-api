<?php


namespace directapi\dynamictextadtargets;


use directapi\common\criterias\LimitOffset;
use directapi\dynamictextadtargets\models\SetBidsItem;
use directapi\dynamictextadtargets\models\WebpagesSelectionCriteria;
use directapi\services\BaseService;

class DynamicTextAdTargetsService extends  BaseService
{
    const SERVICE = 'DynamicTextAdTargets';

    /**
     * @param array $webpages
     *
     * @return array
     */
    public function add( array $webpages ) {

    }

    /**
     * @param WebpagesSelectionCriteria $criteria
     * @param array $fieldNames
     * @param LimitOffset|null $page
     *
     * @return array
     */
    public function get( WebpagesSelectionCriteria $criteria, array $fieldNames, LimitOffset $page = null ) {

    }

    /**
     * @param SetBidsItem[] $bids
     *
     * @return array
     */
    public function setBids( array $bids ) {

    }

    /**
     * @return string
     */
    protected function getName()
    {
        return strtolower(self::SERVICE);
    }
}