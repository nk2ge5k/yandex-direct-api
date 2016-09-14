<?php


namespace directapi\services\ads\models;


use directapi\components\Model;
use Symfony\Component\Validator\Constraints as Assert;
use directapi\components\constraints as DirectApiAssert;

class DynamicTextAdUpdate extends Model
{
    /**
     * @var string
     * @Assert\Length(max="75")
     */
    public $Text;

    /**
     * @var int
     */
    public $VCardId;

    /**
     * @var string
     */
    public $AdImageHash;

    /**
     * @var string
     */
    public $SitelinkSetId;

    /**
     * @var AdExtensionSetting|null
     */
    public $CalloutSetting;
}