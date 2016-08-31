<?php


namespace directapi\services\campaigns\models;


use directapi\components\Model;
use Symfony\Component\Validator\Constraints as Assert;

class DynamicTextCampaignItem extends Model
{
    /**
     * @var DynamicTextCampaignSetting[]
     * @Assert\Valid()
     * @DirectApiAssert\ArrayOf(type="directapi\services\campaigns\models\DynamicTextCampaignSetting")
     */
    public $Settings;

    /**
     * @var \directapi\common\containers\ArrayOfInteger
     * @Assert\Type(type="directapi\common\containers\ArrayOfInteger")
     */
    public $CounterIds;

    /**
     * @var DynamicTextCampaignStrategy
     * @Assert\Valid()
     * @Assert\Type(type="directapi\services\campaigns\models\DynamicTextCampaignStrategy")
     */
    public $BiddingStrategy;
}