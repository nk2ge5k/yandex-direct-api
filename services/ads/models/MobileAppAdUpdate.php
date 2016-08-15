<?php

namespace directapi\services\ads\models;

use directapi\components\constraints as DirectApiAssert;
use directapi\components\Model;
use Symfony\Component\Validator\Constraints as Assert;

class MobileAppAdUpdate extends Model
{
    /**
     * @var string|null
     * @Assert\Length(
     *     max="33"
     * )
     */
    public $Title;

    /**
     * @var string|null
     * @Assert\Length(
     *     max="75"
     * )
     */
    public $Text;

    /**
     * @var string|null
     * @Assert\Length(
     *     max="1024"
     * )
     */
    public $TrackingUrl;

    /**
     * @var MobileAppAdFeatureItem[]|null
     */
    public $Features;

    /**
     * @var \directapi\services\ads\enum\AgeLabelEnum|null
     * @DirectApiAssert\IsEnum(type="directapi\services\ads\enum\AgeLabelEnum")
     */
    public $AgeLabel;

    /**
     * @var \directapi\services\ads\enum\MobileAppAdActionEnum|null
     * @Assert\NotBlank()
     * @DirectApiAssert\IsEnum(type="directapi\services\ads\enum\MobileAppAdActionEnum")
     */
    public $Action;
}