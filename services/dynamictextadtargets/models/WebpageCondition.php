<?php


namespace directapi\services\dynamictextadtargets\models;


use directapi\components\constraints\ArrayOf;
use directapi\components\constraints\IsEnum;
use directapi\components\Model;
use Symfony\Component\Validator\Constraints as Assert;

class WebpageCondition extends Model
{
    /**
     * @var \directapi\services\dynamictextadtargets\enum\StringConditionOperatorEnum
     *
     * @IsEnum(type="directapi\services\dynamictextadtargets\enum\StringConditionOperatorEnum")
     * @Assert\NotBlank()
     */
    public $Operand;
    /**
     * @var \directapi\services\dynamictextadtargets\enum\WebpageConditionOperandEnum
     *
     * @IsEnum(type="directapi\services\dynamictextadtargets\enum\WebpageConditionOperandEnum")
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