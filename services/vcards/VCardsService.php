<?php

namespace directapi\services\vcards;


use directapi\common\criterias\IdsCriteria;
use directapi\common\criterias\LimitOffset;
use directapi\common\results\ActionResult;
use directapi\services\BaseService;
use directapi\services\vcards\enum\VCardFieldEnum;
use directapi\services\vcards\models\VCardAddItem;
use directapi\services\vcards\models\VCardGetItem;

class VCardsService extends BaseService
{
    const SERVICE = 'VCards';
    /**
     * @param VCardAddItem[] $VCards
     *
     * @return ActionResult[]
     */
    public function add(array $VCards)
    {
        $params = [
            self::SERVICE => $VCards
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
     * @param IdsCriteria      $SelectionCriteria
     * @param VCardFieldEnum[] $FieldNames
     * @param LimitOffset      $Page
     *
     * @return VCardGetItem[]
     */
    public function get(IdsCriteria $SelectionCriteria = null, array $FieldNames, LimitOffset $Page = null)
    {
        $params = [
            'FieldNames'        => $FieldNames
        ];

        if ($SelectionCriteria) $params['SelectionCriteria'] = $SelectionCriteria;
        if ($Page)              $params['Page'] = $Page;

        return parent::doGet($params, self::SERVICE, null);
    }

    protected function getName()
    {
        return strtolower(self::SERVICE);
    }
}