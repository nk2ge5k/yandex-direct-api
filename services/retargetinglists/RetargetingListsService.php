<?php

namespace directapi\services\retargetinglists;

use directapi\services\BaseService;
use directapi\common\criterias\IdsCriteria;
use directapi\common\criterias\LimitOffset;
use directapi\common\results\ActionResult;
use directapi\services\retargetinglists\enum\RetargetingListFieldEnum;
use directapi\services\retargetinglists\models\RetargetingListAddItem;
use directapi\services\retargetinglists\models\RetargetingListUpdateItem;


class RetargetingListsService extends BaseService {

    const SERVICE = 'RetargetingLists';   

    /**
     * @param RetargetingListAddItem[] $retargetingLists
     *
     * @return ActionResult[]
     */
    public function add ( array $retargetingLists  ) {
        return parent::doAdd(
            [
                self::SERVICE => $retargetingLists
            ]
        );
    }

    /**
     * @param IdsCriteria $selectionCriteria
     *
     * @return ActionResult[]
     */
    public function delete ( IdsCriteria $selectionCriteria ) {
        return parent::delete($selectionCriteria);
    }
    
    /**
     * @param IdsCriteria $selectionCriteria
     * @param RetargetingListFieldEnum[] $fieldNames
     *
     * @return array
     */
    public function get ( IdsCriteria $selectionCriteria, array $fieldNames, LimitOffset $page = NULL ) {
        $params = [
            'SelectionCriteria' => $selectionCriteria,
            'FieldNames'        => $fieldNames
        ];

        if ( $page !== NULL ) {
            $params['Page'] = $page;
        } 

        return parent::doGet( $params, self::SERVICE, FALSE) ;
    }

    /**
     * @param RetargetingListUpdateItem[] $retargetingLists
     *
     * @return ActionResult[]
     */
    public function update ( array $retargetingLists ) {
        return parent::doUpdate(
            [
                self::SERVICE => $retargetingLists
            ]
        );
    }
    
    /**
     * @return string
     */
    protected function getName() {
        return strtolower(self::SERVICE);
    }
}
