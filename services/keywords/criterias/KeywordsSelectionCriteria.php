<?php

namespace directapi\services\keywords\criterias;


use directapi\components\constraints as DirectApiAssert;
use directapi\components\Model;
use Symfony\Component\Validator\Constraints as Assert;

class KeywordsSelectionCriteria extends Model
{
    /**
     * @var int[]
     */
    public $Ids;

    /**
     * @var int[]
     */
    public $AdGroupIds;

    /**
     * @var int[]
     */
    public $CampaignIds;

    public $States;

    public $Statuses;
}