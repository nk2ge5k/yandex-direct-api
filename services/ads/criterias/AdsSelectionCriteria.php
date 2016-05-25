<?php

namespace directapi\services\ads\criterias;


use directapi\components\constraints as DirectApiAssert;
use directapi\components\Model;
use Symfony\Component\Validator\Constraints as Assert;

class AdsSelectionCriteria extends Model
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

    /**
     * @var \directapi\common\enum\YesNoEnum
     */
    public $Mobile;

    /**
     * @var \directapi\services\ads\enum\AdTypeEnum[]
     */
    public $Types;

    /**
     * @var \directapi\common\enum\StateEnum
     */
    public $States;

    /**
     * @var \directapi\services\ads\enum\AdStatusEnum[]
     */
    public $Statuses;

    /**
     * @var int[]
     */
    public $VCardIds;

    /**
     * @var \directapi\common\enum\StatusEnum[]
     */
    public $VCardModerationStatuses;

    /**
     * @var int[]
     */
    public $SitelinkSetIds;

    /**
     * @var string[]
     */
    public $AdImageHashes;

    /**
     * @var \directapi\common\enum\StatusEnum[]
     */
    public $SitelinksModerationStatuses;

    /**
     * @var \directapi\common\enum\StatusEnum[]
     */
    public $AdImageModerationStatuses;

    /**
     * @var int[]
     */
    public $AdExtensionIds;
}