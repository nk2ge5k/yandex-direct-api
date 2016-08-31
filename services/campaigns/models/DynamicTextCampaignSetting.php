<?php


namespace directapi\services\campaigns\models;


use Symfony\Component\Validator\Constraints as Assert;

class DynamicTextCampaignSetting
{
    /**
     * @var \directapi\services\campaigns\enum\DynamicTextCampaignSettingsEnum
     * @Assert\NotBlank()
     * @DirectApiAssert\IsEnum(type="directapi\services\campaigns\enum\DynamicTextCampaignSettingsEnum")
     */
    public $Option;

    /**
     * @var \directapi\common\enum\YesNoEnum
     * @Assert\NotBlank()
     * @DirectApiAssert\IsEnum(type="directapi\common\enum\YesNoEnum")
     */
    public $Value;

    public function __construct($option = null, $value = null)
    {
        $this->Option = $option;
        $this->Value = $value;
    }
}