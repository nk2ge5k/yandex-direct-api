<?php

namespace directapi\services\ads;

use directapi\common\criterias\IdsCriteria;
use directapi\common\criterias\LimitOffset;
use directapi\common\results\ActionResult;
use directapi\services\ads\criterias\AdsSelectionCriteria;
use directapi\services\ads\models\AdAddItem;
use directapi\services\ads\models\AdGetItem;
use directapi\services\ads\models\AdUpdateItem;
use directapi\services\BaseService;

class AdsService extends BaseService
{
    const SERVICE = 'Ads';
    /**
     * @param AdAddItem[] $Ads
     *
     * @return ActionResult[]
     */
    public function add(array $Ads)
    {
        $params = [
            self::SERVICE => $Ads
        ];
        return parent::doAdd($params);
    }

    /**
     * @inheritdoc
     */
    public function archive(IdsCriteria $SelectionCriteria)
    {
        return parent::archive($SelectionCriteria);
    }

    /**
     * @inheritdoc
     */
    public function delete(IdsCriteria $SelectionCriteria)
    {
        return parent::delete($SelectionCriteria);
    }

    public function get(AdsSelectionCriteria $SelectionCriteria,
                        $fieldNames,
                        $textAdFieldNames = false,
                        $MobileAppAdFieldNames = false,
                        $DynamicTextAdFieldNames = false,
                        LimitOffset $Page = null
    ) {

        if ( $Page === NULL ) {
            $Page = LimitOffset::init(0, 10000);
        }

        $params = [
            'SelectionCriteria' => $SelectionCriteria,
            'FieldNames' => $fieldNames,
            'Page' => $Page
        ];

        if($textAdFieldNames && is_array($textAdFieldNames)){
            $params['TextAdFieldNames'] = $textAdFieldNames;
        }
        if($MobileAppAdFieldNames && is_array($MobileAppAdFieldNames)){
            $params['MobileAppAdFieldNames'] = $MobileAppAdFieldNames;
        }
        if($DynamicTextAdFieldNames && is_array($DynamicTextAdFieldNames)){
            $params['DynamicTextAdFieldNames'] = $DynamicTextAdFieldNames;
        }
        return parent::doGet($params, self::SERVICE, null);
    }

    /**
     * @param IdsCriteria $SelectionCriteria
     *
     * @return ActionResult[]
     */
    public function moderate(IdsCriteria $SelectionCriteria)
    {
        $params = [
            'SelectionCriteria' => $SelectionCriteria
        ];
        $response = $this->call('moderate', $params);
        //$result = $this->mapArray($response->ModerateResults, ActionResult::class);
        return $response->ModerateResults;

    }

    /**
     * @inheritdoc
     */
    public function resume(IdsCriteria $SelectionCriteria)
    {
        return parent::resume($SelectionCriteria);
    }

    /**
     * @inheritdoc
     */
    public function suspend(IdsCriteria $SelectionCriteria)
    {
        return parent::suspend($SelectionCriteria);
    }

    /**
     * @inheritdoc
     */
    public function unarchive(IdsCriteria $SelectionCriteria)
    {
        return parent::unarchive($SelectionCriteria);
    }

    /**
     * @param AdUpdateItem[] $Ads
     *
     * @return ActionResult[]
     */
    public function update(array $Ads)
    {
        $params = [
            self::SERVICE => $Ads
        ];
        return parent::doUpdate($params);
    }

    protected function getName()
    {
        return strtolower(self::SERVICE);
    }
}