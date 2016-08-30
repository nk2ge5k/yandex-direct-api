<?php


namespace directapi\dynamictextadtargets\models;


use directapi\common\enum\PriorityEnum;
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
     * @var PriorityEnum
     */
    public $StrategyPriority;
}