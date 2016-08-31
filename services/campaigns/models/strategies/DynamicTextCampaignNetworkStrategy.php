<?php


namespace directapi\services\campaigns\models\strategies;


use directapi\components\Model;
use Symfony\Component\Validator\Constraints as Assert;

class DynamicTextCampaignNetworkStrategy extends  Model
{
    /**
     * @var \directapi\services\campaigns\enum\DynamicTextCampaignNetworkStrategyTypeEnum
     * @Assert\NotBlank()
     * @DirectApiAssert\IsEnum(type="directapi\services\campaigns\enum\DynamicTextCampaignNetworkStrategyTypeEnum")
     */
    public $BiddingStrategyType;
}