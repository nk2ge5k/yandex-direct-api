<?php


namespace directapi\services\dynamictextadtargets\enum;


use directapi\components\Enum;

class WebpageStateSelectionEnum extends Enum
{
    const ON = 'ON';
    const OFF = 'OFF';
    const SUSPENDED = 'SUSPENDED';
    const DELETED = 'DELETED';
}