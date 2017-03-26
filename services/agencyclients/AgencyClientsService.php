<?php

namespace directapi\services\agencyclients;

use directapi\common\criterias\LimitOffset;
use directapi\services\agencyclients\criterias\AgencyClientsSelectionCriteria;
use directapi\services\BaseService;
use directapi\services\clients\enum\ClientFieldEnum;
use directapi\services\clients\models\ClientGetItem;

class AgencyClientsService extends BaseService
{
    const SERVICE = 'AgencyClients';

    /**
     * @param AgencyClientsSelectionCriteria $SelectionCriteria
     * @param ClientFieldEnum[] $fieldNames
     * @param LimitOffset|null $Page
     * @return array
     */
    public function get(
        AgencyClientsSelectionCriteria $SelectionCriteria,
        $fieldNames,
        LimitOffset $Page = null
    ) {

        if ($Page === null) {
            $Page = LimitOffset::init(0, 10000);
        }

        $params = [
            'SelectionCriteria' => $SelectionCriteria,
            'FieldNames' => $fieldNames,
            'Page' => $Page
        ];
        return $this->mapArray(parent::doGet($params, 'Clients', ClientGetItem::class), ClientGetItem::class);
    }

    protected function getName()
    {
        return strtolower(self::SERVICE);
    }
}
