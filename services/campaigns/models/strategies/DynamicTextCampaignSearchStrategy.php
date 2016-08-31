<?php


namespace directapi\services\campaigns\models\strategies;


use directapi\components\Model;
use Symfony\Component\Validator\Constraints as Assert;

class DynamicTextCampaignSearchStrategy extends  Model
{
    /**
     * @var \directapi\services\campaigns\enum\DynamicTextCampaignSearchStrategyTypeEnum
     * @Assert\NotBlank()
     * @DirectApiAssert\IsEnum(type="directapi\services\campaigns\enum\DynamicTextCampaignSearchStrategyTypeEnum")
     */
    public $BiddingStrategyType;

    /**
     * @var StrategyMaximumClicksAdd
     * @Assert\Valid()
     * @Assert\Type(type="directapi\services\campaigns\models\strategies\StrategyMaximumClicksAdd")
     */
    public $WbMaximumClicks;

    /**
     * @var StrategyMaximumConversionRateAdd
     * @Assert\Valid()
     * @Assert\Type(type="directapi\services\campaigns\models\strategies\StrategyMaximumConversionRateAdd")
     * */
    public $WbMaximumConversionRate;

    /**
     * @var StrategyAverageCpcAdd
     * @Assert\Valid()
     * @Assert\Type(type="directapi\services\campaigns\models\strategies\StrategyAverageCpcAdd")
     */
    public $AverageCpc;

    /**
     * @var StrategyAverageCpaAdd
     * @Assert\Valid()
     * @Assert\Type(type="directapi\services\campaigns\models\strategies\StrategyAverageCpaAdd")
     */
    public $AverageCpa;

    /**
     * @var StrategyAverageRoiAdd
     * @Assert\Valid()
     * @Assert\Type(type="directapi\services\campaigns\models\strategies\StrategyAverageRoiAdd")
     */
    public $AverageRoi;

    /**
     * @var StrategyWeeklyClickPackageAdd
     * @Assert\Valid()
     * @Assert\Type(type="directapi\services\campaigns\models\strategies\StrategyWeeklyClickPackageAdd")
     */
    public $WeeklyClickPackage;
}