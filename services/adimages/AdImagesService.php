<?php


namespace directapi\services\adimages;


use directapi\common\criterias\LimitOffset;
use directapi\services\adgroups\models\AdGroupAddItem;
use directapi\services\adimages\criterias\AdImageIdsCriteria;
use directapi\services\adimages\criterias\AdImageSelectionCriteria;
use directapi\services\BaseService;

class AdImagesService extends BaseService
{

    const SERVICE = 'AdImages';

    /**
     * @param AdGroupAddItem[] $adImages
     * @return \directapi\common\results\ActionResult[]
     */
    public function add( array $adImages ) {

        $params = [
            self::SERVICE => $adImages
        ];

        return parent::doAdd($params);
    }

    /**
     * @param AdImageIdsCriteria $criteria
     * @return \directapi\common\results\ActionResult[]
     */
    public function delete ( AdImageIdsCriteria $criteria ) {
        $params = [
            'SelectionCriteria' => $criteria
        ];
        $response = $this->call('delete', $params);
        return $response->DeleteResults;
    }

    /**
     * @param AdImageSelectionCriteria $criteria
     * @param array $fieldNames
     * @param LimitOffset $page
     *
     * @return array
     */
    public function get ( AdImageSelectionCriteria $criteria, array $fieldNames, LimitOffset $page = NULL ) {
        if ( $page === NULL ) {
            $page = LimitOffset::init(0, 10000);
        }

        return parent::doGet(
            [
                'SelectionCriteria' => $criteria,
                'FieldNames' => $fieldNames,
                'Page' => $page
            ],
            self::SERVICE,
            null
        );
    }

    /**
     * @return string
     */
    protected function getName()
    {
        return strtolower(self::SERVICE);
    }

}