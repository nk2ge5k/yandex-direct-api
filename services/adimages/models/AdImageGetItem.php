<?php


namespace directapi\services\adimages\models;


use directapi\components\Model;

class AdImageGetItem extends Model
{
    /**
     * @var string
     */
    public $AdImageHash;
    /**
     * @var string
     */
    public $OriginalUrl;
    /**
     * @var string
     */
    public $PreviewUrl;
    /**
     * @var string
     */
    public $Name;
    /**
     * @var \directapi\services\adimages\enum\AdImageTypeEnum
     */
    public $Type;
    /**
     * @var \directapi\services\adimages\enum\AdImageSubtypeEnum
     */
    public $Subtype;
    /**
     * @var \directapi\common\enum\YesNoEnum
     */
    public $Associated;
}