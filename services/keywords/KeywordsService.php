<?php

namespace directapi\services\keywords;


use directapi\common\criterias\IdsCriteria;
use directapi\common\criterias\LimitOffset;
use directapi\common\results\ActionResult;
use directapi\services\BaseService;
use directapi\services\keywords\enum\KeywordFieldEnum;
use directapi\services\keywords\models\KeywordAddItem;
use directapi\services\keywords\models\KeywordGetItem;
use directapi\services\keywords\models\KeywordUpdateItem;
use \directapi\services\keywords\cirterias\KeywordsSelectionCriteria;

class KeywordsService extends BaseService
{
    const SERVICE = 'Keywords';
    
    /**
     * @param KeywordAddItem[] $Keywords
     *
     * @return ActionResult[]
     */
    public function add(array $Keywords)
    {
        $params = [
            self::SERVICE => $Keywords
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
     * @param KeywordsSelectionCriteria $SelectionCriteria
     * @param KeywordFieldEnum[]        $FieldNames
     * @param LimitOffset|null          $Page
     *
     * @return KeywordGetItem[]
     */
    public function get( KeywordsSelectionCriteria $SelectionCriteria, array $FieldNames, LimitOffset $Page = null)
    {
        $params = [
            'SelectionCriteria' => $SelectionCriteria,
            'FieldNames'        => $FieldNames
        ];
        if ($Page) {
            $params['Page'] = $Page;
        }

        return parent::doGet($params, self::SERVICE, false);
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
     * @param KeywordUpdateItem[] $Keywords
     *
     * @return ActionResult[]
     */
    public function update(array $Keywords)
    {
        $params = [
            self::SERVICE => $Keywords
        ];
        return parent::doUpdate($params);
    }

    protected function getName()
    {
        return strtolower(self::SERVICE);
    }
}