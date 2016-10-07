<?php


namespace directapi\services\dynamictextadtargets;


use directapi\common\criterias\LimitOffset;
use directapi\services\dynamictextadtargets\models\SetBidsItem;
use directapi\services\dynamictextadtargets\models\WebpagesSelectionCriteria;
use directapi\services\BaseService;
use directapi\services\common\criterias\IdsCriteria;

class DynamicTextAdTargetsService extends  BaseService
{
    const SERVICE   = 'DynamicTextAdTargets';

    const WEBPAGES  = 'Webpages';

    /**
     * @param array $webpages
     *
     * @return array
     */
    public function add( array $webpages )
    {
        return parent::doAdd(
            [
                self::WEBPAGES => $webpages
            ]
        );
    }

    /**
     * @param WebpagesSelectionCriteria $criteria
     * @param array $fieldNames
     * @param LimitOffset|null $page
     *
     * @return array
     */
    public function get( WebpagesSelectionCriteria $criteria, array $fieldNames, LimitOffset $page = null )
    {

        $page = $page === NULL ? LimitOffset::init(0, 10000) : $page;

        return parent::doGet(
            [
                'SelectionCriteria' => $criteria,
                'FieldNames' => $fieldNames,
                'Page' => $page
            ],
            self::WEBPAGES,
            NULL
        );
    }
    
    /**
     * @param IdsCriteria $criteria
     * 
     * @return array
     */
    public function delete( IdsCriteria $SelectionCriteria ) {
        return parent::delete($SelectionCriteria);
    }

    /**
     * @param SetBidsItem[] $bids
     *
     * @return array
     */
    public function setBids( array $bids )
    {
        $params = [
            'Bids' => $bids
        ];
        return $this->call('setBids', $params);
    }

    /**
     * @return string
     */
    protected function getName()
    {
        return strtolower(self::SERVICE);
    }
}
