<?php

namespace directapi\services\ads\models;


use directapi\components\constraints as DirectApiAssert;
use directapi\components\Model;
use Symfony\Component\Validator\Constraints as Assert;

class TextAdUpdate extends Model
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
    public $Href;

    /**
     * @var \directapi\services\ads\enum\AgeLabelEnum|null
     * @DirectApiAssert\IsEnum(type="directapi\services\ads\enum\AgeLabelEnum")
     */
    public $AgeLabel;

    /**
     * @var int|null
     */
    public $VCardId;

    /**
     * @var string|null
     */
    public $AdImageHash;

    /**
     * @var string|null
     */
    public $DisplayUrlPath;
    
    /**
     * @var int|null
     */
    public $SitelinkSetId;
    
    /**
     * @var AdExtensionSetting|null
     */
    public $CalloutSetting;
}