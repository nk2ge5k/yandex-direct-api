<?php

namespace directapi\services\campaigns\models;

use directapi\components\constraints as DirectApiAssert;
use Symfony\Component\Validator\Constraints as Assert;

class TextCampaignSetting
{
    /**
     * @var \directapi\services\campaigns\enum\TextCampaignSettingsEnum
     * @Assert\NotBlank()
     */
    public $Option;

    /**
     * @var \directapi\common\enum\YesNoEnum
     * @Assert\NotBlank()
     */
    public $Value;

    public function __construct($option = null, $value = null)
    {
        $this->Option = $option;
        $this->Value = $value;
    }
}
