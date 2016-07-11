<?php

namespace directapi\services\adextensions;

use directapi\common\criterias\IdsCriteria;
use directapi\common\criterias\LimitOffset;
use directapi\common\results\ActionResult;
use directapi\services\adextensions\criterias\AdExtensionsSelectionCriteria;
use directapi\services\adextensions\models\AdExtensionsAddItem;
use directapi\services\BaseService;

class AdExtensionsService extends BaseService
{
    const SERVICE = 'AdExtensions';
    /**
     * @param AdExtensionsAddItem[] $AdExtensions
     *
     * @return ActionResult[]
     */
    public function add(array $AdExtensions)
    {
        $params = [
            self::SERVICE => $AdExtensions
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
     * @inheritdoc
     */
    public function get(
        AdExtensionsSelectionCriteria $SelectionCriteria = null,
        $fieldNames,
        $сalloutFieldNames = [],
        LimitOffset $Page = null
    ) {
        $params = [
            'FieldNames' => $fieldNames
        ];

        if ($SelectionCriteria) $params['SelectionCriteria'] = $SelectionCriteria;
        if ( $Page )            $params['Page'] = $Page;

        if($сalloutFieldNames && is_array($сalloutFieldNames)){
            $params['CalloutFieldNames'] = $сalloutFieldNames;
        }

        return parent::doGet($params, self::SERVICE, null);
    }

    protected function getName()
    {
        return strtolower(self::SERVICE);
    }
}