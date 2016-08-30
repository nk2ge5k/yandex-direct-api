<?php


namespace directapi\dynamictextadtargets\models;


use directapi\components\constraints\ArrayOf;
use directapi\components\Model;
use directapi\dynamictextadtargets\enum\StringConditionOperatorEnum;
use directapi\dynamictextadtargets\enum\WebpageConditionOperandEnum;
use Symfony\Component\Validator\Constraints as Assert;

class WebpageCondition extends Model
{
    /**
     * @var WebpageConditionOperandEnum
     *
     * @Assert\NotBlank()
     */
    public $Operand;
    /**
     * @var StringConditionOperatorEnum
     *
     * @Assert\NotBlank()
     */
    public $Operator;
    /**
     * @var array
     *
     * @Assert\NotBlank()
     * @ArrayOf(type="string")
     * @Assert\Count(max=10, maxMessage="Не более 10 строк в массиве")
     */
    public $Arguments;
}