<?php


namespace directapi\services\dynamictextadtargets\models;


use directapi\components\constraints\ArrayOf;
use directapi\components\constraints\IsEnum;
use directapi\components\Model;
use Symfony\Component\Validator\Constraints as Assert;

class WebpageAddItem extends Model
{
    /**
     * @var string
     *
     * @Assert\NotBlank()
     */
    public $Name;
    /**
     * @var integer
     *
     * @Assert\NotBlank()
     */
    public $AdGroupId;
    /**
     * @var WebpageCondition[]
     *
     * @Assert\Valid()
     * @Assert\Count(max="10", maxMessage="Не более 10 элементов в массиве Conditions")
     */
    public $Conditions;
    /**
     * @var integer
     */
    public $Bid;
    /**
     * @var integer
     */
    public $ContextBid;
    /**
     * @var \directapi\common\enum\PriorityEnum
     *
     * @IsEnum(type="directapi\common\enum\PriorityEnum")
     */
    public $StrategyPriority;
}
