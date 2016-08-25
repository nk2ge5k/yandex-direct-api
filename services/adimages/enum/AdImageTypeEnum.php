<?php


namespace directapi\services\adimages\enum;


use directapi\components\Enum;

class AdImageTypeEnum extends Enum
{
    const SMALL = 'SMALL';
    const REGULAR = 'REGULAR';
    const WIDE = 'WIDE';
    const FIXED_IMAGE = 'FIXED_IMAGE';
    const UNFIT = 'UNFIT';
}