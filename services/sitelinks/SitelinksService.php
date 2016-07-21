<?php

namespace directapi\services\sitelinks;


use directapi\common\criterias\IdsCriteria;
use directapi\common\criterias\LimitOffset;
use directapi\common\results\ActionResult;
use directapi\services\BaseService;
use directapi\services\sitelinks\enum\SitelinksSetFieldEnum;
use directapi\services\sitelinks\models\SitelinksSetAddItem;
use directapi\services\sitelinks\models\SitelinksSetGetItem;

class SitelinksService extends BaseService
{
    /**
     * @param SitelinksSetAddItem[] $SitelinksSets
     *
     * @return ActionResult[]
     */
    public function add(array $SitelinksSets)
    {
        $params = [
            'SitelinksSets' => $SitelinksSets
        ];
        return parent::doAdd($params);
    }

    /**
     * @inheritdoc
     */
    public function delete(IdsCriteria $SelectionCriteria)
    {
        return parent::delete($SelectionCriteria);
    }

    /**
     * @param IdsCriteria             $SelectionCriteria
     * @param SitelinksSetFieldEnum[] $FieldNames
     * @param LimitOffset             $Page
     *
     * @return SitelinksSetGetItem[]
     */
    public function get(IdsCriteria $SelectionCriteria = null, array $FieldNames, LimitOffset $Page = null )
    {
        $params = [
            'SelectionCriteria' => $SelectionCriteria,
            'FieldNames'        => $FieldNames
        ];
        if ($Page) {
            $params['Page'] = $Page;
        }

        return parent::doGet($params, 'SitelinksSets', false);
    }

    protected function getName()
    {
        return 'sitelinks';
    }
}