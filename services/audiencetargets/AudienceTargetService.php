<?php

namespace directapi\services\audiencetargets;

use directapi\services\BaseService;
use directapi\services\audiencetargets\enums\AudienceTargetFieldEnum;
use directapi\services\audiencetargets\criterias\AudienceTargetSelectionCriteria;
use directapi\services\audiencetargets\models\AudienceTargetAddItem;
use directapi\services\audiencetargets\models\SetBidsItem;
use directapi\common\criterias\IdsCriteria;
use directapi\common\criterias\LimitOffset;
use directapi\common\results\ActionResult;

class AudienceTargetsService extends BaseService {

    const SERVICE = 'AudiencetTargets';

    /**
     * @param AudienceTargetSelectionCriteria   $selectionCriteria
     * @param AudienceTargetFieldEnum[]         $fieldNames
     * @param LimitOffset|null                  $page
     *
     * @return array
     */
    public function get ( AudienceTargetSelectionCriteria $selectionCriteria, array $fieldNames, LimitOffset $page = null ) {
        
        $params = [
            'SelectionCriteria' => $selectionCriteria,
            'FieldNames'        => $fieldNames
        ];

        if ( $page !== NULL ) {
            $params['Page'] = $page;
        }

        return parent::doGet($params, self::SERVICE, FALSE);
    }

    /**
     * @param AudienceTargetAddItem[] $audienceTargets
     *
     * @return ActionResult[]
     */
    public function add ( array $audienceTargets ) {
        return parent::doAdd(
            [
                self::SERVICE => $audienceTargets
            ]
        );
    }

    /**
     * @inheritdoc
     */
    public function delete ( IdsCriteria $SelectionCriteria ){
        return parent::delete($SelectionCriteria);
    }
    
    /**
     * @param SetBidsItem[] $bids
     *
     * @return array
     */
    public function setBids ( array $bids ){
        return $this
            ->call( 
                'setBids',
                [
                    'Bids' => $bids
                ]
            );
    }

    /**
     * @inheritdoc
     */
    public function resume ( IdsCriteria $selectionCriteria ){
        return parent::resume($selectionCriteria);
    }

    /**
     * @inheritdoc
     */
    public function suspend ( IdsCriteria $selectionCriteria ){
        return parent::suspend($selectionCriteria);
    }
    
    protected function getName() {
        return strtolower(self::SERVICE);
    }
}
