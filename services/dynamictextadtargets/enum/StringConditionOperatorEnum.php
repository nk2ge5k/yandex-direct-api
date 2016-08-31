<?php


namespace directapi\services\dynamictextadtargets\enum;


use directapi\components\Enum;

class StringConditionOperatorEnum extends  Enum
{
    const EQUALS_ANY = 'EQUALS_ANY';
    const NOT_EQUALS_ALL = 'NOT_EQUALS_ALL';
    const CONTAINS_ANY = 'CONTAINS_ANY';
    const NOT_CONTAINS_ALL = 'NOT_CONTAINS_ALL';
}